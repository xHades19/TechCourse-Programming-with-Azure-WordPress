
<!DOCTYPE html>
<html <?php language_attributes(); ?> />
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="profile" href="http://gmgp.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	<!-- 
	@ hook wp_head(), đây là cái hook để giúp WordPress hiểu được đây là khu vực thẻ <head> 
	của theme bạn để nó có thể tự thêm các thành phần cần thiết lên,
	cũng như các plugin khác có muốn can thiệp vào khu vực này thì cũng sẽ dò qua hook wp_head()

	@ Không thiết lập thẻ <title> là bởi vì ở function.php đã thêm chức năng title-tag
	 -->
	 
</head>
<body <?php body_class(); ?> >
<!-- 
mở thẻ <body> và có thêm template tag body_class() vào. 
Đây là hàm mà nó sẽ trả về các class tượng trưng cho từng trang lên thẻ body 
để nếu có tùy biến CSS cho từng trang thì cứ dựa vào các class tượng trưng này mà làm.
 -->
	<div id="container">
		<div class="logo">
			<?php xhadesvn_header(); ?>
			<?php xhadesvn_menu('primary-menu'); ?>
		</div>