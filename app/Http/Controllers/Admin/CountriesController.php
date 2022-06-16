<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Helper\Exceptions;
use App\Helper\CryptoCode;
use App\Imports\CountriesImport;
use App\Models\Countries;
use Session;

class CountriesController extends Controller
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
        $countries = Countries::orderBy('id','DESC')->get();
        return view('admin.countries.index',compact('countries'));
    }

    public function importExcel(Request $request) 
    {
        try{
            Excel::import(new CountriesImport,request()->file('file'));
            return back()
                ->withSuccess('Data imported successfully.');
        }catch(\Exception $ex){
            return back()
                ->withError('Someting went wrong please try again.');
        } 

      
     }

  
}
