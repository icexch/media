<?php

namespace App\Console\Commands;

use App\Models\AdMaterial;
use App\Models\Place;
use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;
use Illuminate\Console\Command;

class GenerateRedisDataCommand extends Command
{
    private $pixelAd;
    private $pixelPlace;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:gen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        PixelPointAdService $pixelPointAdService,
        PixelPointPlaceService $pixelPointPlaceService
    ) {
        parent::__construct();
        $this->pixelAd = $pixelPointAdService;
        $this->pixelPlace = $pixelPointPlaceService;
    }


    public function handle()
    {

        $ads = AdMaterial::with('advertiser')->get();
        $places = Place::with('publisher')->get();
        $adsIDs = $ads->pluck('id')->toArray();
        $placesIDs = $places->pluck('id')->toArray();

        $years = 13;
        $months = 12;
        $timestamp = 1104537600; // Sat, 01 Jan 2005 00:00:00 GMT

        for ($iyear = 0;$iyear <= $years;$iyear++) {

            $this->info("year - ".date('Y-m', $timestamp));

            for ($imonth = 1;$imonth <= $months;$imonth++) {
                $iter = rand(rand(150, 300), rand(478, 967));

                for ($i=0;$i< $iter;$i++) {
                    $timestamp += 60;
                    $adID = $adsIDs[rand(0, count($adsIDs) - 1)];
                    $placeID = $placesIDs[rand(0, count($placesIDs) - 1)];
                    $isb = rand(0, 1);

                   try {
                       if($isb) {
                           $this->pixelAd->addShow($adID, ['placeID' => $placeID], $timestamp);
                           $this->pixelPlace->addShow($placeID, ['adID' => $adID], $timestamp);
                       } else {
                           $this->pixelAd->addClick($adID, ['placeID' => $placeID], $timestamp);
                           $this->pixelPlace->addClick($placeID, ['adID' => $adID], $timestamp);
                       }
                   } catch (\Exception $exception) {

                   }
                }
                $timestamp += 2629743;
            }
        }

        $this->info('users list');

        foreach ($ads->unique('user_id') as $user) {
            $this->info('Advertiser - '.$user->advertiser->email);
        }
        foreach ($places->unique('user_id') as $user) {
            $this->info('Publisher - '.$user->publisher->email);
        }


    }
}
