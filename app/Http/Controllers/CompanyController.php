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
        if (JWTAuth::parseToken()->authenticate()->role !== 'superadmin') {
            return new JsonResponse([
                'message' => 'Permission denied you are Super Admin'
            ], Response::HTTP_UNAUTHORIZED);
        }
        return new JsonResponse([
            'message' => 'Success all companies',
            'data' => Company::all()
        ], Response::HTTP_OK);

    }

    function create(Request $request)
    {
        if (JWTAuth::parseToken()->authenticate()->role !== 'superadmin') {
            return new JsonResponse([
                'message' => 'Permission denied you are not Super Admin'
            ], Response::HTTP_UNAUTHORIZED);
        }
        try {
            $this->validate($request, [
                'name' => 'required',
            ]);
        } catch (ValidationException $e) {
            return $e->getResponse();
        }

        $company = new Company;
        $company->name = $request->name;
        $company->logo = $request->logo;
        $company->save();

        return new JsonResponse([
            'message' => 'Success create scompany',
            'data' => $company
        ], Response::HTTP_CREATED);
    }

    function delete($id){
        if (JWTAuth::parseToken()->authenticate()->role !== 'superadmin') {
            return new JsonResponse([
                'message' => 'Permission denied you are not Super Admin'
            ], Response::HTTP_UNAUTHORIZED);
        }

        Company::destroy($id);
        return new JsonResponse([
            'message' => 'company deleted'
        ]);
    }
}
