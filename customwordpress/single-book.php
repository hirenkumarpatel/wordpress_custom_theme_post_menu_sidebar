<?php get_header(); ?>
<!-- main blog-->
<main>
  <?php
  while (have_posts()) {
    the_post();

    ?>
    <h2 class="page-heading"><?php the_title(); ?></h2>
    <div id="post-container">

      <!-- post start here-->

      <section id="blogpost">
        <div class="card">
          
          <div class="card-image">
            <img src="<?php echo  get_the_post_thumbnail_url(get_the_ID()); ?>">
          </div>
          <div class="card-meta-blogpost">
            <?php

            /** retriving Book post type's meta informtaion(custom field info) and displaying in fields */

            $isbn = get_post_meta(get_the_ID(), 'book_isbn', true);
            $price = get_post_meta(get_the_ID(), 'book_price', true);
            $downlod_link = get_post_meta(get_the_ID(), 'book_download', true);

            ?>
            <b>ISBN: </b><?php echo $isbn ?>
            <b> Price : $</b><?php echo $price; ?> <b>Author :</b><?php the_author(); ?>

          </div>
          <div class="card-description">

            <?php the_content(); ?>
          </div>
        </div>

        <!-- comment section---
          
        <div id="comments-section">
          Comments Section
        </div>    -->

      </section>
    <?php } ?>
    <!-- post ends here-->

    <!-- side bar area--->
    <aside id="sidebar">
        <!--  
          get_sidebar() is used to  load sidebar-primary.php file in theme
          primary is name of sidebar registered in functions.php
        -->
      <?php get_sidebar( 'primary' ); ?>
      </aside>
  </div>

  <?php get_footer(); ?>