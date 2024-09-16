<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role; 

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'employee_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name', 
        'contact', 
        'email', 
        'role_id',  
        'password_hash'
    ];

    // Relationships
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_employee');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'employee_id');
    }

    public function performanceReports()
    {
        return $this->hasMany(PerformanceReport::class, 'employee_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
