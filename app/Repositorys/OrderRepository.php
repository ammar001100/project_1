<?php
namespace App\Repositorys;
use App\Models\Order;

class OrderRepository implements RepositoryInterface
{
    
    private $order;
    public function __construct(Order $order){
        $this->order = $order;
    }
    public function get(){
        return $this->order->get();
    }
    public function getById($id){
        return $this->order->where('id',$id)->firstOrfail();
    }
    public function getClient($id){
        return $this->order->where('client_id',$id)->get();
    }
    public function store($order){
        return $this->order->create($order);
    }
    public function insert($order){
        return $this->order->insert($order);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){
        
        $order = $this->getById($request->id);
        return $order->update($request->all());
    }
    public function delete($id){
        
        $order = $this->getById($id);
        return $order->delete();
    }
}