<?php
namespace App\Repositorys;
use App\Models\User;

class EmployeeRepository implements RepositoryInterface
{
    
    private $employee;
    public function __construct(User $employee){
        $this->employee = $employee;
    }
    public function get(){
        return $this->employee->paginate(10);
    }
    public function getByType(){
        return $this->employee->where('type','0')->get();
    }
    public function getById($id){
        return $this->employee->where('id',$id)->firstOrfail();
    }
    public function store($employee){
        return $this->employee->create($employee);
    }
    public function edit($id){
        return $this->getById($id);
    }
    public function update($request){
        
        $employee = $this->getById($request['id']);
        return $employee->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'job' => $request['job'],
        ]);
    }
    public function delete($id){
        
        $employee = $this->getById($id);
        return $employee->delete();
    }
}