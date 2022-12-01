<?php

namespace App\Http\Controllers\staf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Middleware\Staf;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Carbon\Carbon;
class StafController extends Controller
{
    use PasswordValidationRules;
    public function __construct()
    {
        $this->middleware('staf');
    }

    public function dashboard()
    {
        

        return view('staf.dashboard');
    }

    public function updateProfil()
    {
          
        return view('profile.show');

    }
}
