<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    private $employee;
    public function __construct(EmployeeService $employee){
        $this->employee = $employee;
    }
    public function index()
    {
        if(auth()->user()->type == 1){
            $employees = $this->employee->get();
        }else{
            $employees = $this->employee->getByType();
        }
         return view('employees.employees',compact('employees'));
    }
    public function profile(){
        return view('account.profile');
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(EmployeeRequest $request)
    {
        $this->employee->store($request);
        return Redirect()->route('employee')->with(['sucss'=>'تم الحفظ بنجاح']);
    }

    public function edit(string $id)
    {
        $employee = $this->employee->edit($id);
        if($employee == false){
           return Redirect()->back();
        }
        return view('employees.edit',compact('employee',));
    }

    public function update(EmployeeRequest $request)
    {
            $this->employee->update($request);
            return Redirect()->route('employee')->with(['sucss'=>'تم التعديل بنجاح']);
    }
    public function account()
    {
        $id = auth()->user()->id;
        $employee = $this->employee->edit($id);
        return view('account.account',compact('employee'));
    }
    public function updateUser(EmployeeRequest $request)
    {                 
            $this->employee->updateUser($request);
            return Redirect()->route('profile')->with(['sucss'=>'تم التعديل بنجاح']);
    }

    public function destroy(string $id)
    {
        $this->employee->delete($id);
        return Redirect()->route('employee')->with(['sucss'=>'تم الحذف بنجاح']);
    }
}
