<?php
   echo '<section class="margin">';
   if($error){
      echo "<p>$error</p>";
   }
   echo '<h2> login </h2>';
   echo $this->Form->create();
   echo '<label for="username">username</label>';
   echo '<br>';
   echo $this->Form->text('username', ['class' => 'users']);
   echo '<br>';
   echo '<label for="password">password</label>';
   echo '<br>';
   echo $this->Form->password('password');
   echo '<br>';
   echo $this->Form->button('Submit');
   echo $this->Form->end();
   echo '</section>';
