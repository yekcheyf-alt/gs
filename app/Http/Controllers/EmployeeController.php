<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function index () {
        $employee = Employee::all();
        return view ('employee.index', compact('employee'));
    
    }
    
    public function create () {
        return view ('employee.create');
        
    }

    public function store (Request $request) {
        Employee::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mname' => $request->mname,
            'age' => $request->age,
            'zipcode' => $request->zipcode,
            'address' => $request->address
        ]);
        return redirect()->route('employee.index');
    }

    public function edit ($id) {
        $employee = Employee::find($id);
        return view ('employee.edit', compact('employee'));
    }

    public function update (Request $request, $id) {
        $employee = Employee::find($id);
        $employee->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mname' => $request->mname,
            'age' => $request->age,
            'zipcode' => $request->zipcode,
            'address' => $request->address
        ]);
        return redirect()->route('employee.index');
    }

    public function destroy ($id) {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employee.index');
    }
 
}
