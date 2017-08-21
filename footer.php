<?php $footer = get_option('footer_choice','one'); //if not set default to 'one' ?>

<?php if ( is_active_sidebar( 'call_to_action' ) ) : ?>
<div class="call-to-action">
	<?php dynamic_sidebar( 'call_to_action' ); ?>
</div>
<?php else : ?>
	
<?php endif; ?>

<footer class="site-footer footer-<?php echo $footer; ?>">
	<?php get_template_part( 'template-parts/footers/footer', $footer ); ?>
	<div class="credits">
		<div class="container">
			<div class="col-sm-6">
				Copyright <?php echo get_option('company_name').' '.date('Y');  ?>
			</div>
			<div class="col-sm-6 text-right">
				<a class="udm_credit" href="http://uglyduckmarketing.com/" target="_blank">Created by Ugly Duck Marketing</a>
			</div>
		</div>
	<div>
</footer>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
