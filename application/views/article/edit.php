<div class="row">
    <?php if(!empty($article->id)){ ?>
    <div class="col col-md-12 well well-sm">
        <?php echo form_open('article/edit/'.$article->id,array("id"=>"newArticleForm", "role"=>"form",)); ?>
        
            <legend>-
                <?php trP('ArticleInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">

                    <div class="col-md-12"><input type="text" name='title' id='title' value="<?php echo set_value('title', $article->title);?>" class='form-control' placeholder="<?php trP('Title')?>" title="<?php trP('Title')?>" required /></div>
                </div>

                <div class="clearfix"></div>
        
            <legend>-
                <?php trP('Article')?>: </legend>
            <div>
                <div class="form-group" id="get-data-form">
                    <div class="col-md-12"><textarea name="body" id="body" class="form-control" rows="20"><?php echo set_value('body', $article->body);?></textarea>
                    </div>
                </div>
        
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
<script type="text/javascript">
    tinymce.init({
        directionality : 'rtl',
        language : 'ar',
        relative_urls : false,
        remove_script_host : false,
        convert_urls : true,
        document_base_url : "<?php echo base_url() ?>",
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
        ],
        images_upload_url : 'upload.php',
        images_upload_base_path:'uploads',
		automatic_uploads : true,

		images_upload_handler : function(blobInfo, success, failure) {
			var xhr, formData;

			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', '../../../upload.php');

			xhr.onload = function() {
				var json;

				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}

				json = JSON.parse(xhr.responseText);

				if (!json || typeof json.file_path != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}

				success(json.file_path);
			};

			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());

			xhr.send(formData);
		},
    });

</script>

