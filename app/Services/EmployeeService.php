<?php
namespace App\Services;
use App\Repositorys\EmployeeRepository;
use App\Services\PermissionService;
use Auth;

class EmployeeService{
    private $employee;
    private $permission;
    public function __construct(PermissionService $permission,EmployeeRepository $employee){
        $this->employee = $employee;
        $this->permission = $permission;
    }

    public function get(){
        return $this->employee->get();
    }
    public function getByType(){
        return $this->employee->getByType();
    }
    public function getById($id){
        return $this->employee->getById($id);
    }
    public function store($employee){
        
        $user = [
            'name' =>$employee->name,
            'email' =>$employee->email,
            'phone' =>$employee->phone,
            'job' =>$employee->job,
            'type' => 0 ,
            'password' =>$employee->password,
        ];

        $emp = $this->employee->store($user);

        $permission = [
            'user_id' =>$emp->id,
            'product_read' =>$employee->product_read == 1 ? 1 : 0,
            'product_create' =>$employee->product_create == 1 ? 1 : 0,
            'product_update' =>$employee->product_update == 1 ? 1 : 0,
            'product_delete' =>$employee->product_delete == 1 ? 1 : 0,
            'product_report' =>$employee->product_report == 1 ? 1 : 0,

            'section_read' =>$employee->section_read == 1 ? 1 : 0,
            'section_create' =>$employee->section_create == 1 ? 1 : 0,
            'section_update' =>$employee->section_update == 1 ? 1 : 0,
            'section_delete' =>$employee->section_delete == 1 ? 1 : 0,

            'order_read' =>$employee->order_read == 1 ? 1 : 0,
            'order_create' =>$employee->order_create == 1 ? 1 : 0,
            'order_me' =>$employee->order_me == 1 ? 1 : 0,
            'order_delete' =>$employee->order_delete == 1 ? 1 : 0,
            'order_day' =>$employee->order_day == 1 ? 1 : 0,

            'stock_read' =>$employee->stock_read == 1 ? 1 : 0,
            'stock_create' =>$employee->stock_create == 1 ? 1 : 0,
            'stock_update' =>$employee->stock_update == 1 ? 1 : 0,
            'stock_delete' =>$employee->stock_delete == 1 ? 1 : 0,

            'employee_read' =>$employee->employee_read == 1 ? 1 : 0,
            'employee_create' =>$employee->employee_create == 1 ? 1 : 0,
            'employee_update' =>$employee->employee_update == 1 ? 1 : 0,
            'employee_delete' =>$employee->employee_delete == 1 ? 1 : 0,

            'report_read' =>$employee->report_read == 1 ? 1 : 0,
            'report_order' =>$employee->report_order == 1 ? 1 : 0,
            'report_product' =>$employee->report_product == 1 ? 1 : 0,
            'report_reacted' =>$employee->report_reacted == 1 ? 1 : 0,
        ];
        return $this->permission->store($permission);
        //return dd($permission,$user);
        //return $this->employee->store($employee);
    }
    public function edit($id){
        $employee = $this->employee->edit($id);
        $user_id = Auth::user()->id;
        if($employee->type == 1){
            return false;
        }
        if($employee->id == $user_id){
            return false;
        }else{
           return $employee; 
        }
    }
    public function update($employee){
        
        $user = [
            'id' =>$employee['id'],
            'name' =>$employee['name'],
            'email' =>$employee['email'],
            'phone' =>$employee['phone'],
            'job' =>$employee['job'],
            'password' =>$employee['password'],
            'type' => 0 ,
        ];
            //'password' =>$employee->password,
            $this->employee->update($user);
            //return dd($user);
            //$permission = employee->except('name','email','phone','job','phone','job')
            $permission = [
                //'user_id' =>$emp->id,
                'product_read' =>$employee['product_read'] == 1 ? 1 : 0,
                'product_create' =>$employee['product_create'] == 1 ? 1 : 0,
                'product_update' =>$employee['product_update'] == 1 ? 1 : 0,
                'product_delete' =>$employee['product_delete'] == 1 ? 1 : 0,
                'product_report' =>$employee['product_report'] == 1 ? 1 : 0,
    
                'section_read' =>$employee['section_read'] == 1 ? 1 : 0,
                'section_create' =>$employee['section_create'] == 1 ? 1 : 0,
                'section_update' =>$employee['section_update'] == 1 ? 1 : 0,
                'section_delete' =>$employee['section_delete'] == 1 ? 1 : 0,
    
                'order_read' =>$employee['order_read'] == 1 ? 1 : 0,
                'order_create' =>$employee['order_create'] == 1 ? 1 : 0,
                'order_me' =>$employee['order_me'] == 1 ? 1 : 0,
                'order_delete' =>$employee['order_delete'] == 1 ? 1 : 0,
                'order_day' =>$employee['order_day'] == 1 ? 1 : 0,
    
                'stock_read' =>$employee['stock_read'] == 1 ? 1 : 0,
                'stock_create' =>$employee['stock_create'] == 1 ? 1 : 0,
                'stock_update' =>$employee['stock_update'] == 1 ? 1 : 0,
                'stock_delete' =>$employee['stock_delete'] == 1 ? 1 : 0,
    
                'employee_read' =>$employee['employee_read'] == 1 ? 1 : 0,
                'employee_create' =>$employee['employee_create'] == 1 ? 1 : 0,
                'employee_update' =>$employee['employee_update'] == 1 ? 1 : 0,
                'employee_delete' =>$employee['employee_delete'] == 1 ? 1 : 0,

                'report_read' =>$employee['report_read'] == 1 ? 1 : 0,
                'report_order' =>$employee['report_order'] == 1 ? 1 : 0,
                'report_product' =>$employee['report_product'] == 1 ? 1 : 0,
                'report_reacted' =>$employee['report_reacted'] == 1 ? 1 : 0,
            ];
            //return dd($user);

        return $this->permission->updateById($permission , $employee['id']);
    }
    public function updateUser($employee){
        
        $user = [
            'id' =>$employee['id'],
            'name' =>$employee['name'],
            'email' =>$employee['email'],
            'phone' =>$employee['phone'],
            'job' =>$employee['job'],
            //'password' =>$employee['password'],
            'type' => 0 ,
        ];
        
         return $this->employee->update($user);

    }
    public function delete($id){
        $this->permission->delete($id);
        return $this->employee->delete($id);
    }
}