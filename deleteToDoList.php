<?php
require 'db_connect.php';

$deleteList = $conn->prepare("DELETE FROM todolist WHERE ToDoListId =:id");
$deleteList->execute(array(':id'=>$_POST['id']));
header('Location: http://phptodolist/toDoList.php');
