<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\data_produk;

class Home extends BaseController
{
    public function __construct()
    {

        $this->data_produk = new data_produk();

        // $this->Request = new Request();
        helper('form');
        $this->db      = \Config\Database::connect();
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
    public function Get($id = null)
    {
        $data = $this->data_produk-> ($id);
        echo json_encode($data);
    }
    public function hapus_produk($id)
    {
        $this->data_produk->hapusproduk($id);
    }
}
