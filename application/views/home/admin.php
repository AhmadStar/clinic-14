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
        padding-bottom: 20px;
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
        color: #000 !important;
        background-color: #d6e9c6a6 !important;
    }

    .container {
        max-width: 1170px;
        margin-right: 5em;
    }


    .demo-picked {
			font-size: 1.2rem;
			text-align: center;
		}

    .demo-picked span {
			font-weight: bold;
		}

</style>

<div class="container-fluid">
    <div class="row content admin">



        <div class="row row_">
            <div class="w3-quarter">
                <div class="w3-container w3-orange w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h4>
                            <?php echo $guestCount?>
                        </h4>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>
                        <?php echo trP('Users')?>
                    </h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-blue w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h4>50</h4>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>
                        <?php echo trP('Vistitors')?>
                    </h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-red w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-copy w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h4>
                            <?php echo $articlesCount?>
                        </h4>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>
                        <?php echo trP('Articles')?>
                    </h4>
                </div>
            </div>
            <div class="w3-quarter">
                <div class="w3-container w3-green w3-text-white w3-padding-16">
                    <div class="w3-left"><i class="fa fa-envelope w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h4>
                            <?php echo $unAnsweredConsulting?>
                        </h4>
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
                <div class="well_" style="height:370px">

                    <div id="v-cal">
                        <div class="vcal-header">
                            <button class="vcal-btn" data-calendar-toggle="previous">
                                <svg height="20" version="1.1" viewbox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                                </svg>
                            </button>

                            <div class="vcal-header__label" data-calendar-label="month">
                                March 2017
                            </div>


                            <button class="vcal-btn" data-calendar-toggle="next">
                                <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="vcal-week">
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                            <span>Sun</span>
                        </div>
                        <div class="vcal-body" data-calendar-area="month"></div>
                    </div>

                </div>
            </div>
<!--
            <div class="col-sm-6">
                <div class="well_" style="height:350px">

                    <h4>
                        <?php trP('')?>
                    </h4>
                </div>
            </div>
-->
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
                    echo "<h4>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[0]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[0]['title'];
                            echo"</a></h4>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[0]['id'];echo "' title='" ;echo $articles[0]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[0]['body'], 250,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="w3-container s w3-text-black w3-padding-16">
                    <?php
                    echo "<h4>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[1]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[1]['title'];
                            echo"</a></h4>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[1]['id'];echo "' title='" ;echo $articles[1]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[1]['body'], 250,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="w3-container t w3-text-white w3-padding-16">
                    <?php
                    echo "<h4>";
                        echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[2]['id'];echo "' title='" ;echo $articles[$i]['title']; echo"'>";
                            echo $articles[2]['title'];
                            echo"</a></h4>";
                    echo "<a href='";echo base_url(); echo '/index.php/article/show/';echo $articles[2]['id'];echo "' title='" ;echo $articles[2]['title']; echo"'>";
                        echo "<img src='http://localhost/clinic-14/uploads/a.jpg' style='width:100%'></a>";
                    echo "<p>"; echo character_limiter($articles[2]['body'], 250,'...'); echo"</p></b>";
                        ?>
                </div>
            </div>
        </div>


    </div>
</div>
<script src="<?php echo base_url() ?>content/js/vanillaCalendar.js" type="text/javascript"></script>
<script>
    window.addEventListener('load', function() {
        vanillaCalendar.init({
            disablePastDays: false
        });
    })

</script>
