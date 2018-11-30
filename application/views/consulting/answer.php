<div class="row">
    <?php if(!empty($consulting->id)){ ?>
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('consulting/answer/'.$consulting->id,array("id"=>"newConsultingForm", "role"=>"form",)); ?>

        <legend>-
            <?php trP('ConsultingTitle')?>:</legend>
        <div>
            <?php echo ( !empty($error) ? $error : '' ); ?>
            <div class="form-group">

                <div class="col-md-12">
                    <p>
                        <?php echo $consulting->consulting_title;?>
                    </p>
                </div>
            </div>
        </div>

        <legend>-
            <?php trP('PatientInformation')?>:</legend>
        <div>
            <?php echo ( !empty($error) ? $error : '' ); ?>
            <div class="form-group">

                <div class="col-md-12">
                    <p>
                        <?php echo trP('PatientAge');?> :
                        <?php 
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($patientinfo[0]['birth_date']), date_create($today));
                            echo $diff->format('%y');
                        ?>
                    </p>
                    <p>
                        <?php echo trP('PatientGender');?> :
                        <?php if ($patientinfo[0]['gender'] == 0) echo trP('Male');
                        else echo trP('Female')?>
                    </p>
                    <p>
                        <?php echo trP('PatientDisease');?> :
                        <?php echo $patientinfo[0]['disease'];?>
                    </p>
                </div>
            </div>
        </div>

        <legend>-
            <?php trP('ConsultingQuestion')?>:</legend>
        <div>
            <?php echo ( !empty($error) ? $error : '' ); ?>
            <div class="form-group">

                <div class="col-md-12">
                    <p>
                        <?php echo $consulting->question;?>
                    </p>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>


        <legend>-
            <?php trP('Answer')?>: </legend>
        <div class="form-group">
            <div class="col-md-12"><textarea name="answer" id="answer" class="form-control" rows="10"><?php echo $this->input->post('answer');?></textarea>
            </div>
        </div>

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
