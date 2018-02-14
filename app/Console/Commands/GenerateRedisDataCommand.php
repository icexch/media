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

        $adsIDs = AdMaterial::pluck('id')->toArray();
        $placesIDs = Place::pluck('id')->toArray();

        $years = 13;
        $months = 12;
        $timestamp = 1104537600; // Sat, 01 Jan 2005 00:00:00 GMT

        for ($iyear = 0;$iyear <= $years;$iyear++) {

            echo "year - ".date('Y-m', $timestamp)."\n";
            for ($imonth = 1;$imonth <= $months;$imonth++) {
                $iter = rand(rand(150, 300), rand(478, 967));

                for ($i=0;$i< $iter;$i++) {
                    $timestamp += 60;
                    $adID = rand(0, count($adsIDs) - 1);
                    $placeID = rand(0, count($placesIDs) - 1);
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


    }
}
