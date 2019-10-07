<?php

/* products.twig */
class __TwigTemplate_73ca97f55e83e42e76fde153068ce8aa0b34e411aadb63f4eb4f628527767f31 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, ($context["request_uri"] ?? null));
        echo "\">

\t";
        // line 3
        $this->loadTemplate("filter.twig", "products.twig", 3)->display(array_merge($context, ($context["filter"] ?? null)));
        // line 4
        echo "
\t<table class=\"widefat fixed wpml-list-table wp-list-table striped\" cellspacing=\"0\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th scope=\"col\" class=\"column-thumb\">
\t\t\t\t\t\t<span class=\"wc-image wcml-tip\"
\t\t\t\t\t\t\t  data-tip=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "image", array()));
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "image", array()), "html", null, true);
        echo "</span>
\t\t\t\t</th>
\t\t\t\t<th scope=\"col\" class=\"wpml-col-title ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["filter_urls"] ?? null), "product_sorted", array()), "html", null, true);
        echo "\">
\t\t\t\t\t<a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute(($context["filter_urls"] ?? null), "product", array()));
        echo "\">
\t\t\t\t\t\t<span>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "product", array()), "html", null, true);
        echo "</span>
\t\t\t\t\t\t<span class=\"sorting-indicator\"></span>
\t\t\t\t\t</a>
\t\t\t\t</th>
\t\t\t\t<th scope=\"col\" class=\"wpml-col-languages\">
\t\t\t\t\t";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages_flags"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 20
            echo "\t\t\t\t\t\t<span title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()));
            echo "\">
\t\t\t\t\t\t\t<img src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "flag_url", array()), "html", null, true);
            echo "\"  alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()));
            echo "\"/>
\t\t\t\t\t\t</span>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "\t\t\t\t</th>
\t\t\t\t<th scope=\"col\"
\t\t\t\t\tclass=\"column-categories\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "categories", array()), "html", null, true);
        echo "</th>
\t\t\t\t";
        // line 27
        if ($this->getAttribute(($context["strings"] ?? null), "type", array())) {
            // line 28
            echo "\t\t\t\t\t<th scope=\"col\" class=\"column-product_type\">
\t\t\t\t\t\t\t<span class=\"wc-type wcml-tip\"
\t\t\t\t\t\t\t\t  data-tip=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "type", array()));
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "type", array()), "html", null, true);
            echo "</span>
\t\t\t\t\t</th>
\t\t\t\t";
        }
        // line 33
        echo "\t\t\t\t<th scope=\"col\" id=\"date\" class=\"column-date ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["filter_urls"] ?? null), "date_sorted", array()), "html", null, true);
        echo "\">
\t\t\t\t\t<a href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute(($context["filter_urls"] ?? null), "date", array()));
        echo "\">
\t\t\t\t\t\t<span>";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "date", array()), "html", null, true);
        echo "</span>
\t\t\t\t\t\t<span class=\"sorting-indicator\"></span>
\t\t\t\t\t</a>
\t\t\t\t</th>
\t\t\t</tr>
\t\t</thead>

\t\t<tbody>
\t\t\t";
        // line 43
        if (twig_test_empty($this->getAttribute(($context["data"] ?? null), "products", array()))) {
            // line 44
            echo "\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"6\" class=\"text-center\">
\t\t\t\t\t\t<strong>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "no_products", array()), "html", null, true);
            echo "</strong>
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
        } else {
            // line 50
            echo "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "products", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 51
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"thumb column-thumb\">
\t\t\t\t\t\t\t<a href=\"";
                // line 53
                echo $this->getAttribute($context["product"], "edit_post_link", array());
                echo "\">
\t\t\t\t\t\t\t\t<img width=\"150\" height=\"150\" src=\"";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "post_thumbnail", array()), "html", null, true);
                echo "\" class=\"wp-post-image\" >
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"wpml-col-title  wpml-col-title-flag\">
\t\t\t\t\t\t\t";
                // line 58
                if (($this->getAttribute($context["product"], "post_parent", array()) != 0)) {
                    echo " &#8212; ";
                }
                // line 59
                echo "\t\t\t\t\t\t\t<strong>
\t\t\t\t\t\t\t\t";
                // line 60
                if ( !$this->getAttribute(($context["data"] ?? null), "slang", array())) {
                    // line 61
                    echo "\t\t\t\t\t\t\t\t\t<span class=\"wpml-title-flag\">
\t\t\t\t\t\t\t\t\t\t<img src=\"";
                    // line 62
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "orig_flag_url", array()), "html", null, true);
                    echo "\"/>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t";
                }
                // line 65
                echo "
\t\t\t\t\t\t\t\t<a href=\"";
                // line 66
                echo $this->getAttribute($context["product"], "edit_post_link", array());
                echo "\" title=\"";
                echo twig_escape_filter($this->env, strip_tags($this->getAttribute($context["product"], "post_title", array())), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "post_title", array()), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t";
                // line 70
                if (($this->getAttribute($context["product"], "post_status", array()) == "draft")) {
                    // line 71
                    echo "\t\t\t\t\t\t\t\t\t- <span class=\"post-state\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "draft", array()), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t\t\t";
                }
                // line 73
                echo "
\t\t\t\t\t\t\t\t";
                // line 74
                if (($this->getAttribute($context["product"], "post_status", array()) == "private")) {
                    // line 75
                    echo "\t\t\t\t\t\t\t\t\t- <span class=\"post-state\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "private", array()), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t\t\t";
                }
                // line 77
                echo "
