<div class="content_page">
    <h1>Forgot your Password?</h1>
    <?php if(isset($error_forgot)){?>
    <div class="msg_error"><?php echo $error_forgot;?></div>
    <?php }else{?>
    <?php }?>
    <?php echo $form->create('Member', array('action' => 'forgot'));?>
       <table style="margin-left: 35px">
       
            <tr>
                <td>E-Mail:</td>
                <td><?php echo $form->input('email', array('label' => false));?></td>
            </tr>
            <tr>
                <td>
                    <a onclick="$('#MemberForgotForm').submit();" class="button">
                        <div class="button_left"></div>
                        <div class="button_center" style="width: 126px;">Forgot</div>
                        <div class="button_right"></div>
                    </a>
                </td>
            </tr>
       </table>
    <?php echo $form->end(); ?> 
</div>