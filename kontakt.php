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
                        <li>SLIKE</li>
                    </a>
                    <a href="cvece.php">
                        <li>CVEĆE</li>
                    </a>
                    <a href="index.php">
                        <li>O NAMA</li>
                    </a>
                    <a href="kontakt.php">
                        <li class="active">KONTAKT</li>
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
    <h1 id="cont">KONTAKTIRAJTE NAS</h1>
    <div class="contactPage">
        <div class="contact">
            <form action="action_page.php">
                <table>
                    <tr>
                        <td class="left">Ime: *</td>
                        <td><input type="text" id="fname" name="firstname" placeholder="Unesite ime.." required></td>
                    </tr>
                    <tr>
                        <td class="left">Email: *</td>
                        <td><input type="email" id="email" name="email" placeholder="Unesite email.." required></td>
                    </tr>
                    <tr>
                        <td class="left">Naslov poruke: *</td>
                        <td><input type="text" id="message" name="mesTitle" placeholder="Unesite naslov poruke.." required></td>
                    </tr>
                    <tr>
                        <td id="textSpan" valign="top">Tekst poruke: *</td>
                        <td><textarea id="subject" name="subject" placeholder="Unesite tekst poruke.." required></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="right"><button type="submit" class="button">POŠALJI</button></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="right"><span>Obavezna polja *<span></td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="map" class="map"></div>
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