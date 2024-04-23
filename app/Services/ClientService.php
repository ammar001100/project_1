<?php
namespace App\Services;
use App\Repositorys\ClientRepository;

class ClientService{
    private $client;
    public function __construct(ClientRepository $client){
        $this->client = $client;
    }

    public function get(){
        return $this->client->get();
    }
    public function getByTemp($id){
        return $this->client->getByTemp($id);;
    }
    public function first(){
        return $this->client->first();
    }
    public function myOrder($id){
        return $this->client->myOrder($id);
    }
    public function store($client){
        return $this->client->store($client);
    }
    public function edit($id){
        return $this->client->edit($id);
    }
    public function update($request){
        return $this->client->update($request);
    }
    public function delete($id){
        return $this->client->delete($id);
    }
}