<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function addEmployee(Request $request)
    {

        $employee = new Employee;
        
        if($request->hasFile('image')){
            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName,PATHINFO_FILENAME);
            $extention = $request->file('image')->getClientOriginalExtension();
            $comPic = str_replace(' ','_',$fileNameOnly).'-'.rand().'_'.time().'.'.$extention;
            $path = $request->file('image')->storeAs('public/posts',$comPic);
            $employee->image = $comPic;
            $employee->firstname = $request->firstname; 
            $employee->email = $request->email; 
            $employee->address = $request->address;
        }
        // return response($employee,201);

        if($employee->save())
        {
            return ['status' => true,'message' => 'Post Saved Successfully'];
        }
        else{
            return ['status' => false,'message' => 'Something went wrong'];
        }
    }


    public function showEmployee()
    {
        $employee = Employee::all();
        return response($employee,201);
    }

    public function getEmployeeById($id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message'=>'Employee Not Found'],404);
        }

        return response()->json($employee::find($id),200);
    }

    public function updateEmployee(Request $request,$id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message'=>'Employee Not Found'],404);
        }
        $employee->update($request->all());


        return response($employee,200);
    }

    public function deleteEmployee(Request $request,$id)
    {
        $employee = Employee::find($id)->delete();
        return response()->json(null,201);
    }
}
