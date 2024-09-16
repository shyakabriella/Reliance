<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('role')->get(); 
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $roles = Role::all(); 
        return view('employees.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'role_id' => 'required|exists:roles,id',
        ]);
    
        $employee = new Employee([
            'name' => $request->name,
            'contact' => $request->contact,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password_hash' => bcrypt(Str::random(10)), 
        ]);
    
        $employee->save();
        return back()->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $roles = Role::all(); 
        return view('employees.edit', compact('employee', 'roles'));
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email,' . $employee->id,
            'role_id' => 'required|exists:roles,id', // Ensure the role_id is validated
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
