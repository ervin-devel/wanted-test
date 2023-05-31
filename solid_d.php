<?php

interface XMLHttpServiceInterface
{
}
class XMLHttpService extends XMLHTTPRequestService implements XMLHttpServiceInterface
{
}

class Http {
    private $service;

    public function __construct(XMLHttpServiceInterface $xmlHttpService) {

    }

    public function get(string $url, array $options) {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url) {
        $this->service->request($url, 'GET');
    }
}