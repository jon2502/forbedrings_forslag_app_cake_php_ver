<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    </title>
    <?= $this->Html->meta('icon') ?>


    <?= $this->Html->css(['styling']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <section class="header">
            <div id="header_content">
            <img src="https://support.ipw.dk/getfile.php?objectid=247138" alt="ipw_logo" id="header_logo">
            <button id ="phonebutton"> test </button>
            </div>
            <div id="links">
                <?php
                echo $this->Html->link(
                    'pending',
                    ['controller'=>'list', 'action' => 'list', 'state' => 0],
                );
                echo $this->Html->link(
                    'rejected',
                    ['controller'=>'list', 'action' => 'list', 'state' => 1],
                );
                echo $this->Html->link(
                    'accepted',
                    ['controller'=>'list', 'action' => 'list', 'state' => 2],
                );
                echo $this->Html->link(
                    'form',
                    ['controller'=>'list', 'action' => 'form'],
                );
                echo $this->Html->link(
                    'logout',
                    ['controller'=>'list', 'action' => 'logout'],
                );
                ?>
            </div>
    </section>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <?= $this->Html->script(['script']) ?>
            <?= $this->fetch('script') ?>
</body>
</html>
