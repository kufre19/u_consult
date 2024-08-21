<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session('errors')) {
                $errors = session('errors')->all();
                $errorMessage = implode('<br>', $errors);
                Alert::error('Oops...', $errorMessage)->html()->persistent(true, false);
            }

            return $next($request);
        });
    }
}
