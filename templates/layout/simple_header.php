<?php

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['styling']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <section class="header">
            <img src="https://support.ipw.dk/getfile.php?objectid=247138" alt="ipw_logo" id="header_logo">
    </section>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</body>
</html>
