<?php get_header();?>
<!-- main blog-->
<main>
<?php
    while(have_posts()){
      the_post();
    
    ?>
    <h2 class="page-heading"><?php the_title();?></h2>
    <div id="post-container">

    <!-- post start here-->
    
      <section id="blogpost">
        <div class="card">
          
          <div class="card-image">
            <img src="<?php echo  get_the_post_thumbnail_url(get_the_ID());?>" >
          </div>
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
          <div class="card-description">
            
            <?php the_content();?>
          </div>
        </div>

        <!-- comment section---
          
        <div id="comments-section">
          Comments Section
        </div>    -->

      </section>
    <?php }?>
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

<?php get_footer();?>