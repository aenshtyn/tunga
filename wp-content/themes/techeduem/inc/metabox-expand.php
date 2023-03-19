<?php
/**
 *  Metabox Expand
 *
 *  @package techeduem
 */
class CMB2_Tabs {

	private $setting   = array();
	private $object_id = 0;

	/**
	 * CMB2_Tabs constructor.
	 */
	public function __construct() {
		add_action( 'cmb2_render_tabs', array( $this, 'render' ), 10, 5 );
		add_filter( 'cmb2_sanitize_tabs', array( $this, 'save' ), 10, 4 );
	}

	/**
	 * Hook: Render field
	 *
	 * @param $field_object
	 * @param $escaped_value
	 * @param $object_id
	 * @param $object_type
	 * @param $field_type_object
	 */
	public function render( \CMB2_Field $field_object, $escaped_value, $object_id, $object_type, \CMB2_Types $field_type_object ) {
		$this->setting   = $field_object->args( 'tabs' );
		$this->object_id = $object_id;

		// Set layout
		$layout       = empty( $this->setting['layout'] ) ? 'ui-tabs-horizontal' : "ui-tabs-{$this->setting['layout']}";
		$default_data = version_compare( CMB2_VERSION, '2.2.2', '>=' ) ? array(
			'class' => "dtheme-cmb2-tabs $layout",
		) : $field_type_object->parse_args( $field_object->data_args(), 'tabs', array(
			'class' => "dtheme-cmb2-tabs $layout",
		) );

		// Render field
		echo sprintf( '<div %s>%s</div>', $field_type_object->concat_attrs( $default_data, array(
			'value',
			'name',
			'type'
		) ), $this->get_tabs() );
	}

	/**
	 * Render tabs
	 *
	 * @return string
	 */
	public function get_tabs() {
		ob_start();
		?>

        <ul>
			<?php foreach ( $this->setting['tabs'] as $key => $tab ): ?>
                <li><a href="#<?php echo esc_attr($tab['id']); ?>"><?php echo esc_html($tab['title']); ?></a></li>
			<?php endforeach; ?>
        </ul>

		<?php foreach ( $this->setting['tabs'] as $key => $tab ): ?>
            <div id="<?php echo esc_attr($tab['id']); ?>">
				<?php
				// Render fields from tab
				$this->render_fields( $this->setting['config'], $tab['fields'], $this->object_id );
				?>
            </div>
		<?php endforeach;

		return ob_get_clean();
	}

	/**
	 * Render fields from tab
	 *
	 * @param $args
	 * @param $fields
	 * @param $object_id
	 */
	public function render_fields( $args, $fields, $object_id ) {
		// Set options to cmb2
		$setting_fields = array_merge( $args, array( 'fields' => $fields ) );
		$CMB2           = new \CMB2( $setting_fields, $object_id );

		foreach ( $fields as $key_field => $field ) {
			if ( $CMB2->is_options_page_mb() ) {
				$CMB2->object_type( $args['object_type'] );
			}
			// Cmb2 render field
			$CMB2->render_field( $field );
		}
	}


	/**
	 * Hook: Save field values
	 *
	 * @param $override_value
	 * @param $value
	 * @param $post_id
	 * @param $data
	 */
	public static function save( $override_value, $value, $post_id, $data ) {
		foreach ( $data['tabs']['tabs'] as $tab ) {
			$setting_fields = array_merge( $data['tabs']['config'], array( 'fields' => $tab['fields'] ) );
			$CMB2           = new \CMB2( $setting_fields, $post_id );

			if ( $CMB2->is_options_page_mb() ) {
				$cmb2_options = cmb2_options( $post_id );
				$id_fields    = array_map( function( $field ) {
					return $field['id'];
				}, $tab['fields'] );

				foreach ( $_POST as $key => $value ) {
					if ( array_search( $key, $id_fields ) !== false ) {
						$cmb2_options->update( $key, $value );
					}
				}
			} else {
				$CMB2->save_fields();
			}
		}
	}

}
new CMB2_Tabs();

