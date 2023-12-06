<?php
namespace Cake\Controller\Component;

use Cake\Controller\Component;
use App\Model\Entity\Logging;
use App\Model\Entity\Forslag;
use Cake\I18n\DateTime;

class statecomponent extends Component{
    use \Cake\ORM\Locator\LocatorAwareTrait;
    public function updatestate($state,$url){
        $session = $this->getController()->getRequest()->getSession();
        $filetable = $this->getTableLocator()->get('forslag');
        $update = $filetable->find('all')->where(['ID'=>$url[0]])->first();
        $update->state = $state;
        $filetable->save($update);
        if(!$filetable->save($update)){
            var_dump('somthing whent wrong with updating try again');
        }else{
            $logtable = $this->fetchTable('logging');
            $article = new logging([
                'username' => $session->read('username'),
                'forslagid' =>$url[0],
                'status' => $state,
                'TIMESTAMP' => new DateTime('now'),
            ]);
            $logtable->save($article);
        }
    }
}