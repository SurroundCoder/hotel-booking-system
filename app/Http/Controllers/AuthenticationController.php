<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function authenticate(){
        $username   = request()->input('username');
        $password   = request()->input('password');

        $validator = Validator::make(request()->all(), [
            'username'  => 'required|string|min:5|max:20',
            'password'  => 'required|string|min:5|max:20',
        ]);

        try {
            if ($validator->fails()) {
                $this->rtnCode = 1;
                session(['status-message' => 'Wrong Input Parameter']);
                goto ending_phase;
            }

            $staffInfo = Staff::where('username', $username)->where('is_locked', 0)->first();
            if( !$staffInfo ){
                $this->rtnCode = 1;
                session(['status-message' => 'Wrong Username or Password']);
                goto ending_phase;
            }

            if( !Hash::check($password, $staffInfo['password']) ){
                $this->rtnCode = 1;
                session(['status-message' => 'Wrong Username or Password']);
                goto ending_phase;
            }
            
            $staffId = $staffInfo['id'];
            Staff::generateToken( $staffId );
        }catch(Exception $e){
            
        }

        ending_phase:
        return redirect('/');
    }

    public function logout(){
        Staff::deleteToken();
        return redirect('/login');
    }
}