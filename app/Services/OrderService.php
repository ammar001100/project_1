<?php
namespace App\Services;
use App\Repositorys\OrderRepository;
use App\Repositorys\ClientRepository;
use App\Repositorys\ProductRepository;
use App\Repositorys\ReportOrderRepository;

class OrderService{
    private $order;
    private $client;
    private $product;
    private $report_order;
    public function __construct(OrderRepository $order,ClientRepository $client , ProductRepository $product , ReportOrderRepository $report_order){
        $this->order = $order;
        $this->client = $client;
        $this->product = $product;
        $this->report_order = $report_order;
    }

    public function get(){
        return $this->order->get();
    }
    public function getById($id){
        return $this->order->getById($id);;
    }
    public function getClient($id){
        return $this->order->getClient($id);
    }
    public function store($order){
        return $this->order->store($order);
    }
    public function insert($order){
        return $this->order->insert($order);
    }
    public function edit($id){
        return $this->order->edit($id);
    }
    public function update($request){
        return $this->order->update($request);
    }
    public function delete($id){
        // delete products order
        $products_order = $this->client->getOrderClient($id);

        foreach($products_order as $product){

            //update product stock
            $stock['id'] = $product->product_id;
            $stock['stock'] = $product->quantity;
            $this->product->updateStock_($stock);
            //delete order
            $this->order->delete($product->id);
        }
       //update orders report
       $this->report_order->updateActive($id);
       // delete client
       return $this->client->delete($id);
    }
}