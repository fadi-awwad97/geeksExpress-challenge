<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Artisan;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{   //show the view of login that is found in auth file
    public function index()
    {
        return view('auth.login');
    }
      
    //show the view of register that is found in auth file

    public function register()
    {
        return view('auth.register');
    }
      
    //check function if record is found in database and redirect to dashboard if true
    public function check(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required |min:5|max:12'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);
                return redirect('dashboard');
            } else {
                return redirect()->back()->with('fail', 'Invalid password');
            }
        } else {
            return redirect()->back()->with('fail', 'No account found for this email');
        }
    }

    //create new user function which is called from in the refgister form
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone_number'=>'required|numeric',
            'email'=>'required|email|unique:users',
            'password'=>'required |min:5|max:12'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number ;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
      
        $query = $user->save();

        if ($query) {
            return redirect()->back()->with('success', 'You have been successfuly');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }
    //dashboard view with data needed to be displayed
    public function dashboard()
    {
        if (session()->has('LoggedUser')) {
            $user=User::where("id", "=", session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
            return view('dashboard', $data);
        }
    }
    
    //sinout function
    public function signOut()
    {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
    //submiting the number which will recieve a message
    public function submitNumber(Request $request)
    {
        $request->validate([
            'phone_number'=>'required|numeric',
            'message'=>'required',
        ]);
        //call sms:msg that is found in console command file and send the data (phone number and message)
       
        Artisan::call('sms:msg', ['data' => $request]);
    }
}
