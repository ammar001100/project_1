<?php
namespace App\Repositorys;
use App\Models\Section;
use App\Models\Product;
use App\Models\Tempp;
//use App\Models\Temp;

class TemppRepository implements RepositoryInterface
{


    private $tempp;  
    public function __construct(Tempp $tempp){
        $this->tempp = $tempp;
    }
    public function get(){
        return $this->tempp->get();
    }
    public function getById($id){
        return $this->tempp->where('id',$id)->firstOrfail();
    }
    public function first(){
        return $this->tempp->first();
    }
    public function store($tempp){
        return $this->tempp->create($tempp);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){

        $tempp = $this->first();
        return $tempp->update($request);
    }
    public function delete($id){

        $tempp = $this->getById($id);
        return $tempp->delete();
    }
    
}
