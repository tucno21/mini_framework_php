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
            ]);

            if ($valid !== true) {

                return $this->view('backend/roles/create', [
                    'err' =>  $valid,
                    'data' => (object)$data,
                ]);
            } else {
                $this->rolModel->create($data);
                return $this->redirect('proles');
            }
        }

        return $this->view('backend/roles/create', []);
    }

    public function edit()
    {
        $result = $this->request()->isPost();

        if ($result) {
            $data = $this->request()->getInput();

            $valid = $this->validate($data, [
                'name' => 'required',
            ]);

            if (isset($data['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
            if ($valid !== true) {

                return $this->view('backend/roles/create', [
                    'err' =>  $valid,
                    'data' => (object)$data,
                ]);
            } else {
                $this->rolModel->update($data['id'], $data);
                return $this->redirect('proles');
            }
        } else {
            $data = $this->request()->getInput();

            $rol = $this->rolModel->where('id', $data['id'])->first();

            return $this->view('backend/roles/edit', [
                'rol' =>  $rol,
            ]);
        }
    }

    public function destroy()
    {
        $result = $this->request()->isGet();
        if ($result) {
            $data = $this->request()->getInput();
            $this->rolModel->delete($data['id']);
            return $this->redirect('proles');
        }
    }

    public function permissions()
    {
        $result = $this->request()->isPost();

        // if ($result) {
        //     $data = $this->request()->getInput();

        //     $valid = $this->validate($data, [
        //         'name' => 'required',
        //     ]);

        //     if ($valid !== true) {

        //         return $this->view('backend/roles/permissions', [
        //             'err' =>  $valid,
        //             'data' => (object)$data,
        //         ]);
        //     } else {
        //         $this->rolModel->create($data);
        //         return $this->redirect('proles');
        //     }
        // }

        return $this->view('backend/roles/permissions', []);
    }
}
