<?php
require 'db_connect.php';

if(isset($_POST['input_text'])){

    $text = $_POST['input_text'];

    echo $text;

    if(empty($text)){
        $message = "Veuillez mettre du text";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    } else{
        $insertText = $conn->prepare("INSERT INTO todolist(ToDoListName) VALUE(?)");
        $insert = $insertText->execute([$text]);

        if($insert){
            header('Location: http://php-todolist/toDoList.php');
        } else {
            header('Location: http://php-todolist/toDoList.php');
            $message = "Error votre text n'a pas été envoyé !";
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; 
        }
    }

} else {
    $message = "Veuillez mettre du text";
    echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
}

?>