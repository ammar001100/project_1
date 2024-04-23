<?php
namespace App\Repositorys;
use App\Models\ReportProduct;

class ReportProductRepository implements RepositoryInterface
{
    
    private $report_product;
    public function __construct(ReportProduct $report_product){
        $this->report_product = $report_product;
    }
    public function get(){
        return $this->report_product->whereHas('reportOrder',function($q){
        $q->where('active','1');
        })->get();
    }
    public function first(){
        return $this->report_product->first();
    }
    public function getById($id){
        return $this->report_product->where('id',$id)->firstOrfail();
    }
    public function store($report_product){
        return $this->report_product->insert($report_product);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){
        
        $report_product = $this->getById($request->id);
        return $report_product->update($request->all());
    }
    
    public function delete($id){
        
        $report_product = $this->getById($id);
        return $report_product->delete();
    }
}