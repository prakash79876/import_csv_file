<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helper\Exceptions;
use App\Helper\CryptoCode;
use App\Models\User;
use Carbon\Carbon;
use Session;

class UsersController extends Controller
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
        $users = User::orderBy('id','DESC')->get();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        $tokenGenerate = Str::random(24);
        return view('admin.users.create',compact('tokenGenerate'));
    }

    public function edit($id)
    {
        $userId = CryptoCode::decrypt($id);
        $userData = User::find($userId);
        $tokenGenerate = Str::random(24);
        return view('admin.users.edit',compact('userData','tokenGenerate'));
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
        try {
            
            if($request->token_exp_date){
                $expireDate = date('Y-m-d', strtotime(str_replace('/', '-', $request['token_exp_date'])));
            }else{
                $expireDate = date('Y-m-d', strtotime(str_replace('/', '-', Carbon::now()->addDays(30))));
            }
            $insertData = new User();
            $insertData->name = $request->name;
            $insertData->email = $request->email;
            $insertData->token = $request->token;
            $insertData->role_id = 2;
            $insertData->password = bcrypt('123456');
            $insertData->token_exp_date = $expireDate;
            $insertData->save();

            Session::flash('success', 'User is added!');
            return redirect('/admin/users');

        } catch (Exception $e) {
            Exceptions::exception($e);
            return redirect()->back()->withInput();
        }
    }

    private function validateInput($request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'token' => 'required',
        ],[
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email is invalid.',
            'email.unique' => 'Email is already exists.',
            'token.required' => 'Token is required.',
        ]);
    }

    public function update(Request $request)
    {
         try {
            $userId = CryptoCode::decrypt($request->id);

            $updateData['name'] = $request->name;
            $updateData['email'] = $request->email;
            $updateData['token'] = $request->token;
            $updateData['token_exp_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $request['token_exp_date'])));
            $updateData['token_is_active'] = $request->token_is_active;
            $update = User::where('id',$userId)->update($updateData);

            Session::flash('success', 'User is updated!');
            return redirect('/admin/users');

        } catch (Exception $e) {
            Exceptions::exception($e);
            return redirect()->back()->withInput();
        }
    }
}
