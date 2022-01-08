<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
          ['name' => 'Спорт',           'description' => 'Поиск компании для занятия спортом',  'type' => CategoryType::Main->value],
          ['name' => 'Кино',            'description' => 'Поиск компании для похода в кино',    'type' => CategoryType::Main->value],
          ['name' => 'Настольные игры', 'description' => 'Поиск компании для игры в настолки',  'type' => CategoryType::Main->value],
          ['name' => 'Выпивка',         'description' => 'Поиск компании для похода в бар',     'type' => CategoryType::Main->value],
          ['name' => 'Знакомства',      'description' => 'Поиск компании для прогулки вечером', 'type' => CategoryType::Main->value],

          ['name' => 'Пляжный волейбол',    'description' => 'Поиск компании для игры в пляжный волейбол',  'type' => CategoryType::Voted->value, 'region_id' => 1],
          ['name' => 'Рафтинг',             'description' => 'Поиск компании для рафтинга',                 'type' => CategoryType::Voted->value, 'region_id' => 1],

          ['name' => 'Лыжи', 'description' => 'Поиск компании для катания на лыжах', 'type' => CategoryType::Voted->value, 'region_id' => 2],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
