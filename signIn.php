<link rel="stylesheet" href="/css/signin.css" type="text/css">
<link rel="stylesheet" href="/css/index.css" type="text/css">

<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->


<?php ob_start(); ?>
<h1>Page Sign IN</h1>
    <div id="signin">
        <h2>Sign In</h2>
        <form method="POST" action="signin.php">
            <input type="text" placeholder="FirstName" name="firstname">
            <input type="text" placeholder="LastName" name="lastname">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="pwd">
            <input type="submit" value="Sign in">  
        </form>
    </div>
<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>


<?php
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