<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('karyas')->insert([
            ['title' => 'Atomic Habits', 'description' => 'self improvement', 'cover_image' => 'cover_image/atomic-habits.jpg', 'pemilik' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Harry Potter', 'description' => 'novel', 'cover_image' => 'cover_image/harry-potter.jpg', 'pemilik' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'The Alchemist', 'description' => 'fiction', 'cover_image' => 'cover_image/the-alchemist.jpg', 'pemilik' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Ikigai', 'description' => 'self improvement', 'cover_image' => 'cover_image/ikigai.jpg', 'pemilik' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'The Art of Story Telling', 'description' => 'self improvement', 'cover_image' => 'cover_image/the-art-of-story-telling.jpg', 'pemilik' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Zero to One', 'description' => 'business', 'cover_image' => 'cover_image/zero-to-one.jpg', 'pemilik' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Superintelligence', 'description' => 'self improvement', 'cover_image' => 'cover_image/superintelligence.jpg', 'pemilik' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['title' => 'Life 3.0', 'description' => 'business', 'cover_image' => 'cover_image/life-30.jpg', 'pemilik' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
        
    }
}
