<div class="row">
    <div class="col col-md-7 well well-sm">
        <?php echo form_open('account/signup',array("id"=>"signupForm", "role"=>"form",)); ?>

        <legend>-
            <?php trP('UserInformation')?>:</legend>
        <div>
            <?php echo ( !empty($error) ? $error : '' ); ?>
            <div class="form-group">
                <div class="col-md-6"><input type="text" name='first_name' id="first_name" value="<?php echo $this->input->post('first_name');?>" class='form-control' placeholder="<?php trP('FirstName')?>" title='First Name' required autofocus /></div>
                <div class="col-md-6"><input type="text" name='last_name' id='last_name' value="<?php echo $this->input->post('last_name');?>" class='form-control' placeholder="<?php trP('LastName')?>" title='Last Name' /></div>
            </div>
            <div class="form-group">

            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <div class="col-md-12"><input type="text" name='username' id='username' value="<?php echo $this->input->post('username');?>" class='form-control' placeholder="<?php trP('UserName')?>" title='User Name' required /></div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><input type='password' name='password' id='password' class='form-control' placeholder="<?php trP('Password')?>" title='Password' required /></div>
                <div class="col-md-12"><input type='password' name='password_conf' id='password_conf' class='form-control' placeholder="<?php trP('ConfirmPassword')?>" title='Confirm Password' required /></div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><input type='email' name='email' id='email' value="<?php echo $this->input->post('email');?>" class='form-control' placeholder="<?php trP('Email')?>" title='Email' required /></div>
            </div>
            <div class="form-group">
                <div class="col-md-12"><input type='text' name='consulting_title' id='consulting_title' value="<?php echo $this->input->post('consulting_title');?>" class='form-control' placeholder="<?php trP('ConsultingTitle')?>" title="<?php trP('ConsultingTitle')?>" required /></div>
                <div class="col-md-12"><input type='phone' name='phone' id='phone' value="<?php echo $this->input->post('phone');?>" class='form-control' placeholder="<?php trP('Phone')?>" title='Phone' required /></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                        <input type="date" name='birth_date' id='birth_date' value="<?php echo set_value('birth_date',@$today);?>" class='form-control' placeholder="<?php trP('birth_date')?>" title="<?php trP('birth_date')?>" required />
                    </div>

                    <div class="col-md-12">
                        <input type="radio" name='gender' value="1" title='Male' <?php echo isset($_POST['gender'])?($this->input->post('gender')?'checked':''):'';?> />
                        <label class="radio-inline">
                            <?php trP('Male')?> </label>
                    </div>

                    <div class="col-md-12">
                        <input type="radio" name='gender' value="0" title='Female' <?php echo isset($_POST['gender'])?($this->input->post('gender')?'':'checked'):'';?> />
                        <label class="radio-inline">
                            <?php trP('Female')?></label>
                    </div>

                    <div class="col-md-12">
                        <label class="radio-inline">التاريخ المرضي (الأمراض التي تعاني منها)</label>
                        <textarea name="disease" id="disease" class="form-control" rows="5"><?php echo $this->input->post('disease');?>
                    </textarea>
                        <label class="radio-inline">نص الاستشارة</label>
                        <textarea name="question" id="question" class="form-control" rows="5"><?php echo $this->input->post('question');?>
                    </textarea>
                    </div>
            <div class="clearfix"></div>
        </div>


        <div class="form-group">
            <div class="col-md-6"><input type="submit" name='submit' id='submit' value=<?php trP('Register');?> class="form-control btn btn-info" /></div>
            <div class="col-md-6">
                <?php echo anchor('account/users',tr('cancel'),array('class'=>'form-control btn btn-info'));?>
            </div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>
<script type="text/javascript">
   
</script>
