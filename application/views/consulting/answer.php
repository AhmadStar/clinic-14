<div class="row">
    <?php if(!empty($consulting->id)){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('consulting/answer/'.$consulting->id,array("id"=>"newConsultingForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('ConsultingQuestion')?>:</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">

                    <div class="col-md-12"><p><?php echo $consulting->question;?></p>
                    </div>
                </div>

                <div class="clearfix"></div>
        </fieldset>
        <fieldset>
            <legend>-
                <?php trP('Answer')?>: </legend>
            <div class="form-group">
                <div class="col-md-12"><textarea name="answer" id="answer" class="form-control" rows="10"><?php echo $this->input->post('answer');?></textarea>
                </div>
            </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Answer')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('consulting',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GotoConsultings')?>">

        <?php echo anchor('consulting', '<button class="btn btn-return"><span>'.tr('ReturnToConsultings').'</span></button>');?>
    </div>
    <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Consulting Not Found</h1></div><div class="pull-right" title="Go to Consultings">'.anchor('consulting', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
</div>
<script type="text/javascript">
   

</script>
