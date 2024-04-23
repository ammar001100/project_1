<?php
namespace App\Services;
use App\Repositorys\ProductRepository;
use App\Repositorys\TempRepository;

class TempService{
    private $temp;
    public function __construct(TempRepository $temp){
        $this->temp = $temp;
    }

    public function get(){
        return $this->temp->get();
    }
    public function first(){
        return $this->temp->first();
    }
    public function store($temp){
        if($this->temp->first()){
        $temp_id = $this->temp->first();
         $this->temp->delete($temp_id->id);
        }
        return $this->temp->store($temp);
    }
    public function addAxing($request){
        $this->temp->addAxing($request); 
    }
    public function edit($id){
        return $this->temp->edit($id);
    }
    public function update($request){
        return $this->temp->update($request);
    }
    public function delete($id){
        return $this->temp->delete($id);
    }

}
