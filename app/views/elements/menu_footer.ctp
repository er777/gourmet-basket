<div class="menu_footer"> 
    <ul class="item_menu">
        <li><?php echo $html->link('Home', '/'); ?></li>
        <li>|</li>
        <li><?php echo $html->link('Vendor Products', array('controller' => 'products', 'action' => 'index')); ?></li>
        <li>|</li>
        <li><?php echo $html->link('About Us', array('controller' => 'pages', 'action' => 'about')); ?></li>
        <li>|</li>
        <li><?php echo $html->link('Shipping Policy', array('controller' => 'pages', 'action' => 'shipping')); ?></li>
        <li>|</li>
        <li><?php echo $html->link('Return Policy', array('controller' => 'pages', 'action' => 'return')); ?></li>
        <li>|</li>
        <li><?php echo $html->link('Vendor Sign Up', '/'); ?></li>
        <li>|</li>
        <li><?php echo $html->link('Member Sign Up', '/'); ?></li>
        <li>|</li>
        <li><?php echo $html->link('Blog', '/'); ?></li>
        <li>|</li>
        <li><?php echo $html->link('Contact', array('controller' => 'pages', 'action' => 'contact')); ?></li>
    </ul>
</div>
<span class="text_footer"> &copy; Copyright 2012 - Gourmet Basket </span> 