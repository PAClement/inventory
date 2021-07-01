<?php 
    session_start();
    //Détection des erreurs

   /* ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);*/
      
    //Connection BDD
    
    include('php/CBDD.php');
    $db = new Connection();
?>

<!DOCTYPE html>
<html>

<head>

	<?php include('includes/head.php'); ?>
	
    <!--CSS-->
    <link rel="stylesheet" href="css/resume.css">

</head>


<body>

    <?php include('includes/header.php'); ?>


	
    <?php include('includes/footer.php'); ?>

</body>

</html>

