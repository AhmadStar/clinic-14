<div class="row">
    <?php if(!empty($consulting->id)){ ?>

    <div class="col col-md-8 well well-sm">
        <?php echo form_open('consulting/show/'.$consulting->id,array("id"=>"newConsultingForm", "role"=>"form",)); ?>

        <legend>-
            <?php trP('ConsultingInformation')?>:</legend>
        <div>
            <?php echo ( !empty($error) ? $error : '' ); ?>
            <div class="form-group">

                <div class="col-md-12">
                    <p>
                        <h4>-
                            <?php trP('ConsultingDate');?>
                        </h4>
                        <?php echo $consulting->date;?>
                        <h4>-
                            <?php trP('ConsultingTitle');?>
                        </h4>
                        <?php echo $consulting->consulting_title;?>
                        <h4>-
                            <?php trP('Consulting');?>
                        </h4>
                        <?php echo $consulting->question;?>
                    </p>
                </div>
            </div>

            <div class="clearfix"></div>

            <legend>-
                <?php trP('Answer')?>: </legend>
            <div class="form-group">
                <div class="col-md-12">
                    <p>
                        <?php echo $consulting->answer;?>
                    </p>
                </div>
            </div>


            <?php echo form_close(); ?>
        </div>

        <div class="pull-right" title="<?php trP('GotoConsulting')?>">

            <?php 
             
            echo anchor('consulting/userconsulting', '<button class="btn btn-return"><span>'.tr('ReturnToConsultings').'</span></button>');
        ?>
        </div>
        <?php
}else{
  echo '<div class="alert alert-danger text-center"><h1>Article Not Found</h1></div><div class="pull-right" title="Go to Articles">'.anchor('consulting', '<span class="glyphicon glyphicon-arrow-left"></span>').'</div>';
}
?>
    </div>
    <script>

    </script>
    <div id="system">



    </div>