\t\t\t\t\t\t\t\t";
                // line 78
                if (($this->getAttribute($context["product"], "post_status", array()) == "pending")) {
                    // line 79
                    echo "\t\t\t\t\t\t\t\t\t- <span class=\"post-state\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "pending", array()), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t\t\t";
                }
                // line 81
                echo "
\t\t\t\t\t\t\t\t";
                // line 82
                if (($this->getAttribute($context["product"], "post_status", array()) == "future")) {
                    // line 83
                    echo "\t\t\t\t\t\t\t\t\t- <span class=\"post-state\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "future", array()), "html", null, true);
                    echo "</span>
\t\t\t\t\t\t\t\t";
                }
                // line 85
                echo "
\t\t\t\t\t\t\t\t";
                // line 86
                if (($this->getAttribute(($context["data"] ?? null), "search", array()) && ($this->getAttribute($context["product"], "post_parent", array()) != 0))) {
                    // line 87
                    echo "\t\t\t\t\t\t\t\t\t| <span class=\"prod_parent_text\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 88
                    echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "parent", array()), $this->getAttribute($context["product"], "parent_title", array())), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t";
                }
                // line 91
                echo "\t\t\t\t\t\t\t</strong>

\t\t\t\t\t\t\t<div class=\"row-actions\">
\t\t\t\t\t\t\t\t<span class=\"edit\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 95
                echo $this->getAttribute($context["product"], "edit_post_link", array());
                echo "\"
\t\t\t\t\t\t\t\t\t   title=\"";
                // line 96
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "edit_item", array()));
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "edit", array()), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t</span> | <span class=\"view\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "view_link", array()));
                echo "\"
\t\t\t\t\t\t\t\t\t   title=\"";
                // line 99
                echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "view_link", array()), $this->getAttribute($context["product"], "post_title", array())));
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "view", array()), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t</td>

\t\t\t\t\t\t<td class=\"wpml-col-languages\">
\t\t\t\t\t\t\t";
                // line 106
                echo $this->getAttribute($context["product"], "translation_statuses", array());
                echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"column-categories\">
\t\t\t\t\t\t\t";
                // line 109
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["product"], "categories_list", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                    // line 110
                    echo "\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "href", array()));
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 112
                echo "\t\t\t\t\t\t</td>
\t\t\t\t\t\t";
                // line 113
                if ($this->getAttribute(($context["strings"] ?? null), "type", array())) {
                    // line 114
                    echo "\t\t\t\t\t\t\t<td class=\"column-product_type\">
\t\t\t\t\t\t\t\t<span class=\"product-type wcml-tip ";
                    // line 115
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "icon_class", array()));
                    echo "\"
\t\t\t\t\t\t\t\t\t  data-tip=\"";
                    // line 116
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "icon_class", array()));
                    echo "\"></span>
\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t";
                }
                // line 119
                echo "
\t\t\t\t\t\t<td class=\"column-date\">
\t\t\t\t\t\t\t";
                // line 121
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "formated_date", array()), "html", null, true);
                echo "

\t\t\t\t\t\t\t";
                // line 123
                if (($this->getAttribute($context["product"], "post_status", array()) == "publish")) {
                    // line 124
                    echo "\t\t\t\t\t\t\t\t<br>";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "published", array()), "html", null, true);
                    echo "
\t\t\t\t\t\t\t";
                } else {
                    // line 126
                    echo "\t\t\t\t\t\t\t\t<br>";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "modified", array()), "html", null, true);
                    echo "
\t\t\t\t\t\t\t";
                }
                // line 128
                echo "\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 131
            echo "\t\t\t";
        }
        // line 132
        echo "\t\t</tbody>
\t</table>

\t<input type=\"hidden\" id=\"upd_product_nonce\" value=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->getAttribute(($context["nonces"] ?? null), "upd_product", array()));
        echo "\" />
\t<input type=\"hidden\" id=\"get_product_data_nonce\" value=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->getAttribute(($context["nonces"] ?? null), "get_product_data", array()));
        echo "\" />

\t";
        // line 138
        $this->loadTemplate("pagination.twig", "products.twig", 138)->display(array_merge($context, ($context["pagination"] ?? null)));
        // line 139
        echo "</form>";
    }

    public function getTemplateName()
    {
        return "products.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  363 => 139,  361 => 138,  356 => 136,  352 => 135,  347 => 132,  344 => 131,  336 => 128,  330 => 126,  324 => 124,  322 => 123,  317 => 121,  313 => 119,  307 => 116,  303 => 115,  300 => 114,  298 => 113,  295 => 112,  284 => 110,  280 => 109,  274 => 106,  262 => 99,  258 => 98,  251 => 96,  247 => 95,  241 => 91,  235 => 88,  232 => 87,  230 => 86,  227 => 85,  221 => 83,  219 => 82,  216 => 81,  210 => 79,  208 => 78,  205 => 77,  199 => 75,  197 => 74,  194 => 73,  188 => 71,  186 => 70,  180 => 67,  174 => 66,  171 => 65,  165 => 62,  162 => 61,  160 => 60,  157 => 59,  153 => 58,  146 => 54,  142 => 53,  138 => 51,  133 => 50,  126 => 46,  122 => 44,  120 => 43,  109 => 35,  105 => 34,  100 => 33,  92 => 30,  88 => 28,  86 => 27,  82 => 26,  78 => 24,  67 => 21,  62 => 20,  58 => 19,  50 => 14,  46 => 13,  42 => 12,  35 => 10,  27 => 4,  25 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "products.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/products-list/products.twig");
    }
}
