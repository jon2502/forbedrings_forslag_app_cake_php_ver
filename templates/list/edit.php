<?php
echo '<section class="form_setup">';
if($data){
    echo $this->Form->create(null);
    echo '<br>';
    echo '<label for="comments">comments</label>';
    echo '<br>';
    echo $this->form->textarea('comments',['id'=>'comments','value'=>$data[0]->Content]);
    echo '<br>';
    echo '<br>';
    echo $this->Form->indput('save',['type'=>'submit','value'=>'save','name'=>'save']);
    echo $this->form->hidden('id',['value' =>$data[0]->ID,'hiddenField'=>true]);
    echo $this->form->hidden('forslagid',['value' =>$data[0]->forslagid,'hiddenField'=>true]);
    echo $this->Form->end();
}else{
    echo '<p>That press release could not be located in our database.</p>';
}
echo '</section>';