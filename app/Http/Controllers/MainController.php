<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {

        return view('auth.login');
    }

    public function switch()
    {
       if(Auth::check())
       {
            $role = Auth::user()->role_id;

            switch ($role) {
                case '1':
                    return redirect()->route('admin.dashboard');
                    break;
                    case '2':
                        return redirect()->route('staf.dashboard');
                        break;
                    case '3':
                        return redirect()->route('dashboard');
                        break;
                default:
                  return abort(403);
                    break;
            }
       }else{
        return redirect()->route('/');
       }
    }
}
