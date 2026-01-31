<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TodoController extends Controller    {
    use AuthorizesRequests;


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id',auth()->id())->get();
        return view('todos.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        Todo::create([
            'title'=>$request->title,
            'user_id'=>auth()->id()
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        $this->authorize('update',$todo);
        return view('todos.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update',$todo);
        $todo->update(['title'=>$request->title]);
        return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $this->authorize('delete',$todo);
        $todo->delete();
        return redirect()->back();
    }
}
