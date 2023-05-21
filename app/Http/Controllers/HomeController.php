<?php

namespace App\Http\Controllers;

use App\Events\IncidentEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * home: home action controller
     *
     * @param Request $request
     * @return array|false|\Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|mixed
     */
    public function home(Request $request)
    {
        event(new IncidentEvent(['data']));
        return view("home");
    }
}
