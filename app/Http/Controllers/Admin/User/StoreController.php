<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        //validation
        $data = $request->validated();

        //password
        $password = Str::random(10);

        $user = User::firstOrCreate([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'role' => $data['role'],
        ]);

        event(new Registered($user));

        Mail::to($data['email'])->send(new PasswordMail($password));

        return redirect()->route('admin.user.index')
            ->with('message', 'User ' . $data['name'] . ' was created!');
    }
}
