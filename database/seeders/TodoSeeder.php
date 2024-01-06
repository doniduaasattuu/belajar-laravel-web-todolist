<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $todo1 = new Todo();
        $todo1->id = '1';
        $todo1->todo = 'Eko';
        $todo1->save();

        $todo2 = new Todo();
        $todo2->id = '2';
        $todo2->todo = 'Kurniawan';
        $todo2->save();
    }
}
