<?php
namespace App\Repositorys;
use App\Models\Section;
use App\Models\Product;

class ProductRepository implements RepositoryInterface
{

    private $section;
    private $product;
    public function __construct(Section $section,Product $product){
        $this->section = $section;
        $this->product = $product;
    }
    public function get(){
        return $this->product->with('section')->paginate(20);
    }
    public function getById($id){
        return $this->product->where('id',$id)->firstOrfail();
    }
    public function store($product){
        return $this->product->create($product);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){

        $product = $this->getById($request->id);
        return $product->update($request->all());
    }
    // -
    public function updateStock($request){
        $product = $this->getById($request['id']);
        return $product->update(['stock' => $product->stock - $request['stock']]);
    }
    // +
    public function updateStock_($request){
        $product = $this->getById($request['id']);
        return $product->update(['stock' => $product->stock + $request['stock']]);
    }
    public function delete($id){

        $product = $this->getById($id);
        return $product->delete();
    }
    
}
