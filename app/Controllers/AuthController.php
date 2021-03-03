<?php
namespace App\Controllers;

class AuthController
{
    public function generateToken()
    {
        return GenerateTokenController::generateToken();
    }
}