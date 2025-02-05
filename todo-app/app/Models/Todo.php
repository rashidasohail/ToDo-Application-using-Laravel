<?php

namespace App\Models;

// Import the base Model class for Eloquent ORM functionality
use Illuminate\Database\Eloquent\Model;

// Import the HasFactory trait to enable model factories
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Define the Todo model class, which extends Laravel's Eloquent Model class
class Todo extends Model
{
    // Use the HasFactory trait to enable the factory() method for this model
    use HasFactory;

    // Define the fillable attributes for mass assignment
    // These are the fields that can be mass-assigned using methods like create() or update()
    protected $fillable = ['name', 'description', 'is_completed'];
}
