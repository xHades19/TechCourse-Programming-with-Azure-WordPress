<?php
/*
Plugin Name: Display Text Demo
Description: Hiển thị một message đơn giản trên web
Version: 1.0
Author: xHadesvn
Author URI: http://xhadesvn.com
*/
//Dùng activation_hook để tạo giá trị mặc định.
register_activation_hook(__FILE__, 'display_text_activation');
function display_text_activation() 
{    
  // set new option    
 add_option('display_message', 'Today, Microsoft Officer is very happy', '', '');
}

//Dùng get_template_part_loop hook để in ra màn hình
add_action('get_template_part_loop', display_text);
function display_text()
{	
  $msg = get_option('display_message'); 	
  echo '<h1>'.$msg.'</h1>';
}
function print_display_message()
{  
   
  $msg = get_option('display_message');  
  echo '<h1>'.$msg.'</h1>';
}
add_shortcode('display_text_shortcode', 'print_display_message');

/* Function have attribute
function print_display_message($atts = '')
{  
//Dùng hàm extract để lấy các giá trị của attribute.
//Dùng hàm shortcode_atts để thiết lập giá trị mặc định cho attribute nếu chúng ta “lỡ quên” truyền attribute cho shortcode.
  extract( shortcode_atts(array('say_more' => 'Hello World',), $atts )); 
  $msg = get_option('display_message');  
  echo '<h1>'.$msg.' và '.$say_more.'</h1>';
}
*/

