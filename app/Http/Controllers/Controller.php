<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Annotations as OA;

/**
 * @OA\OpenApi(
 *  @OA\Info(
 *      title="Tender API",
 *      version="1.0.0",
 *      description="API documentation for Tender API",
 *      @OA\Contact(
 *          email="sidorenkopavelmail@gmail.com"
 *      ),
 *  ),
 *  @OA\Server(
 *      description="Tender API",
 *      url="http://127.0.0.1:8000/api/"
 *  ),
 *

 *
 *  @OA\PathItem(
 *      path="/"
 *  ),
 *

 * )
 *  @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer"
 * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
