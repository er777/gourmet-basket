
<h1>FULL CATALOG</h1>

<div class="jquery-column" style="margin:auto;width:800px;height:500px;">

<ul>
              <?php foreach ($all_categories as $category_name=>$children_and_cat_id) :?>
              <li> <a class="hand-drawn" href="/products/category/<?php print $children_and_cat_id['category_id'];?>"><?php print($category_name);?></a>
                <?php if(isset($children_and_cat_id['children'])): ?>
                <ul style="margin-left:10px;">
                  <?php foreach ($children_and_cat_id['children'] as $subcat_array) :?>
                  <li><a class="hand-drawn" href="/products/category/<?php print $subcat_array['subcategory_id'] ;?>"><?php print $subcat_array['name'];?></a>
			<?php if ($subcat_array['grandchildren']): ?>
			<ul style="font-size:11px; margin-left:20px;font-style:italic;">
			<?php foreach ($subcat_array['grandchildren'] as $grandchild): ?>
			<li><a href ="/products/subcategory/<?php print $grandchild['id']; ?>" style="color:#5864E8"><?php print $grandchild['name']; ?></a></li>
			<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		  </li>
                  <?php	endforeach; ?>
                </ul>
                <?php endif; ?>
              </li>
              <?php endforeach; ?>
            </ul>

</div>