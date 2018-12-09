<div class="row">
    <?php if(!empty($article->id)){ ?>
    <div class="isblog">
        <p>
            <h1>
                <?php echo $article->title;?>
            </h1></br>
            <img src='<?php echo base_url(); echo 'uploads/';echo $article->image;?>'
                          style='width:100%'></br></br>
            <?php echo $article->body;?>
        </p>

        <?php echo form_close(); ?>
    </div>

    <div class="pull-right" title="<?php trP('GotoArticles')?>">

        <?php if ($this->bitauth->logged_in() && $this->bitauth->is_admin()){echo anchor('article', '<button class="btn btn-return"><span>'.tr('ReturnToArticles').'</span></button>');}
                    else
    echo anchor('home', '<button class="btn btn-return"><span>'.tr('ReturnToHome').'</span></button>');
        ?>
    </div>
    <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Article Not Found</h1></div><div class="pull-right" title="Go to Articles">'.anchor('article/userlist', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>

</script>
<div id="system">



</div>
