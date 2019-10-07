<?php
function ange_ajout()
{
    wp_enqueue_script('app', get_stylesheet_directory_uri() . "/js/app.js", array(), null, true);
    wp_enqueue_script('app-db', get_stylesheet_directory_uri() . "/js/app-db.js", ['jquery', 'app'], null, true);
    wp_localize_script('app-db', 'jsobject', ["ajaxurl" => admin_url('admin-ajax.php')]);

    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . "/css/couleur.css", array(), null, true);
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . "/css/font-awesome-4.7.0/css/font-awesome.min.css", array(), null, true);
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'ange_ajout');
add_action('wp_ajax_show_action', 'show_action');
add_action('wp_ajax_nopriv_show_action', 'show_action');
add_action('wp_ajax_sort_action', 'sort_action');
add_action('wp_ajax_nopriv_sort_action', 'sort_action');

function slugify($string)
{
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
}

function getToggle($index, $title, $content)
{
    return "<div class='et_pb_module et_pb_toggle et_pb_toggle_" . $index . " et_pb_toggle_item et_pb_toggle_close'>" .
        "<h5 class='et_pb_toggle_title'>" . $title . "</h5>" .
        "<div class='et_pb_toggle_content clearfix>" . $content . "</div>" .
        "</div>";

    "<label for='" . slugify($title) . "'>$title</label>";
}

function show_action()
{
    global $wpdb;
    //$param = $_POST["param"];

    $attrs = $wpdb->get_results("SELECT attribute_name, attribute_label FROM wp_woocommerce_attribute_taxonomies");

    $toggles = "";

    $i = 0;
    foreach ($attrs as $attr) {
        $attrName = $attr->attribute_name;
        //var_dump($attrName);
        if ($attrName !== "typ" && $attrName !== "noeud" && $attrName !== "secteur-activite" && $attrName !== "nombre-slide") continue;

        $taxonomies = $wpdb->get_results($wpdb->prepare("SELECT name FROM wp_term_taxonomy LEFT JOIN wp_terms ON wp_term_taxonomy.term_id = wp_terms.term_id WHERE taxonomy = %s", "pa_" . $attr->attribute_name));

        $tpl = "<div class='product-attrs-container'>"; //Open: div.product-atts-container
        $tpl .= "<label for='" . slugify($attr->attribute_label) . "'>$attr->attribute_label</label>";
        $tpl .= "<select id='" . slugify($attr->attribute_label) . "'>";
        foreach ($taxonomies as $taxonomy) {
            $name = strtolower($taxonomy->name);
            $tpl .= "<option value='$name'>$name</option>";
        }
        $tpl .= "</select></div>"; //Close: div.product-attrs-container


        $toggles .= $tpl;
    }

    echo $toggles;
    die();
}

function getSingleProductTpl($product)
{
    $image_src = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'single-post-thumbnail');
    $image_srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id($product->get_id()), array("width" => 150, "height" => 150));

    $price = $product->get_price();
    $negative = $price < 0;
    $formatted_price = ($negative ? '-' : '') . sprintf(get_woocommerce_price_format(), '<span class="woocommerce-Price-currencySymbol">' . get_woocommerce_currency_symbol() . '</span>', $price);
    $tpl = "<li class='" . esc_attr(implode(' ', wc_get_product_class('', $product->get_id()))) . "'>" .
        "<a href='" . esc_url(get_permalink($product->get_id())) . "' class='woocommerce-LoopProduct-link woocommerce-loop-product__link'>" .
        "<span class='et_shop_image'>" .
        "<img width='300' height='300' src='" . $image_src . "' srcset='" . $image_srcset . "' sizes='(max-width: 300px) 100vw, 300px'>" .
        "<span class='et_overlay'></span>" .
        "</span>" .
        "<h2 class='woocommerce-loop-product__title'>" . $product->get_name() . "</h2>" .
        "<span class='price'>" .
        "<span class='woocommerce-Price-amount amount'>" . $formatted_price . "</span>" .
        "</a>" .
        "</li>";
    return $tpl;
}

function sort_action()
{
    global $wpdb;
    $params = $_POST["params"];
    $paramsExplode = explode(",", $params);


    if (empty($params)) {
        $query = "SELECT * FROM $wpdb->posts WHERE $wpdb->posts.post_type = 'product' AND $wpdb->posts.post_status = 'publish'";
    } else {
        //$special_entries = get_option('my_special_entries');

        // how many entries will we select?
        $how_many = count($paramsExplode);

        // prepare the right amount of placeholders
        // if you're looing for strings, use '%s' instead
        $placeholders = array_fill(0, $how_many, '%s');

        // glue together all the placeholders...
        // $format = '%d, %d, %d, %d, %d, [...]'
        $format = implode(', ', $placeholders);

        // and put them in the query
        $query = "SELECT * FROM $wpdb->terms
              LEFT JOIN $wpdb->term_taxonomy ON wp_terms.term_id = $wpdb->term_taxonomy.term_id
              LEFT JOIN $wpdb->term_relationships ON $wpdb->term_taxonomy.term_taxonomy_id = $wpdb->term_relationships.term_taxonomy_id
              LEFT JOIN wp_posts on $wpdb->term_relationships.object_id = wp_posts.ID
              WHERE 
                (taxonomy = 'pa_typ' AND wp_terms.name = 'Réseau') AND
                (taxonomy = 'pa_noeud' AND wp_terms.name = '3 nœud') AND
                (taxonomy = 'pa_secteur-activite' AND wp_terms.name = 'Aéronautique')";
    }
    $products = $wpdb->get_results($query);

    $singleProductTpls = "";

    $productIds = [];
    foreach ($products as $product) {
        if (!in_array($product->ID, $productIds)) {
            if ($product->ID !== 0 && !empty($product->ID)) {
                $productIds[] = $product->ID;
                $product = wc_get_product($product->ID);
                $singleProductTpls .= getSingleProductTpl($product);
            }
        }
    }

    echo $singleProductTpls;
    die();
}

if (!function_exists('et_get_original_footer_credits')) :
    function et_get_original_footer_credits()
    {
        return sprintf(__('&copy; %1$s. %2$s'), '<a href="#" title="yoursite">yoursite</a> ' . date('Y'), '<span>Tous droits réservés.</span>');
    }
endif;
