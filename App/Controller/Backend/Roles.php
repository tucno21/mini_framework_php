<?php

namespace App\Controller\Backend;

use App\Model\RolModel;
use App\System\Controller;

class Roles extends Controller
{
    protected $rolModel;

    public function __construct()
    {
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
        $this->rolModel = new RolModel();
    }

    public function index()
    {
        $roles = $this->rolModel->findAll();

        return view('backend/roles/index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        $result = $this->request()->isPost();

        if ($result) {
            $data = $this->request()->getInput();

            $valid = $this->validate($data, [
                'name' => 'required',
                'description' => 'required',
                'status' => 'required',
            ]);

            if ($valid !== true) {

                return $this->view('backend/roles/index', [
                    'err' =>  $valid,
                    'data' => (object)$data,
                ]);
            } else {
                $this->rolModel->create($data);
                return $this->redirect('/proles');
            }
        }
    }

    public function edit()
    {
    }

    public function destroy()
    {
    }
}
