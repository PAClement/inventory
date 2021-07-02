<?php 
    session_start();
    //Détection des erreurs

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
      
    //Connection BDD
    
    include('php/CBDD.php');
    $db = new Connection();

    $id_tag = $_SESSION["id_tag"];

    $sql = $db->query("SELECT * FROM $id_tag ");
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

    <div class="resume--table">
        <table>
            <caption>Récapitulatif de votre inventaire</caption>
                <tr>
                    <th scope="col">CONTAIN</th>
                    <th scope="col">QUANTITÉ</th>
                </tr>
        
            <?php while($req = $sql->fetch()):?>

                <tr>
                    <td><?= $req['contain'] ?></td>
                    <td><?= $req['quantite'] ?></td>
                </tr>
                    
            <?php endwhile; ?>
        </table>
        
        <div class="resume--load">
            <button class="btn btn-1 btn-1a">- Modifier mon inventaire -</button>
            <br><br><br><br>

            <form action="php/genpdf.php" method="POST">
                <input type="hidden" name="id_tag" value="<?php echo $id_tag ; ?>">
                <button type="submit" class="btn btn-1 btn-1a">- Télécharger mon inventaire (.pdf) -</button>
            </form>

                <button class="btn btn-1 btn-1a">- Recevoir mon inventaire par mail -</button>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

</body>

</html>

