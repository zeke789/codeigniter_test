<?php
if(isset($allStaff)){
    echo "<table><th>id</th><th>name</th>";
    foreach ($allStaff as $s){ ?>
        <tr>
            <td> <?= $s['id'] ?></td>
            <td> <a href=" <?= base_url() ?>manage/staff/<?= $s['id'] ?>" ><?= $s['name'] ?> </a> </td>
        </tr>
        <?php
    }
    echo "</table>";
}
if(isset($staffMember)){
   /* echo "<pre>";
    var_dump($staffMember);
    echo "</pre>";die;*/
    ?>
    <div style="border:1px solid black;padding:20px;display: inline-block;margin:5px">
        <h3>Staff Member With ID <?= $staffMember[0]['id'] ?> </h3>
        <p>Name: <?= $staffMember[0]['name'] ?></p>
        Services:
        <ul> <?php
            foreach ($staffMember as $srv) {
                if($srv['serviceName'] != "--" ){ ?>
                        <li><a href="<?= base_url() . "services/view/". $srv['service_id'] ?>"><?= $srv['serviceName'] ?></a> </li>
                    <?php
                }
            } ?>
        </ul>
    </div>
   <?php

}