<?php
   echo '<section class="margin">';
   echo $this->Form->create(NULL,array('url'=>''));
   echo '<label for="username">username</label>';
   echo '<br>';
   echo $this->Form->text('username', ['class' => 'users', 'required' => true]);
   echo '<br>';
   echo '<label for="password">password</label>';
   echo '<br>';
   echo $this->Form->password('password',['required' => true]);
   echo '<br>';
   echo $this->Form->button('Submit');
   echo $this->Form->end();
   echo '</section>';
?>