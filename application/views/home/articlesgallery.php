<div class="row">
    <div class="w3-content" style="max-width:1500px">

        <!-- Photo Grid -->
        <div class="w3-row-padding" id="myGrid" style="margin-bottom:128px">
            <div class="w3-third">
                <?php
                
                  for ($i = 0; $i <= (integer)$articlesCount/3 ; $i++) {
                      echo "<div class='column'>";
                      echo "<div class='content_'>";
                      echo "<h3>"; echo $articles[$i]['title']; echo"</h3>";
                      echo "<img src='http://localhost/clinic-14/uploads/rrr.jpg' style='width:100%'>";
                      echo "<p>"; echo $articles[$i]['body']; echo"</p></b>";
                      echo "</div>";
                      echo "</div>";

                  } 
                ?>
            </div>


            <div class="w3-third">
                <?php
                  for ($i = (integer)($articlesCount/3)+1; $i <= (integer)(($articlesCount/3)*2) ; $i++) {
                      echo "<div class='column'>";
                      echo "<div class='content_'>";
                      echo "<h3>"; echo $articles[$i]['title']; echo"</h3>";
                      echo "<img src='http://localhost/clinic-14/uploads/rrr.jpg' style='width:100%'>";
                      echo "<p>"; echo $articles[$i]['body']; echo"</p></b>";
                      echo "</div>";
                      echo "</div>";
                  } 
                ?>
            </div>

            <div class="w3-third">
                <?php
                  for ($i = (integer)(($articlesCount/3)*2)+1; $i < (integer)$articlesCount ; $i++) {
                      echo "<div class='column'>";
                      echo "<div class='content_'>";
                      echo "<h3>"; echo $articles[$i]['title']; echo"</h3>";
                      echo "<img src='http://localhost/clinic-14/uploads/rrr.jpg' style='width:100%'>";
                      echo "<p>"; echo $articles[$i]['body']; echo"</p></b>";
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
        width: 75%;
        background: none repeat scroll 0 0 #FFF;
            border: 1px solid rgba(92, 92, 92, 0.2);
            box-shadow: 0 0 0 1px rgba(255, 255, 255, 0.9) inset, 0 0 200px 0 rgba(0, 0, 0, 0) inset, 0 2px 4px 1px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(0, 0, 0, 0.06);
            padding: 15px;
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

</style>
