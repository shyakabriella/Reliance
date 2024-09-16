<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id', 'task_id', 'scheduled_date', 'start_time', 'end_time'];
    

    // Relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
