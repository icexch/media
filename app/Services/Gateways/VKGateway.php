<?php namespace App\Services\Gateways;


class VKGateway extends ApiGateway
{
    protected $baseUri = 'https://api.vk.com/method/';

    protected $version = 5.73;

    /**
     * @param string $lang
     *
     * @return array
     */
    public function getCountries(string $lang): array
    {
        return $this->request('database.getCountries',
            ['need_all' => 1, 'access_token' => env('VK_ACCESS_TOKEN'), 'count' => 300, 'lang' => $lang]);
    }

    /**
     * @param string $lang
     *
     * @return array
     */
    public function getCategories(string $lang): array
    {
        return $this->request('ads.getCategories', ['access_token' => env('VK_ACCESS_TOKEN'), 'lang' => $lang]);
    }
}
