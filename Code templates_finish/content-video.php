<article id="post-<?php the_ID();?>" <?php post_class(); ?> >
	<div class="entry-header">
		<?php xhadesvn_entry_header(); ?>
	</div>
	<div class="entry-content">
	<!-- 
	 @the_content: không có cho nó hiển thị nội dung rút gọn nữa mà sẽ hiển thị toàn bộ nội dung 
	 vì các video được chèn vào post bằng oEmbed sẽ không hiển thị ở nội dung rút gọn.
	 -->
		<?php the_content(); ?>
		<?php ( is_single() ? xhadesvn_entry_tag() : '' ); ?>
	</div>
</article>