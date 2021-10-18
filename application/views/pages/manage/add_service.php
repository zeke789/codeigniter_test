<?php
$this->load->helper('form');
echo validation_errors();
?>
<style>
    #d1{ padding:50px;margin:10px;border:1px solid black; }
</style>

<h2>Add new Service</h2>
<?php
if(isset($success)){ ?>
    <h4 style="color:green;border: 1px solid greenyellow;padding:5px;margin:5px">Servico Agregado</h4>
<?php
}
?>
<div id="d1">
    <?= form_open('servicecontroller/add') ?>
    <!-- <form action="" method="post"> -->
        <input type="text" name="sName" placeholder="service name"><br><br>
        <textarea name="sDescription" cols="30" rows="10" placeholder="description"></textarea><br><br>

        <label for="staff">Staff member in charge</label>
        <select name="staff" id="staff">
            <option value="" selected disabled>Choose Staff</option>
            <?php foreach($staff as $s){ ?>
                <option value="<?= $s['id'] ?>"><?= ucwords($s['name']) ?></option> <?php
            } ?>
        </select><br><br>

        <label for="staff">Additional collaborators</label>
        <select name="collaborators" id="collaborators">
            <option value="" selected>Select collaborator</option>
            <?php
            foreach($contributors as $c){ ?>
                <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option> <?php
            }
            ?>
        </select><br><br>
        <input type="submit" value="Add">

    </form>

</div>
