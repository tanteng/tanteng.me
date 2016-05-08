<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guestbook;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $guestbook = Guestbook::latest()->paginate(50);
        return view('admin.index', compact('guestbook'));
    }

    public function tables()
    {
        return view('admin.tables');
    }
}
