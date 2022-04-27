<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>Document</title>
</head>

<body>
<div class="w3-bar w3-black">
  <a href="index.php?page=vypisProduktu" class="w3-bar-item w3-button">Výpis produktů</a>
  <a href="index.php?page=pridaniProduktu" class="w3-bar-item w3-button">Přidat produkt</a>
<?php
 if(!isset($_SESSION["userId"])) { 
?>
  <a href="index.php?page=login" class="w3-bar-item w3-button w3-right">Přihlášení</a>
<?php
 } else {
	 ?>
	   <a href="index.php?page=logout" class="w3-bar-item w3-button w3-right">Odhlásit se</a>
<?php
 }
?>
</div>

<?php
	$allowed = ["vypisProduktu", "pridaniProduktu", "login", "logout"];

	$page = "vypisProduktu";
	if(isset($_GET["page"])) {
		$page = $_GET["page"];
	}

	
	if(in_array($page, $allowed)) {
		include $page . ".php";
	} else {
		echo "Stránka nebyla nalezena<br>";
		echo "<a href='index.php?page=vypisProduktu'>Zpět na hlavní stránku</a>";
	}
	
?>

</body>

</html>