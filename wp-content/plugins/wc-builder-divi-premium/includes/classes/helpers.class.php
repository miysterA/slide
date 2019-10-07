<?php
if( !defined( 'ABSPATH' ) ) exit; // exit if accessed directly

/**
 * This class contains some helper methods and 3rd party compatibility fixes
 * @since 2.1.7
 */

if( !class_exists( 'WCBD_HELPERS' ) ):
class WCBD_HELPERS{

    /**
     * Switch the site language to another language
     * @since 2.1.7
     * @param string $to the language code you want switch to, accepts languages codes, all & original
     * @see https://wpml.org/forums/topic/how-to-filter-get_terms-function-my-own-language/
     */
    public static function wpml_switch_lang( $to = '' ){
        global $sitepress;
        if( $sitepress ){
            $to = esc_html( $to );
            // get the original language
            if( $to == 'original' && defined( 'ICL_LANGUAGE_CODE' ) ){
                $to = ICL_LANGUAGE_CODE;
            }
            // Switch to new language
            if( $to ){
                $sitepress->switch_lang( $to ); 
            }
            		
        }
    }

    /**
     * WPML
     * get language code
     * @since 2.1.7
     * @param int $object_id This is the object id of a post or a taxonomy
     * @param string $object_type This the object type; post type or taxonomy
     * @see https://wpml.org/wpml-hook/wpml_element_language_code/
     */
    public static function wpml_get_lang_code( $element_id = '', $element_type = '' ){
        $language_code = apply_filters( 'wpml_element_language_code', null, array( 
            'element_id'=> (int)$element_id, 
            'element_type'=> esc_html( $element_type ) 
            ) 
        );
        
        return $language_code;
    }

    /**
     * Fix WC issue with iPads by changing the small screen breakpoint from 768px to 767px
     * @see https://github.com/woocommerce/woocommerce/issues/14813
     * @since 2.1.10  
     * @param string $breakpoint
     * @return string
     */
    public static function change_wc_smallscreen_breakpoint( $breakpoint ){
        return '767px';
    }

    /**
     * Fix The Shop module's missing pagination on archive layouts
     * @since 2.1.13
     */
    public static function fix_shop_module_pagination(){
        if( is_post_type_archive( 'product' ) ){
            add_filter( 'pre_get_posts', function( $query ){
                $query->query_vars['no_found_rows'] = false;
            } );	
        }        
    }

}
endif;

$wcbd_helpers = new WCBD_HELPERS();