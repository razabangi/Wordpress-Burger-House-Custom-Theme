<div class="blog-box row">
    <div class="col-md-4">
        <div class="post-media">
            <a href="<?php the_permalink(); ?>" title="">
                <!-- <img src="<?php echo THEMEROOT ?>/assets/upload/garden_sq_01.jpg" alt="" class="img-fluid"> -->
                <?php if ( has_post_thumbnail() && !post_password_required() ): ?>
                	<?php the_post_thumbnail('medium'); ?>
                <?php else: ?>
                	<p>No Image Found!</p>
                <?php endif ?>
                <div class="hovereffect"></div>
            </a>
        </div>
    </div>

    <div class="blog-meta big-meta col-md-8">
        <span class="bg-aqua">
        <a href="<?php the_permalink(); ?>" title="">
        	<?php 
        	$categories = get_the_category_list('|');
        	 ?>
        	<?php if ($categories): ?>
        		<?php echo $categories; ?>
        	<?php endif ?>
    	</a>
    	</span>
        <h4><a href="<?php the_permalink(); ?>" title=""><?php the_title(); ?></a></h4>
        <p><?php the_excerpt(); ?></p>
        <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> 1887</a></small>
        <small><a href="garden-single.html" title=""><?php echo get_the_date('F d, Y'); ?></a></small>
        <small><a href="#" title=""><?php the_author(); ?></a></small>
    </div>
</div> 

<hr class="invis">