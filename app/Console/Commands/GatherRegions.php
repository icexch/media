<?php

namespace App\Console\Commands;

use App\Models\Region;
use App\Services\Gateways\VKGateway;
use Illuminate\Console\Command;

class GatherRegions extends Command
{
    protected $signature = 'gather:regions';

    protected $description = 'parse regions from vk-api';

    /** @var VKGateway $gateway */
    protected $gateway;

    public function __construct(VKGateway $gateway)
    {
        parent::__construct();

        $this->gateway =$gateway;
    }

    public function handle()
    {
        $countriesList = $this->gateway->getCountries();

        foreach ($countriesList['response'] as $item) {
            Region::create([
                'name' => $item['title']
            ]);
        }
    }
}
