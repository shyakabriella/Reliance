<?php

namespace App\Http\Controllers;

use App\Models\PerformanceReport;
use Illuminate\Http\Request;

class PerformanceReportController extends Controller
{
    public function index()
    {
        $reports = PerformanceReport::all();
        return view('performance_reports.index', compact('reports'));
    }

    public function create()
    {
        return view('performance_reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required',
            'employee_id' => 'required',
            'quality_rating' => 'required|integer|min:1|max:10',
            'efficiency_rating' => 'required|integer|min:1|max:10',
            'report_date' => 'required|date',
        ]);

        PerformanceReport::create($validated);
        return redirect()->route('performance_reports.index')->with('success', 'Performance report created successfully.');
    }

    public function show(PerformanceReport $performanceReport)
    {
        return view('performance_reports.show', compact('performanceReport'));
    }

    public function edit(PerformanceReport $performanceReport)
    {
        return view('performance_reports.edit', compact('performanceReport'));
    }

    public function update(Request $request, PerformanceReport $performanceReport)
    {
        $validated = $request->validate([
            'task_id' => 'required',
            'employee_id' => 'required',
            'quality_rating' => 'required|integer|min:1|max:10',
            'efficiency_rating' => 'required|integer|min:1|max:10',
            'report_date' => 'required|date',
        ]);

        $performanceReport->update($validated);
        return redirect()->route('performance_reports.index')->with('success', 'Performance report updated successfully.');
    }

    public function destroy(PerformanceReport $performanceReport)
    {
        $performanceReport->delete();
        return redirect()->route('performance_reports.index')->with('success', 'Performance report deleted successfully.');
    }
}
