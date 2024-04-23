<?php
namespace App\Repositorys;
use App\Models\User;

interface RepositoryInterface{
    
    public function get();
    public function getById($id);
    public function store($section);
    public function edit($id);
    public function update($request);
    public function delete($id);
}