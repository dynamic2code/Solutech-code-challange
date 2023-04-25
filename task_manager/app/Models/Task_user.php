<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_user extends Model
{
    use HasFactory;
    
    function Check_if_user_exist($email, $password){
        $user = user::where('email', $email)->first();
        

        if ($user && password_verify($password, $user->password)) {
            return true;
        }

        return false;
    }

    function Add_user_to_db($email, $password){

        $user = new user;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }

    function Delete_user(){

    }
}
