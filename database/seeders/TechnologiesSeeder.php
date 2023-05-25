<?php

namespace Database\Seeders;

use App\Models\Technologies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;


class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML', 'CSS', 'JS', 'PHP', 'PHYTON', 'C++'];

        //disattiva relazioni
        Schema::disableForeignKeyConstraints();

        //elimina dati
        Technologies::truncate();

        //riattiva relazioni
        Schema::enableForeignKeyConstraints();


        foreach($technologies as $technologie){

            $new_technologie = new Technologies();
            $new_technologie->name = $technologie;
            $new_technologie->slug = Str::slug($new_technologie->name);
            $new_technologie->save();
        }
    }
}
