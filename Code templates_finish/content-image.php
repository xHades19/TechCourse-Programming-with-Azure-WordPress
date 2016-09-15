<article id="post-<?php the_ID();?>" <?php post_class(); ?> >
	<div class="entry-thumbnail">
		<?php xhadesvn_thumbnail('large'); ?>
	</div>
	<div class="entry-header">
		<?php xhadesvn_entry_header(); ?>
		<?php
		/*
		* Đếm số lượng attachment có trong post
		*/
			$attachment = get_children( array( 'post_parent' => $post->ID ) );
			$attachment_number = count( $attachment );
			printf( __('This image post contains %1$s photos', 'xhadesvn'), $attachment_number );
		?>
	</div>
	<div class="entry-content">
		<?php xhadesvn_entry_content(); ?>
		<?php ( is_single() ? xhadesvn_entry_tag() : '' ); ?>
	</div>
</article>