<?php
    echo '<section class="margin">';
        echo '<section class="listgrid">';
        if(!$data){
            echo 'found nothing';
        }else{
            foreach($data as $item){
                ?>
                <div class="listinfo">
                                <tr>
                                    <p><?= $item->title?></p>
                                    <p><?= $item->name?></p>
                                    <p><?= $item->email?></p>
                                    <p><?= $item->kategori?></p>
                                    <p><?= $item->Dateadded?></p>
                                    <?php echo $this->Html->link(
                                        'more info',
                                        ['controller'=>'list', 'action' => 'info', 'id' => $item->ID],
                                        ['class' => 'button_link main_text']
                                    )?>
                                </tr>
                        </div>
                <?php
            }
        }
        echo "</section>";
    echo "</section>";
        
