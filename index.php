<link rel="stylesheet" href="/CSS/index.css" type="text/css">
<?php $title = 'To Do List'; ?>

<?php ob_start(); ?> <!-- Debut du template -->
<h1>TO DO LIST PROJECT</h1>
<h1>Page MENU</h1>
<p>LETS GO !!!</p>

<button href="signIn.php"> Sign in </button>
<a href="logIn.php"> Login </a>


<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>