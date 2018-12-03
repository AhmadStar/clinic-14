<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">

        <li>
            <?php echo anchor('account/dictionary','<span class="glyphicon glyphicon-off" style="position: relative; top: 5px"></span> القاموس');?>
        </li>

        <li class="dropdown">
            <!-- Fixed on all users -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user" style="position: relative; top: 5px;"></span>
                <?php echo $this->session->userdata('ba_first_name').' '.$this->session->userdata('ba_last_name');?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <?php 
                            if (!$this->bitauth->logged_in()){
                                echo anchor('account/login','<span class="glyphicon glyphicon-user" style="position: relative; top: 5px;"></span> '.tr('Login'));
                            }else{
                                echo anchor('account/edit_user/'.$this->session->userdata('ba_user_id'),'<span class="glyphicon glyphicon-user" style="position: relative; top: 5px;"></span> '.tr('Profile'));
                            }
                        ?>
                </li>
                <li class="divider"></li>
                <li>
                    <?php echo anchor('account/logout','<span class="glyphicon glyphicon-off" style="position: relative; top: 5px;"></span> '.tr('Logout'));?>
                </li>
            </ul>
        </li>

    </ul>
</div>
