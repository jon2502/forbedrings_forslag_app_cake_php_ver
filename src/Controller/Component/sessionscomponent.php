<?php
namespace Cake\Controller\Component;

use Cake\Controller\Component;
use App\Model\Entity\Logging;
use App\Model\Entity\Forslag;
use Cake\I18n\DateTime;

class sessionscomponent extends Component{
    public function session_checker(){
        $session = $this->getController()->getRequest()->getSession();
        if(!$session->read('username')){
            return $this->getController()->redirect([
                'controller' => 'user',
                'action' => 'index',
            ]);
        }
    }

    public function login_check(){
        $session = $this->getController()->getRequest()->getSession();
        if($session->read('username')){
            return $this->getController()->redirect([
                'controller' => 'list',
                'action' => 'list',
                'state' => '0'
            ]);
        }
    }
}