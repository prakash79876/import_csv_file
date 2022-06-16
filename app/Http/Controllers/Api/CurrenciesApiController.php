<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\CurrenciesResource;
use App\Helper\Exceptions;
use App\Models\Currencies;

class CurrenciesApiController extends Controller
{
    public function index(Request $request)
    {
        if($request->common_name){
            $currencies = Currencies::where('common_name','LIKE','%'.$request->common_name.'%')
            ->paginate(10);
        }else{
            $currencies = Currencies::paginate(10);
        }

        $collection = new CurrenciesResource($currencies);
 
        return response()->json(['data' => $collection]);
    }
}
