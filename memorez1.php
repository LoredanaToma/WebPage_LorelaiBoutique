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

<?php 
session_start();
include "header.php";
?>
<section id="container">
   <?php 
    include("conn.php");
    function testare($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
    }

   class Clienti {
    public $cnp;
    public $parola;
    public $nume;
    public $prenume;
    public $oras;
    public $adresa;
    public $telefon;
    public $email;
  }

 $cos = testare($_REQUEST['coscump']);
 $nume = testare($_REQUEST["num"]);
 $pw = testare($_REQUEST["pw"]);  //  Parola

 if(isset($cnx)) {
    $cda = "SELECT * FROM clienti";
    $stmt = $cnx->prepare($cda);
    $stmt->execute();
    //  Caut clientul in tabelul clienti

  $interogare = $cnx->prepare("SELECT * FROM clienti");
    $interogare->execute();
    $codcli = 0;
    while ($cli = $stmt->fetchObject('Clienti')) {
      if (strtoupper ($nume) == strtoupper ($cli->nume) && md5($pw) == $cli->parola) {
        $codcli = $cli->cnp;  //  Preiau val. cheii primare
        break;
      }
  }
  if($codcli != 0) {
    // Inserez articole in tabelul comenzi
    $articole = explode(',',$cos);
    foreach ($articole as $item) {
      // Caut produsul in baza de date dupa $item
            date_default_timezone_set('Europe/Bucharest');
            $data = date('Y-m-d'); // data in format aaaa-ll-dd
            $interogare1 = $cnx->prepare("INSERT INTO comenzi VALUES
                (NULL, '$codcli', '$item', '1', '$data')");
            $interogare1->execute();
        }
        echo '<h1 class="italic centrat"><span class="litera italic">C</span>';
   echo 'omanda preluata pentru <span class="litera italic">'.$nume.'</span> <br />Un operator va va contacta telefonic pentru confirmare.';
   echo ' <br />Va multumim!</h1><br />';
        // Golesc cosul memorat in $_SESSION['cos_cumparaturi']
    unset($_SESSION['cos_cumparaturi']);
  } else {
        echo '<h1 class="italic centrat">';
        echo 'Nume utilizator sau parola eronata!</h1>';
        echo '<br /><input id="btn" type="button" value = "Reintroduc datele" ';
        echo 'onclick="return fclick()" /<<br />';
  }
  $cnx = null;
}
?>
<br /><br />
<script language="javascript" type="text/javascript">
   function fclick() 
   {
    window.location.href = "finalizez.php";
  }
</script>
</section>
</div>
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