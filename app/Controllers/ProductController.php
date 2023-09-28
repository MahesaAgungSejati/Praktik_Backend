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
            'nama_product' => 'Smartphone',
            'description' => 'Merupakan Smartphone Merk Samsung',
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
}