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

</style>

<div class="container-fluid">
    <div class="row content admin">



        <div class="row row_">
            <div class="col-sm-3">
                <div class="well">
                    <center>
                        <h4>
                            <?php trP('Users');?>
                        </h4>
                        <p><?php echo $guestCount?></p>
                    </center>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="well">
                    <center>
                        <h4>
                            <?php trp('Visitors');?>
                        </h4>
                        <p>100 Million</p>
                    </center>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="well">
                    <center>
                        <h4>
                            <?php trP('ArticlesConut')?>
                        </h4>
                        <p><?php echo $articlesCount?></p>
                    </center>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="well">
                    <center>
                        <h4>
                            <?php trP('UnAnswerConsultings')?>
                        </h4>
                        <p><?php echo $unAnsweredConsulting; ?></p>
                    </center>
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
                <div class="well_">
                    <h4>
                        <?php trP('MostReadArticles')?>
                    </h4>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="well" style="height:450px">
                    <?php
                    echo "<h3>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[0]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[0]['title'];
                            echo"</a></h3>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[0]['id'];echo "' title='" ;echo $articles[0]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/rrr.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[0]['body'], 150,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="well" style="height:450px">
                    <?php
                    echo "<h3>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[1]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[1]['title'];
                            echo"</a></h3>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[1]['id'];echo "' title='" ;echo $articles[1]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/rrr.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[1]['body'], 150,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="well" style="height:450px">
                    <?php
                    echo "<h3>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[2]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[2]['title'];
                            echo"</a></h3>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[2]['id'];echo "' title='" ;echo $articles[2]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/rrr.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[2]['body'], 150,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
        </div>


    </div>
</div>
