<?php

namespace App\Console\Commands;

use App\Models\AdMaterial;
use App\Services\AdCheckContentService;
use Illuminate\Console\Command;

class CheckAdsContent extends Command
{
    private $adService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:ads:content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for content updates?';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->adService = new AdCheckContentService();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ads = AdMaterial::whereType(AdMaterial::TYPE_HTML)->where('is_active', 1)->select(['source', 'hash', 'id'])->get();
        foreach ($ads as $ad) {
            $hash = $this->adService->checkItem($ad->source);
            if($hash && $ad->hash !== $hash) {
                $ad->hash = $hash;
                $ad->is_active = 0;
                $ad->save();
            }
        }
    }

}
