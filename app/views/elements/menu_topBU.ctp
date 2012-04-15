<ul>
    <li><?php echo $html->image('menu1.png', array('border' => '0', "alt"=>"Home", "title"=>"Home", "url"=>"/")); ?></li>
    <li><?php echo $html->image('menu2.png', array('border' => '0', "alt"=>"Vendor", "title"=>"Vendor", "url"=>"/")); ?></li>
    <li><?php echo $html->image('menu3.png', array('border' => '0', "alt"=>"Member", "title"=>"Member", "url"=>"/")); ?></li>
    <li><?php echo $html->image('menu4.png', array('border' => '0', "alt"=>"Blog", "title"=>"Blog", "url"=>"/")); ?></li>
    <li><?php echo $html->image('menu5.png', array('border' => '0', "alt"=>"Contact", "title"=>"Contact", "url"=> array('controller' => 'pages', 'action' => 'contact'))); ?></li>
</ul>