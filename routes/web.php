<?php

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Models\Todo;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

Route::get('/', function () {
    return redirect()->route('todo.index');
});

Route::get('/todos', function () {
    return view('welcome', [
        "todos" => Todo::latest()->paginate(10)
    ]);
})->name("todo.index");

Route::view("/todos/create", "create")->name("todo.create");

Route::get("/todos/{id}/edit", function ($id) {
  return view("edit", [
    'todo' => Todo::findOrFail($id)
  ]);
});

Route::get("/todos/{id}", function ($id) {
    $todo = Todo::find($id);
    if  (!$todo) {
        abort(404);
    }
    return view("singletodo", [
        "todo" => $todo
    ]);
})->name("todo.show");

Route::post("/todos", function(TodoRequest $request){
  $data = $request->validated();

  $todo = new Todo;
  $todo->title = $data['title'];
  $todo->description = $data['description'];
  $todo->long_description = $data['long_description'];
  $todo->save();

  return redirect()->route('todo.show', ['id' => $todo->id])
  ->with('success', 'todo has been created');
})->name("todo.store");

Route::put("/todos/{id}", function($id, TodoRequest $request){
  $data = $request->validated();

  $todo = Todo::findOrFail($id);
  $todo->title = $data['title'];
  $todo->description = $data['description'];
  $todo->long_description = $data['long_description'];
  $todo->save();

  return redirect()->route('todo.show', ['id' => $todo->id])
  ->with('success', 'todo updated successfully');
})->name('todo.edit');

Route::delete('/todos/{id}', function($id){
  $todo = Todo::findOrFail($id);
  $todo->delete();

  return redirect()->route('todo.index')
  ->with('success', 'Todo deleted successfully');
})->name('todo.delete');

Route::put('/todos/{id}/toggle-completion', function($id){
  $todo = Todo::findOrFail($id);
  $todo->completed = !$todo->completed;
  $todo->save();

  return redirect()->back()
  ->with('success', 'Todo updated successfully');
})->name('todo.toggle-completion');