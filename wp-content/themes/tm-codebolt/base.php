<?php get_header( tm_codebolt_template_base() ); ?>

	<?php tm_codebolt_site_breadcrumbs(); ?>

	<?php do_action( 'tm_codebolt_render_widget_area', 'full-width-header-area' ); ?>

	<?php tm_codebolt_single_modern_header(); ?>

	<div <?php tm_codebolt_content_wrap_class(); ?>>

		<?php do_action( 'tm_codebolt_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" <?php tm_codebolt_primary_content_class(); ?>>

				<?php do_action( 'tm_codebolt_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include tm_codebolt_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'tm_codebolt_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->

			<?php get_sidebar(); // Loads the sidebar.php. ?>

		</div><!-- .row -->

		<?php do_action( 'tm_codebolt_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .container -->

	<?php do_action( 'tm_codebolt_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( tm_codebolt_template_base() ); ?>
