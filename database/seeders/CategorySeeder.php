<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                "name" => "Web Development",
                "url" => "web-development"
            ],
            [
                "name" => "Mobile Development",
                "url" => "mobile-development"
            ],
            [
                "name" => "Desktop Development",
                "url" => "desktop-development"
            ],
            [
                "name" => "Game Development",
                "url" => "game-development"
            ],
            [
                "name" => "Machine Learning",
                "url" => "machine-learning"
            ],
            [
                "name" => "Data Science",
                "url" => "data-science"
            ],
            [
                "name" => "DevOps",
                "url" => "devops"
            ],
            [
                "name" => "Testing",
                "url" => "testing"
            ],
            [
                "name" => "UI/UX Design",
                "url" => "ui-ux-design"
            ],
            [
                "name" => "Cyber Security",
                "url" => "cyber-security"
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
