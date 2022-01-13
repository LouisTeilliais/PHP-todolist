<?php
require 'db_connect.php';

if(isset($_POST['delete'])){
    try{
        $del = $_POST['delete'];

        if(empty($text)){
            $message = "Veuillez mettre du text";
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
        } else{
            $deleteList = $conn->prepare("DELETE FROM todolist(ToDoListName) WHERE id=?");
            $delete = $deleteList->execute([$del]);
        }

        if($delete){
            header('Location: http://php-todolist/toDoList.php');
        } else {
            header('Location: http://php-todolist/toDoList.php');
        }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


// if(isset($_POST['delete'])){
//     try{
//         $del = $_POST['delete'];
//         $deleteList = $conn->prepare("DELETE FROM INSERT INTO todolist(ToDoListName) WHERE id=?");
//         $deleteList->execute([$del]);
    
// }
