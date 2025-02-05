<?php

namespace Framework;
class Router
{
    private array $routes = [];

    public function get(string $path, array $params)
    {
        $this->routes[] = [
            'path' => $path,
            'params' => $params
        ];
    }

    public function match(string $path): array | bool
    {
        $pattern = "#^/(?<controller>[a-z]+)/(?<action>[a-z]+)$#";

        if(preg_match($pattern, $path, $matches)) {
            $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
            return $matches;
        }

        return false;
    }
}