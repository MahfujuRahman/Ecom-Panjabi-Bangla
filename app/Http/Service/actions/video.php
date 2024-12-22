<?php

namespace App\Http\Service\actions;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home\Video as video_item;

class video
{
    public function execute($id)
    {
        $website = Website::find($id);
        $name = $website->site_name;
        $folder_name = $name . '.' . $id;

        video_item::create([
            'user_id' => Auth::user()->id,
            'website_id' => $id,
            'title' => 'আমাদের ভিডিও দেখুন',
            'sub_title' => 'আমাদের প্রোডাক্ট এবং সেবা সম্পর্কে বিস্তারিত জানুন',
            'button_title' => 'এখানে ক্লিক করুন',
            'button_url' => "https://www.youtube.com/watch?v=eno--4Iviiw",
            'image' => "$folder_name/video_background.png",
        ]);
        return;
    }
}
