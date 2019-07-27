<!-- header-->
<?php
get_header();
?>

<main>
  <a href="<?php echo site_url('/about'); ?>">
    <h2 class="page-heading">About Us</h2>
  </a>
  <!-- project post starts here-->
  <section>

   <?php

    if (have_posts()) {
      while (have_posts()) {

        the_post();
        ?>


        <?php

        /** listing submenu for sub pages */

        $args=array(
          'child_of'=> get_custom_ancestor_id(),     //get_custom_ancestor_id id custom function to retrive top parent id; $post->ID to get child of current page
          'title_li'=>''
        );
         wp_list_pages($args);
        ?>
        <div class="card">
          <?php

          if (has_post_thumbnail(get_the_ID())) {
            ?>
            <div class="card-image">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
              </a>
            </div>
          <?php
          }
          ?>
          <div class="card-description">
            <a href="<?php the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
            </a>
            
            <p><?php echo get_the_content(); ?></p>
            
          </div>
        </div>
      <?php
      }
    } else { ?>
      <h3>No Content Found! </h3>
    <?php } ?>

  </section>

  <!-- footer--->
  <?php
  get_footer();
  ?>