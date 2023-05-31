<?php
define('STORAGE_TYPE', 'db');

interface SecretKeyInterface {
    public function getSecretKey();
}

class FileStorage implements SecretKeyInterface
{
    public function getSecretKey()
    {
        return 'secret key from file';
    }
}

class DBStorage implements SecretKeyInterface
{
    public function getSecretKey()
    {
        return 'secret key from DB';
    }
}
class Concept {
    private $client;

    public function __construct(protected SecretKeyInterface $storage) {
        $this->client = new \GuzzleHttp\Client();
    }

    public function getUserData() {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->storage->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }
}

switch (STORAGE_TYPE) {
    case 'db':
        $storage = new DBStorage();
        break;

    case 'file':
    default:
        $storage = new FileStorage();
        break;
}
(new Concept($storage))->getUserData();