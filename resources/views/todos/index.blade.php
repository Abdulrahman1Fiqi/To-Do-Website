@extends('layouts.app')

@section('Title')

@endsection


@section('Content')




<div class="container mt-5">

    <!-- Hero Section -->
    <div class="text-center mb-5">
        <h1 class="fw-bold display-5">
             Manage Your Tasks Easily
        </h1>
        <p class="text-muted fs-5 mt-3">
               Create, manage, and track your tasks effortlessly with Fiqi Todo Website

        </p>
    </div>

    <!-- Todo Card -->
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg">
                <div class="card-body">

                    <!-- Add Todo -->
                @auth
                    <!-- User is logged in: normal form -->
                    <form method="POST" action="{{ route('todos.store') }}" class="d-flex gap-2 mb-4">
                        @csrf
                        <input 
                            type="text" 
                            name="title" 
                            class="form-control form-control-lg" 
                            placeholder="✍️ What do you want to do today?"
                        >
                        <button class="btn btn-primary btn-lg">
                            Add
                        </button>
                    </form>
                @endauth

                @guest
                    <!-- User not logged in: redirect to login on click -->
                    <form method="GET" action="{{ route('login') }}" class="d-flex gap-2 mb-4">
                        <input 
                            type="text" 
                            name="title" 
                            class="form-control form-control-lg" 
                            placeholder="✍️ Please login to add a todo"
                            disabled
                        >
                        <button class="btn btn-primary btn-lg">
                            Add
                        </button>
                    </form>
                @endguest


                    <!-- Todo List -->
                    @foreach($todos as $todo)
                        <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-2">
                            <span class="fs-5">{{ $todo->title }}</span>

                            <div class="d-flex gap-2">
                                

                                <form method="POST" action="{{ route('todos.destroy',$todo) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

</div>



@endsection