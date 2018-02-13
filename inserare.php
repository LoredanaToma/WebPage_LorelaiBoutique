<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Lorelai Boutique</title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | zerotheme.com">
	<meta name="author" content="http://www.zerotheme.com">
	
    <!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/lightbox.css">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	<script src="js/jquery1111.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
	
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
    
</head>
<body>
<div class="wrap-body">

<!--////////////////////////////////////Header-->
<header >
	<div class="zerogrid">
		<div class="wrap-header">
			<div class="logo t-center"><a href="index.html"><img src="images/logo.png"/></a></div>	
			<div id='cssmenu' class="align-center">
		<ul>
					<li class="active"><a href='index.html'><span>Acasa</span></a></li>
					<li><a href='single.html'><span>Despre noi</span></a></li>
					<li><a href='gallery.html'><span>Galerie </span></a></li>
					<li class='active has-sub'><a href='archive.html'><span>Articole</span></a>
					 
				   </li>
				   <li class='last'><a href='opinie.php.html'><span>Contacteaza-ne!</span></a></li>
				   <li><a href='login.html'><span>BAZA DE DATE</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</header>

<section id="container">
	<?php
	function testare($data) {
		$data = trim($data); 
		$data = stripslashes($data); 
		$data = htmlspecialchars($data); 
		return $data; 
	}
	if (testare($_FILES["fisier"]["error"]) > 0) {
		echo "Error: " . $_FILES["fisier"]["error"] . ""; 
		exit; 
	}
	if (testare($_FILES["mare"]["error"]) > 0) {
		echo "Error: " . $_FILES["mare"]["error"] . "";
		exit; 
	}
	$numeimagine = testare($_FILES["fisier"]["name"]); 
	$poz = strrpos($numeimagine, "."); 
	$extensie = substr ($numeimagine, $poz); 
	$nmtmp = $_FILES["fisier"]["tmp_name"]; 
	$numeimaginemare = testare($_FILES["mare"]["name"]); 
	$pozm = strrpos($numeimaginemare, "."); 
	$extensiem = substr ($numeimaginemare, $pozm); 
	$nmtmpm = $_FILES["mare"]["tmp_name"]; 
	$categoria = testare($_REQUEST["combo"]); 
	$nume = testare($_REQUEST["nume"]); 
	$prezentare = testare($_REQUEST["prez"]); 
	$pretul = testare($_REQUEST["pret"]);

	include("conn.php");
	if(isset($cnx)) {
		$cda= "INSERT INTO produse (id_produs, fisier_imagine, imagine_mare, id_categ, nume_produs, prezentare, pret) VALUES (null, :numeimagine, :numeimaginemare, :idcateg, :numeprod, :prez, :pret)";
		$stmt = $cnx->prepare($cda); 
		$stmt->bindParam(':numeimagine', $numeimagine, PDO::PARAM_STR);
		$stmt->bindParam(':numeimaginemare', $numeimaginemare, PDO::PARAM_STR);
		$stmt->bindParam(':idcateg', $categoria, PDO::PARAM_STR); 
		$stmt->bindParam(':numeprod', $nume, PDO::PARAM_STR); 
		$stmt->bindParam(':prez', $prezentare, PDO::PARAM_STR);
		$stmt->bindParam(':pret', $pretul, PDO::PARAM_STR);
   // se foloseste PARAM_STR chiar si pentru numere 
		$stmt->execute(); 
   // Preiau ID-ul pozei introduse in baza si construiesc un nou nume 
		$id = $cnx->lastInsertId(); 
		$numeimaginenou = "imagine".$id.$extensie; 
		$numeimaginemarenou = "imagine".$id."M".$extensie; 
		$cda = "UPDATE produse SET fisier_imagine='$numeimaginenou' WHERE id_produs = $id";
		$stmt = $cnx->prepare($cda); 
		$stmt->execute();
   // Construiesc calea pe care sa incarc fisierul 
		$cale = "images/$numeimaginenou"; 
		$rezultat = move_uploaded_file($nmtmp, $cale); 
		if (!$rezultat) { 
			echo "Eroare la incarcarea fisierului"; 
			exit; 
		} 
		$cda = "UPDATE produse SET imagine_mare='$numeimaginemarenou' WHERE id_produs = $id";
		$stmt = $cnx->prepare($cda); 
		$stmt->execute(); 
		$calem = "images/$numeimaginemarenou"; 
		$rezultat = move_uploaded_file($nmtmpm, $calem); 
		if (!$rezultat) { 
			echo "Eroare la incarcarea fisierului"; 
			exit; 
		}
	}

		echo "<p class=\"inserare centrat\">";
		echo "<h1 class=\"italic centrat\"><span class=\"litera italic\">P</span>rodusul<br />s-a adaugat in baza de date</h1><br />";
		echo "<form class=\"centrat\"><input type=button value=\"Alt produs\"onClick=\"location.href='adaugare.php'\">";
		echo "<input type=button value=\"Home\" onClick=\"location.href='index.html'\"></form>";
		echo "</p><br /><br />";
		echo "<p class=\"inserare centrat\">Numele vechi al fisierului: $numeimagine</p>";
		echo "<p class=\"inserare centrat\">Numele vechi al fisierului mare:   $numeimaginemare</p>";
		echo "<p class=\"inserare centrat\">Categoria fisierului: $categoria</p>";
		echo "<p class=\"centrat inserare\">Noul nume al fisierului: $numeimaginenou</p>";
		echo "<p class=\"inserare centrat\">Imaginea mare: $numeimaginemarenou</p>"; 
		$cnx = null;

		?>
</section>
<footer class="t-center">
	<div class="wrap-footer">
		<div class="zerogrid">
			<div class="row">
				<span class="phone">Telefon: 0746323999</span>
				<ul class="bottom-social">
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
				</ul>
				<ul class="quick-link">
					<li><a href="#">Politica privata</a></li>
					<li><a href="#">Termeni de folosinta</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="bottom-footer">
		<div class="zerogrid">
			<div class="row">
				<div class="copy-right">
					<p>Copyright @ Loredana Toma - <a href="http://www.zerotheme.com" target="_blank" rel="nofollow">Free Html5 Templates</a> designed by ZEROTHEME</p>
				</div>
			</div>
		</div>
	</div>
</footer>

<script src="js/lightbox-plus-jquery.min.js"></script>

<script type="text/javascript">
    $(function() {
		if ($.browser.msie && $.browser.version.substr(0,1)<7)
		{
		$('li').has('ul').mouseover(function(){
			$(this).children('ul').css('visibility','visible');
			}).mouseout(function(){
			$(this).children('ul').css('visibility','hidden');
			})
		}

		/* Mobile */
		$("#menu-trigger").on("click", function(){
			$("#menu").slideToggle();
		});

		// iPad
		var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if (isiPad) $('#menu ul').addClass('no-transition');      
    });          
</script>


</div>
</body></html>