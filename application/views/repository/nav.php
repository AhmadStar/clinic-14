<nav id="main_nav" dir="rtl" lang="ar" class="navbar navbar-default" role="navigation">


    <?php $this->load->helper('site');?>



    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url() ?>" style="position: relative; top: 5px">
            <?php trP('clinicname');?></a>
    </div>
    <?php 
     if($this->bitauth->logged_in() && $this->bitauth->is_admin()){
      include_once 'nav/admin.php';   
     }
    else
        include_once 'nav/guest.php';
    ?>
    <?php if(isset($navActiveId)){?>
    <script>
        $(document).ready(function() {
            $('#<?php echo $navActiveId?>').addClass('active');
        });

    </script>
    <?php }?>
</nav>
