<article id="post-<?php the_ID();?>" <?php post_class(); ?> >
	<div class="entry-thumbnail">
		<?php xhadesvn_thumbnail('thumbnail'); ?>
	</div>
	<div class="entry-header">
		<?php xhadesvn_entry_header(); ?>
		<?php xhadesvn_entry_meta(); ?>
	</div>
	<div class="entry-content">
		<?php xhadesvn_entry_content(); ?>
		<?php ( is_single() ? xhadesvn_entry_tag() : '' ); ?>
	</div>
</article>