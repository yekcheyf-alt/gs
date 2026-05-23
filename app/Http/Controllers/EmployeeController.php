<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function index () {
        $employees = Employee::all();
        return view ('employees.index', compact('employees'));
    
    }
    
    public function create () {
        return view ('employees.create');
        
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
        return redirect()->route('employees.index');
    }

    public function edit ($id) {
        $employees = Employee::find($id);
        return view ('employees.edit', compact('employees'));
    }

    public function update (Request $request, $id) {
        $employees = Employee::find($id);
        $employees->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mname' => $request->mname,
            'age' => $request->age,
            'zipcode' => $request->zipcode,
            'address' => $request->address
        ]);
        return redirect()->route('employees.index');
    }

    public function destroy ($id) {
        $employees = Employee::find($id);
        $employees->delete();
        return redirect()->route('employees.index');
    }
 
}
