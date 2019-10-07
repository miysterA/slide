<?php

/* menus-wrap.twig */
class __TwigTemplate_44a094d817f3582f76aa67592a6a68713955adc69959818de63f3a3454c3ea37 extends Twig_Template
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
        echo "<div class=\"wrap\">
    <h1>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "title", array()), "html", null, true);
        echo "</h1>
    <nav class=\"wcml-tabs wpml-tabs\">
        <a class=\"nav-tab ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "products", array()), "active", array()), "html", null, true);
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "products", array()), "url", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "products", array()), "title", array()), "html", null, true);
        echo "</a>
        ";
        // line 5
        if (($context["can_operate_options"] ?? null)) {
            // line 6
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["menu"] ?? null), "taxonomies", array()));
            foreach ($context['_seq'] as $context["key"] => $context["taxonomy"]) {
                // line 7
                echo "                ";
                if ($this->getAttribute($context["taxonomy"], "is_translatable", array())) {
                    // line 8
                    echo "                    <a class=\"js-tax-tab-";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo " nav-tab ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["taxonomy"], "active", array()), "html", null, true);
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["taxonomy"], "url", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["taxonomy"], "title", array()), "html", null, true);
                    echo "\">
                    ";
                    // line 9
                    echo twig_escape_filter($this->env, $this->getAttribute($context["taxonomy"], "name", array()), "html", null, true);
                    echo "
                    ";
                    // line 10
                    if (($this->getAttribute($context["taxonomy"], "translated", array()) == false)) {
                        echo "<i class=\"otgs-ico-warning\"></i>";
                    }
                    // line 11
                    echo "                    </a>
                ";
                }
                // line 13
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['taxonomy'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "            ";
            if ($this->getAttribute($this->getAttribute(($context["menu"] ?? null), "custom_taxonomies", array()), "show", array())) {
                // line 15
                echo "            <a class=\"nav-tab tax-custom-taxonomies ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "custom_taxonomies", array()), "active", array()), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "custom_taxonomies", array()), "url", array()), "html", null, true);
                echo "\">
                ";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "custom_taxonomies", array()), "name", array()), "html", null, true);
                echo "
                ";
                // line 17
                if (($this->getAttribute($this->getAttribute(($context["menu"] ?? null), "custom_taxonomies", array()), "translated", array()) == false)) {
                    echo "<i class=\"otgs-ico-warning\"></i>";
                }
                // line 18
                echo "            </a>
            ";
            }
            // line 20
            echo "            <a class=\"nav-tab tax-product-attributes ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "attributes", array()), "active", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "attributes", array()), "url", array()), "html", null, true);
            echo "\">
                ";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "attributes", array()), "name", array()), "html", null, true);
            echo "
                ";
            // line 22
            if (($this->getAttribute($this->getAttribute(($context["menu"] ?? null), "attributes", array()), "translated", array()) == false)) {
                echo "<i class=\"otgs-ico-warning\"></i>";
            }
            // line 23
            echo "            </a>
            ";
            // line 24
            if ($this->getAttribute($this->getAttribute(($context["menu"] ?? null), "shipping_classes", array()), "is_translatable", array())) {
                // line 25
                echo "                <a class=\"js-tax-tab-product_shipping_class nav-tab ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "shipping_classes", array()), "active", array()), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "shipping_classes", array()), "url", array()), "html", null, true);
                echo "\"
                   title=\"";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "shipping_classes", array()), "title", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "shipping_classes", array()), "name", array()), "html", null, true);
                echo "
                   ";
                // line 27
                if (($this->getAttribute($this->getAttribute(($context["menu"] ?? null), "shipping_classes", array()), "translated", array()) == false)) {
                    echo "<i class=\"otgs-ico-warning\"></i>";
                }
                // line 28
                echo "                </a>
            ";
            }
            // line 30
            echo "        ";
        }
        // line 31
        echo "
        ";
        // line 32
        if (($context["can_manage_options"] ?? null)) {
            // line 33
            echo "            <a class=\"nav-tab ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "settings", array()), "active", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "settings", array()), "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "settings", array()), "name", array()), "html", null, true);
            echo "</a>
        ";
        }
        // line 35
        echo "        ";
        if (($context["can_operate_options"] ?? null)) {
            // line 36
            echo "            <a class=\"nav-tab ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "multi_currency", array()), "active", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "multi_currency", array()), "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "multi_currency", array()), "name", array()), "html", null, true);
            echo "</a>
            <a class=\"nav-tab ";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "slugs", array()), "active", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "slugs", array()), "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "slugs", array()), "name", array()), "html", null, true);
            echo "</a>
        ";
        }
        // line 39
        echo "        ";
        if (($context["can_manage_options"] ?? null)) {
            // line 40
            echo "            <a class=\"nav-tab ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "status", array()), "active", array()), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "status", array()), "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "status", array()), "name", array()), "html", null, true);
            echo "</a>
            ";
            // line 41
            if ($this->getAttribute($this->getAttribute(($context["menu"] ?? null), "troubleshooting", array()), "active", array())) {
                // line 42
                echo "                <a class=\"nav-tab troubleshooting ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "troubleshooting", array()), "active", array()), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "troubleshooting", array()), "url", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["menu"] ?? null), "troubleshooting", array()), "name", array()), "html", null, true);
                echo "</a>
            ";
            }
            // line 44
            echo "        ";
        }
        // line 45
        echo "    </nav>

    <div class=\"wcml-wrap\">
    ";
        // line 48
        echo ($context["content"] ?? null);
        echo "
    </div>

    <div class=\"wcml-wrap wcml-notice otgs-is-dismissible\">
        <p>";
        // line 52
        echo $this->getAttribute(($context["rate"] ?? null), "message", array());
        echo "</p>
        <button class=\"notice-dismiss hide-rate-block\" data-setting=\"rate-block\">
                <span class=\"screen-reader-text\">";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute(($context["rate"] ?? null), "hide_text", array()), "html", null, true);
        echo "</span>
        </button>
        ";
        // line 56
        echo $this->getAttribute(($context["rate"] ?? null), "nonce", array());
        echo "
    </div>

</div>";
    }

    public function getTemplateName()
    {
        return "menus-wrap.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 56,  220 => 54,  215 => 52,  208 => 48,  203 => 45,  200 => 44,  190 => 42,  188 => 41,  179 => 40,  176 => 39,  167 => 37,  158 => 36,  155 => 35,  145 => 33,  143 => 32,  140 => 31,  137 => 30,  133 => 28,  129 => 27,  123 => 26,  116 => 25,  114 => 24,  111 => 23,  107 => 22,  103 => 21,  96 => 20,  92 => 18,  88 => 17,  84 => 16,  77 => 15,  74 => 14,  68 => 13,  64 => 11,  60 => 10,  56 => 9,  45 => 8,  42 => 7,  37 => 6,  35 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "menus-wrap.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/menus-wrap.twig");
    }
}
