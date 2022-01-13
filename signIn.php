<?php require('db_connect.php'); ?>
<link rel="stylesheet" href="/css/signin.css" type="text/css">
<link rel="stylesheet" href="/css/index.css" type="text/css">

<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->


<?php ob_start(); ?>
<h1>Page Sign IN</h1>
    <div id="signin">
        <h2>Sign In</h2>
        <form method="POST" action="signin.php">
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


// function CreateUser($firstname, $lastname, $email, $password){
//     $result = $conn->prepare("INSERT INTO user (UserFirstName, UserLastName, UserEmail, UserPassword) VALUES ($_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["pwd"])");
//     $result->execute();
// }

if(isset($_POST['submit'])){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    try{
        $result = $conn->prepare("INSERT INTO user (UserFirstName, UserLastName, UserEmail, UserPassword) VALUES ($firstname, $lastname, $email, $password)");
        $result->execute();
    }catch(PDOException $e){
        echo $e;
    }

}





// example from w3school

// $servername = "localhost";
// $username = "username";
// $mdp = "password";

// // Create connection
// $conn = new mysqli($servername, $username, $password);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully"; -->