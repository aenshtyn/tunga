<?php

/**
*
* Single Banner widget.
*
**/

if ( !class_exists('Techeduem_Single_Banner') ) {
	class Techeduem_Single_Banner extends WP_Widget{

		function __construct(){

			$widget_options = array(
				'description' 					=> esc_html__('This widget show banner', 'techeduem'), 
				'customize_selective_refresh' 	=> true,
			);

			parent:: __construct('Techeduem_Single_Banner', esc_html__( 'Techedu: Banner', 'techeduem'), $widget_options );

		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){ 

			$image = isset( $instance['image'] ) ? $instance['image'] : '';
			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$banner_link = isset( $instance['banner_link'] ) ? $instance['banner_link'] : '';


			?>
			
	        <?php echo wp_kses_post($args['before_widget']); 
		        if ( !empty( $title ) ) {
				 	echo wp_kses_post($args['before_title']); echo esc_html( $title ); echo wp_kses_post($args['after_title']);
				}  
				if ( !empty($image) ): ?>
        			<div class="sidebar-banner">
        				<?php if ($banner_link): ?><a href="<?php echo esc_url( $banner_link ); ?>"> <?php endif ?><img src="<?php echo esc_url( $image ) ; ?>" alt="<?php echo esc_attr__('Banner Image','techeduem'); ?>"><?php if ($banner_link): ?>
        					</a>
        				<?php endif ?>
        			</div>
        		<?php endif ?>
	        <?php echo wp_kses_post($args['after_widget']); ?>

		<?php }


		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update($new_instance, $old_instance){
			$instace = array();
			$instance['image'] = ( !empty($new_instance['image']) ) ? strip_tags ( $new_instance['image'] ) : '';
			$instance['title'] = ( !empty($new_instance['title']) ) ? strip_tags ( $new_instance['title'] ) : '';
			$instance['banner_link'] = ( !empty($new_instance['banner_link']) ) ? strip_tags ( $new_instance['banner_link'] ) : '';
			

			if ( current_user_can( 'unfiltered_html' ) ) {
			        $instance['title'] = $new_instance['title'];
			} else {
			        $instance['title'] = wp_kses_post( $new_instance['title'] );
			}

			return $instance;
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */

		public function form($instance){ 
			
			$image = !empty( $instance['image'] ) ? $instance['image'] : ''; 
			$title = !empty( $instance['title'] ) ? $instance['title'] : ''; 
			$banner_link = !empty( $instance['banner_link'] ) ? $instance['banner_link'] : ''; 

			?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:' ,'techeduem') ?></label>
				<input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php echo esc_html__('Upload Image:','techeduem');?></label>
					<?php if(!empty($image)){ ?>
						<img class="custom_media_image" src="<?php echo esc_html($image); ?>" style="margin:0;padding:0;max-width:100px;display:inline-block" />
					<?php } ?>
					<input type="text" class="widefat custom_media_url" name="<?php echo esc_attr($this->get_field_name('image')); ?>" id="<?php echo esc_attr($this->get_field_id('image')); ?>" value="<?php echo esc_attr($image); ?>">
					<a href="#" id="custom_media_button" style="margin-top:10px;" class="button button-primary custom_media_button"><?php esc_html_e('Upload', 'techeduem'); ?></a>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('banner_link')); ?>"><?php echo esc_html__('Banner Link:' ,'techeduem') ?></label>
				<input id="<?php echo esc_attr($this->get_field_id('banner_link')); ?>" name="<?php echo esc_attr($this->get_field_name('banner_link')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $banner_link ); ?>">
			</p>

		<?php }

	} // end extends class
} // end exists class


// Register Author information widget.

function Techeduem_Single_Banner() {
    register_widget( 'Techeduem_Single_Banner' );
}
add_action( 'widgets_init', 'Techeduem_Single_Banner' );