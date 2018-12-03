<!--<div id='sidebar'>-->
<div id='sidebar' >
  <div id="accordion" class="panel-group">

    <?php
      //load sidebar based on user Role to get list of all roles check bitauth config file
      if($this->bitauth->is_admin())
        include_once 'sidebar/admin.php';
      if($this->bitauth->is_admin())
        include_once 'sidebar/article.php';
      if ($this->bitauth->has_role('doctor'))
        include_once 'sidebar/doctor.php';
      if ($this->bitauth->has_role('doctor'))
        include_once 'sidebar/consulting.php';
      if ($this->bitauth->has_role('guest'))
        include_once 'sidebar/myconsulting.php';
      
      
    ?>
    <script></script>
  </div>
</div>
