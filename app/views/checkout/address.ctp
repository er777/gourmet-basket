<div class="content_page">
    <h1>Change <?php echo $option;?> address</h1>
        <div class="content-fields"> 
            <table style="margin-left: 35px;">
            <tr><td colspan="2" style="font-weight: bold;"><span class="title_info">Address Book Entries</span></td></tr>
            <?php
            foreach ($addressinfo as $address) {       
            ?>        
                <tr>
                    <td>
                        <?php echo $address['firstname']. " " . $address['lastname'];?>
                        <?php echo ", ".$address['address'];?>
                        <?php echo $address['city'] .", ". $address['state'].", ".$address['postcode'];?>
                        <?php echo ", ".$address['country'];?> 
                    </td>
                    <td>
                        <?php echo $html->link('Select', array('controller' => 'checkout', 'action' => 'select'.$option.'address/'.$address['address_id'])); ?>
                    </td>
                </tr>
            <?php
            }	
            ?>
            </table>
        </div>
        <?php echo $form->create('Member', array('action' => 'addaddress'));?>
        <?php echo $form->hidden('memberid', array('value' => $this->Session->read('Member.member_id')));?>
        <?php echo $form->hidden('typeaddress', array('value' => $option));?>
        <div class="content-fields">
            <table style="margin-left: 35px;">
            <tr><td colspan="2" style="font-weight: bold;"><span class="title_info">New Address</span></td></tr>
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
            <table style="width: 95%;">
                <tr>
                    <td align="right">                    
                        <a href="#" onclick="$('#MemberAddaddressForm').submit();" class="button">
                            <div class="button_left"></div>
                            <div class="button_center" style="width: 126px;">Add</div>
                            <div class="button_right"></div> 
                         </a>                   
                    </td>
                </tr>
            </table>
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