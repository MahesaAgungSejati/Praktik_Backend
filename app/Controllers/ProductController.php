<?php

namespace App\Controllers;
use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;

class ProductController extends BaseController {
    use ResponseTrait;

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

    public function readProductApi(){
        $products = $this->product->findAll();
        
        return $this->respond([
            'code'=> 200,
            'status'=> 'OK',
            'data'=> $products
        ]);
    }

    public function getProductApi($id) {
    $product = $this->product->where("id", $id)->first();
    
    if(!$product){
        $this->response->setStatusCode(404);
        return $this->response->setJSON(
            [
                "code"=> 404,
                "status"=> 'NOT FOUND',
                'data'=> 'product not found'
            ]
        );
    }

    return $this->respond([
        'code'=> 200,
        'status'=> 'OK',
        'data'=> $product
    ]);
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