<?php
namespace App\Controllers;

use App\Models\Pixel;
use App\Requests\CustomRequestHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;
use Respect\Validation\Validator as v;
use App\Validation\Validator;

class PixelController
{
    protected $pixel;
    protected $validator;

    public function __construct()
    {
        $this->pixel = new Pixel();
        $this->validator = new Validator();
    }

    public function createPixel(Request $request, Response $response)
    {
        $this->validator->validate($request, [
            "pixelType" => v::stringType()->notEmpty(),
            "userId" => v::intVal()->notEmpty(),
            "occuredOn" => v::intVal()->notEmpty(),
            "portalId" => v::intVal()->notEmpty()
        ]);

        if($this->validator->failed()) {
            return $response->withJson(["success" => false, "response" => "invalid input, object invalid"], 400);
        }

        $pixelType = CustomRequestHandler::getParam($request, "pixelType");
        $userId = CustomRequestHandler::getParam($request, "userId");
        $occuredOn = CustomRequestHandler::getParam($request, "occuredOn");
        $portalId = CustomRequestHandler::getParam($request, "portalId");
        
        if(Pixel::where(['pixelType' => $pixelType, 'userId' => $userId])->count()) {
            return $response->withJson(["success" => false, "response" => "an existing item already exists"], 401);
        }

        $this->pixel->create([
            "pixelType" => $pixelType,
            "userId" => $userId,
            "occuredOn" => $occuredOn,
            "portalId" => $portalId
        ]);

        return $response->withJson(["success" => true, "response" => "data saved"], 201);
    }
}