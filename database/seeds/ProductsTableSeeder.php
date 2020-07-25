<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $product = new \App\Product();
        $product->sku = '4991840295953';
        $product->name = 'Apple Macbook Pro 2020 - 13 Inchs';
        $product->price = 32299000;
        $product->quantity = 15;
        $product->save();

        $product = new \App\Product();
        $product->sku = '3484319813204';
        $product->name = 'Apple Macbook Air 2019 - 13 inchs';
        $product->price = 23999000;
        $product->quantity = 22;
        $product->save();
    }
}
