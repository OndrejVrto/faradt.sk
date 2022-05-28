<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void {
        Tag::create([
            'title' => 'Kostol',
            'description' => 'O kostole',
            'slug' => Str::slug('Kostol'),
        ]);

        Tag::create([
            'title' => 'Oznamy',
            'description' => 'Farské oznamy',
            'slug' => Str::slug('Oznamy'),
        ]);

        Tag::create([
            'title' => 'Dekanát',
            'description' => 'Oznamy z dekanátu',
            'slug' => Str::slug('Dekanát'),
        ]);

        Tag::create([
            'title' => 'História',
            'description' => 'Naša minulosť',
            'slug' => Str::slug('História'),
        ]);

        Tag::create([
            'title' => 'Krst',
            'description' => 'Články súvisiace s krstom',
            'slug' => Str::slug('Krst'),
        ]);

        Tag::create([
            'title' => 'Organ',
            'description' => 'Články o organe',
            'slug' => Str::slug('Organ'),
        ]);

        Tag::create([
            'title' => 'Modlitba',
            'description' => 'Modlitba a rozjímanie',
            'slug' => Str::slug('Modlitba'),
        ]);

        Tag::create([
            'title' => 'Kaplán',
            'description' => 'O našich kňazoch',
            'slug' => Str::slug('Kaplán'),
        ]);

        Tag::create([
            'title' => 'Svadba',
            'description' => 'Svadobné veci',
            'slug' => Str::slug('Svadba'),
        ]);

        Tag::create([
            'title' => 'Pohreb',
            'description' => 'O veciach smrti',
            'slug' => Str::slug('Pohreb'),
        ]);
    }
}
