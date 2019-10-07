<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

class Divi_WC_Builder_Module_Cat_Cover extends ET_Builder_Module {
    protected $module_credits = array(
		'module_uri' => WCBD_PRODUCT_URL,
		'author'     => WCBD_AUTHOR,
		'author_uri' => DIVIKINGDOM_URL,
	);
	
	function init() {
		$this->name       	= esc_html__( 'Woo Category Cover', 'divi-wc-builder' );
        $this->slug       	= 'et_pb_wcbd_cat_cover';
        $this->vb_support   = 'on';


        $this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Main Content', 'wc-builder-divi' ),
				),
			),
			
        );

        $this->main_css_element = '%%order_class%%';
        
		$this->advanced_fields = array(
			'fonts' => array(
				'title'   => array(
					'label'    => esc_html__( 'Title', 'divi-wc-builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .cat_title, body.et_extra {$this->main_css_element} .cat_title",
                    ),
                    'font_size' => array(
                        'default' => '30px',
                    ),
                    'line_height' => array(
                        'default' => '1em',
                    ),
				),
				'desc'   => array(
					'label'    => esc_html__( 'Description', 'divi-wc-builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .cat_desc",
                    ),
                    'font_size' => array(
                        'default' => '14px',
                    ),
                    'line_height' => array(
                        'default' => '1em',
                    ),
				),
			),
			'background' => array(
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'border' => array(),
			'custom_margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
		);
	}

    function get_fields(){
        $fields = array(
            'show_title' => array(
                'label' => esc_html__( 'Show Title', 'wc-builder-divi' ),
                'type' => 'yes_no_button',
                'options' => array(
                    'on' => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default' => 'on',
                'tab_slug' => 'general',
                'toggle_slug' => 'main_content',
            ),
            'show_description' => array(
                'label' => esc_html__( 'Show Description', 'wc-builder-divi' ),
                'type' => 'yes_no_button',
                'options' => array(
                    'on' => esc_html__( 'Yes', 'et_builder' ),
                    'off' => esc_html__( 'No', 'et_builder' ),
                ),
                'default' => 'on',
                'tab_slug' => 'general',
                'toggle_slug' => 'main_content',
            ),
        );

        return $fields;
    }

    function before_render(){
        if( function_exists( 'is_product_category' ) && is_product_category() ){
            $tax            = get_queried_object();
            $thumbnail_id   = get_term_meta( $tax->term_id, 'thumbnail_id', true );
            $image          = wp_get_attachment_url( $thumbnail_id );

            if( $image ){
                $this->props['background_image'] = esc_attr( $image );
            }            
        }
    }
	function render( $attrs, $content = null, $render_slug ) {

        $enable_title       = $this->props['show_title'];
        $enable_description = $this->props['show_description'];

        $this->add_classname( 'wcbd_module' );
        
        if( !function_exists( 'is_product_category' ) || !is_product_category() ){
            return;
        }

        $tax            = get_queried_object();
        $title          = esc_attr( $tax->name );
        $description    = term_description( $tax->term_id, $tax->taxonomy );

        ob_start(); ?>

            <div class='cover_container'>
                <?php 
                    echo $enable_title          == 'on' ? "<h1 class='cat_title'>{$title}</h1>" : '';
                    echo $enable_description    == 'on' ? "<div class='cat_desc'>{$description}</div>" : '';
                ?>
            </div>

        <?php $output = ob_get_clean();
		return $output;			

	}
}
new Divi_WC_Builder_Module_Cat_Cover;
