<?php
require 'db_connect.php';

$deleteList = $conn->prepare("DELETE FROM task WHERE TaskId=:id");
$deleteList->execute(array(':id'=>$_POST['id']));
header('Location: http://phptodolist/tasks.php');
