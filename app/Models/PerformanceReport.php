<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceReport extends Model
{
    use HasFactory;

    protected $fillable = ['task_id', 'employee_id', 'quality_rating', 'efficiency_rating', 'report_date'];

    // Relationships
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
