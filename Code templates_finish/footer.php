<footer id="footer">
	<div class="copyright">
		&copy; <?php echo date('Y'); ?> - <?php bloginfo('sitename'); ?> . <?php _e('All rights reserved', 'xhadesvn'); ?>. <?php _e('This website is proundly to use WordPress', 'xhadesvn'); ?>
	</div>
</footer>
</div> <!--end #container-->
<?php wp_footer(); ?>
<!-- 
@ hook wp_footer() là giúp cho WordPress nhận ra đâu là 
phần footer của trang web để một số plugin có thể hook vào và làm được những việc nó muốn.
 -->
</body>
</html>