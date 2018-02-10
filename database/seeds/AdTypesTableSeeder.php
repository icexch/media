<?php

class AdTypesTableSeeder extends \Illuminate\Database\Seeder
{
    protected $adTypes = [
        ['name' => 'Banners Full Size 468x60'],
        ['name' => 'Banners Half Size 234x60'],
        ['name' => 'Banners Vertical 120x240'],
        ['name' => 'Banners Vertical Tower 160x600'],
        ['name' => 'Button 120x90'],
        ['name' => 'Button 88x31'],
        ['name' => 'Complete Page 800x600'],
        ['name' => 'Facebook style ads'],
        ['name' => 'Full Page Ad'],
        ['name' => 'Message Box'],
        ['name' => 'News Style'],
        ['name' => 'Onclick popup window'],
        ['name' => 'Page Peel'],
        ['name' => 'Slide In'],
        ['name' => 'Sticky ads bar bottom'],
        ['name' => 'Sticky ads bar top'],
        ['name' => 'Sticky Note'],
        ['name' => 'TakeOver'],
        ['name' => 'Text Ads (clean style)'],
        ['name' => 'Text Ads (Google style ads)'],
        ['name' => 'Text Ads Bar'],
        ['name' => 'Video'],
        ['name' => 'Virtual Pages 1'],
        ['name' => 'Virtual pages 2']
    ];

    public function run()
    {
        foreach ($this->adTypes as $adType) {
            \Illuminate\Support\Facades\DB::table('ad_types')->insert($adType);
        }
    }
}
