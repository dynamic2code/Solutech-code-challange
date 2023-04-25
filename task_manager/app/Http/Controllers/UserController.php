<?php

namespace App\Http\Controllers;

use App\Models\Task_user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function Add_user($request){
        // getting the users from front end
        $data = $request;
        $email = $data['email'];
        $password = $data['password'];


        // run the model function 
        $user_model = new Task_user();
        if ($user_model-> Check_if_user_exist($email, $password)){
            $user_model->Add_user_to_db($email, $password);
            $request->session()->put('user', $email);
            $request->session()->put('password', $password);
            return true;
        }
    }
    
    function User_login($request){
        // getting the users from front end
        $data = $request;
        $email = $data['email'];
        $password = $data['password'];




        // run the model function
        $user_model = new Task_user();
        if ($user_model-> Check_if_user_exist($email, $password)){
            $log_in_error = "There was an error loging if you are not registerd trie signing up";
            $request->session()->flash('status', $log_in_error);
            return true;
        }
        $request->session()->put('user', $email);
        $request->session()->put('password', $password); 
        return false;
    }
}
