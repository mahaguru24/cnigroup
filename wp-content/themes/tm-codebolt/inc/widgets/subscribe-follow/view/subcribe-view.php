<?php
/**
 * Template part to display subscribe form.
 *
 * @package tm_codebolt
 * @subpackage widgets
 */
?>
<div class="subscribe-block">

	<?php echo $this->get_block_title( 'subscribe' ); ?>
	<?php echo $this->get_block_message( 'subscribe' ); ?>

	<form method="POST" action="#" class="subscribe-block__form">
		<?php echo $this->get_nonce_field(); ?>
		<div class="subscribe-block__input-group">
			<div class="subscribe-block__input-wrap">
				<?php echo apply_filters( 'tm_codebolt_subscribe_view_icon', '<i class="linearicon linearicon-envelope"></i>' ); ?>
				<?php echo $this->get_subscribe_input(); ?>
			</div>
			<?php $btn = 'btn btn-primary'; ?>
			<?php echo $this->get_subscribe_submit( $btn ); ?>
		</div>
		<?php echo $this->get_subscribe_messages(); ?>
	</form>
</div>
