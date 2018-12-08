<div class="row">
    <div class="col col-md-12 well well-sm">
        <?php echo form_open_multipart('article/new_article',array("id"=>"newArticleForm", "role"=>"form",)); ?>
            <legend>-
                <?php trP('ArticleInformation')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">

                    <div class="col-md-12"><input type="text" name='title' id='title' value="<?php echo $this->input->post('title');?>" class='form-control' placeholder="<?php trP('Title')?>" title="<?php trP('Title')?>" required /></div>

                    <div class="col-md-12"><input type="date" name='created_date' id='created_date' value="<?php echo set_value('created_date',@$today);?>" class='form-control' placeholder="<?php trP('created_date')?>" title="<?php trP('created_date')?>" required /></div>
                    
                    <div class="col-md-12"><input type="file" name='image' id='image' class='form-control' placeholder="<?php trP('image')?>" title="<?php trP('image')?>" required /></div>

                </div>
            </div>
            <div class="clearfix"></div>

   
            <legend>-
                <?php trP('Article')?>: </legend>
            <div>
                <div class="form-group">
                    <div class="col-md-12"><textarea name="body" id="body" class="form-control" rows="20"><?php echo $this->input->post('body');?></textarea>
                    </div>
                </div>
        
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Add')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('article',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GoToArticles')?>">

        <?php echo anchor('article', '<button class="btn btn-return"><span>'.tr('GoToArticles').'</span></button>');?>
    </div>
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
        images_upload_url : '../../upload.php',
        images_upload_base_path:'uploads',
		automatic_uploads : true,

		images_upload_handler : function(blobInfo, success, failure) {
			var xhr, formData;

			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', '../../upload.php');

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
