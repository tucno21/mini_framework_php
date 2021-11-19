<?php

namespace App\Controller\Auth;

use App\Model\HomeModel;
use App\System\Controller;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->homeModel = new HomeModel();
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
    }

    public function login()
    {
        $result = $this->request()->isPost();

        if ($result) {
            $data = $this->request()->getInput();

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

                $user = $this->homeModel->columns('id, email, name, surnames')->where('email', $data['email'])->first();

                $this->sessionSet('user', $user);

                return $this->redirect('/');
            }
        }

        return view('auth/login');
    }

    public function register()
    {

        $data = $this->request()->getInput();

        $validator = $this->validate($data, [
            'name' => 'required|alpha',
            'username' => 'required|alpha_numeric',
            'email' => 'required|email|unique:HomeModel,email',
            'password' => 'required|min:3|max:12|matches:password_confirm',
            'password_confirm' => 'required',
        ]);

        if ($validator !== true) {

            return $this->view('auth/register', [
                'err' =>  $validator,
                'data' => (object)$data,
            ]);
        } else {

            $this->homeModel->create($data);
            return $this->redirect('auth/login');
        }

        return view('auth/register');
    }

    public function logout()
    {
        // session_start();
        // session_destroy();
        $this->sessionDestroy('user');
        return $this->redirect('/');
    }
}
