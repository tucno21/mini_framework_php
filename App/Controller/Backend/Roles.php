<?php

namespace App\Controller\Backend;

use App\Model\RolModel;
use App\Model\ModuloModel;
use App\System\Controller;
use App\Model\PermisosModel;

class Roles extends Controller
{
    protected $rolModel;
    protected $PermisosModel;
    protected $ModuloModel;

    public function __construct()
    {
        // $this->middleware($this->sessionGet('user'), ['/dashboard']);
        $this->rolModel = new RolModel();
        $this->PermisosModel = new PermisosModel();
        $this->ModuloModel = new ModuloModel();
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
                $rol_id = $this->rolModel->create($data);

                if ($rol_id["result"] == 'ok') {
                    $modulos = $this->ModuloModel->findAll();

                    foreach ($modulos as $modulo) {
                        $dataPermisos = [
                            'rol_id' => strval($rol_id["id"]),
                            'modulo_id' => $modulo->id,
                            // 'crear' => isset($data['modulos'][$modulo->id]['crear']) ? 1 : 0,
                            // 'leer' => isset($data['modulos'][$modulo->id]['leer']) ? 1 : 0,
                            // 'editar' => isset($data['modulos'][$modulo->id]['editar']) ? 1 : 0,
                            // 'eliminar' => isset($data['modulos'][$modulo->id]['eliminar']) ? 1 : 0,
                        ];
                        $this->PermisosModel->create($dataPermisos);
                        // dd($dataPermisos);
                    }
                    return $this->redirect('proles');
                }
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

        if ($result) {
            $data = $_POST;

            foreach ($data as $d) {
                if (isset($d['read'])) {
                    $d['read'] = 1;
                } else {
                    $d['read'] = 0;
                }
                if (isset($d['create'])) {
                    $d['create'] = 1;
                } else {
                    $d['create'] = 0;
                }
                if (isset($d['update'])) {
                    $d['update'] = 1;
                } else {
                    $d['update'] = 0;
                }
                if (isset($d['delete'])) {
                    $d['delete'] = 1;
                } else {
                    $d['delete'] = 0;
                }
                $mm = $this->PermisosModel->update($d['id'], $d);
            }

            return $this->redirect('proles');
        } else {
            $data = $this->request()->getInput();
            $rol_id = $data['id'];
            // $permisos = $this->PermisosModel->where('rol_id', $data['id'])->findAll();

            $permisos = $this->PermisosModel->TPermiso($data['id']);

            return $this->view('backend/roles/permissions', [
                'permisos' =>  $permisos,
                'rol_id' => $rol_id,
            ]);
        }
    }
}
