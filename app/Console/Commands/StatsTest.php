<?php

namespace App\Console\Commands;

use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;
use Illuminate\Console\Command;

class StatsTest extends Command
{
    private $pixelAd;
    private $pixelPlace;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:stats';

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
        $impressionsMonth = $this->pixelPlace->getClicksStatsMonths([1,2,3]);
        $impressionsYear = $this->pixelPlace->getClicksStatsYears([1,2,3]);
        dd($impressionsYear);

    }
}