/**
* Type Typography
*/
// Text Transform
function techeduem_text_transform_options( $value = false ) {
	$text_transform_options_list = array( 
		''						=> esc_html__( 'Select', 'techeduem' ), 
		'lowercase'				=> esc_html__( 'lowercase', 'techeduem' ), 
		'uppercase'				=> esc_html__( 'UPPERCASE', 'techeduem' ), 
		'capitalize'			=> esc_html__( 'Capitalize', 'techeduem' ), 
		'none'					=> esc_html__( 'none', 'techeduem' ), 
		'inherit'				=> esc_html__( 'inherit', 'techeduem' ), 
	);
	$text_transform_options = '';
	foreach ( $text_transform_options_list as $text_transform_key => $text_transform ) {
		$text_transform_options .= '<option value="'. $text_transform_key .'" '. selected( $value, $text_transform_key, false ) .'>'. $text_transform .'</option>';
	}
	return $text_transform_options;
}
// Font Weight
function techeduem_font_weight_options( $value = false ) {
	$font_weight_options_list = array( 
		''					=> esc_html__( 'Select', 'techeduem' ), 
		'100'				=> esc_html__( '100', 'techeduem' ), 
		'200'				=> esc_html__( '200', 'techeduem' ), 
		'300'				=> esc_html__( '300', 'techeduem' ), 
		'400'				=> esc_html__( '400', 'techeduem' ), 
		'500'				=> esc_html__( '500', 'techeduem' ), 
		'600'				=> esc_html__( '600', 'techeduem' ), 
		'700'				=> esc_html__( '700', 'techeduem' ), 
		'800'				=> esc_html__( '800', 'techeduem' ), 
		'900'				=> esc_html__( '900', 'techeduem' ), 
	);
	$font_weight_options = '';
	foreach ( $font_weight_options_list as $font_weight_key => $font_weight ) {
		$font_weight_options .= '<option value="'. $font_weight_key .'" '. selected( $value, $font_weight_key, false ) .'>'. $font_weight .'</option>';
	}
	return $font_weight_options;
}

// Font Style
function techeduem_font_style_options( $value = false ) {
	$font_style_options_list = array( 
		''					=> esc_html__( 'Select', 'techeduem' ), 
		'normal'				=> esc_html__( 'Normal', 'techeduem' ), 
		'italic'				=> esc_html__( 'Italic', 'techeduem' ), 
	);
	$font_style_options = '';
	foreach ( $font_style_options_list as $font_style_key => $font_style ) {
		$font_style_options .= '<option value="'. $font_style_key .'" '. selected( $value, $font_style_key, false ) .'>'. $font_style .'</option>';
	}
	return $font_style_options;
}

