<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class VultrService
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.vultr.com/v2/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('VULTR_API_KEY'),
                'Accept'        => 'application/json',
            ],
            'verify' => false,  // Disable SSL verification (for local testing only)
        ]);
    }

    public function listInstances()
    {
        try {
            $response = $this->client->get('instances');
            // Check for successful response and decode it
            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            // Log error or handle the exception
            return [
                'error' => 'Request failed: ' . $e->getMessage(),
                'status' => $e->getCode(),
            ];
        }
    }

    // Add more API methods as needed
}
