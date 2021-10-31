<?php

use Illuminate\Database\Seeder;
use App\Diary;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Diary::create([
                'user_id'    => $i,
                'title'       => 'これはテスト投稿' .$i,
                'date'    => '2021-10-27',
                'with'    => '友達',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at'=> now(),
            ]);
        }
    }
}