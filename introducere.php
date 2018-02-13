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
    	<link rel="stylesheet" href="css/style.css">
    	<link rel="stylesheet" href="css/menu.css">
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
<section>
	<main>
		<?php
		function testare($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$nume=testare($_REQUEST["nume"]);
		$prenume=testare($_REQUEST["prenume"]);
		$email=testare($_REQUEST["email"]);
		$mesaj=testare($_REQUEST["mesaj"]);

		include("conn.php");
		if(isset($cnx)) {

			$cda = "INSERT INTO vizitatori (id, nume,prenume, email, mesaj)VALUES ('', :nume,:prenume, :email, :mesaj)";
			$stmt = $cnx->prepare($cda); 
			$stmt->bindParam(':nume', $nume, PDO::PARAM_STR);
			$stmt->bindParam(':prenume', $prenume, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':mesaj', $mesaj, PDO::PARAM_STR);
			$stmt->execute(); 

			echo "<p class=\"inserare centrat\">"; 
			echo "<h1 class=\"italic centrat\"><span class=\"litera italic\">$nume $prenume</span><br /> Mesajul dv. s-a adaugat in cartea noastra de oaspeti<br /><br /> Va multumim!</h1><br />";

			echo "<br /><br /><br /><br />";
			echo "Puteti citi <a href=\"vizite.php\">Alte impresii despre site </a>";
			echo "sau puteti completa un alt <a href=\"opinie.php\">Formular cu impresii</a></p>";
			echo "sau <a href=\"index.html\">Acasa</a></p>";
			$cnx = null;
		}
		?>
</section>>


<!--////////////////////////////////////Footer-->
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
					<li><a href="#">Potitica privata</a></li>
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
<!-- Google Map -->
<script>
	$('.maps').click(function () {
		$('.maps iframe').css("pointer-events", "auto");
	});

	$( ".maps" ).mouseleave(function() {
		$('.maps iframe').css("pointer-events", "none"); 
	});
</script>


</div>
</body></html>