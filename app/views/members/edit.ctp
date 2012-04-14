<div class="content_page">
    <?php echo $form->create('Member', array('action' => 'edit'));?>
    <h1>My Account Information</h1>
    <div>
        <?php if(isset($error_edit)){?>
        <div style="color: red;"><?php echo $error_edit;?></div>
        <?php }else if(isset($done_edit)){?>
        <div style="color: green;"><?php echo $done_edit;?></div>
        <?php }?>
        <div class="content-fields"> 
        <table style="margin-left: 35px;">
        <tr><td colspan="2" style="font-weight: bold;"><span class="title_info">Your Information</span></td></tr>        
            <tr>
                <td width="10" style="color: red;">*</td>
                <td width="150" >First Name:</td>
                <td><?php echo $form->input('firstname', array('label' => false, 'value' => $info['firstname']));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>Last Name:</td>
                <td><?php echo $form->input('lastname', array('label' => false, 'value' => $info['lastname']));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>E-Mail:</td>
                <td><?php echo $form->input('email', array('label' => false, 'value' => $info['email']));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>Telephone:</td>
                <td><?php echo $form->input('phone', array('label' => false, 'value' => $info['phone']));?></td>
            </tr>
            <tr>
                <td width="10"></td>
                <td>Fax:</td>
                <td><?php echo $form->input('fax', array('label' => false, 'value' => $info['fax']));?></td>
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
                        <a onclick="$('#MemberEditForm').submit();" class="button">
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