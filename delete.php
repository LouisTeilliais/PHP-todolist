<?php
require 'db_connect.php';

if(isset($_POST['delete'])){

    $del = $_POST['delete'];

    echo $del;

    $deleteList = $conn->prepare("DELETE FROM todolist(ToDoListName) WHERE id=?");
    $delete = $deleteList->execute([$del]);

    if($delete){
        header('Location: http://php-todolist/toDoList.php');
    } else {
        header('Location: http://php-todolist/toDoList.php');
    }
} else {
    $message = "ERROR";
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
}

?>