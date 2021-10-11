<?php

namespace app\Models;

use CodeIgniter\model;

class data_produk extends Model
{
    protected $table = 'produk';
    protected $db, $builder;
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama_produk', 'keterangan', 'harga', 'jumlah'];

    public function produk()
    {
    return $this->get();
    }
    public function simpan_produk()
    {
        $request = \Config\Services::request();
        $isidata = array(
            'id'     =>     $request->getPost('id'),
            'nama_produk'   =>     $request->getPost('nama_produk'),
            'keterangan'     =>     $request->getPost('keterangan'),
            'harga'   =>     $request->getPost('harga'),
            'jumlah'   =>     $request->getPost('jumlah')
        );
        $this->insert($isidata);
    }
    public function get_produk_by_id($id)
    {
        $this->where('id', $id);
        return $this->builder->get()->getRow();
    }
    public function hapusdata()
    {
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        $this->where('id', $id)->delete();
    }
       public function update_produk()
    {
        $request = \Config\Services::request();
        $this->save([
            'id' => $request->getPost('id'),
            'nama_produk'    => $request->getPost('nama_produk'),
            'keterangan' => $request->getPost('keterangan'),
            'harga' => $request->getPost('harga'),
            'jumlah' => $request->getPost('jumlah'),
        ]);
    }
}
