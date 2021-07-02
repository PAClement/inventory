<?php 
    session_start();
    //Détection des erreurs

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Connection BDD
    
    include('CBDD.php');
    $db = new Connection();

    $id_tag = htmlspecialchars($_POST["id_tag"]);

    $_SESSION["id_tag"] = $id_tag;

    $_POST = array_map("htmlspecialchars", $_POST);

    $array_main = array();

	foreach( $_POST as $name=>$value ){
        
		$item = explode('__', $name)[0];

        if(!isset($array_main[$item])){

            $array_main[$item]=[];

        }

		array_push($array_main[$item], $value);

	}
    
    array_shift($array_main);

    $db->query("CREATE TABLE IF NOT EXISTS $id_tag (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                contain VARCHAR(30) NOT NULL,
                quantite INT(6)
        )");

	foreach($array_main as $array){

       $db->query("INSERT INTO $id_tag (contain , quantite) VALUES (?, ?)" ,array($array[0],$array[1]));

	}

    header('location:../resume');

    exit;
?>