<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Client;
use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::with('role')->get(); 
        $clients = Client::all();
        $tasks = Task::with(['client', 'employee'])->get();
        $roles = Role::all(); 
        return view('tasks.index', compact('tasks', 'roles','employees','clients'));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clients = Client::all();
        $employees = Employee::all();
        $roles = Role::all(); 

        $cleanerRole = Role::where('name', 'cleaner')->first(); 
        if ($cleanerRole) {
            $employees = $cleanerRole->employees; 
        } else {
            $employees = collect(); 
        }
        return view('tasks.create', compact('clients', 'employees', 'roles'));
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'location' => 'required|max:255',
                'client_id' => 'required|exists:clients,client_id',
                'assigned_employee' => 'required|exists:assigned_employee,employee_id',
                'status' => 'required|in:Scheduled,Completed,Pending,Cancelled',
                'start_time' => 'required|date',
                'end_time' => 'required|date',
                'duration' => 'required|integer',
            ]);
    
            Task::create($validatedData);
    
            return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation Error: ' . $e->getMessage(), [
                'errors' => $e->errors(),
                'data' => $e->validator->getData()
            ]);
            return back()->withErrors($e)->withInput();
        } catch (\Exception $e) {
            \Log::error('General Error: ' . $e->getMessage());
            return back()->withErrors('An unexpected error occurred')->withInput();
        }catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation Error: ' . json_encode($e->errors()));
            return back()->withErrors($e)->withInput();
        }
        
    }
    
    


    /**
     * Display the specified task.
     *
     * @param  Task $task
     * @return \Illuminate\View\View
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  Task $task
     * @return \Illuminate\View\View
     */
    public function edit(Task $task)
    {
        $clients = Client::all();
        $employees = Employee::all();
        $roles = Role::all(); 
        return view('tasks.edit', compact('task', 'clients', 'employees', 'roles'));
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'location' => 'required|max:255',
            'client_id' => 'required|exists:clients,id',
            'assigned_employee' => 'required|exists:employees,id',
            'status' => 'required|in:Scheduled,Completed,Pending,Cancelled',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'duration' => 'required|integer',
        ]);

        $task->update($validatedData);
        
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
