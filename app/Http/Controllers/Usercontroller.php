<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    function Register(Request $req)
    {
        $member = new customer;
        $member->firstname = $req->firstname;
        $member->lastname = $req->lastname;
        $member->username = $req->username;
        $member->email = $req->email;
        $member->password = md5($req->password); 
        $member->save();

        $to_name = $req->username;
        $to_email = $req->email;
        $body = "Hello {$to_name}, You have been registered successfully";
        $data = array("name"=>$to_name, "body"=>$body);
        mail::send('mail', $data, function($message) use ($to_name, $to_email){
            $message->to($to_email)
            ->subject('Confirmatory message');
        }); 

        return view("index");
    }

    function login(Request $req)
    {
        $data = $req->input();
        $username = $data['username'];
        $password = md5($data['password']);

        $user  = DB::select('select * from customer where username = :name and password = :pass', ['name' => $username, 'pass' => $password]);

        $user = count($user);

        if($user != 0)
        {
            $req->session()->put('user', $data['username']);
            //echo session('user'); 
            return redirect('profile');
        }

        else
        {
            echo 'Invalid Email or password';
        }        
    }
}
