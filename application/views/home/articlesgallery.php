<div class="slideshow-container" style="width:100%; height:400px;"> 

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src='http://localhost/clinic-14/uploads/a.jpg' style="width:100%; height:400px;">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src='http://localhost/clinic-14/uploads/Eslimi-s.jpg' style="width:100%; height:400px;">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src='http://localhost/clinic-14/uploads/a.jpg' style="width:100%; height:400px;">
        <div class="text">Caption Three</div>
    </div>

</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>


<!--
<div class="w3-content w3-section" style="width:100%; height:400px;">
    <img class="mySlides"  style="width:100%; height:100%;">
    <img class="mySlides"  style="width:100%; height:100%;">
    <img class="mySlides"  style="width:100%; height:100%;">

</div>
-->


<div class="row">
    <div class="w3-content" style="max-width:100%">

        <!-- Photo Grid -->
        <div class="w3-row-padding" id="myGrid" style="margin-bottom:128px">
            <div class="w3-quarter">
                <?php
                
                  for ($i = 0; $i < $articlesCount; $i=$i + 4) {
                      echo "<div class='column'>";
                      echo "<div class='content_'>";
                      echo "<h3>"; 
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                          echo $articles[$i]['title']; 
                      echo"</a></h3>";
                      echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                      echo "<p>"; echo character_limiter($articles[$i]['body'], 500,'...'); echo"</p></b>";
                      echo "</div>";
                      echo "</div>";

                  } 
                ?>
            </div>


            <div class="w3-quarter">
                <?php
                  for ($i = 1; $i < $articlesCount ; $i=$i + 4) {
                      echo "<div class='column'>";
                      echo "<div class='content_'>";
                      echo "<h3>"; 
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                          echo $articles[$i]['title']; 
                      echo"</a></h3>";
                      echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                      echo "<p>"; echo character_limiter($articles[$i]['body'], 500,'...'); echo"</p></b>";
                      echo "</div>";
                      echo "</div>";
                  } 
                ?>
            </div>

            <div class="w3-quarter">
                <?php
                  for ($i = 2; $i < $articlesCount ; $i=$i + 4) {
                      echo "<div class='column'>";
                      echo "<div class='content_'>";
                      echo "<h3>"; 
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                          echo $articles[$i]['title']; 
                        echo"</a></h3>";
                      echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                      echo "<p>"; echo character_limiter($articles[$i]['body'], 500,'...'); echo"</p></b>";
                      echo "</div>";
                      echo "</div>";
                  } 
                ?>
            </div>

            <div class="w3-quarter">
                <?php
                  for ($i = 3; $i < $articlesCount ; $i=$i + 4) {
                      echo "<div class='column'>";
                      echo "<div class='content_'>";
                      echo "<h3>"; 
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                          echo $articles[$i]['title']; 
                      echo"</a></h3>";
                      echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                      echo "<p>"; echo character_limiter($articles[$i]['body'], 500,'...'); echo"</p></b>";
                      echo "</div>";
                      echo "</div>";
                  } 
                ?>
            </div>
        </div>
    </div>

    <!-- End Page Content -->
</div>

<style>
    * {
        box-sizing: border-box;
    }

    .row {
        margin: 8px -16px;
    }

    /* Add padding BETWEEN each column */
    .row,
    .row>.column {
        padding: 2px;
    }

    /* Create four equal columns that floats next to each other */
    .column {
        float: down;
        width: 90%;
        background: none repeat scroll 0 0 #FFF;
        border: 1px solid rgba(92, 92, 92, 0.2);
        box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.9) inset, 0 0 200px 0 rgba(0, 0, 0, 0) inset, 0 2px 4px 1px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(0, 0, 0, 0.06);
        padding: 15px;
        margin-bottom: 8%;

    }

    .w3-row-padding>.w3-quarter {
        padding: 0px 0px;
    }

    /* Clear floats after rows */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Content */
    .content_ {
        background-color: white;
    }

    /* Responsive layout - makes a two column-layout instead of four columns */
    @media screen and (max-width: 900px) {
        .column {
            width: 100%;
        }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
        }
    }

    .mySlides {
        display: none;
    }

    img {
        vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        max-height: 400px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        color: #black;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }

</style>


<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }

</script>


<script>
    //        var myIndex = 0;
    //        carousel();
    //    
    //        function carousel() {
    //            var i;
    //            var x = document.getElementsByClassName("mySlides");
    //            for (i = 0; i < x.length; i++) {
    //                x[i].style.display = "none";
    //            }
    //            myIndex++;
    //            if (myIndex > x.length) {
    //                myIndex = 1
    //            }
    //            x[myIndex - 1].style.display = "block";
    //            setTimeout(carousel, 2000); // Change image every 2 seconds
    //        }
    //        

    //    var slideIndex = 1;
    //    showDivs(slideIndex);
    //
    //    function plusDivs(n) {
    //        showDivs(slideIndex += n);
    //    }
    //
    //    function currentDiv(n) {
    //        showDivs(slideIndex = n);
    //    }
    //
    //    function showDivs(n) {
    //        var i;
    //        var x = document.getElementsByClassName("mySlides");
    //        var dots = document.getElementsByClassName("demo");
    //        if (n > x.length) {
    //            slideIndex = 1
    //        }
    //        if (n < 1) {
    //            slideIndex = x.length
    //        }
    //        for (i = 0; i < x.length; i++) {
    //            x[i].style.display = "none";
    //        }
    //        for (i = 0; i < dots.length; i++) {
    //            dots[i].className = dots[i].className.replace(" w3-white", "");
    //        }
    //        x[slideIndex - 1].style.display = "block";
    //        dots[slideIndex - 1].className += " w3-white";
    //    }

</script>
