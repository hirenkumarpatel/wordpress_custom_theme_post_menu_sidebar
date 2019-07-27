<!-- header-->
<?php
get_header();
?>

<main>
  <a href="<?php echo site_url('/project'); ?>">
    <h2 class="page-heading">All Projects</h2>
  </a>
  <!-- project post starts here-->
  <section>

    <?php
    $args = array(
      'post_type' => 'project',
      
    );

    $project = new WP_Query($args);

    if ($project->have_posts()) {
      while ($project->have_posts()) {

        $project->the_post();
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
            <div class="card-meta-blogpost">
             <?php

                /** retriving project post type's meta informtaion(custom field info) and displaying in fields */

                $start_date= get_post_meta(get_the_ID(),'project_start_date',true);
                $end_date=get_post_meta(get_the_ID(),'estimated_end_date',true);
                $cost=get_post_meta(get_the_ID(),'project_cost',true);
                if(!empty($start_date)and !empty($end_date)){
                  $start_date=date('F j, Y', strtotime($start_date));
                  $end_date=date('F j, Y', strtotime($end_date));
                  ?>
                    <b>Project Timeline :</b><?php echo $start_date?> To <?php echo $end_date;?>

                  <?php
                }
                ?>
                <b>Project Cost : $</b><?php if($cost>0):echo $cost; endif;?>
             
          </div>
            <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
          </div>
        </div>
      <?php
      }
    } else { ?>
      <h3>No Projects Found! </h3>
    <?php } ?>

  </section>

  <!-- project post ends here--->



  <!-- pagination-->

  <div class="pagination">
  <!-- this function is same as below but used for older version of wordpress-->  
  <!-- <?php echo paginate_links(); ?> -->

    <!-- this WP function supports wordpress 4.1 and heigher and used to print pagination links-->
    <?php echo the_posts_pagination(); ?>
  </div>
  <!-- footer--->
  <?php
  get_footer();
  ?>