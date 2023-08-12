<?php

namespace SmartSolucoes\Controller;

use SmartSolucoes\Model\User;
use SmartSolucoes\Libs\Helper;
use SmartSolucoes\Model\Compromisso;

class UserController
{

    private $table = 'compromissos';
    private $baseView = 'admin/compromisso';
    private $urlIndex = 'compromissos';

    public function index()
    {
        $model = New Compromisso();
        $response = $model->allCompromissos($this->table,'id DESC');
        Helper::view($this->baseView.'/index',$response);
    }

    public function viewNew()
    {
        
        Helper::view($this->baseView.'/edit',[]);
    }

    public function viewEdit($param)
    {
        $model = New Compromisso();
        $response = $model->find($this->table,$param['id']);
        Helper::view($this->baseView.'/edit',$response);
    }

    public function create()
    {
        $model = New Compromisso();
        $id = $model->create($this->table,$_POST,['id','nome']);
        if($id) {
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView.'/edit',$_POST);
        }
    }

    public function update()
    {
        $model = New Compromisso();
        if($model->save($this->table,$_POST,['nome','completo'])) {
            header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
        } else {
            Helper::view($this->baseView.'/edit/'.$_POST['id']);
        }
    }

    public function delete($param)
    {
        $model = New Compromisso();
        $model->delete($this->table,'id', $param['id']);
        header('location: ' . URL_ADMIN . '/' . $this->urlIndex);
    }

}
