<?php get_header( tm_codebolt_template_base() ); ?>

	<?php tm_codebolt_site_breadcrumbs(); ?>

	<div <?php tm_codebolt_content_wrap_class(); ?>>

		<div class="row">

			<div id="primary" <?php tm_codebolt_primary_content_class(); ?>>

				<main id="main" class="site-main" role="main">

					<?php include tm_codebolt_template_path(); ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- .container -->

<?php get_footer( tm_codebolt_template_base() ); ?>
