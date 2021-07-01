<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

abstract class OpenWeatherApi
{
    protected ?string $endpoint;
    protected ?string $appid;
    protected $response;
    protected $response_data;

    public function __construct()
    {
        $this->appid = config('services.openweather.apiKey');
    }

    /**
     * @return string|null
     */
    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    /**
     * @param string|null $endpoint
     */
    public function setEndpoint(?string $endpoint): void
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return string|null
     */
    public function getAppid(): ?string
    {
        return $this->appid;
    }

    protected function getParams(): array
    {
        return [
            'appid' => $this->appid
        ];
    }

    protected function getUri(): string
    {
        $params = $this->getParams();
        $searches = $replaces = [];
        foreach ($params as $key => $value) {
            $searches[] = '{' . $key . '}';
            $replaces[] = $value;
        }
        return str_replace($searches, $replaces, $this->getEndpoint());
    }

    /**
     * @return array|mixed
     */
    protected function fetch()
    {
        $this->response = Http::get($this->getUri());
        $this->response_data = $this->response->json();
        return $this->response_data;
    }

    /**
     * @return array|mixed
     */
    public function toResponse()
    {
        try {
            return $this->fetch();
        } catch (\Exception $e) {

        }
    }
}