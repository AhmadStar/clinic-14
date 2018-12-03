<?php
  include 'view_config.php';
?>
<section class="row">

    <!--  <article class="col col-sm-9" id="mainContent"> -->

    <article class="
                    <?php 
                    if($this->bitauth->logged_in() && !$this->bitauth->is_admin() && ($this->uri->segment(1) =='' || $this->uri->segment(1) =='home')){ 
                        echo 'col col-sm-12';
                    }
                    elseif(!$this->bitauth->logged_in() && ($this->uri->segment(1) =='' || $this->uri->segment(1) =='home')){ 
                        echo 'col col-sm-12' ;
                    } 
                    else{ 
                        echo 'col col-sm-9';
                    } ?>" id="mainContent">
        <?php
        if(@$includes)
            foreach ($includes as $include)
                include_once $include.'.php';
        ?>
    </article>
    <aside class="col col-sm-3">
        <?php
//    if(strtolower($title)!='login')
      if ($this->bitauth->logged_in()){
//        include_once 'account/login.php';
//      }
//      else{
          if($this->bitauth->logged_in() && $this->bitauth->is_admin() ){ include_once 'repository/sidebar.php';}
          elseif($this->bitauth->logged_in() && ($this->uri->segment(1) !='' || $this->uri->segment(1) !='home')){include_once 'repository/sidebar.php';}
          
          //if($this->uri->segment(1) ==''){ } 
          else{}
      }
    ?>
    </aside>

    <?php
  /*<aside class="col col-sm-3">
  
  </aside>*/
  ?>
</section>
