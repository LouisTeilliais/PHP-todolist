<?php require('db_connect.php'); ?>

<link rel="stylesheet" href="/CSS/todolist.css" type="text/css">
<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->

<?php ob_start(); ?>

<?php 
$todolist = $conn->prepare("SELECT * FROM todolist"); 
$todolist->execute();
$todos = $todolist->fetchAll();

$ownerId;
$user = $conn->prepare("SELECT UserId FROM user WHERE UserToken = ?");
$user->execute([$_COOKIE['user_session']]);
$result = $user->fetch(PDO::FETCH_ASSOC);
foreach($result as $userId){
    $ownerId = $userId;
}

?>

<div class="main-body">
    <div class="add-post">
        <h1>TO DO LIST</h1>
        <form action="toDoList.php" method="POST" autocomplete="off">
            <input placeholder="Enter text" type="text" name="input_text"/> 
            <button type="submit" class="btn" name="create"> + Create new</button>
        </form>
    </div>
    <?php foreach($todos as $todo) { ?>
        <div class="todo-item">
            <form id="collaborator" method="POST" action="toDoList.php">
                <input type="email" class="guestMail" name="guestMail" required/>
                <input class="collaborator" type="submit" class="collaborator" name="colab"/>
            </form>
            <form class="message" action="deleteToDoList.php" method="POST">
                <input class="id" type="hidden" name="id" value="<?php echo $todo['ToDoListId'] ?>"/>
                <input class="delete" type="image" src="images/poubelle.png" height="30" width="30"/>
                
                <p><?php echo $todo['ToDoListName'] ?></p>
            </form>
            <form class="taches" action="tasks.php" method="POST">
                <button type="submit" class="btn" name="tache"> + Ajout tâches</button>
            </form>
        </div>
    <?php } ?>
<div>
    
<?php

if(isset($_POST['create'])){

    $text = $_POST['input_text'];

    if(empty($text)){
        $message = "Please enter a value";
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    } else{
        $insertText = $conn->prepare("INSERT INTO todolist(ToDoListName, OwnerId) VALUE(?, ?)");
        $insert = $insertText->execute([$text, $ownerId]);

        if($insert){
            header('Location: http://phptodolist/toDoList.php');
        } else {
            header('Location: http://phptodolist/toDoList.php');
            $message = "Error votre text n'a pas été envoyé !";
            echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; 
        }
    }
} 

?>

<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php');?>



