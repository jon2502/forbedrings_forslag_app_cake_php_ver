<?php
namespace Cake\Controller\Component;

use App\Model\Entity\File;
use Cake\ORM\TableRegistry;
use Cake\Controller\Component;
use App\Model\Entity\Internalcomment;
use Cake\I18n\DateTime;

class commentcomponent extends Component{
    use \Cake\ORM\Locator\LocatorAwareTrait;
    public function addcomment($url){
        $session = $this->getController()->getRequest()->getSession();
        $commenttable = $this->fetchTable('internalcomments');
        $comment = $_POST['comments'];
        $article = new Internalcomment([
            'user' => $session->read('username'),
            'Content' => $comment,
            'forslagid'=> $url[0],
            'TIMESTAMP'=> new DateTime('now'),
        ]);
        $commenttable->save($article);
    }

    public function deletecomment($id,$forslagid){
        $recordToDelete = $this->fetchTable('internalcomments')
            ->find()
            ->where(['ID' => $id, 'forslagid' => $forslagid])
            ->first();
        if ($recordToDelete) {
            $this->fetchTable('internalcomments')->delete($recordToDelete);
            // successs besked her!
        } else {
            // Record not found
        }
    }
    public function editcomment($id,$forslagid){}
                
                
            
        


    
}