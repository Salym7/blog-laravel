<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        $role = User::getRoles();
        $role = $role[$user->role];
        return view('admin.user.show', compact('user', 'role'));
    }
}
