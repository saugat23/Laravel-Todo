@extends('layouts.app')

@section('title')
    <span>Todo App</span>
@endsection
@section('content')
    <div class="mb-8"><a href="{{route('todo.create')}}" class="font-medium text-gray-700 underline decoration-pink-500 mb-20">Add Todo</a></div>
    @if(count($todos) === 1)
    <div>Only one record available that is : </div>
    <div>
        <h4>{{ $todos[0]->title }}</h4>
    </div>
    @else
    @foreach($todos as $todo)
    <div class="mb-4">
        <a href="{{ route("todo.show", ['id' => $todo->id]) }}" @class(['line-through' => $todo->completed])>{{ $todo->title }}</a>
    </div>
    @endforeach
    @endif

    @if($todos->count())
    <nav class="mt-8">
        {{$todos->links()}}
    </nav>
    @endif
@endsection