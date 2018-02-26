<?php 
    $conn = mysqli_connect("localhost", "root", "", "online-shop");
    if(!$conn){
        die ('Failed to connect to MySQL: ' .mysqli_connect_error());
    }
	
    $sql = "SELECT * from products 
			where ProductCategoryID = 1
            order by ProductUpdateDate DESC
			limit 0,4";
			$query = mysqli_query($conn, $sql);
			
	$sql1 = "SELECT * from products 
			where ProductCategoryID = 2
            order by ProductUpdateDate DESC
			limit 0,4";
			$query1 = mysqli_query($conn, $sql1);

    if(!$query || !$query1){
        die ('SQL Error: ' .mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html ; charset=UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title>Galerija</title>
    <link rel="stylesheet" type="text/css" href="js/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="js/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/js.js"></script>
	<script type="text/javascript" src="js/slick/slick.min.js"></script>
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
                        <li class="active">POČETNA</li>
                    </a>
                    <a href="slike.php">
                        <li>SLIKE</li>
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
        <div class="slideshow-container">
            <div class="a-slide slide1">
                <img src="images/slide1.jpg">
            </div>
            <div class="a-slide slide2">
                <img src="images/slide.jpg">
            </div>
        </div>
        <div class="slideshow">
            <h1>Najnovije slike</h1>
            <div class="slideshow-images" data-slick='{"slidesToShow": 3, "slidesToScroll": 1}'>
			        <?php 
                    while($row = mysqli_fetch_array($query)){
						$i = 1;
                        $cena = $row['ProductPrice'];
                        $cenaE = $cena / 120;
                    ?>
						<div class="a-slide slide<?php echo $i ?>">
                            <div class="slideImage">
                                <a href="product.php?<?php echo $row['ProductName']?>&id=<?php echo $row['ProductID']?>">
									<div class="image" data-content="Detaljnije">
										<img id="myPic" src="images/male/slike/<?php echo $row['ProductImage']?>" title="<?php echo $row['ProductName']?>">
									</div>
								</a>
                                <p>
									<a href="product.php?<?php echo $row['ProductName']?>&id=<?php echo $row['ProductID']?>"><span id="prodName"><?php echo $row['ProductName']?></span></a>
                                    <span>Dimenzije slike 40x60</span>
                                    <span class="cena"><span class="stara"><?php echo $cena+2650; ?> din</span><span class="trCena"><?php echo $row['ProductPrice'] ?> din</span></span>
                                    <span class="cenaE"><span class="staraE"><?php echo round($cenaE+2650/120,2); ?> e</span><span class="trCenaE"><?php echo round($cenaE,2); ?> e</span></span>
                                    <span><a href="product.php?<?php echo $row['ProductName']?>&id=<?php echo $row['ProductID']?>"><button>Više detalja</button></a></span>
                                </p>
                            </div>
                        </div>
                    <?php 
						$i++;
					} ?>
			</div>
		</div>
        <div class="slideshow1">
        <h1>Najnovije cveće</h1>
            <div class="slideshow-images" data-slick='{"slidesToShow": 3, "slidesToScroll": 1}'>
			        <?php 
                    while($row = mysqli_fetch_array($query1)){
						$i = 1;
                        $cena = $row['ProductPrice'];
                        $cenaE = $cena / 120;
                    ?>
						<div class="a-slide slide<?php echo $i ?>">
                            <div class="slideImage">
                                <a href="product.php?<?php echo $row['ProductName']?>&id=<?php echo $row['ProductID']?>">
									<div class="image" data-content="Detaljnije">
										<img id="myPic" src="images/male/cvece/<?php echo $row['ProductImage']?>" title="<?php echo $row['ProductName']?>">
									</div>
								</a>
                                <p>
									<a href="product.php?<?php echo $row['ProductName']?>&id=<?php echo $row['ProductID']?>"><span id="productName"><?php echo $row['ProductName']?></span></a>
                                    <span class="cena"><span class="stara"><?php echo $cena+250; ?> din</span><span class="trCena"><?php echo $row['ProductPrice'] ?> din</span></span>
                                    <span class="cenaE"><span class="staraE"><?php echo round($cenaE+250/120,2); ?> e</span><span class="trCenaE"><?php echo round($cenaE,2); ?> e</span></span>
                                    <span><a href="product.php?<?php echo $row['ProductName']?>&id=<?php echo $row['ProductID']?>"><button>Više detalja</button></a></span>
                                </p>
                            </div>
                        </div>
                    <?php 
						$i++;
					} ?>
			</div>
        </div>
        <div class="textCont">
            <div class="text">

            </div>
        </div>
        <div id="map"></div>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCY9WmZw8cZg901mjVVy_8LGReuVGfo1xk&callback=initMap" 
            type="text/javascript"></script>
            <script>
                $(document).ready(function(){
                    $('.slideshow-container').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        arrows: false,
                        fade: true,
                        autoplay: true,
                        draggable: false,
                    });  

                    $('.slideshow-images').slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
						dots: true,
                        swipe: true,
                        cssEase: 'linear',
                        responsive: [
                        {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            infinite: true,
                        }
                        },
                        {
                        breakpoint: 701,
                        settings: {
                            slidesToShow: 3,
							 infinite: true,
                        }
                        },
						{
                        breakpoint: 601,
                        settings: {
                            slidesToShow: 2,
							 infinite: true,
                        }
                        }
                    ]
                    });
                });
            </script>
    </div>
    <footer class="footer">
        <div>
            <span>Kontakt: +381 64 0199341</span>
        </div>
    </footer>
</body>

</html>