// Render typography Field
function techeduem_render_typography_field_callback( $field, $value, $object_id, $object_type, $field_type ) {

	// make sure we specify each part of the value we need.
	$value = wp_parse_args( $value, array(
		'font-family' 				=> '',
		'font-size' 				=> '',
		'line-height' 				=> '',
		'text-transform'      		=> '',
		'font-weight'      			=> '',
		'font-style'      			=> '',
		'letter-spacing'      		=> '',
		'font-style'      			=> '',
		'font-color'      			=> '',
	) );

	?>
	<!-- Font Family -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_font-family' )); ?>"><?php esc_html_e( 'Font Family', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[font-family]' ),
			'id'    => $field_type->_id( '_font-family' ),
			'value' => $value['font-family'],
			'desc'  => '',
			'type'  => 'text',
		) ) ); ?>
	</div>
	<!-- Font Size -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_font-size' )); ?>"><?php esc_html_e( 'Font Size', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[font-size]' ),
			'id'    => $field_type->_id( '_font-size' ),
			'value' => $value['font-size'],
			'desc'  => '',
			'type'  => 'text',
		) ) ); ?>
	</div>
	<!-- Line Height -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_line-height' )); ?>"><?php esc_html_e( 'Line Height', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[line-height]' ),
			'id'    => $field_type->_id( '_line-height' ),
			'value' => $value['line-height'],
			'desc'  => '',
			'type'  => 'text',
		) ) ); ?>
	</div>
	<!-- Letter Spacing -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_letter-spacing' )); ?>"><?php esc_html_e( 'Letter Spacing', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[letter-spacing]' ),
			'id'    => $field_type->_id( '_letter-spacing' ),
			'value' => $value['letter-spacing'],
			'desc'  => '',
			'type'  => 'text',
		) ) ); ?>
	</div>
	<!-- Text Transform -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_text-transform' )); ?>"><?php esc_html_e( 'Text Transform', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->select( array(
			'name'  => $field_type->_name( '[text-transform]' ),
			'id'    => $field_type->_id( '_text-transform' ),
			'value' => $value['text-transform'],
			'desc'  => '',
			'options' => techeduem_text_transform_options( $value['text-transform'] ),
		) ) ); ?>
	</div>
	<!-- Font Weight -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_font-weight' )); ?>"><?php esc_html_e( 'Font Weight', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->select( array(
			'name'  => $field_type->_name( '[font-weight]' ),
			'id'    => $field_type->_id( '_font-weight' ),
			'value' => $value['font-weight'],
			'desc'  => '',
			'options' => techeduem_font_weight_options( $value['font-weight'] ),
		) ) ); ?>
	</div>
	<!-- Font Style -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_font-style' )); ?>"><?php esc_html_e( 'Font style', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->select( array(
			'name'  => $field_type->_name( '[font-style]' ),
			'id'    => $field_type->_id( '_font-style' ),
			'value' => $value['font-style'],
			'desc'  => '',
			'options' => techeduem_font_style_options( $value['font-style'] ),
		) )); ?>
	</div>
	<!-- Font Color -->
	<div  class="custom-color-field"><p><label for="<?php echo esc_attr($field_type->_id( '_font-color' )); ?>"><?php esc_html_e( 'Font Color', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[font-color]' ),
			'id'    => $field_type->_id( '_font-color' ),
			'value' => $value['font-color'],
			'desc'  => '',
			'type'  => 'text',
			'class' => 'cmb2-colorpicker',
			'data-alpha' => 'true'
		) ) ); ?>
	</div>

	<br class="clear">
	<?php
	echo _($field_type->_desc( true ));
}
add_filter( 'cmb2_render_typography', 'techeduem_render_typography_field_callback', 10, 5 );


/**
* Type Background
*/

