<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;

class TwoFactorLoginResponse implements TwoFactorLoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $role = Auth::user()->role_id;

        if ($request->wantsJson()) {
            return response('', 204);
        }

        switch ($role) {
            case '1':
                return redirect()->route('admin.dashboard');
                break;
            case '2':
                return redirect()->route('staf.dashboard');
                break;
                case '3':
                    return redirect()->route('customer.dashboard');
                    break;
            default:
                return redirect('login');
                
        }
    }
}
