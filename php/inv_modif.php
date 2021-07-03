<?php 
    session_start();
    //Détection des erreurs

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Connection BDD
    
    include('CBDD.php');
    $db = new Connection();

    
    if(isset($_POST['id_table'])){
        
        $id_tag = htmlspecialchars($_POST["id_table"]);

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

        foreach($array_main as $array){

        $db->query("UPDATE $id_tag SET contain = ? , quantite = ? WHERE id = ?" ,array($array[1],$array[2], $array[0]));

        }

        header('location:../resume');

        exit;

    }else{

        header('location:../index');

    }
    
?>