<?php get_header(); global $post; ?>

    

        <section class="section first-section">
            <div class="container-fluid">
                <div class="masonry-blog clearfix" id="myrecipyapi">

                	<?php 
                	$args = [
                		'post_type' => 'recipy',
                		'posts_per_page' => 3,
                		'post_status' => 'publish',
                		'orderby' => 'rand'
                	];
                	$latest_posts_only_three = new WP_Query( $args );                	
                	?>
                	<?php if ( $latest_posts_only_three->have_posts() ): ?>
                		<?php while( $latest_posts_only_three->have_posts() ): $latest_posts_only_three->the_post(); ?>

		                <div class="left-side">
		                    <div class="masonry-box post-media">
		                    	
		                    	<?php if ( has_post_thumbnail() && !post_password_required() ): ?>
                                	<?php the_post_thumbnail('medium'); ?>
                                <?php else: ?>
                                	<p>No Image Found!</p>
                                <?php endif ?>
		                         <!-- <img src="<?php echo THEMEROOT ?>/assets/upload/garden_cat_01.jpg" alt="" class="img-fluid"> -->

		                         <div class="shadoweffect">
		                            <div class="shadow-desc">
		                                <div class="blog-meta">
		                                    <span class="bg-aqua">
	                                    		<?php 
                                    			$categories = get_the_terms(get_the_ID(),'recipies_categories');
	                                    		
	                                    		// $categories = get_the_category_list('|');		
	                                    		 ?>
	                                    		 	<?php foreach ($categories as $category) : ?> 
												           <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
												    <?php endforeach; ?>
		                                    </span>
		                                    <h4><a href="<?php echo get_the_permalink($post->ID); ?>" title=""><?php the_title(); ?></a></h4>
		                                    <small><a href="#" title=""><?php echo get_the_date('F d, Y'); ?></a></small>
		                                    <small><a href="#" title="">By <?php the_author(); ?></a></small>
		                                </div><!-- end meta -->
		                            </div><!-- end shadow-desc -->
		                        </div><!-- end shadow -->
		                    </div><!-- end post-media -->
		                </div><!-- end left-side -->

		                <?php endwhile; ?>
                	<?php endif ?>

                    
                 

                </div><!-- end masonry -->
            </div>
        </section>

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-list clearfix">
                                <!-- <div class="blog-box row">
                                    <div class="col-md-4">
                                        <div class="post-media">
                                            <a href="garden-single.html" title="">
                                                <img src="<?php echo THEMEROOT ?>/assets/upload/garden_sq_01.jpg" alt="" class="img-fluid">
                                                <div class="hovereffect"></div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="blog-meta big-meta col-md-8">
                                        <span class="bg-aqua"><a href="garden-category.html" title="">Indoor</a></span>
                                        <h4><a href="garden-single.html" title="">The best twenty plant species you can look at at home</a></h4>
                                        <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                        <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> 1887</a></small>
                                        <small><a href="garden-single.html" title="">11 July, 2017</a></small>
                                        <small><a href="#" title="">by Matilda</a></small>
                                    </div>
                                </div> -->

                                <?php 

                                if ( have_posts() ):
                                	while( have_posts() ):
                                		the_post(); ?>
                                	
                                	<?php get_template_part('templates_part/content'); ?>                                
                                <?php
                                	endwhile;
                                else:
                                	get_template_part('templates_part/non_content'); 
                                endif;
                                ?>

                                <div class="row">
                                    <div class="col-lg-10 offset-lg-1">
                                        <div class="banner-spot clearfix">
                                            <div class="banner-img">
                                                <img src="<?php echo THEMEROOT ?>/assets/upload/banner_05.jpg" alt="" class="img-fluid">
                                            </div><!-- end banner-img -->
                                        </div><!-- end banner -->
                                    </div><!-- end col -->
                                </div><!-- end row -->

                            </div><!-- end blog-list -->
                        </div><!-- end page-wrapper -->

                        <hr class="invis">

                        <div class="row">
                            <!-- <div class="col-md-12"> -->
                                <!-- <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav> -->
                                <?php burgerhouse_numbered_pagination(); ?>
                            <!-- </div> -->
                        </div><!-- end row -->
                    </div><!-- end col -->

                   <?php get_sidebar(); ?>

                </div><!-- end row -->
            </div><!-- end container -->
        </section>

     <?php get_footer(); ?>