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
				   <li class='last'><a href='opinie.php'><span>Contacteaza-ne!</span></a></li>
				   <li><a href='login.html'><span>BAZA DE DATE</span></a></li>
				</ul>
			</div>
		</div>
	</div>
</header>

<section id="container">
<?php
   include("conn.php");

function testare($data) {
   $data = trim($data); 
   $data = stripslashes($data); 
   $data = htmlspecialchars($data); 
   return $data; 
}

class Admin {
   public $id_admin;
   public $nume;
   public $parola;
}

$n = testare($_REQUEST["numeletau"]); 
$p = testare($_REQUEST["parolata"]);

if(isset($cnx)) {

   $cda= "SELECT * from admin";
   $stmt = $cnx->prepare($cda);
   $stmt->execute();
   $gasit = false;

   while ($utilizator = $stmt->fetchObject('Admin'))
    {
      if($utilizator->nume == $n && $utilizator->parola == $p) 
      {
         echo '<h1 class="italic centrat"><span class="litera italic"> S</span>unteti autorizat</h1><br />';
    echo '<form class="centrat" method="post" action="adaugare.php">';
         echo '<input type="submit" name="submit1" value="Adaugare">';
         echo '</form></center>';
         $gasit = true;
         break;
      }
   }
   if(!$gasit) 
   {
      echo '<h1 class="italic centrat"><span class="litera italic"> NU</span>aveti acces in baza de date</h1><br />';
      echo '<form class="centrat"><input type="button" value="Mai incearca" onClick="location.href=\'login.html\'"></form></center>';
   }
   $cnx = null;
}

?>
	
</section>
		
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