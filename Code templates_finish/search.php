<?php get_header(); ?>
<div class="content">
	<div id="main-content">
	<div class="search-info">
	<!--Sử dụng query để hiển thị số kết quả tìm kiếm được tìm thấy
        Cũng như hiển thị từ khóa tìm kiếm. Từ khóa tìm kiếm cũng
        có thể hiển thị được với hàm get_search_query()-->
		<?php
			$search_query = new WP_Query('s='.$s.'&showpost=-1');
			$search_keyword = wp_specialchars($s, 1);
			$search_count = $search_query->post_count;
			printf(__('We found %1$s articles for your search query.', 'xhadesvn'), $search_count);

		?>
	</div>
		<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

			<?php get_template_part('content', get_post_format()); ?>

		<?php endwhile ?>
		<?php xhadesvn_pagination(); ?>
		<?php else: ?>
			<?php get_template_part('content', 'none'); ?>
		<?php endif; ?>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>