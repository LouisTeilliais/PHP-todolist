<?php require('db_connect.php'); 
require('toDoList.php')
?>

<link rel="stylesheet" href="/CSS/tasks.css" type="text/css">
<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->

<?php ob_start(); ?>

<?php 
$listId = $id;
$tasklist = $conn->prepare("SELECT * FROM task WHERE ToDoListId =" . $listId . "\"");
$tasklist->execute(array([]));
$tasks = $tasklist->fetchAll();
print_r($tasks);
?>


<div class="task_page">
    <h1>TASKS</h1>
    <div class="add_task">
        <form action="tasks.php" method="POST" autocomplete="off">
            <input placeholder="Enter task" type="text" name="input_task"/> 
            <button type="submit" class="btn" name="add"> + Add task</button>
        </form>
    </div>
    <div class="task_item">
        <?php foreach($tasks as $task) { ?>
            <form class="message" action="deleteTask.php" method="POST">
                    <input class="id" type="hidden" name="id" value="<?php echo $task['TaskId'] ?>"/>
                    <input class="delete" type="image" src="images/poubelle.png" height="30" width="30"/>
                    <input class="check" type="checkbox">
                    <p><?php echo $task['TaskName'] ?></p>
                    <p name="todoId"><?php echo $task['ToDoListId']  ?></p>
            </form>
        <?php } ?>
    </div>
<div>

<?php

if(isset($_POST['add'])){

    $addtask = $_POST['input_task'];
    // $addid = $_POST['todoId'];

    if(empty($addtask)){
        $message = "Please enter a task";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    }  else { 
        
        $insertText = $conn->prepare("INSERT INTO task(TaskName, TaskStatut, ToDoListId) VALUE(?, ?, ?)");
        $insertTask = $insertText->execute([$addtask, "active", $listId]);

        if($insertTask){
            header('Location: http://php-todolist/tasks.php');
        }else {
            header('Location: http://php-todolist/tasks.php');
            $message = "Error votre text n'a pas été envoyé !";
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; 
        }

    }
}

?>

<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>
