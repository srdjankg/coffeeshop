<?php
	$conn = mysqli_connect("localhost", "root", "", "online-shop");
    if(!$conn){
        die ('Failed to connect to MySQL: ' .mysqli_connect_error());
    }

    $id = @$_GET['id'];
	$sql = "SELECT * from products 
        where ProductID = ".$id;

	$query = mysqli_query($conn, $sql);

    if(!$query){
        die ('SQL Error: ' .mysqli_error($conn));
    }
	
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html ; charset=UTF-8">
    <meta name="viewport" content="user-scalable=yes, initial-scale=1, maximum-scale=3, minimum-scale=1, width=device-width" />
	<title>Galerija</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/slick/slick.min.js"></script>
    <script src='js/jquery_zoom/jquery-1.8.3.min.js'></script>
	<script src='js/jquery_zoom/jquery.elevatezoom.js'></script>
	<script src="js/js.js"></script>
</head>
<body>
    <header>
        <div class="head">
            <div class="logoHead">
                <div class="logoName">
                    <a href="index.html">
                        <span><img src="images/logo.png"></span>
                    </a>
                </div>
                <div class="headRight">
                    <span>
                        <p>
                            <span>
                                <a href="http://www.facebook.com"><img src="images/facebook.png" width="36"></a>&ensp;
                                <a href="http://www.instagram.com"><img src="images/instagram.png" width="36"></a>&emsp;
                            </span>
                            <span class="log">
                                <a href=""><img src="images/sign.png" height="22px" width="28px">&nbsp;Ulogujte se &nbsp;/&nbsp;</a>
                                <a href=""> <img src="images/reg.png" height="22px" >&nbsp;Registrujte se</a>
                            </span>
                        </p>
                            <span>
                                <select id="currency" onchange="changeCurrency()">
                                    <option value="din" selected>Cene: RSD Dinar</option>
                                    <option value="eur">Cene: EUR Euro</option>
                                </select>
                            </span>
                    </span>
                </div>
            </div>
            <div class="navigation">
                <ul>
                    <a href="index.php">
                        <li>POČETNA</li>
                    </a>
                    <a href="slike.php">
                        <li class="active">SLIKE</li>
                    </a>
                    <a href="cvece.php">
                        <li>CVEĆE</li>
                    </a>
                    <a href="index.php">
                        <li>O NAMA</li>
                    </a>
                    <a href="kontakt.php">
                        <li>KONTAKT</li>
                    </a>
                </ul>
                <div class="handle" onclick="myFunction(this)">MENU
                    <div class="menuIcon">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="allProducts">
            <div class="picDetails">
                <div class="leftDet">
					<div class="productImage">
						<span><img id="myImg" class="selected" src="images/velike/<?php echo $row['ProductCategoryID']?>/<?php echo $row['ProductImage']?>" data-zoom-image="images/velike/<?php echo $row['ProductCategoryID']?>/<?php echo $row['ProductImage']?>"/></span>
						<span><img id="myImg1" class="" src="images/velike/<?php echo $row['ProductCategoryID']?>/zima1r.jpg" data-zoom-image="images/velike/<?php echo $row['ProductCategoryID']?>/zima1r.jpg"/></span>
					</div>
					<div class="smallImages">
						<img id="small1" class="selected" src="images/velike/<?php echo $row['ProductCategoryID']?>/<?php echo $row['ProductImage']?>" data-zoom-image="images/velike/<?php echo $row['ProductCategoryID']?>/<?php echo $row['ProductImage']?>"/>
						<img id="small2" class="" src="images/velike/<?php echo $row['ProductCategoryID']?>/zima1r.jpg" data-zoom-image="images/velike/<?php echo $row['ProductCategoryID']?>/zima1r.jpg"/>
					</div>			
                </div>
                <div class="rightDet">
                    <h1><?php echo $row['ProductName']?></h1>
                    <span><p>Na sve ONLINE porudžbine odobravamo popust u iznosu od 10%! Popust Važi za proizvode koji nisu na akciji!</p></span>
                    <span id="stara">Osnovna cena:  <?php echo $row['ProductPrice']+2600?> din</span><br>
                    <span id="trCena"><?php echo $row['ProductPrice']?> din</span><br>
                </div>
                <div id="myModal" class="modal">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                </div>
            </div>
        </div>
                <div class="productDet">
                    <span>afasfh aifioasdjfasigf<br>
                    afasfh aifioasdjfasigf<br>
                    afasfh aifioasdjfasigf<br>
    
                    afasfh aifioasdjfasigf<br>
                    afasfh aifioasdjfasigf</span>
                </div>
        <div id="map"></div>
        <script>
		  	var modal = document.getElementById('myModal');
			var img = document.getElementById('myImg');
			var img1 = document.getElementById('myImg1');
			var modalImg = document.getElementById("img01");
			var captionText = document.getElementById("caption");
			img.onclick = function () {
				document.body.style.overflow = "hidden";
				modal.style.display = "block";
				modalImg.src = this.src;
			}
			img1.onclick = function () {
					document.body.style.overflow = "hidden";
					modal.style.display = "block";
					modalImg.src = this.src;
			}
			modalImg.style.zoom = "100%";
			modalImg.onclick = function(){
				if(modalImg.style.zoom == "100%"){
					modalImg.style.cursor = "zoom-out";
					modalImg.style.width= "170%";
					modalImg.style.zoom = "170%";
				} else {
					modalImg.style.cursor = "zoom-in";
					modalImg.style.width= "100%";
					modalImg.style.zoom = "100%"
				}
			};
			var span = document.getElementsByClassName("close")[0];
			window.onload = function() {
				span.onclick = function () {
					modal.style.display = "none";
					document.body.style.overflow = "auto";
				}
			}
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
					document.body.style.overflow = "auto";
				}
			}
			function initMap(){
				var uluru = {lat: 44.008715, lng: 20.901432};
				var map = new google.maps.Map(document.getElementById('map'), {
				  zoom: 16,
				  center: uluru
				});
				var marker = new google.maps.Marker({
				  position: uluru,
				  map: map
				});
			}
        </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY9WmZw8cZg901mjVVy_8LGReuVGfo1xk&callback=initMap" 
            type="text/javascript"></script>
    </div>
    <footer>
        <div>
            <span>Kontakt: +381 64 0199341</span>
        </div>
    </footer>
</body>

</html>