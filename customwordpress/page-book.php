<!-- header-->
<?php
get_header();
?>

<main>
  <a href="<?php echo site_url('/book'); ?>">
    <h2 class="page-heading">All Books</h2>
  </a>
  <!-- book post starts here-->
  <section>

    <?php
    $args = array(
      'post_type' => 'book',
      'post_per_page' => 3
    );

    $book = new WP_Query($args);

    if ($book->have_posts()) {
      while ($book->have_posts()) {

        $book->the_post();
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
            <div class="card-meta">
              Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?> 
            </div>
            <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
          </div>
        </div>
      <?php
      }
    } else { ?>
      <h3>No books Found! </h3>
    <?php } ?>

  </section>

  <!-- book post ends here--->



  <!-- pagination-->

  <div class="pagination">
    <?php echo paginate_links(); ?>
  </div>
  <!-- footer--->
  <?php
  get_footer();
  ?>