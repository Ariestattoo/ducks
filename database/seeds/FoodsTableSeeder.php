<?php

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $foods = [
      [
        'name'               => 'Corn',
        'portion'            => 'cup',
        'description'        => '',
        'nutritious_quality' => 'high'
      ],
      [
        'name'               => 'Oats',
        'portion'            => 'cup',
        'description'        => '',
        'nutritious_quality' => 'high'
      ],
      [
        'name'               => 'Rice',
        'portion'            => 'cup',
        'description'        => '',
        'nutritious_quality' => 'high'
      ],
      [
        'name'               => 'Wheat',
        'portion'            => 'cup',
        'description'        => '',
        'nutritious_quality' => 'high'
      ],
      [
        'name'               => 'Lettuce',
        'portion'            => 'head',
        'description'        => '',
        'nutritious_quality' => 'high'
      ],
      [
        'name'               => 'Grapes',
        'portion'            => 'cup',
        'description'        => '',
        'nutritious_quality' => 'high'
      ],
      [
        'name'               => 'Bread',
        'portion'            => 'loaf',
        'description'        => '',
        'nutritious_quality' => 'low'
      ],
      [
        'name'               => 'Popcorn',
        'portion'            => 'cup',
        'description'        => '',
        'nutritious_quality' => 'low'
      ],
      [
        'name'               => 'Nuts',
        'portion'            => 'cup',
        'description'        => '',
        'nutritious_quality' => 'high'
      ]
    ];

    collect($foods)->each(function($food){
      DB::table('foods')->insert($food);

    });



  }
}
