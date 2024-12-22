<?php

namespace App\Http\Service\actions;

use App\Models\Website;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\Product as product_item;

class product
{
    public function execute($id)
    {

        $website = Website::find($id);
        $name = $website->site_name;
        $folder_name = $name . '.' . $id;

        $product_group = ProductGroup::orderBy('id', "desc")->first();

        $product = product_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'প্রিমিয়াম পাঞ্জাবী',
            'price' => '1200',
            'discount_price' => '999',
            'product_group_id' => $product_group ? ($product_group->id + 1) : 1,
            'image' => "$folder_name/7.webp",
        ]);

        $product = product_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'প্রিমিয়াম পাঞ্জাবী',
            'price' => '1200',
            'discount_price' => '999',
            'product_group_id' => $product_group ? ($product_group->id + 1) : 1,
            'image' => "$folder_name/8.webp",
        ]);

        $product = product_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'প্রিমিয়াম পাঞ্জাবী',
            'price' => '1200',
            'discount_price' => '999',
            'product_group_id' => $product_group ? ($product_group->id + 1) : 1,
            'image' => "$folder_name/9.webp",
        ]);

        $product = product_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'প্রিমিয়াম পাঞ্জাবী',
            'price' => '1200',
            'discount_price' => '999',
            'product_group_id' => $product_group ? ($product_group->id + 1) : 1,
            'image' => "$folder_name/10.webp",
        ]);

        $product = product_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'প্রিমিয়াম পাঞ্জাবী',
            'price' => '1200',
            'discount_price' => '999',
            'product_group_id' => $product_group ? ($product_group->id + 1) : 1,
            'image' => "$folder_name/11.webp",
        ]);

        $product = product_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'name' => 'প্রিমিয়াম পাঞ্জাবী',
            'price' => '1200',
            'discount_price' => '999',
            'product_group_id' => $product_group ? ($product_group->id + 1) : 1,
            'image' => "$folder_name/12.webp",
        ]);

        return;
    }
}