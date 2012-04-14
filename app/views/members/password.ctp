<div class="content_page">
    <?php echo $form->create('Member', array('action' => 'password'));?>
    <h1>My Account Information</h1>
    <div>
        <?php if(isset($error_password)){?>
        <div style="color: red;"><?php echo $error_password;?></div>
        <?php }else if(isset($done_password)){?>
        <div style="color: green;"><?php echo $done_password;?></div>
        <?php }?>
        <div class="content-fields"> 
        <table style="margin-left: 35px;">
        <tr><td colspan="2" style="font-weight: bold;"><span class="title_info">Your Password</span></td></tr>        
            <tr>
                <td width="10" style="color: red;">*</td>
                <td width="150" >Password:</td>
                <td><?php echo $form->input('password', array('label' => false, 'type'=>'password'));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>Password confirm:</td>
                <td><?php echo $form->input('confirm_password', array('label' => false, 'type'=>'password'));?></td>
            </tr>
        </table>
        </div>
        <div class="content-fields">
            <table style="margin-left: 35px;">
                <tr>
                    <td width="50%">
                        <a href="/members/account" class="button">
                            <div class="button_left"></div>
                            <div class="button_center" style="width: 126px;">Back</div>
                            <div class="button_right"></div> 
                         </a>
                    </td>
                    <td width="50%">                    
                        <a onclick="$('#MemberPasswordForm').submit();" class="button">
                            <div class="button_left"></div>
                            <div class="button_center" style="width: 126px;">Update</div>
                            <div class="button_right"></div> 
                         </a>                   
                    </td>
                </tr>
            </table>
        </div>
    </div>    
    <?php echo $form->end(); ?> 
</div>