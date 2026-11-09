<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Dish;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Users using User::create() instead of factory() for explicit control
        User::create([
            'name' => 'Chat Gyi',
            'position' => 'chef',
            'email' => 'chef@restaurant.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Sa Pwal Htoe',
            'position' => 'waiter',
            'email' => 'waiter@restaurant.com',
            'email_verified_at' => now(),
            'password' => Hash::make('waiter'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Sa Yin Kai Lay',
            'position' => 'accountant',
            'email' => 'accountant@restaurant.com',
            'email_verified_at' => now(),
            'password' => Hash::make('accountant'),
            'remember_token' => Str::random(10),
        ]);

        // 2. Create Categories
        $c1 = Category::create(['name' => 'Burmese Traditional']);
        $c2 = Category::create(['name' => 'Western Fast Food']);
        $c3 = Category::create(['name' => 'Drinks & Beverages']);

        // 3. Create Actual Dishes (Linked to categories)
        $d1 = Dish::create([
            'category_id' => $c1->id,
            'name' => 'Mohinga',
            'price' => 2500,
            'photo' => 'mohinga.jpg'
        ]);

        $d2 = Dish::create([
            'category_id' => $c2->id,
            'name' => 'Cheese Burger',
            'price' => 12000,
            'photo' => 'cheeseburger.jpg'
        ]);

        $d3 = Dish::create([
            'category_id' => $c3->id,
            'name' => 'Myanmar Beer',
            'price' => 3000,
            'photo' => 'myanmarbeer.jpg'
        ]);

        // 4. Create Physical Tables for your restaurant
        $t1 = Table::create(['number' => '1', 'status' => 'taken']);
        $t2 = Table::create(['number' => '2', 'status' => 'free']);
        $t3 = Table::create(['number' => '3', 'status' => 'free']);
        $t4 = Table::create(['number' => '4', 'status' => 'taken']);

        // 5. Create Orders and Order Details
        $o1 = Order::create(['table_number' => $t1->number, 'status' => 'waiting', 'total_price' => '26500']);
        $o2 = Order::create(['table_number' => $t4->number, 'status' => 'ready', 'total_price' => '15000']);

        OrderDetail::create(['order_id' => $o1->id, 'dish_id' => $d2->id, 'quantity' => '2', 'price' => $d2->price * 2]);
        OrderDetail::create(['order_id' => $o1->id, 'dish_id' => $d1->id, 'quantity' => '1', 'price' => $d1->price * 1]);
        OrderDetail::create(['order_id' => $o2->id, 'dish_id' => $d3->id, 'quantity' => '5', 'price' => $d3->price * 5]);
    }
}