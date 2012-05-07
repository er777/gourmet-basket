<div style="margin:0 0 0 20px;">
<ul class="jquery-column">
<?php foreach ($users as $path => $anchor_text) :?>
<li class="vendor"><a href="<?php print $path;?>"><?php print $anchor_text; ?></a></li>
<? endforeach; ?>
</ul>
</div>