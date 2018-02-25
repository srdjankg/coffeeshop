$(document).ready(function(){
    $('.handle').on('click', function(){
        $('.navigation ul').toggleClass('showing');
    });
});

function myFunction(x) {
    x.classList.toggle("change");
}

$(document).ready(function(){
    var modal = document.getElementById('myModal');
    var img = document.getElementById('myImg');
	var img1 = document.getElementById('myImg1');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
        document.body.style.overflow = "hidden";
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }
	img1.onclick = function () {
        document.body.style.overflow = "hidden";
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    var span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
        modal.style.display = "none";
        document.body.style.overflow = "auto";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            document.body.style.overflow = "auto";
        }
    }

    var imgZoom = document.getElementById("img01");
    imgZoom.style.zoom = "100%";
    imgZoom.onclick = function(){
        if(imgZoom.style.zoom == "100%"){
            imgZoom.style.zoom = "170%";
            imgZoom.style.cursor = "zoom-out";
        } else {
            imgZoom.style.zoom = "100%"
            imgZoom.style.cursor = "zoom-in";
        }
    }
});
$(document).ready(function(){
    $(".productsHead").click( function(){
        $(this).toggleClass('active');
    });
});

$(document).on("change", "#productSorting", function() {
    var sortingMethod = $(this).val();
    if(sortingMethod == 'nameAsc')
    {
        sortProductsNameAscending();
    }
    else if(sortingMethod == 'nameDesc')
    {
        sortProductsNameDescending();
    }
    else if(sortingMethod == 'priceAsc')
    {
        sortProductsPriceAscending();
    }
    else if(sortingMethod == 'priceDesc')
    {
        sortProductsPriceDescending();
    }
    else if(sortingMethod == 'dateAsc')
    {
        sortProductsDateAscending();
    }
    else if(sortingMethod == 'dateDesc')
    {
        sortProductsDateDescending();
    }
});

/*function sortProductsNameAscending(){
    var products = $('.allPr');
    products.sort(function(a, b){ return $(a).data("name")>$(b).data("name")});
    $(".displayProducts").html(products);
}
function sortProductsNameDescending(){
    var products = $('.allPr');
    products.sort(function(a, b){ return $(b).data("name")>$(a).data("name")});
    $(".displayProducts").html(products);
}
function sortProductsPriceAscending(){
    var products = $('.allPr');
    products.sort(function(a, b){ return $(b).data("price")>$(a).data("price")});
    $(".displayProducts").html(products);
}
function sortProductsPriceDescending(){
    var products = $('.allPr');
    products.sort(function(a, b){ return $(a).data("price")>$(b).data("price")});
    $(".displayProducts").html(products);
}
function sortProductsDateAscending(){
    var products = $('.allPr');
    products.sort(function(a, b){ return $(b).data("date")>$(a).data("date")});
    $(".displayProducts").html(products);
}
function sortProductsDateDescending(){
    var products = $('.allPr');
    products.sort(function(a, b){ return $(a).data("date")>$(b).data("date")});
    $(".displayProducts").html(products);
}*/

function changeCurrency(){
    var val = $("#currency").val();
    if (val === "din"){
        $(".cena").css('display', 'block');
        $(".cenaE").css('display', 'none')
    } else if (val === "eur"){
        $(".cena").css('display', 'none')
        $(".cenaE").css('display', 'block')
    }
};

$(document).ready(function(){
    var cene = document.getElementsByClassName('trCena');
    $(".productsHead>span").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
            cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
        }
    })
    $("#do20").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
            if(cena.innerHTML > '20001'){
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            } else {
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
            }
        }
    })
    $("#do30").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
             if(cena.innerHTML < '19999' || cena.innerHTML > '30001'){
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            } else {
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
            }
        }
    })
    $("#do40").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
             if((cena.innerHTML < '29999') || (cena.innerHTML > '40001')){
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            } else {
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
            }
        }
    })
    $("#od40").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
            if(cena.innerHTML < '39999'){
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            } else {
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
            }
        }
    })
    $("#do600").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
            if(cena.innerHTML > '601'){
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            } else {
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
            }
        }
    })
    $("#od600").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
            if((cena.innerHTML < '599') || (cena.innerHTML > '999')){
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            } else {
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
            }
        }
    })
    $("#od1000").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
            if((cena.innerHTML < '999') || (cena.innerHTML > '1499')){
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            } else {
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
            }
        }
    })
    $("#od1500").click(function(){
        for(var i=0; i<cene.length; i++){
            var cena = cene[i];
            if(cena.innerHTML < "999"){
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "none";
            } else {
                cena.parentElement.parentElement.parentElement.parentElement.style.display = "flex";
            }
        }
    })
});

function initMap(){
    var uluru = {lat: 44.008715, lng: 20.901432};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15.8,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
}