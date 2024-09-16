<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Add 'email' to the fillable array to allow mass assignment
    protected $fillable = ['name', 'address', 'contact_info', 'email'];

    // Relationships
    public function tasks()
    {
        return $this->hasMany(Task::class, 'client_id');
    }
}
