<?php
namespace App\Services;
use App\Repositorys\ProductRepository;

class ProductService{
    private $product;
    public function __construct(ProductRepository $product){
        $this->product = $product;
    }

    public function get(){
        return $this->product->get();
    }
    public function getById($id){
        return $this->product->getById($id);
    }
    public function store($product){
        return $this->product->store($product);
    }
    public function edit($id){
        return $this->product->edit($id);
    }
    public function update($request){
        return $this->product->update($request);
    }
    public function updateStock($request){
        return $this->product->updateStock($request);
    }
    public function delete($id){
        return $this->product->delete($id);
    }

}
