<?php require('db_connect.php'); ?>
<link rel="stylesheet" href="/css/signin.css" type="text/css">
<link rel="stylesheet" href="/css/index.css" type="text/css">

<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->


<?php ob_start(); ?>
    <div id="signin">
        <h2>Sign In</h2>
        <form method="POST" action="signin.php" id="form">
            <input type="text" placeholder="FirstName" name="firstname" required>
            <input type="text" placeholder="LastName" name="lastname" required>
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Password" name="pwd" required>
            <input type="submit" value="Sign in" name="submit">  
        </form>
    </div>
<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>


<?php

if(isset($_POST['submit'])){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['pwd'], PASSWORD_BCRYPT);

    try{
        $result = $conn->prepare("INSERT INTO user (UserFirstName, UserLastName, UserEmail, UserPassword) VALUES (?, ?, ?, ?);");
        $result->execute(array($firstname, $lastname, $email, $password));
    }catch(PDOException $e){
        echo $e;
    }

}