// Background Repeat
function techeduem_background_repeat_options( $value = false ) {
	$background_repeat_options_list = array( 
		''				=> esc_html__( 'Select', 'techeduem' ), 
		'repeat'		=> esc_html__( 'Repeat', 'techeduem' ), 
		'repeat-x'		=> esc_html__( 'Repeat-X', 'techeduem' ), 
		'repeat-y'		=> esc_html__( 'Repeat-Y', 'techeduem' ), 
		'no-repeat'		=> esc_html__( 'No-Repeat', 'techeduem' ), 
		'initial'		=> esc_html__( 'Initial', 'techeduem' ), 
		'inherit'		=> esc_html__( 'Inherit', 'techeduem' ),
	);
	$background_repeat_options = '';
	foreach ( $background_repeat_options_list as $bg_repeat_key => $background_repeat ) {
		$background_repeat_options .= '<option value="'. $bg_repeat_key .'" '. selected( $value, $bg_repeat_key, false ) .'>'. $background_repeat .'</option>';
	}
	return $background_repeat_options;
}
// Background Size
function techeduem_background_size_options( $value = false ) {
	$background_size_options_list = array( 
		''				=> esc_html__( 'Select', 'techeduem' ), 
		'cover'			=> esc_html__( 'Cover', 'techeduem' ), 
		'contain'		=> esc_html__( 'Contain', 'techeduem' ), 
		'inherit'		=> esc_html__( 'Inherit', 'techeduem' ), 
		'initial'		=> esc_html__( 'Initial', 'techeduem' ), 
		'unset'			=> esc_html__( 'Unset', 'techeduem' ),
	);

	$background_size_options = '';
	foreach ( $background_size_options_list as $bg_size_key => $background_size ) {
		$background_size_options .= '<option value="'. $bg_size_key .'" '. selected( $value, $bg_size_key, false ) .'>'. $background_size .'</option>';
	}

	return $background_size_options;
}
// Background Attachment
function techeduem_background_attachment_options( $value = false ) {
	$background_attachment_options_list = array( 
		''				=> esc_html__( 'Select', 'techeduem' ), 
		'scroll'		=> esc_html__( 'Scroll', 'techeduem' ), 
		'fixed'			=> esc_html__( 'Fixed', 'techeduem' ), 
		'local'			=> esc_html__( 'Local', 'techeduem' ), 
		'inherit'		=> esc_html__( 'Inherit', 'techeduem' ), 
		'initial'		=> esc_html__( 'Initial', 'techeduem' ), 
		'unset'			=> esc_html__( 'Unset', 'techeduem' ),
	);

	$background_attachment_options = '';
	foreach ( $background_attachment_options_list as $bg_attachment_key => $background_attachment ) {
		$background_attachment_options .= '<option value="'. $bg_attachment_key .'" '. selected( $value, $bg_attachment_key, false ) .'>'. $background_attachment .'</option>';
	}

	return $background_attachment_options;
}
// Background Position
function techeduem_background_position_options( $value = false ) {
	$background_position_options_list = array( 
		''					=> esc_html__( 'Select', 'techeduem' ), 
		'left top'			=> esc_html__( 'Left Top', 'techeduem' ), 
		'left center'		=> esc_html__( 'Left Center', 'techeduem' ), 
		'left bottom'		=> esc_html__( 'Left Bottom', 'techeduem' ), 
		'center top'		=> esc_html__( 'Center Top', 'techeduem' ), 
		'center center'		=> esc_html__( 'Center Center', 'techeduem' ), 
		'center bottom'		=> esc_html__( 'Center Bottom', 'techeduem' ), 
		'right top'			=> esc_html__( 'Right Top', 'techeduem' ), 
		'right center'		=> esc_html__( 'Right Center', 'techeduem' ), 
		'right bottom'		=> esc_html__( 'Right Bottom', 'techeduem' ), 
	);
	$background_position_options = '';
	foreach ( $background_position_options_list as $bg_position_key => $background_position ) {
		$background_position_options .= '<option value="'. $bg_position_key .'" '. selected( $value, $bg_position_key, false ) .'>'. $background_position .'</option>';
	}

	return $background_position_options;
}

