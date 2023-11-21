@extends('layouts.app')

@section('title', 'Edit Todo')

@section('content')
    <form method="POST" action="{{ route('todo.edit', ['id' => $todo->id])}}">
    @method('PUT')
    {{ $errors }}
    @csrf
    <label for="title">Title</label>
    <input type="text" placeholder="title" id="title" name="title" value="{{ $todo->title }}">
    <label for="description">Description</label>
    <input type="text" placeholder="description" id="description" name="description" value="{{ $todo->description }}">
    <label for="long_description">Long Description</label>
    <textarea name="long_description" id="long_description" cols="30" rows="10">{{ $todo->long_description }}</textarea>
    <button type="submit" class="rounded-md ring-1 ring-slate-700/50 px-2 text-center text-slate-700">Edit Todo</button>
    </form>
@endsection