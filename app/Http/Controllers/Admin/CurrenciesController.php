<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Helper\Exceptions;
use App\Helper\CryptoCode;
use App\Imports\CurrenciesImport;
use App\Models\Currencies;
use Session;

class CurrenciesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currencies = Currencies::orderBy('id','DESC')->get();
        return view('admin.currencies.index',compact('currencies'));
    }

    public function importExcel(Request $request) 
    {
        try{
            Excel::import(new CurrenciesImport,request()->file('file'));
            return back()
                ->withSuccess('Data imported successfully.');
        }catch(\Exception $ex){
            return back()
                ->withError('Someting went wrong please try again.');
        } 

      
     }

  
}
