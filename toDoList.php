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
        <form action="add.php" method="POST" autocomplete="off">
            <input type="text" name="input_text"/> 
            <button type="submit" class="btn"> + Create new</button>
        </form>
    </div>
    <?php foreach($todos as $todo) { ?>
        <div class="todo-item">
        <input type="checkbox">
        <form action="delete.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $todo['ToDoListId'] ?>"/>
            <input type="submit" value="Delete">
            <h2><?php echo $todo['ToDoListName'] ?></h2>
        </form>
        </div>
    <?php } ?>
<div>



<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php');?>



