<?php 

// Creating the widget 
class Wpb_widget extends WP_Widget {
 
// The construct part  
function __construct() {
 parent::__construct(
  
// Base ID of your widget
'wpb_widget', 
  
// Widget name will appear in UI
__('Latest Recipy Widget', 'wpb_widget_domain'), 
  
// Widget description
array( 'description' => __( 'Add a latest recipy to the sidebar', 'wpb_widget_domain' ), ) 
);

}
  
// Creating widget front-end
public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	  
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];
	  

    	$args = [
    		'post_type' => 'recipy',
    		'posts_per_page' => 3,
    		'post_status' => 'publish',
    		'orderby' => 'rand'
    	];
    	$latest_posts_only_three = new WP_Query( $args ); 

	?>
	
		<div class="list-group">
			<?php if ( $latest_posts_only_three->have_posts() ): ?>
				<?php while( $latest_posts_only_three->have_posts() ): $latest_posts_only_three->the_post(); ?>
					 <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
		                <div class="w-100 justify-content-between">
		                    <img src="<?php echo THEMEROOT ?>/assets/upload/garden_sq_09.jpg" alt="" class="img-fluid float-left">
		                    <h5 class="mb-1"><?php the_title(); ?></h5>
		                    <small><?php echo get_the_date('F d,Y'); ?></small>
		                </div>
		            </a>
				<?php endwhile; ?>
			<?php endif; ?>
           	
         </div>
	<?php
	// echo $args['after_widget'];
}
          
// Creating widget Backend 
public function form( $instance ) {
	 if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	}
	else {
	$title = __( 'New title', 'wpb_widget_domain' );
	}
	// Widget admin form
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
	<?php 
}
      
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
 	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
}
 
// Class wpb_widget ends here
} 



?>