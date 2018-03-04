<?php

namespace App\Console\Commands;

use App\Models\Region;
use App\Services\Gateways\VKGateway;
use Illuminate\Console\Command;

class GatherRegions extends Command
{
    /** @var string $signature */
    protected $signature = 'gather:regions {--lang=en}';

    /** @var string $description */
    protected $description = 'parse regions from vk-api';

    /** @var VKGateway $gateway */
    protected $gateway;

    /** @var array $availableLangs */
    protected $availableLangs = [
        'ru',
        'ua',
        'be',
        'en',
        'es',
        'fi',
        'de',
        'it'
    ];

    public function __construct(VKGateway $gateway)
    {
        parent::__construct();

        $this->gateway = $gateway;
    }

    public function handle()
    {
        if (!in_array($this->option('lang'), $this->availableLangs)) {
            $this->warn('unsupported language');
            exit;
        }

        $countriesList = $this->gateway->getCountries($this->option('lang'));

        foreach (array_get($countriesList, 'response.items') as $item) {
            Region::create([
                'name' => $item['title']
            ]);
        }

        $this->info('Success');
    }
}
