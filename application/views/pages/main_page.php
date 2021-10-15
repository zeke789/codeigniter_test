<?php

if( isset($allServices) ){ ?>
    <table><th>ID</th><th>Name</th><th>Description</th> <th>Staff</th> <?php
    foreach ($allServices as $s){ ?>
        <tr>
            <td> <?= $s['id'] ?></td>
            <td> <a href=" <?= base_url() ?>main/<?= $s['id'] ?>" ><?= $s['name'] ?></a> </td>
            <td> <?= $s['description'] ?></td>
            <td><a href="<?= base_url() . "manage/staff/" . $s['staff_id'] ?>"><?= $s['staffName'] ?></a>  </td>
        </tr><?php
    }
    echo "</table>";
}

if( isset($getService) ){ ?>
    <h3>Service: <?=  $getService['name'] ?></h3>
    <p>id <?=  $getService['id'] ?></p>
    <p>description <?=  $getService['description'] ?></p>
    <p>staff id <?=  $getService['staff_id'] ?></p>
    <p>contributors id <?=  $getService['contributors_id'] ?></p>
<?php
} ?>

