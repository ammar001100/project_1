<?php
namespace App\Services;
use App\Repositorys\StockRepository;

class StockService{
    private $stock;
    public function __construct(StockRepository $stock){
        $this->stock = $stock;
    }

    public function get(){
        return $this->stock->get();
    }
    public function first(){
        return $this->stock->first();
    }
    public function store($stock){
        return $this->stock->store($stock);
    }
    public function edit($id){
        return $this->stock->edit($id);
    }
    public function update($request){
        return $this->stock->update($request);
    }
    public function updateCapital($request){
        return $this->stock->updateCapital($request);
    }
    public function updateProfits($request){
        return $this->stock->updateProfits($request);
    }
    public function updateDebit($request){
        return $this->stock->updateDebit($request);
    }
    public function addCash($request){
        return $this->stock->addCash($request);
    }
    public function pullCash($request){
        return $this->stock->pullCash($request);
    }
    public function delete($id){
        return $this->stock->delete($id);
    }
}