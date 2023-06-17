<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario extends BaseController
{

    public function ModalUsuario(int $ID){
        $usuarioModel = new UsuarioModel();
        return view('ModalViews/UsuarioModal',['dados' => $usuarioModel->where('id', $ID)->orderBy('id')->first()]);
    }

    public function TabelaUsuario()
    {
        $usuarioModel = new UsuarioModel();
        return json_encode(view('TableViews/UsuarioTable',['dados' => $usuarioModel->orderBy('id')->findAll()]));
    }

    public function CadastrarUsuario(){
        $usuarioModel = new UsuarioModel();
        $data = [
            'nome'       => $this->request->getVar('Nome'),
            'categoria'  => $this->request->getVar('Categoria'),
            'email'      => $this->request->getVar('Email'),
            'senha'      => $this->request->getVar('Senha')
        ];
        $usuarioModel->insert($data);
    }

    public function AtualizarUsuario(){
        $usuarioModel = new UsuarioModel();
        $data = [
            'nome'       => $this->request->getVar('Nome'),
            'categoria'  => $this->request->getVar('Categoria'),
            'email'      => $this->request->getVar('Email'),
            'senha'      => $this->request->getVar('Senha')
        ];
        $usuarioModel->update($this->request->getVar('id'),$data);
    }

    public function DeletarUsuario(int $ID){
        $usuarioModel = new UsuarioModel();
        $usuarioModel->delete(['id' => $ID]);
    }


}