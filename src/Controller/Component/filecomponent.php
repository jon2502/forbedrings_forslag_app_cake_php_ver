<?php
namespace Cake\Controller\Component;

use App\Model\Entity\File;
use Cake\Controller\Component;
use App\Model\Entity\Files;
use Cake\ORM\TableRegistry;

class filecomponent extends Component
{
    use \Cake\ORM\Locator\LocatorAwareTrait;
    
    public function savefiles($filename,$filetype,$fileextension,$filedata,$tile,$name,$email,$kategori,$comments){
        $query = $this->fetchTable('forslag')
        ->find()
        ->select(['ID'])
        ->where(['title'=> $tile, 'name' => $name, 'email'=>$email,'kategori'=>$kategori, 'comments'=>$comments]);
        foreach($query as $result){
            $files = $this->fetchTable('files');
            $id = $result->ID;
            $newfile = new File([
                'filename' => $filename, 
                'filetype' => $filetype, 
                'extension' => $fileextension, 
                'forslagid' => $id
            ]);
            if($files->save($newfile)){
                $query2 = $this->fetchTable('files')
                ->find()
                ->select(['ID'])
                ->where(['filename' => $filename, 'filetype' => $filetype, 'extension' => $fileextension, 'forslagid' => $id]);
                foreach($query2 as $file){
                    $fileid = $file->ID;
                    $target_dir = WWW_ROOT. 'imgfiles/';
                    $target_file = $target_dir . $fileid;
                    $uploadOk = 1;
                    $filetable = $this->getTableLocator()->get('files');
                    $update = $filetable->find('all')->where(['ID'=>$fileid])->first();
                    $update->parthname = $target_file;
                    $filetable->save($update);
                    if(!$filetable->save($update)){
                        //echo "Error in query";
                    } else{
                        if ($uploadOk == 0) {
                            //echo "Sorry, your file was not uploaded.";
                          // if everything is ok, try to upload file
                          } else {
                                //save file in files 
                            if (move_uploaded_file($filedata, $target_file)) {
                              //echo "The file ". htmlspecialchars( basename( $filename )). " has been uploaded.";
                            } else {
                              //echo "Sorry, there was an error uploading your file.";
                            }
                        }
                    }
                }
            }
        }
    }
}