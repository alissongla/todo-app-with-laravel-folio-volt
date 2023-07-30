<?php

use App\Models\Todo;
use function Livewire\Volt\state;

state(description: '', todos: fn() => Todo::all());

$addTodo = function() {
  Todo::create(['description' => $this->description]);
  $this->description = '';
  $this->todos = Todo::all();
};

$delete = function($id) {
  Todo::destroy($id);

  $this->todos = Todo::all();
};

$updateComplete = function($id) {
  $todo = Todo::find($id);
  $todo->completed = !$todo->completed;
  $todo->save();

  $this->todos = Todo::all();
};
?>

<x-layout>
    @volt
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-gray-200 w-96 p-6 shadow-lg rounded-lg">
            <div>
                <h1 class="text-2xl font-bold mb-4 text-center">Todo App</h1>
                <form wire:submit.prevent="addTodo">
                    <input
                        type="text"
                        class="w-full border rounded p-2"
                        placeholder="New task"
                        wire:model="description">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">Add</button>
                </form>
            </div>
            <div class="mt-5">
                <h1 class="text-2xl font-bold mb-4">Tasks</h1>
                <ul class="divide-y divide-gray-300">
                    @foreach($todos as $todo)
                        @if($todo->completed)
                            <li class="flex justify-between items-center py-2">
                                <input type="checkbox" checked wire:click="updateComplete({{ $todo->id }})">
                                <span class="line-through">{{ $todo->description }}</span>
                                <button
                                    wire:click="delete({{ $todo->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </li>
                        @else
                            <li class="flex justify-between items-center py-2">
                                <input type="checkbox" wire:click="updateComplete({{ $todo->id }})">
                                <span>{{ $todo->description }}</span>
                                <button
                                    wire:click="delete({{ $todo->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    @endvolt
</x-layout>
