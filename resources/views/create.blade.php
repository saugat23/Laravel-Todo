@extends('layouts.app')

@section('title', 'Add Todo')

@section('content')
    <form method="POST" action="{{ route('todo.store')}}">
    @if($errors != [])
        <div>{{$errors}}</div>
    @endif
    @csrf
    <label for="title">Title</label>
    <input type="text" placeholder="title" id="title" name="title" value="{{old('title')}}">
    <label for="description">Description</label>
    <input type="text" placeholder="description" id="description" name="description" value="{{old('title')}}">
    <label for="long_description">Long Description</label>
    <textarea name="long_description" id="long_description" cols="30" rows="10">{{old('title')}}"</textarea>
    <button type="submit" class="rounded-md ring-1 ring-slate-700/50 px-2 text-center text-slate-700">Add Todo</button>
    </form>
@endsection