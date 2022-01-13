<?php require('db_connect.php'); ?>

<link rel="stylesheet" href="/css/todolist.css" type="text/css">
<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->

<?php ob_start(); ?>
<h1>Page TO DO LIST</h1>


<?php 
$todolist = $conn->prepare("SELECT * FROM todolist"); 
$todolist->execute();
$todos = $todolist->fetchAll();
?>

<div class="main-body">
    <div class="add-post">
        <form action="toDoList.php" method="POST" autocomplete="off">
            <input type="text" name="input_text"/> 
            <button type="submit" class="btn" name="create"> + Create new</button>
        </form>
    </div>
    <?php foreach($todos as $todo) { ?>
        <div class="todo-item">
            <form action="delete.php" method="POST" autocomplete="off">
                <input type="checkbox">
                <button type="submit" name="delete" class="btn">Delete</button>
                <h2><?php echo $todo['ToDoListName'] ?></h2>
                
            </form>
        </div>
    <?php } ?>
<div>
    
<?php
if(isset($_POST['create'])){

    $text = $_POST['input_text'];

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
} 

?>

<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php');?>



