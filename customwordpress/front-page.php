<!-- header-->
<?php
get_header();
?>

<div id="banner">
        <h1>&lt;Custom Wordpress/&gt;</h1>
        <h3>Wordpress Custom Features</h3>
    </div>
<main>
    <a href="<?php echo site_url('/blog'); ?>">
        <h2 class="section-heading">All Blogs</h2>
    </a>

    <section>
        <!-- blog post starts here-->
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 2
        );
        $blogpost = new WP_Query($args);
        while ($blogpost->have_posts()) {
            $blogpost->the_post();
            ?>
            <div class="card">
                <div class="card-image">
                    <a href="<?php the_permalink();?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="">
                    </a>
                </div>

                <div class="card-description">
                    <a href="<?php the_permalink();?>">
                        <h3><?php the_title();?></h3>
                    </a>
                    <p><?php echo wp_trim_words(get_the_content(),30);?></p>
                    <a href="<?php the_permalink();?>" class="btn-readmore">Read more</a>
                </div>
            </div>
        <?php }  ?>

        <?php wp_reset_query();?>
        <!-- blogpost ends here--->
       
    </section>

    <!-- project starts here-->

    <a href="<?php echo site_url('/projects'); ?>">
        <h2 class="section-heading">All Projects</h2>
    </a>

    <section>
        <!-- blog post starts here-->
        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => 2
        );
        $project = new WP_Query($args);
        while ($project->have_posts()) {
            $project->the_post();
            ?>
            <div class="card">
                <div class="card-image">
                    <a href="<?php the_permalink();?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="">
                    </a>
                </div>

                <div class="card-description">
                    <a href="<?php the_permalink();?>">
                        <h3><?php the_title();?></h3>
                    </a>
                    <p><?php echo wp_trim_words(get_the_content(),30);?></p>
                    <a href="<?php the_permalink();?>" class="btn-readmore">Read more</a>
                </div>
            </div>
        <?php }  ?>

        <?php wp_reset_query();?>
        <!-- blogpost ends here--->
       
    </section>
   
    <h2 class="section-heading">Source Code</h2>

    <section id="section-source">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum neque qui delectus ad dolor blanditiis perferendis praesentium
            consectetur aut sed provident obcaecati aspernatur perspiciatis, dolores nobis pariatur ipsum vel corrupti!
        </p>
        <a href="#" class="btn-readmore">GitHub Profile</a>
    </section>
    <!-- footer--->
    <?php
    get_footer();
    ?>