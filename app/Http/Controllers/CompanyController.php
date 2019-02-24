<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exception\HttpResponseException;

use App\Company;

class CompanyController extends Controller
{
    function getAll(Request $request)
    {
        if(JWTAuth::parseToken()->authenticate()->role === 'superadmin')
        {
            return new JsonResponse([
                'message' => 'success',
                'data' => Company::all()
            ]);
        }
        else {
            return new JsonResponse([
                'message' => 'permission denied'
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
