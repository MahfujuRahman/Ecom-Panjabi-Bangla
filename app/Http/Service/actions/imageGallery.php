<?php

namespace App\Http\Service\actions;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\ImageGalleryTitle;
use App\Models\Home\ImageGalleryValue;

class imageGallery
{
    public function execute($id)
    {
        $website = Website::find($id);
        $name = $website->site_name;
        $folder_name = $name . '.' . $id;

        $gallery_id = ImageGalleryTitle::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'প্রোডাক্ট গ্যালারি',
            'subtitle' => "সব ধরনের পাঞ্জাবী প্রোডাক্ট এখানে পাওয়া যাবে",
            'btn_title' => "অর্ডার করুন",
            'btn_url' => '/#order',
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => "$folder_name/4.webp",
            'order' => 1,
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => "$folder_name/5.webp",
            'order' => 2,
        ]);

        ImageGalleryValue::create([
            'image_gallery_title_id' => $gallery_id->id,
            'image' => "$folder_name/6.webp",
            'order' => 3,
        ]);

        return;
    }
}