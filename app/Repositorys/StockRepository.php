<?php
namespace App\Repositorys;
use App\Models\Stock;

class StockRepository implements RepositoryInterface
{
    
    private $stock;
    public function __construct(Stock $stock){
        $this->stock = $stock;
    }
    public function get(){
        return $this->stock->get();
    }
    public function first(){
        return $this->stock->first();
    }
    public function getById($id){
        return $this->stock->where('id',$id)->firstOrfail();
    }
    public function store($stock){
        return $this->stock->create($stock);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){
        
        $stock = $this->getById($request->id);
        return $stock->update($request->all());
    }
    public function updateCapital($request){
        
        $stock = $this->first();
        return $stock->update(['capital' => $stock->capital + $request]);
    }
    public function updateProfits($request){
        
        $stock = $this->first();
        return $stock->update(['profits' => $stock->profits + $request]);
    }
    public function updateDebit($request){
        
        $stock = $this->first();
        return $stock->update(['debit' => $stock->debit + $request]);
    }
    public function addCash($request){
        
        $stock = $this->first();
        return $stock->update(['cash' => $stock->cash + $request]);
    }
    public function pullCash($request){
        
        $stock = $this->first();
        return $stock->update(['cash' => $stock->cash - $request]);
    }
    public function delete($id){
        
        $stock = $this->getById($id);
        return $stock->delete();
    }
}