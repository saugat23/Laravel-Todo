@extends('layouts.app')

@section('title')
<span>{{$todo->title}}</span>
@endsection
@section('content')
<div>
    <div class="mb-8"><a href="{{route('todo.index')}}" class="font-medium text-gray-700 underline decoration-pink-500">Back to the Todo List</a></div>
    <h4 class="mb-4">{{ $todo->title }}</h4>
    <p class="mb-4">{{ $todo->description }}</p>
    <p class="mb-4">{{ $todo->long_description }}</p>
    <p class="mb-4">Created {{$todo->created_at->diffForHumans()}} . Updated {{$todo->updated_at->diffForHumans()}}</p>
    <p class="mb-4">
        @if($todo->completed)
        <span class="text-green-500">Completed</span>
        @else
        <span class="text-green-500">Not Completed</span>
        @endif
    </p>
    <div class="flex gap-2">
        <form action="{{ route('todo.edit', ['id' => $todo->id])}}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="rounded-md ring-1 ring-slate-700/50 px-2 text-center text-slate-700">Edit</button>
        </form>

        <form action="{{route('todo.toggle-completion', ['id' => $todo->id])}}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="rounded-md ring-1 ring-slate-700/50 px-2 text-center text-slate-700">Mark as {{$todo->completed ? 'not complete' : 'complete'}}</button>
        </form>
        <form action="{{ route('todo.delete', ['id' => $todo->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="rounded-md ring-1 ring-slate-700/50 px-2 text-center text-slate-700">Delete</button>
        </form>
    </div>
</div>

@endsection