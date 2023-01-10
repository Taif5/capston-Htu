<?php

namespace Core\Helpers;

use Core\Model\Item;
use Core\Model\User;

class Fake
{
    protected static $faker;

    public static function provide_fake_data()
    {
        self::$faker = \Faker\Factory::create();
        var_dump(self::$faker->name());
        var_dump(self::$faker->realText(200));
        die;
    }

    public static function fake_items(int $items_num): array
    {
        self::$faker = \Faker\Factory::create();
        $items = array();
        for ($i = 0; $i < $items_num; $i++) {
            $items[] = array(
                "title" => self::$faker->text(20, 50),
                "quantity" => self::$faker->realText(500)
            );
        }
        return $items;
    }

    public static function create_items(int $items_num)
    {
        foreach (self::fake_items($items_num) as $fake_item) {
            $item = new Item();
            $fake_item['quantity'] = \str_replace("'", "", $fake_item['quantity']);
            $item->create($fake_item);
        }
    }

    public static function fake_users(int $users_num)
    {
        self::$faker = \Faker\Factory::create();
        $users = array();
        for ($i = 0; $i < $users_num; $i++) {
            $users[] = array(
                "username" => self::$faker->userName(),
                "email" => self::$faker->email(),
                "password" => "1234567",
                "display_name" => self::$faker->name(),
            );
        }
        return $users;
    }

    public static function create_users(int $users_num)
    {
        foreach (self::fake_users($users_num) as $fake_user) {
            $item = new User();
            $item->create($fake_user);
        }
    }

    public static function is_first_time()
    {
        $item = new Item();
        if (empty($item->get_all())) {
            self::create_items(20);
        }
    }
}
