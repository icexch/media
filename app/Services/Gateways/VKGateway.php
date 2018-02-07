<?php namespace App\Services\Gateways;


class VKGateway extends ApiGateway
{
    protected $baseUri = 'https://api.vk.com/method/';

    /**
     * @return array
     */
    public function getCountries(): array
    {
        return $this->request('database.getCountries',
            ['need_all' => 1, 'access_token' => env('VK_ACCESS_TOKEN'), 'count' => 300]);
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->request('ads.getCategories',['access_token' => env('VK_ACCESS_TOKEN')]);
    }
}