// Render Background Field
function techeduem_render_background_field_callback( $field, $value, $object_id, $object_type, $field_type ) {

	// make sure we specify each part of the value we need.
	$value = wp_parse_args( $value, array(
		'background-color' 				=> '',
		'background-image' 				=> '',
		'background-repeat'      		=> '',
		'background-size'      			=> '',
		'background-attachment'      	=> '',
		'background-position'      		=> '',
	) );

	?>

	<div class="custom-color-field"><p><label for="<?php echo esc_attr($field_type->_id( '_background-color' )); ?>"><?php esc_html_e( 'Background Color', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[background-color]' ),
			'id'    => $field_type->_id( '_background-color' ),
			'value' => $value['background-color'],
			'desc'  => '',
			'type'  => 'text',
			'class' => 'cmb2-colorpicker',
			'data-alpha' => 'true',
		) ) ); ?>
	</div>

	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_background-repeat' )); ?>"><?php esc_html_e( 'Background Repeat', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->select( array(
			'name'  => $field_type->_name( '[background-repeat]' ),
			'id'    => $field_type->_id( '_background-repeat' ),
			'value' => $value['background-repeat'],
			'desc'  => '',
			'class'  => 'techeduem-select',
			'options' => techeduem_background_repeat_options( $value['background-repeat'] ),

		) ) ); ?>
	</div>

	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_background-size' )); ?>"><?php esc_html_e( 'Background Size', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->select( array(
			'name'  => $field_type->_name( '[background-size]' ),
			'id'    => $field_type->_id( '_background-size' ),
			'value' => $value['background-size'],
			'desc'  => '',
			'class'  => 'techeduem-select',
			'options' => techeduem_background_size_options( $value['background-size'] ),

		) ) ); ?>
	</div>

	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_background-attachment' )); ?>"><?php esc_html_e( 'Background Attachment', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->select( array(
			'name'  => $field_type->_name( '[background-attachment]' ),
			'id'    => $field_type->_id( '_background-attachment' ),
			'value' => $value['background-attachment'],
			'desc'  => '',
			'class'  => 'techeduem-select',
			'options' => techeduem_background_attachment_options( $value['background-attachment'] ),

		) ) ); ?>
	</div>

	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_background-position' )); ?>"><?php esc_html_e( 'Background Position', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->select( array(
			'name'  => $field_type->_name('[background-position]'),
			'id'    => $field_type->_id('_background-position'),
			'value' => $value['background-position'],
			'desc'  => '',
			'class'  => 'techeduem-select',
			'options' => techeduem_background_position_options( $value['background-position'] ),

		) ) ); ?>
	</div>
	
	<div><p><label for="<?php echo esc_attr($field_type->_id( '_background-image' )); ?>"><?php esc_html_e( 'Background Image', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'type'  			=> 'text',
			'name'  			=> $field_type->_name('[background-image]'),
			'id'    			=> $field_type->_id('_background-image'),
			'size' 				=> '45',
			'desc'  			=> '',
			'class'  			=> 'cmb2-upload-file regular-text',
			'data-previewsize'  => '[350,350]',
			'data-sizename'  	=> 'large',
			'data-queryargs'  	=> '',
			'value'  			=> $value['background-image'],
		) ) ); ?>

		<?php echo _($field_type->input( array(
			'type'  			=> 'button',
			'class'  			=> 'cmb2-upload-button button-secondary',
			'desc'  			=> '',
			'value'  			=> esc_html__( 'Add or Upload File', 'techeduem'),
		) ) ); ?>

		<?php echo _($field_type->input( array(
			'type'  			=> 'hidden',
			'name'  			=> $field_type->_name( '_background-image-hidden' ),
			'id'    			=> $field_type->_id( '_background-image-hidden' ),
			'class'  			=> 'cmb2-upload-file-id',
			'value'  			=> $value['background-image'],
			'desc'  			=> '',
		) ) ); ?>

		<div id="<?php echo esc_attr($field_type->_id( '-status' )); ?>"  class="cmb2-media-status">
			<?php if( $value['background-image'] ): ?>
			<div class="img-status cmb2-media-item">
				<img style="max-width: 350px; width: 100%;" src="<?php echo esc_url($value['background-image']); ?>" class="cmb-file-field-image" alt="<?php echo esc_attr__('Preview Image','techeduem') ?>">
				<p class="cmb2-remove-wrapper">
					<a href="#" class="cmb2-remove-file-button" rel="<?php echo esc_attr($field_type->_id( '-status' )); ?>"><?php esc_html_e( 'Remove Image', 'techeduem' ); ?></a>
				</p>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<br class="clear">
	<?php
	echo _($field_type->_desc( true ));
}
add_filter( 'cmb2_render_background', 'techeduem_render_background_field_callback', 10, 5 );


/**
* Type Padding 
*/
function techeduem_render_padding_field_callback( $field, $value, $object_id, $object_type, $field_type ) {

	// make sure we specify each part of the value we need.
	$value = wp_parse_args( $value, array(
		'padding-top'      		=> '',
		'padding-right'      	=> '',
		'padding-bottom'      	=> '',
		'padding-left'      	=> '',
	) );

	?>
	<!-- Padding Top -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_padding-top' )); ?>"><?php esc_html_e( 'Top', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[padding-top]' ),
			'id'    => $field_type->_id( '_padding-top' ),
			'value' => $value['padding-top'],
			'desc'  => '',
			'type'  => 'text',

		) ) ); ?>
	</div>
	<!-- Padding Right -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_padding-right' )); ?>"><?php esc_html_e( 'Right', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[padding-right]' ),
			'id'    => $field_type->_id( '_padding-right' ),
			'value' => $value['padding-right'],
			'desc'  => '',
			'type'  => 'text',

		) ) ); ?>
	</div>
	<!-- Padding Bottom -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_padding-bottom' )); ?>"><?php esc_html_e( 'Bottom', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[padding-bottom]' ),
			'id'    => $field_type->_id( '_padding-bottom' ),
			'value' => $value['padding-bottom'],
			'desc'  => '',
			'type'  => 'text',

		) )); ?>
	</div>
	<!-- Padding Left -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_padding-left' )); ?>"><?php esc_html_e( 'Left', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[padding-left]' ),
			'id'    => $field_type->_id( '_padding-left' ),
			'value' => $value['padding-left'],
			'desc'  => '',
			'type'  => 'text',
		) ) ); ?>
	</div>
	<br class="clear">
	<?php
	echo _($field_type->_desc( true ));
}
add_filter( 'cmb2_render_padding', 'techeduem_render_padding_field_callback', 10, 5 );


