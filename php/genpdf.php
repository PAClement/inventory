<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Dompdf\Dompdf;

include('CBDD.php');
$db = new Connection();

if(isset($_POST['id_tag'])){

    $bdd_table = htmlspecialchars($_POST['id_tag']);
    $nom_inv = htmlspecialchars($_POST['nom_inv']);

    $sql = $db->query("SELECT * FROM $bdd_table ");

    ob_start();
    require_once '../action/pdf-content.php';
    $html = ob_get_contents();
    ob_end_clean();

    require_once 'dompdf/autoload.inc.php';

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $fichier = 'Inventaire_'.$nom_inv.'.pdf';
    $dompdf->stream($fichier);
}else{
    header('location:../index');
}

?>