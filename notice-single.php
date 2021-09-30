<?php 
get_header();?>


<div class="gpa__notice_board_wrapper">
    <div class="col-12 gpa__notice_board_title_wrapper text-center"><h1>NOTICES AND EVENTS</h1></div>

    <div class="row gpa__notice_board_inner">

        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 gpa__notice_dispay_area">
        <h3>Notice Area</h3>
            <section class="gpa__notice_area">
                

                <?php
                  if (have_posts()) :while (have_posts()) :   the_post();?>
                  <article class="row ">
                            <?php if (has_post_thumbnail()):?>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 text-left">
                                    
                                    <a href="<?php the_post_thumbnail_url();?>"><div class="gpa__news_sidebar_post_thumbnail_wrapper">
                                      <img width="" height="" src="<?php the_post_thumbnail_url();?>" class="img-fluid wp-post-image" alt=""></div></a>
                                </div>
                            <?php endif;?>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <h4 class="">
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a><?php if(function_exists('gpa_PostViews')) { gpa_PostViews(get_the_ID()); }?>
                                    </h4>
                                    <div class=" ">
                                      <div class=""><a href="<?php the_permalink();?>" class="gpa__news_sidebar_post_date_link"><i class="fas fa-clock"></i> <?php the_date();?></a><span class="gpa__news_cat_separator"> || </span><?php the_category(', ');?></div>
                                    </div>
                
                                </div>
                  </article>
                  <?php endwhile; endif;

                  ?>


            </section>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 gpa__recent_notices">
            <aside>
                <h3>Notice Board Feed</h3>
                <div class="gpa__recent_notice_container scrollable mt-2">
            <div class="gpa__recent_notice_scroll">
                <?php 
                    query_posts('meta_key=post_views_count&orderby=meta_value_num&cat=30&posts_per_page=5');
                    //$catquery = new WP_Query( 'cat=30&posts_per_page=5' );  
                    if (have_posts()) :while (have_posts()) :   the_post();?>
                    <article class="gpa__sidebar_post  gpa__recent_notice ">
                        
                            <div class=" gpa__recent_notice_thumbnail_wrapper">
                                
                                <a href="<?php the_permalink();?>">
                                    <div class="gpa__recent_notice_thumbnail">
                                        <img width="86" height="77" src="<?php the_post_thumbnail_url();?>" srcset="<?php the_post_thumbnail_url();?>" class="wp-post-image" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="gpa__recent_notice_content_wrapper">
                                <h4 class="gpa__recent_notice_title ">
                                    <a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(), 5 ); ?></a>
                                </h4>
                                <div class="gpa__news_sidebar_post_meta gpa__recent_notice_post_meta text-right">
                                    <div class="gpa__news_sidebar_post_date"><a href="<?php the_permalink();?>" class="gpa__news_sidebar_post_date_link"><i class="fas fa-clock"></i> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')).' ago'; ?></a></div>
                                </div>
                            </div>
                    </article>
                    <?php endwhile; endif;
                    //wp_reset_postdata();
                    wp_reset_query();
                ?>
                </div>

            </div>
            </aside>
        </div>
    </div>


</div>




<div class="row mb-10">
    <div class="col-xs-12 swap">
    <div class="column-half column-half-2">
        image
    </div>
    <div class="column-half column-half-1">
        title
    </div>
    </div>
</div>


<?php get_footer();