/**
* Type Margin
*/
function techeduem_render_margin_field_callback( $field, $value, $object_id, $object_type, $field_type ) {

	// make sure we specify each part of the value we need.
	$value = wp_parse_args( $value, array(
		'margin-top'      		=> '',
		'margin-right'      	=> '',
		'margin-bottom'      	=> '',
		'margin-left'      		=> '',
	) );

	?>
	<!-- Margin Top -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_margin-top' )); ?>"><?php esc_html_e( 'Top', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[margin-top]' ),
			'id'    => $field_type->_id( '_margin-top' ),
			'value' => $value['margin-top'],
			'desc'  => '',
			'type'  => 'text',

		) ) ); ?>
	</div>
	<!-- Margin Right -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_margin-right' )); ?>"><?php esc_html_e( 'Right', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[margin-right]' ),
			'id'    => $field_type->_id( '_margin-right' ),
			'value' => $value['margin-right'],
			'desc'  => '',
			'type'  => 'text',

		) ) ); ?>
	</div>
	<!-- Margin Bottom -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_margin-bottom' )); ?>"><?php esc_html_e( 'Bottom', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[margin-bottom]' ),
			'id'    => $field_type->_id( '_margin-bottom' ),
			'value' => $value['margin-bottom'],
			'desc'  => '',
			'type'  => 'text',

		) ) ); ?>
	</div>
	<!-- Margin Left -->
	<div class="one-four"><p><label for="<?php echo esc_attr($field_type->_id( '_margin-left' )); ?>"><?php esc_html_e( 'Left', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[margin-left]' ),
			'id'    => $field_type->_id( '_margin-left' ),
			'value' => $value['margin-left'],
			'desc'  => '',
			'type'  => 'text',

		) ) ); ?>
	</div>

	<br class="clear">
	<?php
	echo _($field_type->_desc( true ));

}
add_filter( 'cmb2_render_margin', 'techeduem_render_margin_field_callback', 10, 5 );


/**
* Image Select 
*/

function cmb2_render_image_select( $field, $escaped_value, $object_id, $object_type, $field_type_object ) {		
    $conditional_value =(isset($field->args['attributes']['data-conditional-value'])?'data-conditional-value="' .esc_attr($field->args['attributes']['data-conditional-value']).'"':'');
    $conditional_id =(isset($field->args['attributes']['data-conditional-id'])?' data-conditional-id="'.esc_attr($field->args['attributes']['data-conditional-id']).'"':'');
    $default_value = $field->args['default'];    
	$image_select = '<ul id="cmb2-image-select'.$field->args['_id'].'" class="cmb2-image-select-list">';
	foreach ( $field->options() as $value => $item ) {
		$selected = ($value === ($escaped_value==''?$default_value:$escaped_value )) ? 'checked="checked"' : '';		
		$image_select .= '<li class="cmb2-image-select '.($selected!= ''?'cmb2-image-select-selected':'').'"><label for="' . $field->args['_id'] . esc_attr( $value ) . '">
			<input '.$conditional_value.$conditional_id.' type="radio" id="'. $field->args['_id'] . esc_attr( $value ) . '" name="' . $field->args['_name'] . '" value="' . esc_attr( $value ) . '" ' . $selected . ' class="cmb2-option"><img class="" style=" width: auto; " alt="' . $item['alt'] . '" src="' . $item['img'] . '">
			<br><span>' . esc_html( $item['title'] ) . '</span></label></li>';
	}
	$image_select .= '</ul>';
	$image_select .= $field_type_object->_desc( true );
	echo _($image_select);
}add_action( 'cmb2_render_image_select', 'cmb2_render_image_select', 10, 5 );


