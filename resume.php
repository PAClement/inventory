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

    //unset($_SESSION["id_tag"]);

    if(isset($id_tag)){

        $sql = $db->query("SELECT * FROM $id_tag ");

    }else{

       // header('location:index');
    }
   
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
            <form action="action/modif_inv.php" method="POST">
                <input type="hidden" name="id_table" value="<?php echo $id_tag; ?>"/>
                <div class="center_btn">
                    <button type="submit" class="btn btn-1 btn-1a">- Modifier votre inventaire -</button>
                </div>
            </form>
        <br>

        <button onclick="finvPDF()" class="btn btn-1 btn-1a">- Télécharger votre inventaire -</button>
        <br><br>

        <form id="form_pdf" action="php/genpdf.php" method="POST">
            <input type="hidden" name="id_tag" value="<?php echo $id_tag; ?>"/>

            <div class="btn-inv-pdf">
                <input class="input--element" name="nom_inv" type="text" placeholder="Nom de votre inventaire"  required/>
                <button type="submit" class="btn btn-2 btn-2a"> Télécharger (.pdf) </button>
            </div>

        </form>

            <!--<button class="btn btn-1 btn-1a">- Recevoir mon inventaire par mail -</button>-->
    </div>
</div>

<?php include('includes/footer.php'); ?>

</body>
<script>

    let x = 2;

    document.querySelector('#form_pdf').style.display = 'none';
    
        function finvPDF(){
            if(x%2 == 0){
                document.querySelector('#form_pdf').style.display = 'block';
                document.querySelector('#form_pdf').animate([

                { transform: 'translateY(-60px)' },
                { transform: 'translateY(0px)' }
                ], {
            
                duration: 750,
                iterations: 1
                });
                x = x+1;
            }else{
                
                document.querySelector('#form_pdf').animate([

                { transform: 'translateY(0px)' },
                { transform: 'translateY(-60px)' }
                ], {
         
                duration: 750,
                iterations: 1
                });

                setTimeout(function(){
                    document.querySelector('#form_pdf').style.display = 'none';
                },730);
                
                x = x-1;
            }
        }

</script>
</html>

