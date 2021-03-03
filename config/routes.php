<?php
// route to generate token
$app->post("/token", "AuthController:generateToken");
$app->post("/pixel", "PixelController:createPixel");
