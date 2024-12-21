<?php

namespace App\Http\Service\actions;

use Illuminate\Http\Request;
use App\Models\Home\BannerImages;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\Banner as web_banner;

class banner
{
    public function execute($id)
    {
        $banner = web_banner::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'স্টাইলিশ পাঞ্জাবী কালেকশন',
            'subtitle' => 'আপনার স্বাচ্ছন্দ্য আর ফ্যাশনের সেরা সমন্বয়',
            'btn_title_1' => "অর্ডার করুন",
            'btn_url_1' => url('/#order'),
            'btn_title_2' => "ভিডিও দেখুন",
            'btn_url_2' => url('https://www.youtube.com/watch?v=eno--4Iviiw'),
        ]);

        BannerImages::create([
            'banner_id' => $banner->id,
            'image' => 'dummy_image/1.webp',
            'order' => 1,
        ]);
        BannerImages::create([
            'banner_id' => $banner->id,
            'image' => 'dummy_image/2.webp',
            'order' => 2,
        ]);
        BannerImages::create([
            'banner_id' => $banner->id,
            'image' => 'dummy_image/3.webp',
            'order' => 3,
        ]);

        return;
    }
}