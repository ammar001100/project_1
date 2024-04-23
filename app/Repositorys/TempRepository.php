<?php
namespace App\Repositorys;
use App\Models\Section;
use App\Models\Product;
use App\Models\Temp;

class TempRepository implements RepositoryInterface
{

    private $section;
    private $product;
    private $temp;
    public function __construct(Section $section,Product $product,Temp $temp){
        $this->section = $section;
        $this->product = $product;
        $this->temp = $temp;
    }
    public function get(){
        return $this->temp->with('product')->get();
    }
    public function getById($id){
        return $this->temp->where('id',$id)->firstOrfail();
    }
    public function first(){
        return $this->temp->first();
    }
    public function store($temp){
        return $this->temp->create($temp);
    }
    public function addAxing($request){
        $temp = $this->first();
        return $temp->update(['axing'=>$request]);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){

        $temp = $this->first();
        return $temp->update($request);
    }
    public function delete($id){

        $temp = $this->getById($id);
        return $temp->delete();
    }

}
