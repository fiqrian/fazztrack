<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\data_produk;

class Home extends BaseController
{
    public function __construct()
    {

        $this->data_produk = new data_produk();

        //Tools Framework
        helper('form');
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->session = \Config\Services::session();
        $this->form_validation = \Config\Services::validation();
        $this->request =  \Config\Services::request();
    }
    public function index()
    {

        $query = $this->data_produk->produk();
        $data['produk'] = $query->getResult();
        echo  view('upload_produk', $data);
    }
        public function edit_page()
    {

        $query = $this->data_produk->produk();
        $data['produk'] = $query->getResult();
        echo  view('edit_produk', $data);
    }
    public function edit_produk(){
        $request = \Config\Services::request();;
        $nama_produk = $request->getPost('nama_produk');
         $keterangan = $request->getPost('keterangan');
          $harga = $request->getPost('harga');
           $jumlah = $request->getPost('jumlah');
        $data = [
            'nama_produk'=> $nama_produk,
             'keterangan'=> $keterangan,
              'harga'=> $harga,
               'jumlah'=> $jumlah
        ];
        $this->data_produk->update_produk();
        return redirect()->to('/');
        

    }
    public function tambah_produk()
    {
        $request = \Config\Services::request();
        $data = array(
            'id'     =>     $request->getPost('id'),
            'nama_produk'   =>     $request->getPost('nama_produk'),
            'keterangan'     =>     $request->getPost('keterangan'),
            'harga'   =>     $request->getPost('harga'),
            'jumlah'   =>     $request->getPost('jumlah')
        );
        $this->data_produk->simpan_produk($data, 'produk');
        return redirect()->back();
    }
    public function Get_id_produk($id = null)
    {
        $data = $this->data_produk->get_produk_by_id($id);
        echo json_encode($data);
    }
    public function hapus_produk()
    {
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        $this->data_produk->hapusdata($id);
            return redirect()->back();
        }
}

