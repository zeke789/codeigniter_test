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
if(isset($staffMember)){ ?>
    <div style="border:1px solid black;padding:20px;display: inline-block;margin:5px">
        <h3>Staff Member With ID <?= $staffMember['id'] ?> </h3>
        <p>Name: <?= $staffMember['name'] ?></p>
        <p> Services: ... </p>
    </div>
   <?php

}