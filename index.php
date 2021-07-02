<?php
	$id_tag = str_replace("." , "" , uniqid("inv_", true));
?>
<!DOCTYPE html>
<html>

<head>

	<?php include('includes/head.php'); ?>
	
    <!--CSS-->
    <link rel="stylesheet" href="css/index.css">

</head>

<body>

    <?php include('includes/header.php'); ?>
	
	<section class="index--contenus-infos">
		<div class="index--infos">
			Inventory vous donne la possibilité d'inventorier plus facilement.
			<br><br>
			Vous pouvez donc recenser le nombre d'article que vous voulez, comme par exemple le stock de votre magasin. 
			<br>Mais vous pouvez également l'utiliser à des fins personnels,
			<br> entre autres lors de vos voyages pour garder une trace du contenu de votre valise.
			<br><br>
			Grâce à Inventory vous pouvez même recevoir votre inventaire par mail ou même<br> le télécharger au format PDF pour ensuite pouvoir l'imprimer ! 
		</div>	
	</section>
	
	<div class="index--button">
		<a class="btn btn-1 btn-1a " id="sliding-link" href="#goto">Commencer votre inventaire</a>
	</div>
	<div style="position:absolute;" id="goto"></div>

	<div class="index--contain-input">	
	
	<button class="btn-ajout" onclick="fAddText()">+ Ajouter un emplacement</button>
	<button class="btn-supprimer" onclick="fDelText()">- Supprimer un emplacement</button>
	<br><br><br><br><br>

	<form id="form" action="php/saveinventaire.php" method="POST">
	<input type="hidden" name="id_tag" value="<?php echo $id_tag; ?>">
			<div id="id__1"  class="index--input-single">
				<input class="input--element" name="1__nom" type="text" placeholder="Contain" required/>
				<input class="input--quantite" name="1__quantite" type="number" placeholder="Quantité"  required/>
			</div>

			<div id="id__2"  class="index--input-single">
				<input class="input--element" name="2__nom" type="text" placeholder="Contain"  required/>
				<input class="input--quantite" name="2__quantite" type="number" placeholder="Quantité" min="0" required/>
			</div>

			<div id="id__3"  class="index--input-single">
				<input class="input--element" name="3__nom" type="text" placeholder="Contain" required/>
				<input class="input--quantite" name="3__quantite" type="number" placeholder="Quantité" min="0" required/>
			</div>

			<div id="add"></div>

			<button type="submit" class="btn-submit">Créer votre Inventaire</button>
	</form>
		<div id="add_button">
			<br><br><br><br><br>
			<button class="btn-ajout" onclick="fAddText()">+ Ajouter un emplacement</button>
			<button class="btn-supprimer" onclick="fDelText()">- Supprimer un emplacement</button>
		</div>
	</div>
	
    <?php include('includes/footer.php'); ?>

</body>

	<script>

		document.querySelector('#add_button').style.display ='none' ;
		let i = 3;

		function fAddText() {

			i = i+1;
			let contenu = document.querySelector('#add').innerHTML;
			contenu = contenu + '<div id="id__'+i+'" class="index--input-single"> <input class="input--element" name="'+i+'__nom" type="text" placeholder="Contain" required/> <input class="input--quantite" name="'+i+'__quantite" type="number" placeholder="Quantité" min="0" required/> </div>';
			document.querySelector('#add').innerHTML = contenu;
			
			if(i >= 10){
				document.querySelector('#add_button').style.display ='block' ;
			}
			return i;
		}

		function fDelText(){
	
			if(i >= 2){

				const x = document.querySelector('#id__'+i+'');
				x.remove();
				i--;
				if( i < 10 ){
					document.querySelector('#add_button').style.display ='none' ;
				}
				
				return i;
			}
		} 

	</script>

	<script>
		
		//smooth scrool
		
		$("#sliding-link").click(function(e) {
		e.preventDefault();
		var aid = $(this).attr("href");
		$('html,body').animate({scrollTop: $(aid).offset().top},'slow');
	});
	
	</script>

</html>

