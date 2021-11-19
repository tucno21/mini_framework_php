<?php

namespace App\Controller\Backend;

use App\System\Controller;

class Roles extends Controller
{

    public function __construct()
    {
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function index()
    {
        return view('backend/roles/index', [
            // 'users' => $users,
        ]);
    }

    public function create()
    {
    }

    public function edit()
    {
    }

    public function destroy()
    {
    }
}
