<?php

namespace Tests\Feature;

use Database\Seeders\TodoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete('delete from todos');
    }
    public function testTodolist()
    {
        $this->seed(TodoSeeder::class);

        $this->withSession([
            "user" => "khannedy"
        ])->get('/todolist')
            ->assertSeeText("1")
            ->assertSeeText("Eko")
            ->assertSeeText("2")
            ->assertSeeText("Kurniawan");
    }

    public function testAddTodoFailed()
    {
        $this->withSession([
            "user" => "khannedy"
        ])->post("/todolist", [])
            ->assertSeeText("Todo is required");
    }

    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => "khannedy"
        ])->post("/todolist", [
            "todo" => "Eko"
        ])->assertRedirect("/todolist");
    }

    public function testRemoveTodolist()
    {
        $this->withSession([
            "user" => "khannedy",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Eko"
                ],
                [
                    "id" => "2",
                    "todo" => "Kurniawan"
                ]
            ]
        ])->post("/todolist/1/delete")
            ->assertRedirect("/todolist");
    }
}
