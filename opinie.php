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
							<li class='active'><a href='archive.html'><span>Articole</span></a>

							</li>
							<li class='last'><a href='opinie.php'><span>Contacteaza-ne!</span></a></li>
							<li><a href='login.html'><span>BAZA DE DATE</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>

		<section id="container">
			<div class="zerogrid">
				<div class="wrap-container clearfix">
					<div id="main-content">
						<div class="wrap-content">
							<div class="crumbs">
								<ul>
									<li><a href="index.html">Acasa</a></li>
									<li><a href="contact.html">Despre noi</a></li>
								</ul>
							</div>
							<h1 class="entry-title">Contacteaza-ne!</h1>
							<article>
								<div class="art-header">
									<div class="embed-container maps">
										<style>
										#map {
											height: 400px;
											width: 100%;
										}
									</style>
								</head>
								<body>
									<h3>Lorelai Boutique</h3>
									<div id="map"></div>
									<script>
										function initMap() {
											var uluru = {lat: 46.795944 , lng: 23.626204};
											var map = new google.maps.Map(document.getElementById('map'), {
												zoom: 4,
												center: uluru
											});
											var marker = new google.maps.Marker({
												position: uluru,
												map: map
											});
										}
									</script>
									<script async defer
									src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1Ogl1pPP09p2msBoEFBo1kiSkkG-czvo &callback=initMap">
								</script>
							</body>
						</div>
					</div>
					<div class="art-content">
						<div class="row">
							<div class="col-1-3">
								<div class="wrap-col">
									<h3>Informatii de contact</h3>
									<span style="color: #eee;">Suntem aici pentru dumneavoastra!</span>
									<p>Suntem deschisi pentru dumneavoastra de luni pana vineri, intre orele 8:00-18:00</p>
									<p>Bulevardul Muncii, nr 103-105 <br>
									Cluj-Napoca, Cluj, Romania</p>
									<p>0746323999<br>
									0264323999</p>
									<p>lorelai@gmail.com.com</p>
								</div>
							</div>
							<div class="col-2-3">
								<div class="wrap-col">
									<div class="contact">
										<main>
											<h1 class="italic centrat"><span class="litera italic">I</span>mpresii</h1><br />
											<form name="formular" method="post" action="introducere.php" class="centrat">
												<table class="login centrat">
													<tr>
														<td>Numele:</td>
														<td><input type="text" name="nume" size=53></td>
													</tr>
													<tr>
														<td>Prenumele:</td>
														<td><input type="text" name="prenume" size=53></td>
													</tr>
													<tr>
														<td>E-mail:</td>
														<td><input type="text" name="email" size=53></td>
													</tr>

													<tr>
														<td>Impresia:</b></td>
														<td><textarea name="mesaj" rows=5 cols=43></textarea></td>
													</tr>
													<tr>
														<td colspan = "2">
															<input type="submit" style="float:left;"
															value="Introduceti impresia proprie...">
															<input type="reset" style="float:right;" value="Stergeti datele introduse...">
														</td>
													</tr>
												</table>
											</form>
											<br>
											<a href="vizite.php">Impresii ale clientilor</a>
											

										</main> 
									</div>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
</section>

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