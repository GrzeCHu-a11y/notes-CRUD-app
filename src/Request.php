<?php

declare(strict_types=1);

namespace App;

class Request
{
    public array $get = [];
    public array $post = [];

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }

    public function getParams(string $data)
    {
        return $this->get[$data] ?? null;
    }

    public function postParams(string $data)
    {
        return $this->post[$data] ?? null;
    }
}
