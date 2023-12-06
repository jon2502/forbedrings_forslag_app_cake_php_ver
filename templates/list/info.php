<?php
if(!$data){
    echo '<p class="main_text">This release could not be located in our database.</p>';
}else{
 echo '<section id="infogrid" class="margin">';
 echo '<div>';
    ?>
        <h2 class="header_text"><?= $data[0]->title?></h2>
        <h4 class="main_text"> af <?= $data[0]->name?></h4>
        <p class="main_text"><?= $data[0]->comments?></p>
        <p class="main_text">This release was published on <?= $data[0]->Dateadded?> For more information, please contact <?= $data[0]->email?></p>
        <p class="main_text">last updated the <?= $data[0]->updatedate?></p>
    <?php
    echo '<div id="state_buttons">';
    if($data[0]->state == 0){
        echo $this->Form->create(null);
        echo $this->form->hidden('id',['value' =>$data[0]->ID],['hiddenField'=>true]);
        echo $this->form->hidden('state',['value'=>1]);
        echo $this->Form->button('reject',['type'=>'submit','value'=>'chnagestate','name'=>'chnagestate']);
        echo $this->Form->end();

        echo $this->Form->create(null);
        echo $this->form->hidden('id',['value' =>$data[0]->ID,'hiddenField'=>true]);
        echo $this->form->hidden('state',['value'=>2]);
        echo $this->Form->button('accept',['type'=>'submit','value'=>'chnagestate', 'name'=>'chnagestate']);
        echo $this->Form->end();
    }elseif($data[0]->state == 1 || $data[0]->state == 2){
        echo $this->Form->create(null);
        echo $this->form->hidden('id',['value' =>$data[0]->ID,'hiddenField'=>true]);
        echo $this->form->hidden('state',['value'=>0]);
        echo $this->Form->button('pending',['type'=>'submit','value'=>'chnagestate', 'name'=>'chnagestate']);
        echo $this->Form->end();
    }
    echo '</div>';
    echo '<h3 class="header_text">logs</h3>';
    if(!$logs){
        echo '<p>no logs found</p>';
    }else{
        foreach ($logs as $log) {
            if($log->state == 0){
                $state = 'pending';
            }elseif($log->state == 1){
                $state = 'reject';
            }elseif($log->state == 2){
                $state = 'accept';
            }
        ?>
        <p class='main_text'><?=$log->username?> ændrede forslags status til <?=$state?> den <?=$log->TIMESTAMP?></p>
        <?php
        }
    }
    echo '<h3 class="header_text">add comments</h3>';
        echo $this->Form->create(null);
        echo '<br>';
        echo '<label for="comments">comments</label>';
        echo '<br>';
        echo $this->form->textarea('comments',['id'=>'comments']);
        echo '<br>';
        echo '<br>';
        echo $this->Form->indput('add-comment',['type'=>'submit','value'=>'add-comment','name'=>'add-comment']);
        echo $this->Form->end();

    echo '<h3 class="header_text">comments</h3>';
    echo '<section class="listgrid">';
    if(!$comments){
        echo '<p>no comments found</p>';
    }else{
        foreach($comments as $comment){
            ?>
            <div class="infolist">
            <h5><?= $comment->user?></h5>
            <p><?= $comment->Content?></p>
            <p><?= $comment->TIMESTAMP?></p>
            <?php
            if($comment->user==$currentuser){
                echo $this->Form->create(null);
                echo $this->form->hidden('id',['value' =>$comment->ID,'hiddenField'=>true]);
                echo $this->form->hidden('forslagid',['value' =>$comment->forslagid,'hiddenField'=>true]);
                echo $this->Form->indput('edit',[
                    'type'=>'submit',
                    'value'=>'edit',
                    'name'=>'edit'
                ]);
                echo $this->Form->end();

                echo $this->Form->create(null);
                echo $this->form->hidden('id',['value' =>$comment->ID,'hiddenField'=>true]);
                echo $this->form->hidden('forslagid',['value' =>$comment->forslagid,'hiddenField'=>true]);
                echo $this->Form->indput('delete',[
                    'type'=>'submit',
                    'value'=>'delete',
                    'name'=>'delete',
                ]);
                echo $this->Form->end();
            }
            ?>
            </div>
            <?php
    }
}
    echo "</section>";
    echo '</div>';
    echo '<div id="fileshowcase">';
     if(!$files){
        echo '<p>no files found</p>';
     }else{
        $img="";
        $video="";
        $audio="";
        foreach ($files as $row) {
            if($row->filetype == 'image/png' || $row->filetype == 'image/jpg' || $row->filetype == 'image/gif'){
                $filecontent = file_get_contents($row->parthname);
                $img .= '<img src="data:'.$row->filetype.';base64,'.base64_encode($filecontent).'"class ="fileimg"/>';
            }
            if($row->filetype == 'video/mp4'){
                $filecontent = file_get_contents($row->parthname);
                $video .= "
                <video class =\"filevideo\" controls disablePictureInPicture>
                    <source src='data:".$row->filetype.";base64,".base64_encode($filecontent)."'>
                Your browser does not support the video element.
                </video>
                ";
            }
            if($row->filetype == 'audio/mpeg'){
                $filecontent = file_get_contents($row->parthname);
                $audio .= "
                <audio class =\"fileaudio\" controls>
                    <source src='data:".$row->filetype.";base64,".base64_encode($filecontent)."'>
                Your browser does not support the audio element.
                </audio>
                ";
            }
            }
            echo $img;
            echo $video;
            echo $audio;
     }
echo '</div>';
echo '</section>';
}