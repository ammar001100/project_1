<?php
namespace App\Services;
use App\Repositorys\PermissionRepository;

class PermissionService{
    private $permission;
    public function __construct(PermissionRepository $permission){
        $this->permission = $permission;
    }

    public function get(){
        return $this->permission->get();
    }
    public function store($permission){
        return $this->permission->store($permission);
    }
    public function edit($id){
        return $this->permission->edit($id);
    }
    public function update($request){
        return $this->permission->update($request);
    }
    public function updateById($request , $id){
        
        return $this->permission->updateById($request , $id);
    }
    public function delete($id){
        return $this->permission->delete($id);
    }
}