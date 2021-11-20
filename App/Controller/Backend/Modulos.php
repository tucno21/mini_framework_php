<?php

namespace App\Controller\Backend;

use App\Model\ModuloModel;
use App\System\Controller;

class Modulos extends Controller
{
    protected $ModuloModel;

    public function __construct()
    {
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
        $this->ModuloModel = new ModuloModel();
    }

    public function index()
    {
        $roles = $this->ModuloModel->findAll();
        return view('backend/modulos/index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        $result = $this->request()->isPost();

        if ($result) {
            $data = $this->request()->getInput();

            $valid = $this->validate($data, [
                'title' => 'required',
            ]);

            if ($valid !== true) {

                return $this->view('backend/modulos/create', [
                    'err' =>  $valid,
                    'data' => (object)$data,
                ]);
            } else {
                $this->ModuloModel->create($data);
                return $this->redirect('pmodulos');
            }
        }

        return $this->view('backend/modulos/create', []);
    }

    public function edit()
    {
        $result = $this->request()->isPost();

        if ($result) {
            $data = $this->request()->getInput();

            $valid = $this->validate($data, [
                'title' => 'required',
            ]);

            if (isset($data['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
            if ($valid !== true) {

                return $this->view('backend/modulos/edit', [
                    'err' =>  $valid,
                    'data' => (object)$data,
                ]);
            } else {
                $this->ModuloModel->update($data['id'], $data);
                return $this->redirect('pmodulos');
            }
        } else {
            $data = $this->request()->getInput();

            $mod = $this->ModuloModel->where('id', $data['id'])->first();

            return $this->view('backend/modulos/edit', [
                'mod' =>  $mod,
            ]);
        }
    }

    public function destroy()
    {
        $result = $this->request()->isGet();
        if ($result) {
            $data = $this->request()->getInput();
            $this->ModuloModel->delete($data['id']);
            return $this->redirect('pmodulos');
        }
    }
}
