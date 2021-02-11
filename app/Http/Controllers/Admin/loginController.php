<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class loginController extends Controller
{
    //

    public function login(Request $request){
            //  validate for Login Admin form
            $request->validate([
                'email' => 'required|email',
                 'password' => 'required|min:6'
                ]);

               //  if Admin is has guard Admin ( register in admins Table ) will lOgin in dashboard
               if(Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password])){
                   return redirect()->route('users.index');
               }
               else{
               return redirect('admin/loginadmin')->withInput($request->only('email'))->with('error','You Are not have permisstion to login this Page');
               }
    }


    //   for ADMIN dashborad data and manage admin
      public function dashboard(){
            $users = User::all();
            return view('admin.dashboard',compact('users'));
     }

}
