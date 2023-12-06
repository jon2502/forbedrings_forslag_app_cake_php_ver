<?php
   echo '<section class="form_setup">';
      echo $this->Form->create(null,[
         'enctype'=>'multipart/form-data',
      ]);
      echo '<label for="title">title</label>';
      echo '<br>';
      echo $this->Form->text('title', ['class' => 'formfield','required' => true]);
      echo '<br>';
      echo '<label for="name">name</label>';
      echo '<br>';
      echo $this->Form->text('name', ['class' => 'formfield','required' => true]);
      echo '<br>';
      echo '<label for="email">email</label>';
      echo '<br>';
      echo $this->Form->text('email', ['class' => 'formfield']);
      echo '<br>';
      echo '<label for="files[]">files</label>';
      echo '<br>';
      echo $this->Form->file('files[]',['class' => 'formfield','value'=>'files','multiple'=>'multiple']);
      echo '<br>';
      echo '<label for="kategori">kategori</label>';
      echo '<br>';
      echo $this->Form->select('kategori',[
         'test1' =>'test1',
         'test2'=>'test2',
         'test3'=>'test3'], ['class' => 'formfield']);
      echo '<br>';
      echo '<label for="comments">comments</label>';
      echo '<br>';
      echo $this->Form->textarea('comments', ['class' => 'formfield','required' => true]);
      echo '<br>';
      echo '<br>';
      echo $this->Form->button('Submit');
      echo $this->Form->end();
   echo '</section>';