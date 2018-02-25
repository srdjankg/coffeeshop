<?php 
    $conn = mysqli_connect("localhost", "root", "", "online-shop");
    if(!$conn){
        die ('Failed to connect to MySQL: ' .mysqli_connect_error());
    }

    $page = @$_GET['page'];
    if($page=="" || $page=="1"){
        $page1=0;
    }
    else{
        $page1=($page*9)-9;
    }
	
	session_start(); 
	$style = 'none';
	$search = @$_POST['search'];
	$sort = @$_POST['productSorting'];
    $_SESSION['sort'] = $sort;
    $savedsort = $_SESSION['sort'];
    if (!empty($savedsort)) {
        $sql = "SELECT * from products 
                where ProductCategoryID = 1
                order by ".$savedsort." 
				limit ".$page1.",9";
				$query = mysqli_query($conn, $sql);
    } else if (!empty($search)) {
		$sql = "SELECT * from products 
                where ProductCategoryID = 1 and ProductName like '%".$search."%'
                order by ProductName ASC
				limit ".$page1.",9";
		$query = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($query);
		if ($num == 0){
			$style = 'block';
			$paging = 'none';
		}
	} else {
        $sql = "SELECT * from products 
                where ProductCategoryID = 1
                order by ProductName ASC
				limit ".$page1.",9";
				$query = mysqli_query($conn, $sql);
	}

    if(!$query){
        die ('SQL Error: ' .mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html ; charset=UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <title>Galerija</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/js.js"></script>
	<style>
		span#noResult{
			display: <?php echo $style ?>;
		}
		span.paging{
			display: <?php echo $paging ?>;
		}
	</style>
</head>
<body>
    <header>
        <div class="head">
            <div class="logoHead">
                <div class="logoName">
                    <a href="index.php">
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
                            <span>
                                <a href=""><img src="images/sign.png" height="22px" width="28px">&nbsp;Ulogujte se</a> &nbsp;/&nbsp;
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
            <div class="productsBar">
                <div>
                    <ul>
                        <li class="topBar">PRETRAGA</li>
                        <li>
                            <form action="" method="post">
                                <input type="text" name="search" class="search" placeholder="Pretraži proizvode..">
                                <input type="submit" class="btn" value="" onclick="searchProducts()">
                            </form>
                        </li>
                    </ul>
                    <ul>
                        <li class="topBar">PROIZVODI</li>
                        <li class="productsHead active">
                            <span>Sve kategorije</span>
                            <ul class="hiddenProd">
                                <li>Akvareli</li>
                                <li>Ulje na platnu</li>
                                <li>Ostalo</li>
                            </ul>
                        </li>
                        <li class="productsHead">
                            <span>Svi motivi</span>
                            <ul class="hiddenProd">
                                <li>Akvareli</li>
                                <li>Ulje na platnu</li>
                                <li>Ostalo</li>
                            </ul>
                        </li>
                        <li class="productsHead">
                            <span>Sve velicine</span>
                            <ul class="hiddenProd">
                                <li>Male</li>
                                <li>Srednje</li>
                                <li>Velike</li>
                            </ul>
                        </li>
                        <li class="productsHead active">
                            <span>Sve cene</span>
                            <ul class="hiddenProd">
                                <a href="#"><li id="do20">Do 20000 din</li></a>
                                <a href="#"><li id="do30">20000 - 30000 din</li></a>
                                <a href="#"><li id="do40">30000 - 40000 din</li></a>
                                <a href="#"><li id="od40">Od 40000 din</li></a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="topCont">
                    <span><h1>SLIKE</h1></span>
                    <span class="sort" id="sortBy">
						<form action="#" method="post">
                            Sortiranje:&nbsp;
                            <select id="productSorting" name="productSorting" onchange="this.form.submit()">
                                <option value="ProductName ASC" selected>Naziv a-z</option>
                                <option value="ProductName DESC">Naziv z-a</option>
								<option value="ProductPrice ASC">Najjeftinije prvo</option>
                                <option value="ProductPrice DESC">Najskuplje prvo</option>
                                <option value="ProductUpdateDate ASC">Najnovije prvo</option>
                                <option value="ProductUpdateDate Desc">Najstarije prvo</option>
                            </select>
						</form>
                    </span>
                </div>
                <ul class="displayProducts">
					<span id="noResult">Nema rezultata za unetu pretragu</span>
                    <?php 
                    while($row = mysqli_fetch_array($query)){
                        $cena = $row['ProductPrice'];
                        $cenaE = $cena / 120;
                        ?>
                        <li class="allPr" data-price="<?php echo $row['ProductPrice']?>" data-name="<?php echo $row['ProductName']?>"
                        data-date="<?php echo $row['ProductUpdateDate']?>" data-size="<?php echo $row['ProductSize']?>">
                            <div class="productWrap">
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
                                    <a href="product.php?<?php echo $row['ProductName']?>&id=<?php echo $row['ProductID']?>"><span><button>Više detalja</button></span></a>
                                </p>
                            </div>
                        </li>
                        <?php } ?>
				</ul>
				<span class="paging">
				<?php
						$sql1 = "SELECT * from products 
						where ProductCategoryID = 1
						order by ProductName ASC";
						$query1 = mysqli_query($conn, $sql1);
						$c = mysqli_num_rows($query1);
						
						$count = ceil($c/9);
						echo "<br><br>";
						for($i=1; $i<=$count; $i++){							
							?><a href="?page=<?php echo $i ?>"><?php echo $i," "; ?></a><?php
						}
						?>
				</span>
            </div>
        </div>
    </div>
    <footer>
        <div>
            <span>Kontakt: +381 64 0199341</span>
        </div>
    </footer>
	<script type="text/javascript">
		<?php
		if (!empty($sort)) {
			?>
			document.getElementById('productSorting').value ="<?php echo $_POST['productSorting']?>";
		<?php } ?>
	</script>
</body>
</html>