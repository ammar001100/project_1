<?php
namespace App\Repositorys;
use App\Models\Permission;

class PermissionRepository implements RepositoryInterface
{
    
    private $permission;
    public function __construct(Permission $permission){
        $this->permission = $permission;
    }
    public function get(){
        return $this->permission->get();
    }
    public function getById($id){
        return $this->permission->where('id',$id)->firstOrfail();
    }
    public function getByEmployee($id){
        return $this->permission->where('user_id',$id)->firstOrfail();
    }
    public function store($permission){
        return $this->permission->create($permission);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){
        
        $permission = $this->getById($request->id);
        return $permission->update($request->all());
    }
    public function updateById($request , $id){
        
        $permission = $this->permission->where('user_id',$id)->firstOrfail();
        return $permission->update($request);
    }
    public function delete($id){
        
        $permission = $this->getByEmployee($id);
        return $permission->delete();
    }
}