<?php
namespace App\Repositorys;
use App\Models\Client;

class ClientRepository implements RepositoryInterface
{
    
    private $client;
    public function __construct(Client $client){
        $this->client = $client;
    }
    public function get(){
        return $this->client->get();
    }
    public function getById($id){
        return $this->client->where('id',$id)->firstOrfail();
    }
    public function myOrder($id){
        return $this->client->where('user_id',$id)->get();
    }
    public function getOrderClient($id){
        $client = $this->client->where('id',$id)->firstOrfail();
        return $client->orders;
    }
    public function first(){
        return $this->client->first();
    }
    public function getByTemp($id){
        return $this->client->where('id',$id)->firstOrfail();
    }
    public function store($client){
        return $this->client->create($client);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){
        
        $client = $this->getById($request->id);
        return $client->update($request->all());
    }
    public function delete($id){
        
        $client = $this->getById($id);
        return $client->delete();
    }
}