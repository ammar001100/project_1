<?php
namespace App\Services;
use App\Repositorys\ProductRepository;
use App\Repositorys\TempRepository;
use App\Repositorys\TemppRepository;

class TemppService{
    private $product;
    private $temp;
    private $tempp;
    public function __construct(TempRepository $temp,TemppRepository $tempp,ProductRepository $product){
        $this->product = $product;
        $this->temp = $temp;
        $this->tempp = $tempp;
    }

    public function get(){
        return $this->tempp->get();
    }
    public function first(){
        return $this->tempp->first();
    }
    public function store($tempp){
        $temp = $this->temp->first();
        $temp_id = $temp->id;
        $tempp['temp_id']=$temp_id;
        $product = $this->product->getById($tempp['product_id']);
        $product_price =$product->price;
        $product_price_sale = $product->price_sale;
        $product_name =$product->name;
        $product_unit =$product->unit;
        $tempp['total'] = $tempp['quantity'] * $product_price_sale ;
        $tempp['product_price'] = $product_price ;
        $tempp['product_price_sale'] = $product_price_sale ;
        $tempp['product_name'] = $product_name ;
        $tempp['product_unit'] = $product_unit ;
        //return dd($tempp);
        
        return $this->tempp->store($tempp);
    }
    public function edit($id){
        return $this->tempp->edit($id);
    }
    public function update($request){
        return $this->tempp->update($request);
    }
    public function delete($id){
        return $this->tempp->delete($id);
    }

}
