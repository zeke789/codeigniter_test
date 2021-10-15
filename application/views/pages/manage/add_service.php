<?php
$this->load->helper('form');
echo validation_errors();


?>
<style>
    #d1{ padding:50px;margin:10px;border:1px solid black; }
</style>
<h2>Add new Service</h2>
<div id="d1">
   <?= form_open('servicecontroller/add') ?>
    <!-- <form action="" method="post"> -->
        <input type="text" name="sName" placeholder="service name"><br><br>
        <textarea name="sDescription" cols="30" rows="10" placeholder="description"></textarea><br><br>


        <label for="staff">Staff member in charge</label>
        <select name="" id="staff">
            <option value=""></option>
        </select><br><br>


        <label for="staff">Additional collaborators</label>
        <select name="" id="collaborators">
            <option value=""></option>
        </select><br><br>
        <input type="submit" value="Add">
    </form>
</div>
