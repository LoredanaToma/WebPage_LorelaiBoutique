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
	<?php 
include "header.php";
?>
	<main>
		<h1 class="italic centrat"><span class="litera italic">I</span>mpresii
			ale vizitatorilor</h1><br />
			<?php
			include("conn.php");
			
			class Vizitatori {
   public $id;  
   public $Nume;
   public $Prenume;
   public $Email;
   public $Mesaj;
}

if(isset($cnx)) {
	$cda = "SELECT * FROM vizitatori ORDER BY id DESC";
	$stmt = $cnx->prepare($cda);
	$stmt->execute();
	echo "<table style=\"width:100%; \">";
      $i=1; //  Contor de linii
      while ($vizit = $stmt->fetchObject('vizitatori')) {
      	if ($i%2==0) {
      		echo "<tr style=\"background-color:#cccccc; \"><td>";
      	}
      	else {
      		echo "<tr style=\"background-color:#a0a0a0; \"><td>";
      	}
      
      	echo $vizit->id; echo ".    ";
      	echo $vizit->Nume; echo "    ";
      	echo $vizit->Prenume; echo "  --  ";
      	echo $vizit->Email;
      	echo "<br /><br />";
      	echo $vizit->Mesaj;
      
      	echo "</td></tr>";
      	echo "<tr><td> </td></tr>";
      	$i++;
      }
      $cnx = null;
  }
  ?>
	
</body></html>