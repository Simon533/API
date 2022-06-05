<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    //
    public function index()
    {
        $employees= Employee::all();
        return response()->json(['employees'=>$employees], 200);
    }
     public function show($id)
     {
      $employees= Employee::find($id);
     if($employees)
     {
        return response()->json(['employees'=>$employees], 200);
     }
     else{
        return response()->json(['message'=>'No record found'], 404);
     }
   
    }
    public function  store(Request $request)
{ 
    $request->validate([
 'city'=>'required|max:25',
'name'=>'required|max:25',
'number_id'=>'required|max:25',
'gender'=>'required|max:25',
'age'=>'required|max:25',
'nationality'=>'required|max:25',
]);

     $employee = new Employee;
     $employee->name=$request->name;
       $employee->city=$request->city;
         $employee->number_id=$request->number_id;
           $employee->gender=$request->gender;
             $employee->nationality=$request->nationality;
             $employee->age=$request->age;
             $employee->save();
             return response()->json(['message'=>'employee added Successfully'],200);
         }
         public function update(Request $request,$id)
         {
            $request->validate([
 'city'=>'required|max:25',
'name'=>'required|max:25',
'number_id'=>'required|max:25',
'gender'=>'required|max:25',
'age'=>'required|max:25',
'nationality'=>'required|max:25',
]);

$employee =Employee::find($id);
if($employee)
{
    
     $employee->name=$request->name;
       $employee->city=$request->city;
         $employee->number_id=$request->number_id;
           $employee->gender=$request->gender;
             $employee->nationality=$request->nationality;
             $employee->age=$request->age;
             $employee->update();
             return response()->json(['message'=>'employee updated Successfully'],200);

         }
         else{
            return response()->json(['message'=>'no record found plz'],404);
         }
}
public function remove($id)
{
    $employee= Employee::find($id);
    if($employee)
    {
        $employee->remove();
        return response()->json(['message'=>'product deleted Successfully'],200);
    }
    else {
        return response()->json(['message'=>'No record to delete!!!1'],404);
    }
}
} 