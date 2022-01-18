<?php require('db_connect.php'); ?>

<link rel="stylesheet" href="/CSS/tasks.css" type="text/css">
<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->

<?php 
$todolist = $conn->prepare("SELECT * FROM todolist"); 
$todolist->execute();
$todos = $todolist->fetchAll();
?>

<?php ob_start(); ?>
<div class="task_page">
    <h1>TASKS</h1>
    <?php foreach($todos as $todo) { ?>
        <div class="tasks">
            <p><?php echo $todo['ToDoListName'] ?></p>
        </div>
    <?php } ?>
<div>



<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>