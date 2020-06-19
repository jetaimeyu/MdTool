<?php

use Illuminate\Database\Seeder;

class MainFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\Models\MainFactory::class,10)->create()->each(function ($mainFactory){
            $mainFactory->details()->save(factory(\App\Models\Detail::class)->make());
            factory(\App\Models\Supply::class,5)->create(['MainFactoryCompID'=>$mainFactory->CompID]);
//            $mainFactory->supplies()->save();
        });
    }
}
