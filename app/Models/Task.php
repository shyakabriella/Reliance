<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Remove or correct the primary key if needed
    // protected $primaryKey = 'id'; // Only if it's not 'id'

    protected $fillable = [
        'title', 'description', 'location', 'client_id', 'assigned_employee', 'status', 'start_time', 'end_time', 'duration'
    ];
    
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'assigned_employee', 'employee_id');
    }
    

    public function taskLogs()
    {
        return $this->hasMany(TaskLog::class, 'task_id');
    }
}

