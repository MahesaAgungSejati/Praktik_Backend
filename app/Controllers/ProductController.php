<?php

namespace App\Controllers;
use App\Models\ProductModel;

class ProductController extends BaseController {

    protected $product;
    public function __construct(){
        $this->product = new ProductModel();
    }

    public function insertProduct(){
        $data = [
            'nama_product' => 'Buah Gomu Gomu',
            'description' => 'Zoan tipe Mitologi',
        ];

        $this->product->insert($data);
    }

    public function readProduct(){
        $products = $this->product->findAll();
        $data = [
            'product' => $products
        ];
        return view('product', $data);
    }

    public function getProduct($id) {

        $product = $this->product->where('id',$id)->first();
        $data = [
            'product' => $product
        ];
        return view('edit_product', $data);
    }

    public function updateProduct($id) {
        $data = [
            'nama_product' => $this->request->getVar('nama_product'),
            'description' => $this->request->getVar('description')
        ];
    
        if (!$this->product->update($id, $data)) {
            return redirect()->to(base_url('readproduct'))->with('error', 'Gagal memperbarui produk.');
        }
    
        return redirect()->to(base_url('readproduct'))->with('success', 'Produk berhasil diperbarui.');
    }
    

    public function deleteProduct($id) {
        $this->product->delete($id);
        return redirect()->to(base_url('readproduct'));
    }
}