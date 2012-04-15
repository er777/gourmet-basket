<div class="content_page">
    <h1>Change Billing</h1>
        <?php echo $form->create('Member', array('action' => 'update_bill'));?>
            <table style="margin-left: 35px">
            <tr>
                <td align="right"><?php echo $form->input('address', array('label' => 'Address:&nbsp;&nbsp;', 'value' => $data['Member']['address']));?></td>
            </tr>
            <tr>
                <td align="right"><?php echo $form->input('city', array('label' => 'City:&nbsp;&nbsp;', 'value' => $data['Member']['city']));?></td>
            </tr>
            <tr>
                <td align="right"><?php echo $form->input('State', array('label' => 'State:&nbsp;&nbsp;', 'value' => $data['Member']['state']));?></td>
               </tr>
            <tr>
                <td align="right">
                     <a onclick="$('#MemberUpdateBillForm').submit();" class="button">
                        <div class="button_left"></div>
                        <div class="button_center" style="width: 126px;">Save</div>
                        <div class="button_right"></div>
                    </a>
                </td>
            </tr>
            </table>
        <?php echo $form->end(); ?>
</div>