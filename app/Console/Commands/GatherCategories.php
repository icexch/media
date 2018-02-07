<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Services\Gateways\VKGateway;
use Illuminate\Console\Command;

class GatherCategories extends Command
{
    /** @var string $signature */
    protected $signature = 'gather:categories';

    /** @var string $description */
    protected $description = 'parse categories from vk-api';

    /** @var VKGateway */
    protected $gateway;

    public function __construct(VKGateway $gateway)
    {
        parent::__construct();

        $this->gateway = $gateway;
    }

    public function handle()
    {
        $categoriesList = $this->gateway->getCategories();

        foreach ($categoriesList['response'] as $category) {
            Category::create([
                'name' => $category['name']
            ]);
        }
    }
}
