<?php get_header(); ?>
<div class="content">
<!-- 
Mình sẽ có class .content dùng để bao bọc xung quanh phần hiển thị nội dung và sidebar. 
Sau đó, #main-content là khung hiển thị nội dung và #sidebar là khung hiển thị sidebar của website.
 -->
	<div id="main-content">
		<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<!-- 
			@ get_template_part( 'content', get_post_format() ) nghĩa là nó sẽ load file content-$format.php trong thư mục theme. 
			Cái $format nghĩa là cái tên định danh của từng loại Post Format như video, audio, image,…
			mà nếu post đó chưa chọn post format thì nó sẽ load file content.php
			 -->

			<?php get_template_part('content', get_post_format()); ?>
			

		<?php endwhile ?>
		<!--
		@xhadesvn_pagination: gọi hàm phân trang trong functions.php
		 -->
		<?php xhadesvn_pagination(); ?>
		
		<?php else: ?>
			<!-- 
			@ get_template_part( 'content', 'none' ) nghĩa là nó sẽ load file content-none.php trong thư mục theme, 
			và file này chúng ta sẽ viết nội dung hiển thị thông báo query này chưa có dữ liệu.
			Ví dụ như nó sẽ báo website này chưa có bài viết chẳng hạn.
			-->
			<?php get_template_part('content', 'none'); ?>
			

		<?php endif; ?>
	</div>
	<div id="sidebar">
	<!-- 
	@get_sidebar: gọi hàm sidebar từ functions.php
	 -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>