<?php

namespace App\Support\Http;

class Response
{
    public const OK = 200;
    public const ERROR = 500;

    private ?array $data;
    private int $statusCode;

    public function __construct(?array $data = null, int $statusCode = self::OK)
    {
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public function sendHeaders(): void
    {
        header(sprintf('HTTP/1.1 %d;', $this->statusCode));
        header('Content-Type: application/json;');
    }

    public function sendContent(): void
    {
        echo json_encode([
            'status' => $this->statusCode < 500,
            'code' => $this->statusCode,
            'data' => empty($this->data) ? new \stdClass() : $this->data,
        ]);
    }
}