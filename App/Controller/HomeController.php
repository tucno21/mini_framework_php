<?php

namespace App\Controller;

use App\Model\HomeModel;
use App\System\Controller;

class HomeController extends Controller
{
    protected $homeModel;

    public function __construct()
    {
        $this->homeModel = new HomeModel();
    }

    public function home()
    {
        return view('home', [
            'var' => 'es una variable',
        ]);
    }

    public function login()
    {
        $data = $this->request()->isPost();

        $valid = $this->validate($data, [
            'email' => 'required|email|not_unique:HomeModel,email',
            'password' => 'required|password_verify:HomeModel,email',
        ]);

        if ($valid !== true) {

            return $this->view('login', [
                'err' =>  $valid,
                'data' => (object)$data,
            ]);
        } else {

            $user = $this->homeModel->columns('id, username, email, name')->where('email', $data['email'])->first();

            $this->sessionSet('user', $user);

            return $this->redirect('/');
        }

        return view('login');
    }

    public function register()
    {

        $data = $this->request()->isPost();

        $validator = $this->validate($data, [
            'name' => 'required|alpha',
            'username' => 'required|alpha_numeric',
            'email' => 'required|email|unique:HomeModel,email',
            'password' => 'required|min:3|max:12|matches:password_confirm',
            'password_confirm' => 'required',
        ]);

        if ($validator !== true) {

            return $this->view('register', [
                'err' =>  $validator,
                'data' => (object)$data,
            ]);
        } else {

            $this->homeModel->create($data);
            return $this->redirect('login');
        }

        return view('register');
    }

    public function dashboard()
    {
        $session = $this->sessionGet('user');

        if ($session) {
            $users = $this->homeModel->findAll();
            return view('dashboard', [
                'users' => $users,
            ]);
        } else {
            return $this->redirect('login');
        }
    }

    public function logout()
    {
        // session_start();
        // session_destroy();
        $this->sessionDestroy('user');
        return $this->redirect('/');
    }
}
