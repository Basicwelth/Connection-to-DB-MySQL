<?php
spl_autoload_extensions(".php"); // comma-separated list
spl_autoload_register();

use Query\Database as Request;
$data=new Request('127.0.0.1','root','root','test','3306');
$data->add($_POST['name'],$_POST['surname'],$_POST['lastname']);
echo $data->raw();
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);