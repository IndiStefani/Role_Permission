<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Skeluar;
use App\Models\Smasuk;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::count();
        $disposisiCount = Disposisi::count();
        $suratMasukCount = Smasuk::count();
        $suratKeluarCount = Skeluar::count();

        return View::make('dashboard', compact('userCount', 'disposisiCount', 'suratMasukCount', 'suratKeluarCount'));
    }
}
