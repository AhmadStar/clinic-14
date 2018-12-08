
<?php $start = ($page-1) * $per_page;
            $p=0;
?>
<div >
    <div class="row">
        <div class="w3-content" style="max-width:100%">

            <!-- Photo Grid -->
            <div class="w3-row-padding" id="myGrid" style="margin-bottom:128px">
                <div class="w3-quarter">
                    <?php
                
                  for ($i = $start; $i < (int)$start+(int)$per_page; $i=$i + 4) {
                      if($i < $articlesCount){
                          echo "<div class='column'>";
                          echo "<div class='content_'>";
                          echo $articles[$i]['reading'];
                          echo "<h3>"; 
                            echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                              echo $articles[$i]['title']; 
                          echo"</a></h3>";
                          echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                            echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                          // echo "<img src='"; echo $articles[$i]['image']; ;echo "' style='width:100%'></a>";
                          echo "<p>"; echo character_limiter($articles[$i]['body'], 300,'...'); echo"</p></b>";
                          echo "</div>";
                          echo "</div>";
                      }
                  } 
                ?>
                </div>


                <div class="w3-quarter">
                    <?php
                  for ($i = $start+1; $i < (int)$start+(int)$per_page ; $i=$i + 4) {
                      if($i < $articlesCount){
                          echo "<div class='column'>";
                          echo "<div class='content_'>";
                          echo $articles[$i]['reading'];
                          echo "<h3>"; 
                            echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                              echo $articles[$i]['title']; 
                          echo"</a></h3>";
                          echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                            echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                          // echo "<img src='"; echo $articles[$i]['image']; ;echo "' style='width:100%'></a>";
                          echo "<p>"; echo character_limiter($articles[$i]['body'], 300,'...'); echo"</p></b>";
                          echo "</div>";
                          echo "</div>";
                      }
                  } 
                ?>
                </div>

                <div class="w3-quarter">
                    <?php
                  for ($i = $start+2; $i < (int)$start+(int)$per_page ; $i=$i + 4) {
                      if($i < $articlesCount){
                          echo "<div class='column'>";
                          echo "<div class='content_'>";
                          echo $articles[$i]['reading'];
                          echo "<h3>"; 
                            echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                              echo $articles[$i]['title']; 
                          echo"</a></h3>";
                          echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                            echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                          // echo "<img src='"; echo $articles[$i]['image']; ;echo "' style='width:100%'></a>";
                          echo "<p>"; echo character_limiter($articles[$i]['body'], 300,'...'); echo"</p></b>";
                          echo "</div>";
                          echo "</div>";
                      }
                  } 
                ?>
                </div>

                <div class="w3-quarter">
                    <?php
                  for ($i = $start+3; $i < (int)$start+(int)$per_page ; $i=$i + 4) {
                      if($i < $articlesCount){
                          echo "<div class='column'>";
                          echo "<div class='content_'>";
                          echo $articles[$i]['reading'];
                          echo "<h3>"; 
                            echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                              echo $articles[$i]['title']; 
                          echo"</a></h3>";
                          echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[$i]['id'];echo "' title='";echo $articles[$i]['title']; echo"'>";
                            echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                          // echo "<img src='"; echo $articles[$i]['image']; ;echo "' style='width:100%'></a>";
                          echo "<p>"; echo character_limiter($articles[$i]['body'], 300,'...'); echo"</p></b>";
                          echo "</div>";
                          echo "</div>";
                      }
                  } 
                ?>
                </div>
            </div>
        </div>
        
        <div>
            <?php echo $pagination?>
        </div>

        <!-- End Page Content -->
    </div>
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


</style>
