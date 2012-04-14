<div class="content_page">
    <?php echo $form->create('Member', array('action' => 'register'));?>
    <h1>CREATE ACCOUNT</h1>
    <span>If you already have an account with us, please login at the <?php echo $html->link('login page', array('controller' => 'members', 'action' => 'login')); ?>.</span>
    <div>
        <?php if(isset($error_register)){?>
        <div class="msg_error"><?php echo $error_register;?></div>
        <?php }else{?>
        <?php }?>
        <div class="content-fields">
        <table style="margin-left: 35px">
        <tr><td colspan="3" style="font-weight: bold;" ><span class="title_info">Your Personal Details</span></td></tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td width="150">First Name:</td>
                <td><?php echo $form->input('firstname', array('label' => false));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>Last Name:</td>
                <td><?php echo $form->input('lastname', array('label' => false));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>User Name</td>
                <td><?php echo $form->input('username', array('label' => false));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>E-Mail:</td>
                <td><?php echo $form->input('email', array('label' => false));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>Telephone:</td>
                <td><?php echo $form->input('phone', array('label' => false));?></td>
            </tr>
            <tr>
                <td width="10"></td>
                <td>Fax:</td>
                <td><?php echo $form->input('fax', array('label' => false));?></td>
            </tr>
        </table>
        </div>
        <div class="content-fields">
        <table style="margin-left: 35px;">
        <tr><td colspan="2" style="font-weight: bold;"><span class="title_info">Your Address</span></td></tr>        
            <tr>
                <td width="10" style="color: red;">*</td>
                <td width="150">Address:</td>
                <td><?php echo $form->input('adress', array('label' => false));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>City:</td>
                <td><?php echo $form->input('city', array('label' => false));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>Post Code:</td>
                <td><?php echo $form->input('postcode', array('label' => false));?></td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>Country:</td>
                <td>
                <?php echo $form->input('country', array('options' => array($list_countries), 'label' => false, 'default'=>'223')); ?>
                </td>
            </tr>
            <tr>
                <td width="10" style="color: red;">*</td>
                <td>Region / State:</td>
                <td><div id="cont-states"><? echo $form->input('state', array('options' => $list_zones,'label'=>false,'div'=>null));?></div></td>
            </tr>
        </table>
        </div>
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
                    <td width="250">I have read and agree to the <a href="#">Privacy Policy</a></td>
                    <td width="15"><?php echo $form->input('check', array('type' => 'checkbox', 'label' => false));?></td>
                    <td >                    
                  <!--      <a href=""  onclick="$('#MemberRegisterForm').submit();" class="button">
                            <div class="button_left"></div>
                            <div class="button_center" style="width: 126px;">Create</div>
                            <div class="button_right"></div> 
                         </a>         -->
                        <input type="submit" class="button_center" style="width: 126px;" value="Create">
                    </td>
                </tr>
            </table>
        </div>
    </div>    
    <?php echo $form->end(); ?> 
</div>
<script type="text/javascript">
$("document").ready(
function() {

    $('#MemberCountry').change(function()
    {
        $.ajax({
               type: "GET",
               url: "/members/getStates/"+$(this).val(),
               beforeSend: function() {
                     $('#cont-states').html('<div class="rating-flash" id="cargando_div">Cargando <img src="/img/ajax-loader_mini.gif"></div>');
                     },
               success: function(msg){
                   $('#cont-states').html(msg);
               }
             });
    });

}
);
</script>