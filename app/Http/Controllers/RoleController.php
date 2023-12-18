<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request){
        if($request->user()->HasRole('admin'))
        return 'role page';
        abort(403);

        $this->authorize('read role');
        return 'role page';
    }
}
