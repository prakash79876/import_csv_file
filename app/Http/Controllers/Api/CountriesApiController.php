<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\CountriesResource;
use App\Helper\Exceptions;
use App\Models\Countries;

class CountriesApiController extends Controller
{
    public function index(Request $request)
    {
        if($request->common_name && $request->page){
            $countries = Countries::where('common_name','LIKE','%'.$request->common_name.'%')
            ->paginate(10);
        }else{
            $countries = Countries::paginate(10);
        }

        $collection = new CountriesResource($countries);
 
        return response()->json(['data' => $collection]);
    }
}
