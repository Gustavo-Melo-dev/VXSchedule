<?php

namespace Database\Seeders;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('contacts')->insert([
        //     'first_name' => Str::random(10),
        //     'last_name' => Str::random(10),
        //     'phone' => Str::random(10),
        //     'surname' => Str::random(10),
        //     'cep' => Str::random(10),
        //     'road' => Str::random(10),
        //     'district' => Str::random(10),
        //     'city' => Str::random(10),
        //     'uf' => Str::random(10),
        //     'ibge' => Str::random(10),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        Contact::factory(100)->create();
    }
}
