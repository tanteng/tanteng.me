<?php

namespace App\Http\Controllers\Admin;

use Auth;

class TestEntrustController extends AdminController
{
    public function hello()
    {
        $user = Auth::guard('admin')->user();
        if ($user->can('abcdefg')) {
            return 'You have the abcdefg perm.';
        }
        return 'hello world!';
    }
}
