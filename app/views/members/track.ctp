<div class="content_page">
<!--
<br />
<pre style="text-align: left;">
<?php //var_dump($trackPurchases);?>
</pre>
<br />
-->
<h1>TRACK PURCHASES FROM CLIENT #: <?php echo $this->Session->read('Member.firstname'.' '.'lastname'); ?></h1>
<div id="content_vendor" style="float: none;">
<table class="cart">
<tr style="color: blue">
    <th>Shop Name</th>
    <th>Product</th>
    <th>Image</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total</th>
    <th>Date</th>
</tr>
<?php foreach($trackPurchases as $k => $v) { ?>
<tr>
	<td><?php echo $v['u']['business_name'] ?></td>
	<td><?php echo $v['p']['product_name'] ?></td>
	<td><?php echo $html->image('/admin/images/product/'.$v[0]['image'], array('style' => 'max-height:100px;')) ?></td>
	<td><?php echo $v['op']['quantity'] ?></td>
	<td><?php echo $v['p']['price'] ?></td>
	<td><?php echo $v['op']['total'] ?></td>
	<td><?php echo $v['o']['date_added'] ?></td>
</tr>
<?php } ?>
</table>
</div>
</div>
