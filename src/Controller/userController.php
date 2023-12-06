<?php
declare(strict_types=1);

namespace App\Controller;

class userController extends AppController{
    public function initialize(): void{
        $this->loadComponent('sessions');
        $this->sessions->login_check();
        $this->viewBuilder()->setLayout('simple_header');
    }
    
    public function index()
    {
        $noerror = false;
        $this->set('error',$noerror);
        if ($this->request->is('post')) {
        if (empty('username')|| empty('password')) {
            $errormesage = "<b class='main_text'>Please complete all fields</b><br /><br />";
            $this->set('error',$errormesage);
        } else{
        $query = $this->fetchTable('internalusers')
        ->find()
        ->select(['username', 'password'])
        ->where(['username'=> $this->request->getData('username')]);
        }
        if($query) {
        foreach($query as $user){
            $verifypass = password_verify($this->request->getData('username'), $user->password );
                if($verifypass){
                    $session = $this->getRequest()->getSession();
                    $session->write([
                        'username'=> $this->request->getData('username')
                    ]);
                    $this->redirect([
                        'controller' => 'List',
                        'action' => 'list',
                        'state' => '0',
                    ]);
                }else{
                    $errormesage = "<b>somthing whent wrong try again</b><br /><br />";
                    $this->set('error',$errormesage);
            }
        }
        }
        }
    }
    public function register()
    {
        $this->render();
    }

}