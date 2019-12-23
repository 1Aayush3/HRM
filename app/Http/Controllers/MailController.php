<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class MailController extends Controller
{
    public function mail($id)
    {
       $user= User::find($id);
       $name = $user->name;
       Mail::to('aayush.sql@gmail.com')->send(new SendMailable($name));
       echo "mail has been sent to ".$name."\n";
    }
}
