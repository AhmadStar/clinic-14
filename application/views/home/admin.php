<style>
    .row {
        margin-right: 0px;

        margin-left: -15px;
    }

    .well_ {
        min-height: 20px;
        padding: 5px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    }

    .row_ {
        background-color: white;
        padding-top: 20px;
        margin-bottom: 10px;
        opacity: 0.9;
    }

    .col-sm-4,
    .col-sm-12 {
        padding-right: 0px;
        padding-left: 0px;
    }

    .f,
    .w3-hover-f:hover,
    .w3-f,
    .w3-hover-f:hover {
        color: #000 !important;
        background-color: #eed3d76b !important;
    }

    .s,
    .w3-hover-s:hover {
        color: #000 !important;
        background-color: #eee !important;
    }

    .t,
    .w3-hover-t:hover {
        color: #000!important; 
        background-color: #d6e9c6a6 !important;
    }

</style>

<div class="container-fluid">
    <div class="row content admin">



        <div class="row row_">
            <div class="w3-quarter">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>
                            <?php echo $guestCount?>
                        </h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>
                        <?php echo trP('Users')?>
                    </h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-blue w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>50</h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>
                        <?php echo trP('Vistitors')?>
                    </h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-red w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>
                            <?php echo $articlesCount?>
                        </h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>
                        <?php echo trP('Articles')?>
                    </h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-green w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3>
                            <?php echo $unAnsweredConsulting?>
                        </h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>
                        <?php echo trP('Consultings')?>
                    </h4>
                </div>
            </div>
        </div>

        <div class="row row_">
            <div class="col-sm-12">
                <div class="well_" style="height:200px">

                    <h4>
                        <?php trP('')?>
                    </h4>
                </div>
            </div>
        </div>

        <div class="row row_">
            <div class="col-sm-12">
                <div class="w3-container w3-black w3-text-white w3-padding-16">
                    <h4>
                        <?php trP('MostReadArticles')?>
                    </h4>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="w3-container f w3-text-white w3-padding-16">
                    <?php
                    echo "<h3>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[0]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[0]['title'];
                            echo"</a></h3>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[0]['id'];echo "' title='" ;echo $articles[0]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[0]['body'], 250,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="w3-container s w3-text-black w3-padding-16">
                    <?php
                    echo "<h3>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[1]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[1]['title'];
                            echo"</a></h3>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[1]['id'];echo "' title='" ;echo $articles[1]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[1]['body'], 250,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="w3-container t w3-text-white w3-padding-16">
                    <?php
                    echo "<h3>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[2]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[2]['title'];
                            echo"</a></h3>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[2]['id'];echo "' title='" ;echo $articles[2]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[2]['body'], 250,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
        </div>


    </div>
</div>
