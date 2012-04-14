<div class="content_page">
<h1>Account Login</h1>
<div style="margin-top: 23px;margin-bottom: 10px; display: inline-block; width: 100%; text-align: center;">
  <div style="float: left; display: inline-block; width: 49%;"><b style="margin-bottom: 2px; display: block;">New Customers</b>
    <div style="padding: 10px; min-height: 210px;">
        <div style="text-align: left;font-size: 15px;font-family: calibri;">
        If you are new to Gourmet Basket, we encourage<br />
        you to create a new account in order for you to<br />
         track your purchases and receive promotions and<br />
          discounts directly to your inbox.
        </div>
        <br />
        <a href="register" class="button">
            <div class="button_left"></div>
            <div class="button_center" style="width: 126px;">Sign Up</div>
            <div class="button_right"></div>
        </a>
    </div>
  </div>
  <div style="float: right; display: inline-block; width: 50%; text-align: center;"><b style="margin-bottom: 2px; display: block;">Login</b>
    <div style="border-left: 1px solid #000000; padding: 10px; min-height: 210px;">
        <div style="text-align: left;font-size: 15px;font-family: calibri;">
        Please enter your login credentials to access your account.
        </div>
        <br />
        <?php if(isset($error_login)){?>
        <div style="color: red; font-size: 12px; font-weight: bold;"><?php echo $error_login;?></div>
        <?php }else{?>
        <?php }?>

        <?php echo $form->create('Member', array('action' => 'login'));?>
        <table style="font-size: 15px;font-family: calibri;">
            <tr>
                <td align="right">
                    <?php echo $form->input('username', array('label' => 'User Name:&nbsp;&nbsp;'));?>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <?php echo $form->input('password', array('label' => 'Password:&nbsp;&nbsp;', 'type'=>'password'));?>
                </td>
            </tr>
            <tr>
                <td align="right">
                   <!-- <a onclick="$('#MemberLoginForm').submit();" class="button" style="float: right;">
                        <div class="button_left"></div>
                        <div class="button_center" style="width: 126px;">Login</div>
                        <div class="button_right"></div>
                    </a> -->
                    <input type="submit" class="button_center" style="width: 126px;" value="Login">
                    <span><a href="/members/forgot">Forgot your password?</a></span>
                </td>
            </tr>
        </table>
        <?php echo $form->end(); ?> 
    </div>
  </div>
</div>
</div>
<script type="text/javascript"><!--
$('#MemberLoginForm input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#MemberLoginForm').submit();
	}
});
//--></script>