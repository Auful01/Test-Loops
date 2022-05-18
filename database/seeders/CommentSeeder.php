<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'post_id' => 1,
            'name' => 'John Doe',
            'email' => 'jhondoe@gmail.com',
            'website' => 'http://johndoe.com',
            'comment' => 'This is the first comment.',
        ]);
    }
}
