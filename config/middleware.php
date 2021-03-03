<?php
use App\Interfaces\SecretKeyInterface as Secret;

return function ($app)
{
    $app->add(new Tuupola\Middleware\JwtAuthentication([
        "ignore" => ["/token"],
        "secret" => Secret::JWT_SECRET_KEY,
        "error" => function ($response, $arguments)
        {
            $data["success"] = false;
            $data["response"] = $arguments["message"];
            $data["status_code"] = "401";

            return $response->withHeader("Content-type","application/json")
                            ->getBody()
                            ->write(json_encode($data,JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        }
    ]));
};