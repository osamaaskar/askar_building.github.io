<?php

use Illuminate\Database\Seeder;
use App\News ;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =0; $i<10; $i++ )
        {
          $add= new News ;
          $add->title="News title".rand(0, 9);
          $add->add_by=1;
          $add->desc="News Descrption".rand(0, 9);
          $add->content="News Content".rand(0, 9);
          $add->status="Active";
          $add->save();

        }
    }
}
