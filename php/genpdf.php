<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Dompdf\Dompdf;

include('CBDD.php');
$db = new Connection();

$bdd_table = htmlspecialchars($_POST['id_tag']);

$sql = $db->query("SELECT * FROM $bdd_table ");

ob_start();
require_once '../pdf-content.php';
$html = ob_get_contents();
ob_end_clean();

require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$fichier = 'Inventaire.pdf';
$dompdf->stream($fichier);

