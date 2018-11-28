<div class="row">
    <div class="col col-md-8 well well-sm">
        <?php echo form_open('expert_system',array("id"=>"newConsulting", "role"=>"form",)); ?>
        <fieldset>
            <legend>-
                <?php trP('معلومات')?> :</legend>
            <div>
                <?php echo ( !empty($error) ? $error : '' ); ?>
                <div class="form-group">

                    <div class="col-md-12"><input type="number" name='age' id='age' value="<?php echo $this->input->post('age');?>" class='form-control' placeholder="<?php trP('Age')?>" title="<?php trP('Age')?>" required /></div>

                    <div class="col-md-12">
                        <?php echo form_dropdown('chest_pain_type',$chest_pain_type_options,$this->input->post('chest_pain_type'),"class='form-control' title='chest_pain_type' id=chest_pain_type");?>
                    </div>

                    <div class="col-md-12"><input type="number" name='rest_blood_pressure' id='rest_blood_pressure' value="<?php echo $this->input->post('rest_blood_pressure');?>" class='form-control' placeholder="<?php trP('rest_blood_pressure')?>" title="<?php trP('rest_blood_pressure')?>" required /></div>

                    <div class="col-md-12">
                        <?php echo form_dropdown('blood_sugar',$blood_sugar_options,$this->input->post('blood_sugar'),"class='form-control' title='blood_sugar' id ='blood_sugar'");?>
                    </div>

                    <div class="col-md-12">
                        <?php echo form_dropdown('rest_electro',$rest_electro_options,$this->input->post('rest_electro'),"class='form-control' title='rest_electro' id='rest_electro' ");?>
                    </div>

                    <div class="col-md-12"><input type="number" name='max_heart_rate' id='max_heart_rate' value="<?php echo $this->input->post('max_heart_rate');?>" class='form-control' placeholder="<?php trP('max_heart_rate')?>" title="<?php trP('max_heart_rate')?>" required /></div>

                    <div class="col-md-12">
                        <?php echo form_dropdown('exercice_angina',$exercice_angina_options,$this->input->post('exercice_angina'),"class='form-control' title='exercice_angina' id = 'exercice_angina'");?>
                    </div>


                </div>
            </div>
            <div class="clearfix"></div>
        </fieldset>
        <div class="form-group">
            <div class="col-md-6">
                <?php echo anchor('home',tr('ReturnToHome'),array('class'=>'form-control btn btn-info'));?>
            </div>
            <div class="col-md-6"><button type="button" id="result" class="form-control btn btn-info">
                    <?php trP('Result')?></button></div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<div class="row" id='myDIV' style='display:none'>
    <div class="col col-md-8 well well-sm">
        <fieldset>
            <legend>
                <center>
                    <?php trP('TheResult')?> :
                </center>
            </legend>
            <div class="col-md-12">
                <p>
                    <center style='font-size:20px'>
                        <b id="userInformation"></b>
                    </center>
                </p>
            </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#result').click(function() {
            loadTotal();
        });
    });

</script>


<script>
    function loadTotal() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
        $.ajax({
            url: '<?php echo site_url('expert_system/predicate')?>',
            type: 'POST',
            data: {
                age: $('#age').val(),
                chest_pain_type: $('#chest_pain_type').val(),
                rest_blood_pressure: $('#rest_blood_pressure').val(),
                blood_sugar: $('#blood_sugar').val(),
                rest_electro: $('#rest_electro').val(),
                max_heart_rate: $('#max_heart_rate').val(),
                exercice_angina: $('#exercice_angina').val(),
            },
            dataType: 'json',
            success: function(data) {
                //                HandleActions();
                //                alert(data);            
                //                $("#userInformation").html(data);
                $("#userInformation").html(data.data[0]);
                //            console.log(data);
            }
        });
    }

</script>
