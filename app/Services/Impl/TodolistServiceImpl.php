<?php

namespace App\Services\Impl;

use App\Models\Todo;
use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService
{

    public function saveTodo(string $id, string $todo): void
    {
        $todo = new Todo();

        $todo->id = $id;
        $todo->todo = $todo;

        $todo->save();
    }

    public function getTodolist(): array
    {
        return Todo::query()->get()->toArray();
    }

    public function removeTodo(string $todoId)
    {
        $todo = Todo::query()->find($todoId);

        if (!empty($todo)) {
            $todo->delete();
        }
    }
}
