<?php

namespace App\Controllers;
use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario extends BaseController
{

    function __construct() {
        // $error = $this->validate(
        // [
        //     'nome'       => 'required',
        //     'categoria'  => 'required',
        //     'email'      => 'required',
        //     'senha'      => 'required'
        // ],
        // [
        //     'nome'       => [
        //         'required' => "O campo nome é obrigatório."
        //     ],
        //     'categoria'       => [
        //         'required' => "O campo categoria é obrigatório."
        //     ],
        //     'email'       => [
        //         'required' => "O campo email é obrigatório."
        //     ],
        //     'senha'       => [
        //         'required' => "O campo senha é obrigatório."
        //     ]
        // ]
        // );

        // if($error){
        //      return $this->validaton;
        // }
    }

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
        //return $this->response->setStatusCode(500)->setBody('Teste Ajax');
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