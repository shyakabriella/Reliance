<?php

namespace App\Http\Controllers;

use App\Models\TaskLog;
use Illuminate\Http\Request;

class TaskLogController extends Controller
{
    public function index()
    {
        $taskLogs = TaskLog::all();
        return view('task_logs.index', compact('taskLogs'));
    }

    public function create()
    {
        return view('task_logs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // validation rules here
        ]);

        $taskLog = new TaskLog($request->all());
        $taskLog->save();

        return redirect()->route('task_logs.index')->with('success', 'Task log created successfully.');
    }

    public function show(TaskLog $taskLog)
    {
        return view('task_logs.show', compact('taskLog'));
    }

    public function edit(TaskLog $taskLog)
    {
        return view('task_logs.edit', compact('taskLog'));
    }

    public function update(Request $request, TaskLog $taskLog)
    {
        $request->validate([
            // validation rules here
        ]);

        $taskLog->update($request->all());

        return redirect()->route('task_logs.index')->with('success', 'Task log updated successfully.');
    }

    public function destroy(TaskLog $taskLog)
    {
        $taskLog->delete();

        return redirect()->route('task_logs.index')->with('success', 'Task log deleted successfully.');
    }
}
