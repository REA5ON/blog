<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke() :View
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
}
