<?php
/* The regular page template.
 * It's exactly same as a single article without cover image.
 */
  
?>
<header class="article-front">
    <section class="article-header article-header-no-cover">
      <h2 class="h2 entry-title"><?php the_title(); ?></h2>
    </section>
</header>

<div class="entry-content page-content article-content-container" data-spy="scroll" data-target="#myScrollspy">
<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>
</div>


