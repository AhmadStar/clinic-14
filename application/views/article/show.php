<div class="row">
    <?php if(!empty($article->id)){ ?>
        <div class="isblog"> 
            <p><h1><?php echo $article->title;?></h1></p></br>
            <?php echo $article->body;?>
        <?php echo form_close(); ?> </div>
    
    <div class="pull-right" title="<?php trP('GotoArticles')?>">

        <?php echo anchor('article/userlist', '<button class="btn btn-return"><span>'.tr('ReturnToArticles').'</span></button>');?>
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
