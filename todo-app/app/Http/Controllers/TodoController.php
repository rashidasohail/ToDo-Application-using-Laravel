<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of all todos.
     */
    public function index()
    {
        // Retrieve all todos from the database
        $todos = Todo::all();

        // Return the index view with the list of todos
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new todo.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created todo in storage.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|min:4'
        ]);

        // Create a new todo record in the database
        $todo = Todo::create([
            'name' => $request->title,
            'description' => $request->description
        ]);

        // Redirect to the index page with a success or error message
        if ($todo) {
            return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
        }
        return redirect()->route('todos.index')->with('error', 'Unable to create Todo!');
    }

    /**
     * Display the specified todo.
     */
    public function show($id)
    {
        // Find the todo by ID
        $todo = Todo::find($id);

        // Return the show view with the todo details
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified todo.
     */
    public function edit($id)
    {
        // Find the todo by ID
        $todo = Todo::find($id);

        // Return the edit view with the todo details
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified todo in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the todo by ID
        $todo = Todo::find($id);

        if ($todo) {
            // Validate the form input
            $request->validate([
                'title' => 'required|max:50',
                'description' => 'required|min:4',
                'completed' => 'required'
            ]);

            // Update the todo fields
            $todo->name = $request->title;
            $todo->description = $request->description;
            $todo->is_completed = $request->completed;
            $todo->save();

            // Redirect with a success message
            return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
        }

        // Redirect with an error message if the todo was not found
        return redirect()->route('todos.index')->with('error', 'Unable to update Todo!');
    }

    /**
     * Remove the specified todo from storage.
     */
    public function destroy($id)
    {
        // Find the todo by ID
        $todo = Todo::find($id);

        if ($todo) {
            // Delete the todo record
            $todo->delete();
            return redirect()->route('todos.index')->with('success', 'Todo deleted successfully!');
        }

        // Redirect with an error message if the todo was not found
        return redirect()->route('todos.index')->with('error', 'Unable to delete Todo!');
    }
}

?>
