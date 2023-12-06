<?php
declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use App\Model\Entity\Forslag;
use App\Model\Entity\Logging;
use App\Model\Entity\Internalcomment;
use Cake\I18n\DateTime;

class ListController extends AppController{
    public function initialize(): void{
        $this->loadComponent('sessions');
        $this->sessions->session_checker();
        $this->viewBuilder()->setLayout('header');
    }
    public function list(){
        $url = $this->request->getParam('pass');
        $list = $this->fetchTable('forslag')
        ->find('all')
        ->where(['state' => $url[0]]);
        $dataarray = iterator_to_array($list);
        $this->set('data',$dataarray);
    }
    public function info(){

        $session = $this->getRequest()->getSession()->read('username');
        $this->set('currentuser',$session);

        $url = $this->request->getParam('pass');
        $this->set(['ID' => $url[0]]);

        $list = $this->fetchTable('forslag')
        ->find('all')
        ->where(['ID'=> $url[0]]);
        $dataarray = iterator_to_array($list);
        $this->set('data',$dataarray);

        $files = $this->fetchTable('files')
        ->find('all')
        ->where(['forslagid'=> $url[0]]);
        $file = iterator_to_array($files);
        $this->set('files',$file);

        $log = $this->fetchTable('logging')
        ->find('all')
        ->where(['forslagid'=> $url[0]]);
        $logs = iterator_to_array($log);
        $this->set('logs',$logs);

        if(isset($_POST['state'])){
            $state = $this->request->getData('state');
            $this->loadComponent('state');
            $this->state->updatestate($state,$url);
            $this->redirect([
                'controller' => 'List',
                'action' => 'info',
                'id' => $url[0],
            ]);
        }

        $comment = $this->fetchTable('internalcomments')
        ->find('all')
        ->where(['forslagid'=> $url[0]]);
        $comments = iterator_to_array($comment);
        $this->set('comments',$comments);

        if(isset($_POST['add-comment'])){
            $this->loadComponent('comment');
            $this->comment->addcomment($url);
            $this->redirect([
                'controller' => 'List',
                'action' => 'info',
                'id' => $url[0],
            ]);
        }

        if(isset($_POST['edit'])){
            $id = $this->request->getData('id');
            $forslagid = $this->request->getData('forslagid');
            $this->redirect([
                'controller' => 'List',
                'action' => "edit/$id/$forslagid",
            ]);
        }

        if(isset($_POST['delete'])){
            $id = $this->request->getData('id');
            $forslagid= $this->request->getData('forslagid');
            $this->loadComponent('comment');
            $this->comment->deletecomment($id,$forslagid);
            $this->redirect([
                'controller' => 'List',
                'action' => 'info',
                'id' => $forslagid,
            ]);
        }
    }

    public function form(){
        $forslag = $this->fetchTable('Forslag');
        if ($this->request->is('post')) {
            $tile = $this->request->getData('title');
            $name = $this->request->getData('name');
            $email = $this->request->getData('email');
            $kategori = $this->request->getData('kategori');
            $comments = $this->request->getData('comments');
            $article = new Forslag([
                'title' => $tile,
                'name' => $name,
                'email' => $email,
                'kategori' => $kategori,
                'comments' => $comments,
                'state' => 0,
                'Dateadded'=> new DateTime('now'),
                'updatedate'=> new DateTime('now'),
            ]);
            $forslag->save($article);
           if(!empty($_FILES['files']['name'][0])){
                $files = array_filter($_FILES['files']['name']);
                $count_files = count($_FILES['files']['name']);
                for ($i=0; $i<$count_files; $i ++){
                    //get filename
                    $filename = addslashes($_FILES['files']['name'][$i]);
                    //get filetype
                    $filetype = addslashes($_FILES['files']['type'][$i]);
                    //get file extension
                    $fileextension = strtolower(pathinfo($_FILES["files"]["name"][$i],PATHINFO_EXTENSION));
                    //get file data
                    $filedata = $_FILES["files"]["tmp_name"][$i];
                    $this->loadComponent('file');
                    $this->file->savefiles($filename,$filetype,$fileextension,$filedata,$tile,$name,$email,$kategori,$comments);
                }
            }
            $this->redirect([
                'controller' => 'List',
                'action' => 'list',
                'state' => '0',
            ]);
        }
    }
    public function edit(){
        $url = $this->request->getParam('pass');
        $id = $url[0];
        $forslagid = $url[1];
        $info = $this->fetchTable('internalcomments')
        ->find('all')
        ->where(['ID' => $id, 'forslagid' => $forslagid]);
        $dataarray = iterator_to_array($info);
        $this->set('data',$dataarray);
        if(isset($_POST['state'])){
            $comments = $this->request->getData('comments');
            $this->loadComponent('comment');
            $this->comment->editcomment($id,$forslagid,$comments);
        }

    }
    public function logout(){
        $this->autoRender = false;
        $session = $this->request->getSession();
        $session->delete('username');
        $this->redirect([
            'controller' => 'user',
            'action' => 'index',
        ]);
    }
}