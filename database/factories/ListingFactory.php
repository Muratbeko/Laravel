<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
            $title = $this->faker-> sentence (rand(5));
            $datetime=$this->faker->dateTimeBetween(startDate:'-1 month', endDate:'now');
            $content='';
            for($i=0;$i<5;$i++){
                $content= '<p class="mb-4">'. $this->faker->sentences(rand(5,10), asText:true). '</p';
            }
            return [
         'title'=>$title,
         'slug'=>\Illuminate\Support\Str::slug($title) .'-' . rand(1111,9999),
         'company'=>$this->faker->company,
         'location'=>$this->faker->country,
         'logo' =>basename($this->faker->image(storage_path(path: 'app/public'))),
         'is_highlighted'=>(rand(1,9)>7),
           'is_active' => true,
          'content'=> $content,
           'apply_link'=>$this->faker->url,
           'created_at'=>$datetime,
        'updated_at'=>$datetime

        ];
    }
}
