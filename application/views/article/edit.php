<div class="row">
    <?php if(!empty($article->id)){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('article/edit/'.$article->id,array("id"=>"newArticleForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('ArticleInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">

                    <div class="col-md-12"><input type="text" name='title' id='title' value="<?php echo set_value('title', $article->title);?>" class='form-control' placeholder="<?php trP('Title')?>" title="<?php trP('Title')?>" required /></div>
                </div>

                <div class="clearfix"></div>
        </fieldset>
        <fieldset>
            <legend>-
                <?php trP('Article')?>: </legend>
            <div>
                <div class="form-group" id="get-data-form">
                    <div class="col-md-12"><textarea name="body" id="body" class="form-control" rows="20"><?php echo set_value('body', $article->body);?></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('update')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('article',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
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
    tinymce.init({
        selector: 'textarea',
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
        image_advtab: true,
        templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            },
            {
                title: 'Test template 2',
                content: 'Test 2'
            }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });


</script>
