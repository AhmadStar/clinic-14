<div class="row">
    <?php if(!empty($article->id)){ ?>

        <div class="isblog"> <?php print htmlspecialchars_decode(stripslashes($article->body));?>
        <?php echo form_close(); ?> </div>
    
    <div class="pull-right" title="<?php trP('GotoArticles')?>">

        <?php echo anchor('article', '<button class="btn btn-return"><span>'.tr('ReturnToArticles').'</span></button>');?>
    </div>
    <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Article Not Found</h1></div><div class="pull-right" title="Go to Articles">'.anchor('article', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script>

</script>
<div id="system">

        
    
</div>
