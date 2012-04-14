<?php echo $html->css('members.css') ?>
<!--<input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);"/>-->
<script type="text/javascript">
    <!--//
//    var orders = {
//        _id: new Array(),
//	    removeId: function (i) {
//    		var key = 0;
//    		var sum = true;
//    		$.each(this._id, function (k, v) {
//    			if (v === i) {
//    				sum = false;
//    			}
//    	
//    			if (sum) {
//    				key++;
//    			}
//    		});
//    		this._id.splice(key, 1);
//            
//            if (typeof this._id[this._id.length - 1] != 'undefined') {
//                this._viewStudent(this._id[this._id.length - 1]);
//            } else {
//                this._viewStudent(this._defaultStudent);
//            }
//    	}
//    }
    
    $(document).ready(function(){
        $("tr.br-new, tr.br-old").mouseover(function () {
        	$(this).addClass("over_row");
        });
        $("tr.br-new, tr.br-old").mouseout(function () {
        	$(this).removeClass("over_row");
        	});
    });
//	$("tr.br-new, tr.br-old").click(function () {
//		var id = $(this).attr('id');
//		if ($(this).hasClass('br-selected')) {
//			orders.removeId(id);
//			$(this).removeClass('br-selected');
//		} else {
//			orders.addId(id);
//			$(this).addClass('br-selected');
//		}
//	});
    //-->
</script>

<div class="title-account">List of purchase orders</div>
<div style="clear: both;"></div>

<div id="orders">
    <table class="cart-heading" cellspacing="0">
        <thead>
            <tr>
              <th class="right" style="text-align: center">Order ID</th>
              <!--<th class="left">Vendor</th>-->
              <th class="left">Status</th>
              <th class="right">Total</th>
              <th class="left">Date Added</th>
              <th class="right">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($orders)){?>
            <?php foreach($orders As $key => $value){?>
            <tr id="<?php echo (isset($value['id'])) ? $value['id'] : null ?>" 
                class="<?php echo ($key % 2 == 0) ? 'br-new' : 'br-old'?>" >
              <td class="right"><?php echo (isset($value['id'])) ? $value['id'] : null ?></td>
              <td class="left"><?php echo (isset($value['status'])) ? $value['status'] : null ?></td>
              <td class="right"><?php echo (isset($value['total'])) ? $value['total'] : null ?></td>
              <td class="left"><?php echo (isset($value['date_added'])) ? $value['date_added'] : null ?></td>
              <td class="right"><a style="color: #38B0E3;" href="/members/products_history/<?php echo (isset($value['id'])) ? $value['id'] : "" ?>">[ View ]</a></td>
            </tr>
            <?php }?>
        <?php }?>
        </tbody>
    </table>
</div>