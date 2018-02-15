<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Services\Gateways\VKGateway;
use Illuminate\Console\Command;

class GatherCategories extends Command
{
    /** @var string $signature */
    protected $signature = 'gather:categories {--lang=en}';

    /** @var string $description */
    protected $description = 'parse categories from vk-api';

    /** @var VKGateway */
    protected $gateway;

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

        $categoriesList = $this->gateway->getCategories($this->option('lang'));

        foreach ($categoriesList['response'] as $category) {
            Category::create([
                'name' => $category['name']
            ]);
        }
    }
}
