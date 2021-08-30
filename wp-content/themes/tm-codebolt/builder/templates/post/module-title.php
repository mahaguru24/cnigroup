<?php
/**
 * Posts module title template
 *
 * @package Tm_codebolt
 */
?>
<div class="tm_codeboltposts_title_group">
	<?php echo $this->html( $this->_var( 'super_title' ), '<h5 class="tm_codeboltposts_supertitle">%s</h5>' ); ?>
	<?php echo $this->html( $this->_var( 'title' ), '<h3 class="tm_codeboltposts_title">%s</h3>' ); ?>
	<?php echo $this->html( $this->_var( 'subtitle' ), '<h6 class="tm_codeboltposts_subtitle">%s</h6>' ); ?>
	<?php echo $this->esc_switcher( 'title_delimiter', '<div class="tm_codeboltposts_title_divider"></div>' ); ?>
</div>
