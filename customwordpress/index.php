<!-- header-->
<?php
get_header();
?>

<main>
    <a href="<?php echo site_url('/blog'); ?>">
        <h2 class="page-heading">All Blogs</h2>
    </a>

    <section>
        <!-- blog post starts here-->
        <?php

        while (have_posts()) {
            the_post();
            ?>
            <div class="card">
                <div class="card-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
                    </a>
                </div>

                <div class="card-description">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <div class="card-meta">
                        Posted by <?php the_author(); ?> on <?php the_time('F j, Y'); ?> in
                        <a href="#"><?php echo get_the_category_list(', '); ?></a>
                    </div>
                    <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
                </div>
            </div>
        <?php }  ?>


        <!-- blogpost ends here--->

    </section>

    <!-- pagination-->

    <div class="pagination">
        <!-- this function is same as below but used for older version of wordpress-->
        <?php echo paginate_links(); ?>

        <!-- this WP function supports wordpress 4.1 and heigher and used to print pagination links-->
        <!-- <?php  the_posts_pagination(); ?> -->
    </div>
    <!-- footer--->
    <?php
    get_footer();
    ?>