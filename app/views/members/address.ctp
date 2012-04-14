<div class="content_page">      
    <?php if(isset($option)){?>
    <h1><?php echo $option=="new"?'Add':'Edit';?> Address</h1>
        <?php echo $form->create('Member', array('action' => $option=="new"?'newaddress':'editaddress'));?>
        <div class="content-fields">
            <table style="margin-left: 35px;">
                <tr>
                    <td width="10" style="color: red;">*</td>
                    <td width="150">First Name:</td>
                    <td><?php echo $form->input('firstname', array('label' => false, 'value' => $addressinfo['firstname']));?></td>
                </tr>
                <tr>
                    <td width="10" style="color: red;">*</td>
                    <td>Last Name:</td>
                    <td><?php echo $form->input('lastname', array('label' => false, 'value' => $addressinfo['lastname']));?></td>
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
            <table style="margin-left: 35px; width: 100%;">
                <tr>
                    <td width="50%" align="left">
                        <a href="/members/address" class="button" style="float: left;">
                            <div class="button_center" style="width: 126px;">Back</div>
                         </a>
                    </td>
                    <td width="50%" align="right">                    
                        <a onclick="$('#MemberAddaddressForm').submit();"  class="button" style="float: right;">
                            <div class="button_center" style="width: 126px;">Add</div>
                         </a>                   
                    </td>
                </tr>
            </table>
        </div>
        <?php echo $form->end(); ?>
    <?php }else{ ?>
        <h1>Book address</h1>
        <div class="content-fields"> 
            <table style="margin-left: 35px; width: 100%;">
            <tr><td colspan="2" style="font-weight: bold;"><span class="title_info">Address Book Entries</span></td></tr>
            <?php
            foreach ($addressinfo as $address) {       
            ?>        
                <tr>
                    <td width="50%">
                        <?php echo $address['firstname']. " " . $address['lastname'];?><br />
                        <?php echo $address['address'];?><br />
                        <?php echo $address['city'] .", ". $address['state']." ".$address['postcode'];?><br />
                        <?php echo $address['country'];?> 
                    </td>
                    <td width="50%">
                        <a href="/members/address/<?php echo $address['address_id'];?>" class="button">
                            <div class="button_center" style="width: 126px;">Edit</div>
                        </a>                 
                        <a href="/members/deladdress/<?php echo $address['address_id'];?>" class="button">
                            <div class="button_center" style="width: 126px;">Delete</div>
                        </a>
                    </td>
                </tr>
            <?php
            }	
            ?>
            </table>
        </div>
        
        <div class="content-fields">
            <table style="margin-left: 35px; width: 100%;">
                <tr>
                    <td width="50%" align="left">
                        <a href="/members/account" class="button" style="float: left;">
                            <div class="button_center" style="width: 126px;">Back</div>
                         </a>
                    </td>
                    <td width="50%" align="right">                    
                        <a href="/members/address/new" class="button" style="float: right;">
                            <div class="button_center" style="width: 126px;">New Address</div>
                         </a>                   
                    </td>
                </tr>
            </table>
        </div>
    <?php }?>
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