/**
* Type hash_colorpicker
*/
function techeduem_render_hash_colorpicker_field_callback( $field, $value, $object_id, $object_type, $field_type ) {

	// make sure we specify each part of the value we need.
	$value = wp_parse_args( $value, array(
		'color'      		=> '',
	) );

	?>
	<!-- Color -->
	<div class="custom-color-field hash-colorpicker"><p><label for="<?php echo esc_attr($field_type->_id( '_color' ) ); ?>"><?php esc_html_e( 'Color', 'techeduem' ); ?></label></p>
		<?php echo _($field_type->input( array(
			'name'  => $field_type->_name( '[color]' ),
			'id'    => $field_type->_id( '_color' ),
			'value' => $value['color'],
			'desc'  => '',
			'type'  => 'text',
			'class' => 'cmb2-colorpicker',
			'data-alpha' => 'true'

		) ) ); ?>
	</div>
	<br class="clear">
	<?php
	echo _($field_type->_desc( true ));

}
add_filter( 'cmb2_render_hash_colorpicker', 'techeduem_render_hash_colorpicker_field_callback', 10, 5 );


/**
* Conditional Fields
*/
if ( ! class_exists( 'techeduem_cmb2_conditionals' ) ) {

	/**
	 * techeduem_cmb2_conditionals Plugin.
	 */
	class techeduem_cmb2_conditionals {

		/**
		 * Priority on which our actions are hooked in.
		 *
		 * @const int
		 */
		const PRIORITY = 99999;

		/**
		 * Version number of the plugin.
		 *
		 * @const string
		 */
		const VERSION = '1.0.4';

		/**
		 * CMB2 Form elements which can be set to "required".
		 *
		 * @var array
		 */
		protected $techeduem_maybe_required_form_elms = array(
			'list_input',
			'input',
			'textarea',
			'input',
			'select',
			'checkbox',
			'radio',
			'radio_inline',
			'taxonomy_radio',
			'taxonomy_multicheck',
			'multicheck_inline',
		);


		/**
		 * Constructor - Set up the actions for the plugin.
		 */
		public function __construct() {
			if ( ! defined( 'CMB2_LOADED' ) || false === CMB2_LOADED ) {
				return;
			}

			add_action( 'admin_init', array( $this, 'admin_init' ), self::PRIORITY );

			foreach ( $this->techeduem_maybe_required_form_elms as $element ) {
				add_filter( "cmb2_{$element}_attributes", array( $this, 'techeduem_maybe_set_required_attribute' ), self::PRIORITY );
			}
		}


		/**
		 * Ensure valid html for the required attribute.
		 *
		 * @param array $args Array of HTML attributes.
		 *
		 * @return array
		 */
		public function techeduem_maybe_set_required_attribute( $args ) {
			if ( ! isset( $args['required'] ) ) {
				return $args;
			}

			// Comply with HTML specs.
			if ( true === $args['required'] ) {
				$args['required'] = 'required';
			}

			return $args;
		}


		/**
		 * Hook in the filtering of the data being saved.
		 */
		public function admin_init() {
			$cmb2_boxes = CMB2_Boxes::get_all();

			foreach ( $cmb2_boxes as $cmb_id => $cmb2_box ) {
				add_action(
					"cmb2_{$cmb2_box->object_type()}_process_fields_{$cmb_id}",
					array( $this, 'filter_data_to_save' ),
					self::PRIORITY,
					2
				);
			}
		}

		/**
		 * Filter the data received from the form in order to remove those values
		 * which are not suppose to be enabled to edit according to the declared conditionals.
		 *
		 * @param \CMB2 $cmb2      An instance of the CMB2 class.
		 * @param int   $object_id The id of the object being saved, could post_id, comment_id, user_id.
		 *
		 * The potentially adjusted array is returned via reference $cmb2.
		 */
		public function filter_data_to_save( CMB2 $cmb2, $object_id ) {
			foreach ( $cmb2->prop( 'fields' ) as $field_args ) {
				if ( ! ( 'group' === $field_args['type'] || ( array_key_exists( 'attributes', $field_args ) && array_key_exists( 'data-conditional-id', $field_args['attributes'] ) ) ) ) {
					continue;
				}

				if ( 'group' === $field_args['type'] ) {
					foreach ( $field_args['fields'] as $group_field ) {
						if ( ! ( array_key_exists( 'attributes', $group_field ) && array_key_exists( 'data-conditional-id', $group_field['attributes'] ) ) ) {
							continue;
						}

						$field_id               = $group_field['id'];
						$conditional_id         = $group_field['attributes']['data-conditional-id'];
						$decoded_conditional_id = @json_decode( $conditional_id );
						if ( $decoded_conditional_id ) {
							$conditional_id = $decoded_conditional_id;
						}

						if ( is_array( $conditional_id ) && ! empty( $conditional_id ) && ! empty( $cmb2->data_to_save[ $conditional_id[0] ] ) ) {
							foreach ( $cmb2->data_to_save[ $conditional_id[0] ] as $key => $group_data ) {
								$cmb2->data_to_save[ $conditional_id[0] ][ $key ] = $this->filter_field_data_to_save( $group_data, $field_id, $conditional_id[1], $group_field['attributes'] );
							}
						}
						continue;
					}
				} else {
					$field_id       = $field_args['id'];
					$conditional_id = $field_args['attributes']['data-conditional-id'];

					$cmb2->data_to_save = $this->filter_field_data_to_save( $cmb2->data_to_save, $field_id, $conditional_id, $field_args['attributes'] );
				}
			}
		}


		/**
		 * Determine if the data for one individual field should be saved or not.
		 *
		 * @param array  $data_to_save   The received $_POST data.
		 * @param string $field_id       The CMB2 id of this field.
		 * @param string $conditional_id The CMB2 id of the field this field is conditional on.
		 * @param array  $attributes     The CMB2 field attributes.
		 *
		 * @return array Array of data to save.
		 */
		protected function filter_field_data_to_save( $data_to_save, $field_id, $conditional_id, $attributes ) {
			if ( array_key_exists( 'data-conditional-value', $attributes ) ) {

				$conditional_value         = $attributes['data-conditional-value'];
				$decoded_conditional_value = @json_decode( $conditional_value );
				if ( $decoded_conditional_value ) {
					$conditional_value = $decoded_conditional_value;
				}

				if ( ! isset( $data_to_save[ $conditional_id ] ) ) {
					if ( 'off' !== $conditional_value ) {
						unset( $data_to_save[ $field_id ] );
					}
					return $data_to_save;
				}

				if ( ( ! is_array( $conditional_value ) && ! is_array( $data_to_save[ $conditional_id ] ) ) && $data_to_save[ $conditional_id ] != $conditional_value ) {
					unset( $data_to_save[ $field_id ] );
					return $data_to_save;
				}

				if ( is_array( $conditional_value ) || is_array( $data_to_save[ $conditional_id ] ) ) {
					$match = array_intersect( (array) $conditional_value, (array) $data_to_save[ $conditional_id ] );
					if ( empty( $match ) ) {
						unset( $data_to_save[ $field_id ] );
						return $data_to_save;
					}
				}
			}

			if ( ! isset( $data_to_save[ $conditional_id ] ) || ! $data_to_save[ $conditional_id ] ) {
				unset( $data_to_save[ $field_id ] );
			}

			return $data_to_save;
		}
	} /* End of class. */


	if ( ! function_exists( 'cmb2_conditionals_init' ) ) {
		/**
		 * Initialize the class.
		 */
		function cmb2_conditionals_init() {
			$cmb2_conditionals = new techeduem_cmb2_conditionals();
		}
	}
} /* End of class-exists wrapper. */