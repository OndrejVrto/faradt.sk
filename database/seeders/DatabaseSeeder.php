<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\NewsTag;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Database\Seeders\TagSeeder;

use Illuminate\Database\Seeder;
use Database\Seeders\MediaSeeder;
use Database\Seeders\SliderSeeder;
use Database\Seeders\CategoriesSeeder;
use Database\Seeders\TestimonialSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

		User::create([
			'name' => 'Ing. Ondrej VRŤO, IWE',
            'email' => 'ondrej@vrto.sk',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ]);
		User::factory(10)->create();

		$this->call([
			TagSeeder::class,
			CategoriesSeeder::class,
			PriestSeeder::class,
			TestimonialSeeder::class,
			SliderSeeder::class,

			// raw sql
			MediaSeeder::class,
			NewsSeeder::class,
		]);

		News::factory(4)->create();
		NewsTag::factory(50)->create();
		Testimonial::factory(5)->create();

    }

}
