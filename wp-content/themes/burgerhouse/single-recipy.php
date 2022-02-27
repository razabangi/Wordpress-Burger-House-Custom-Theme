<?php get_header(); global $post; ?>

        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-leaf bg-green"></i> Blog</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

<?php if( have_posts() ): the_post(); ?> 
        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <span class="color-green">
                                	<?php 
                                	// $categories = get_the_category_list('|');
                                    $categories = get_the_terms(get_the_ID(),'recipies_categories');
                                	?>
                                    <?php foreach ($categories as $category): ?>
                                		<a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                                    <?php endforeach ?>
                            	</span>

                                <h3><a href="#"></a><?php the_title(); ?></h3>


                                <div class="blog-meta big-meta">
                                    <small><a href="garden-single.html" title=""><?php echo get_the_date('F d,Y'); ?></a></small>
                                    <small><a href="blog-author.html" title="">By <?php the_author(); ?></a></small>

                                    <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <?php if ( has_post_thumbnail() ): ?>
                                <?php the_post_thumbnail(); ?>
                            <?php endif ?>

                            <div class="blog-content">  
                                <div class="pp">
                                    <p><?php the_content(); ?></p>

                                </div><!-- end pp -->
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <?php $tags = get_the_tag_list('',' | '); ?>
                                    <?php if($tags): ?>
                                    	<?php echo $tags; ?>
                                	<?php endif; ?>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->

                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <!-- <img src="<?php echo THEMEROOT ?>/assets/upload/author.jpg" alt="" class="img-fluid rounded-circle">
                                          -->
                                          <?php echo get_avatar(get_the_author_meta('user_email',80,'')); ?>
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#"><?php the_author_meta('display_name'); ?></a></h4>
                                        <p><?php the_author_meta('description'); ?></p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">

                                	<?php 
                                    	// $tags = wp_get_post_tags(get_the_ID());
                                    	// $tag_ids = [];
                                    	// foreach ($tags as $tag) {
                                    	// 	$tag_ids[] = $tag->term_id;
                                    	// }
                                    	$args = [
                                    		'post_type' => 'recipy',
                                    		'post__not_in' => [get_the_ID()],
                                    		'posts_per_page'=> 2,
                                    	];

                                    	$related = new WP_Query($args);
                                    ?>

                                    <?php if ( $related->have_posts() ): ?>
                                    	<?php while( $related->have_posts() ): $related->the_post(); ?>

	                                    <div class="col-lg-6">
	                                        <div class="blog-box">
	                                            <div class="post-media">
	                                                <a href="garden-single.html" title="">
	                                                    <!-- <img src="upload/garden_single_03.jpg" alt="" class="img-fluid"> -->
	                                                    <?php if ( has_post_thumbnail() ): ?>
	                                                    	<?php the_post_thumbnail('medium'); ?>
	                                                    <?php endif ?>
	                                                    <div class="hovereffect">
	                                                        <span class=""></span>
	                                                    </div><!-- end hover -->
	                                                </a>
	                                            </div><!-- end media -->
	                                            <div class="blog-meta">
	                                                <h4><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h4>
	                                                <small>
	                                                	<a href="blog-category-01.html" title="">
	                                                		<?php 
	                                                		$categories = get_the_terms(get_the_ID(),'recipies_categories');
	                                                		 ?>
	                                                		<?php foreach ($categories as $category): ?>
	                                                				<a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
	                                                		<?php endforeach; ?>
	                                                	</a>
	                                                </small>
	                                                <small><a href="blog-category-01.html" title=""><?php echo get_the_date('F d,Y'); ?></a></small>
	                                            </div><!-- end meta -->
	                                        </div><!-- end blog-box -->
	                                    </div><!-- end col -->

                                   	 <?php endwhile; ?>
                                    <?php endif ?>                                    
                                   
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <?php comments_template(); ?>
                           
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                   	<?php get_sidebar(); ?>

                </div><!-- end row -->
            </div><!-- end container -->
        </section>

 <?php endif; 
 wp_reset_postdata(); ?> 

<?php get_footer(); ?>