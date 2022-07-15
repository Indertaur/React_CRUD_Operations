<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees_data;
use Validator;

class EmployeesController extends Controller
{
    public function index()
    {
        return Employees_data::get();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'employees_name' => 'required',
            'departments' => 'required',
            'salary' => 'required',
        ]);

        $employee = new Employees_data;
        $employee->employees_name = $request->input('employees_name');
        $employee->departments = $request->input('departments');
        $employee->salary = $request->input('salary');
        $employee->save();

        if($employee)
        {
            return response()->json(['data' => $employee, 'message' => 'Created successfully'], 201);
        }
    }

    public function single($id = NULL)
    {
        return Employees_data::where('id', $id)->first();
    }

    public function delete($id = NULL)
    {
        $deleted = Employees_data::where('id',$id)->delete();
        return $deleted;
    }

    public function update(Request $request, $id = NULL)
    {
        if($request->isMethod('post'))
    	{
            $data = $request->all();
            $employee =	Employees_data::where(['id'=>$id])->update(['employees_name'=>$data['employees_name'],'departments'=>$data['departments'],'salary'=>$data['salary']]);
            return $employee;
        }
    }
}
