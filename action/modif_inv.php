<?php 
    session_start();
    //Détection des erreurs

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
      
    //Connection BDD
    
    include('../php/CBDD.php');
    $db = new Connection();

    if(isset($_POST['id_table'])){

        $id_tag = htmlspecialchars($_POST['id_table']);
        $sql = $db->query("SELECT * FROM $id_tag ");

        $i = 0;

    }else{

        header('location:../index');
    }
   
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventory - Faites votre inventaire</title>

	<!--CSS-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">

    <!--Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">

    <!--CSS-->

    <link rel="stylesheet" href="../css/resume.css">

</head>
<body>

<nav>
	<div class="header--title">INVEN<span style="color:white;">TORY</span> </div>
	<div class="header--slogan">- Faites votre inventaire en toute simplicité ! -</div>
	<div class="header--hr"></div>
</nav>

<div class="resume--table">
    <table>
        <caption>Modification de votre inventaire</caption>
            <tr>
                <th scope="col">CONTAIN</th>
                <th scope="col">QUANTITÉ</th>
            </tr>
        <form action="../php/inv_modif.php" method="POST">
        <input type="hidden" name="id_table" value="<?php echo $id_tag; ?>"/>
            <?php while($req = $sql->fetch()):?>
            <?php $i = $i+1; ?>
                <tr>
                    <input type="hidden" name="<?php echo $i; ?>__id" value="<?= $req['id'] ?>"/>
                    <td><input class="input--element" name="<?php echo $i; ?>__nom" type="text" placeholder="Contain" value="<?= $req['contain'] ?>" required/></td>
                    <td><input class="input--quantite" name="<?php echo $i; ?>__quantite" type="number" placeholder="Quantité" min="0" value="<?= $req['quantite'] ?>" required/></td>
                </tr>
                    
            <?php endwhile; ?>
    </table>
        
    <div class="resume--load">
            <button type="submit" class="btn btn-1 btn-1a">- Modifier -</button>
        <br><br><br><br>
    </div>
        </form>
</div>

</body>
</html>

