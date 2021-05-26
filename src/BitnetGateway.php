<?php

/**
 * BitNet SMS Gateway Service implementation
 */

namespace Blackfyre\BitnetGateway;

use GuzzleHttp\Client;

/**
 * Bitnet Gateway
 * 
 * @license MIT License https://github.com/blackfyre/bitnet-gateway/blob/main/LICENSE.md
 */
class BitnetGateway
{
    /**
     * Container for the Guzzle Client
     * 
     * @var Client()
     */
    private $_client;

    /**
     * Sets up a GuzzleClient for the Bitnet service
     * 
     * @return void
     */
    private function _setupClient()
    {
        $this->_client = new Client([
            'base_uri' => 'https://sms.bitnet.hu/api/v1/'
        ]);
    }

    /**
     * Sends an SMS through the Bitnet network
     * 
     * @param string $phoneNumber The target phone number
     * @param string $message     The actual message
     * 
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return string The unique ID of the message sent
     */
    public function sendSMS($phoneNumber = '', $message = ''): string
    {
        $this->_setupClient();

        $query = [
            'username' => config('bitnet-gateway.username'),
            'password' => config('bitnet-gateway.password'),
            'charset' => config('bitnet-gateway.encoding'),
            'receiver' => $phoneNumber,
            'text' => $message,
            'json' => 1
        ];

        $response = json_decode($this->_client->get('send/', [
            'query' => $query
        ])->getBody(), true);

        return $response['messages'][0];
    }

    /**
     * Query the status of the sent SMS
     * 
     * @param string $messageId The ID of the message to query
     * 
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function queryStatus(string $messageId)
    {
        $this->_setupClient();

        $query = [
            'username' => config('bitnet-gateway.username'),
            'password' => config('bitnet-gateway.password'),
            'id' => $messageId
        ];

        $response = json_decode(
            $this->_client->get(
                'status/', 
                [
                    'query' => $query
                ]
            )->getBody(), true
        );

        if (count($response['messages']) > 0) {
            return $response['messages'][0];
        }

        return [];
    }

    /**
     * 
     */
    public function batchQueryStatus(array $messageIds) {
        $this->_setupClient();

        $query = [
            'username' => config('bitnet-gateway.username'),
            'password' => config('bitnet-gateway.password'),
            'message_ids' => $messageIds
        ];

        dump(json_encode($query));

        $response = json_decode($this->_client->post('status/', [
            'json' => $query
        ])->getBody(), true);

        return $response;
    }
}
