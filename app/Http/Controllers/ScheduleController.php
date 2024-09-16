<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Employee; // Make sure to include this
use App\Models\Task;     // Make sure to include this
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $employees = Employee::all(); // Fetch all employees
        $tasks = Task::all();         // Fetch all tasks
        return view('schedules.create', compact('employees', 'tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id', // Ensure employee ID exists in the employees table
            'task_id' => 'required|exists:tasks,id',         // Ensure task ID exists in the tasks table
            'scheduled_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Schedule::create($validated);
        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        $employees = Employee::all(); // Fetch all employees
        $tasks = Task::all();         // Fetch all tasks
        return view('schedules.edit', compact('schedule', 'employees', 'tasks'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'task_id' => 'required|exists:tasks,id',
            'scheduled_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $schedule->update($validated);
        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
