<?php
/**
 * This template is used for visual builder single pages.
 * @since 2.0.0 
  */

get_header();

?>

<div id="main-content" class="wcbd_main_content">

<?php while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

</div> <!-- #main-content -->

<?php

get_footer();
