<link rel="stylesheet" href="/CSS/index.css" type="text/css">
<?php $title = 'Notre site web'; ?>  <!-- Debut du template -->

<?php ob_start(); ?>
<h1>Page TASKS</h1>




<?php $content = ob_get_clean(); ?> <!-- Fin du template -->

<?php require('template.php'); ?>