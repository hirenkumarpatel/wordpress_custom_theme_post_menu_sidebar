<!--

Archive.php will get either of category or tag name and sort posts accordignly.
-->
<!-- header-->
<?php
get_header();
?>

<main>
    <a href="<?php echo site_url('/blog'); ?>">
        <h2 class="page-heading">Books</h2>
    </a>

    <section>
        <!-- book post starts here-->
        <?php

        while (have_posts()) {
            the_post();
            ?>
            <div class="card-book">
                <div class="card-image">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
                    </a>
                </div>

                <div class="card-description">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <div class="card-meta-blogpost">
                        <?php

                        /** retriving Book post type's meta informtaion(custom field info) and displaying in fields */

                        $isbn = get_post_meta(get_the_ID(), 'book_isbn', true);
                        $price = get_post_meta(get_the_ID(), 'book_price', true);
                        $downlod_link = get_post_meta(get_the_ID(), 'book_download', true);

                        ?>
                        <b>ISBN: </b><?php echo $isbn ?><br>
                        <b>Price : $</b><?php echo $price; ?> <b>Author :</b><?php the_author(); ?>

                    </div>
                    <br>

                    <a href="<?php the_permalink(); ?>" class="btn-readmore">View Book</a>
                </div>
            </div>
        <?php }  ?>


        <!-- bookpost ends here--->

    </section>

    <!-- pagination-->

    <div class="pagination">

    <?php echo get_paginate_links();?>
        <!-- this WP function supports wordpress 4.1 and heigher and used to print pagination links-->
        <!-- <?php the_posts_pagination(); ?> -->
    </div>
    <!-- footer--->
    <?php
    get_footer();
    ?>