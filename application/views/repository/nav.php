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
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li>
                <?php echo anchor('account/dictionary','<span class="glyphicon glyphicon-off" style="position: relative; top: 5px"></span> القاموس');?>
            </li>
            <li>
                <?php echo anchor('expert_system','<span class="glyphicon glyphicon-off" style="position: relative; top: 5px"></span> '.tr('ExpertSystem'));?>
            </li>
            <li>
                <?php echo anchor('consulting/new_consulting','<span class="glyphicon glyphicon-off" style="position: relative; top: 5px"></span> '.tr('NewConsulting'));?>
            </li>
            <li>
                <?php echo anchor('article','<span class="glyphicon glyphicon-off" style="position: relative; top: 5px"></span> '.tr('Articles'));?>
            </li>

            <li id="navbarLiHome">
                <?php echo anchor('','<i class="fa fa-hospital-o" style="font-size:24px"></i> '.tr('Home'));?>
            </li>


            <?php
        if($this->bitauth->is_admin())
          include_once 'nav/admin.php';
        elseif ($this->bitauth->has_role('doctor'))
          include_once 'nav/doctor.php';
        elseif ($this->bitauth->has_role('xray'))
          include_once 'nav/xray.php';
        elseif ($this->bitauth->has_role('lab'))
          include_once 'nav/lab.php';
        elseif ($this->bitauth->has_role('pharmacy'))
          include_once 'nav/pharmacy.php';
        elseif ($this->bitauth->has_role('receptionist'))
          include_once 'nav/receptionist.php';
        elseif ($this->bitauth->has_role('guest'))
          include_once 'nav/guest.php';
        elseif ($this->bitauth->has_role('patient'))
          include_once 'nav/patient.php';
        else
          include_once 'nav/default.php';
      ?>
            <li class="dropdown">
                <!-- Fixed on all users -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user" style="position: relative; top: 5px;"></span>
                    <?php echo $this->session->userdata('ba_first_name').' '.$this->session->userdata('ba_last_name');?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <?php echo anchor('account/edit_user/'.$this->session->userdata('ba_user_id'),'<span class="glyphicon glyphicon-user" style="position: relative; top: 5px;"></span> '.tr('Profile'));?>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <?php echo anchor('account/logout','<span class="glyphicon glyphicon-off" style="position: relative; top: 5px;"></span> '.tr('Logout'));?>
                    </li>
                </ul>
            </li>
           
            
        </ul>
    </div>
    <?php if(isset($navActiveId)){?>
    <script>
        $(document).ready(function() {
            $('#<?php echo $navActiveId?>').addClass('active');
        });

    </script>
    <?php }?>
</nav>
