<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('consulting/new_consulting',array("id"=>"newConsultingForm", "role"=>"form",)); ?>
        
            <legend>-
                <?php trP('Consulting')?>: </legend>
            <div>
                <div class="form-group">
                    <div class="col-md-12"><input type="text" name='consulting_title' id='consulting_title' value="<?php echo $this->input->post('consulting_title');?>" class='form-control' placeholder="<?php trP('ConsultingTitle')?>" title="<?php trP('ConsultingTitle')?>" required /></div>
                    
                    <div class="col-md-12"><textarea name="question" id="question" class="form-control" rows="10"><?php echo $this->input->post('question');?></textarea>
                    </div>
                </div>
        
        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trp('Send')?> class="form-control btn btn-info" /></div>
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
