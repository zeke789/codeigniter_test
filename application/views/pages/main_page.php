<?php

if( isset($allServices) ){ ?>
    <table><th>ID</th><th>Name</th><th>Description</th> <th>Staff</th> <?php
    foreach ($allServices as $s){ ?>
        <tr>
            <td> <?= $s['id'] ?></td>
            <td> <a href=" <?= base_url() ?>services/view/<?= $s['id'] ?>" ><?= $s['name'] ?></a> </td>
            <td> <?= $s['description'] ?></td>
            <td><a href="<?= base_url() . "manage/staff/" . $s['staff_id'] ?>"><?= $s['staffName'] ?></a>  </td>
        </tr><?php
    }
    echo "</table>";
    echo $links;
//    /echo $this->pagination->create_links();
}


if( isset($getService) ){ ?>
    <div style="margin:20px">
        <h3>Service: <?=  $getService['name'] ?></h3>
        <p><b>id </b><?=  $getService['id'] ?></p>
        <p> <b>description</b> <?=  $getService['description'] ?></p>
        <p><b>staff:</b> <a href="<?= base_url() . "manage/staff/" .$getService['staff_id'] ?>"><?= $getService['staffName'] ?> </a> </p>
        <p><b>contributors id</b> <?=  $getService['contributors_id'] ?></p>
    </div>
<?php
} ?>
<script>
    var makeTable = function(data){
        var resp = JSON.parse(data);
        var services = resp.allServices;
        // iterate and make table
    };
    var getServices = function(){
        var http = new XMLHttpRequest();
        var page = document.getElementsByClassName('page-link-active');
        if(page !== undefined){
            page = parseInt(page[0].innerHTML)+1;
        }else{
            page = 1;
        }
        var url = '/codeigniter/servicess/'+page;
        var params = 'page='+page;
        http.open('POST', url, true);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                makeTable(http.responseText);
            }
        }
        http.send(params);
    };
    var btns = document.getElementsByClassName('btnPages');
    for(var i = 0; i< btns.length; i++){
        btns[i].addEventListener('click',function(e){
           // e.preventDefault();
           // getServices();
        })
    }
</script>
