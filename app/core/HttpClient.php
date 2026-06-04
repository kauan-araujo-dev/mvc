<?php

namespace App\Core;

class HttpClient
{
    const STANDARD_HEADER = [
        "Accept: application/json",
        "Content-Type: application/json"
    ];

    public function get(string $url, ?array $header = null): string
    {
        if (empty($header)) {
            $header = self::STANDARD_HEADER;
        }

        $options = [
            "http" => [
                "method" => "GET",
                "header" => \implode("\r\n", $header)
            ]
        ];

        $context = \stream_context_create($options);

        return \file_get_contents($url, false, $context);
    }

    public function post(string $url, array $data, ?array $header = null): string
    {
        $data = \json_encode($data);

        if (empty($header)) {
            $header = self::STANDARD_HEADER;
        }
        $options = [
            "http" => [
                "method" => "POST",
                "header" => \implode("\r\n", $header),
                "content" => $data
            ]
        ];
        $context = \stream_context_create($options);
        return \file_get_contents($url, false, $context);
    }

    public function put(string $url, array $data, ?array $header = null): string
    {
        $data = \json_encode($data);

        if (empty($header)) {
            $header = self::STANDARD_HEADER;
        }
        $options = [
            "http" => [
                "method" => "PUT",
                "header" => \implode("\r\n", $header),
                "content" => $data
            ]
        ];
        $context = \stream_context_create($options);
        return \file_get_contents($url, false, $context);
    }

    public function delete(string $url, ?array $header = null): string
    {

        if (empty($header)) {
            $header = self::STANDARD_HEADER;
        }
        $options = [
            "http" => [
                "method" => "delete",
                "header" => \implode("\r\n", $header)
            ]
        ];
        $context = \stream_context_create($options);
        return \file_get_contents($url, false, $context);
    }
}
