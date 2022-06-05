<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentapiController extends Controller
{
    //
    public function create(Request $request)
    {
       $students = new Student(); 
       $students->firstname= $request->input('firstname');
       $students->secondname= $request->input('secondname');
       $students->email= $request->input('email');
       $students->studentid= $request->input('studentid');
       $students->location= $request->input('location');
       $students->age= $request->input('age');
       $students->save();
       return response()->json($students);
    }
    
    
}
