<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('consulting/new_consulting',array("id"=>"newConsultingForm", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('Consulting')?>: </legend>
            <div>
                <div class="form-group">
                    <div class="col-md-12"><textarea name="question" id="question" class="form-control" rows="10"><?php echo $this->input->post('question');?></textarea>
                    </div>
                </div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Add')?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('consulting',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="pull-right" title="<?php trP('GoToConsultings')?>">

        <?php echo anchor('consulting', '<button class="btn btn-return"><span>'.tr('GoToConsultings').'</span></button>');?>
    </div>
</div>

<script type="text/javascript">
    

</script>
