<?php

namespace App\Http\Service\actions;

use Illuminate\Support\Facades\Auth;
use App\Models\Home\Banner as web_banner;
use App\Models\Website;

class dummy_image
{
    public function execute($id)
    {
        $website = Website::find($id);
        $name = $website->site_name;
        $folder_name = $name . '.' . $id;

        $sourceDir = public_path('dummy_image');
        $destinationDir = public_path($folder_name);

        if (!file_exists($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }

        $dummyImages = [
            '1.webp',
            '2.webp',
            '3.webp',
            '4.webp',
            '5.webp',
            '6.webp',
            '7.webp',
            '8.webp',
            '9.webp',
            '10.webp',
            '11.webp',
            '12.webp',
            'banner.webp',
            'video_background.png'
        ];
        foreach ($dummyImages as $image) {
            $sourceFile = $sourceDir . '/' . $image;
            $destinationFile = $destinationDir . '/' . $image;

            if (file_exists($sourceFile)) {
                copy($sourceFile, $destinationFile);
            }
        }

        return;
    }
}
