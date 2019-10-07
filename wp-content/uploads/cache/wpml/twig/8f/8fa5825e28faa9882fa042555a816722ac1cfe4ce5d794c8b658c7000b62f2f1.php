<?php

/* sync-taxonomy.twig */
class __TwigTemplate_822da0b34d2bb9a641f3eddadd0653ea8b5b8b4404de2236d4654f05970f5d67 extends Twig_Template
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
        echo "<div class=\"icl_tt_main_bottom\" style=\"display: none;\">
    <br/>
    ";
        // line 3
        if (($context["attribute_taxonomies"] ?? null)) {
            // line 4
            echo "        <form id=\"wcml_tt_sync_variations\" method=\"post\">
            <input type=\"hidden\" name=\"action\" value=\"wcml_sync_product_variations\" />
            <input type=\"hidden\" id=\"warn_title\" value=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "untranstaled_warn", array()), "html", null, true);
            echo "\" />
            <input type=\"hidden\" name=\"taxonomy\" value=\"";
            // line 7
            echo twig_escape_filter($this->env, ($context["taxonomy"] ?? null), "html", null, true);
            echo "\" />
            ";
            // line 8
            echo $this->getAttribute(($context["nonces"] ?? null), "sync_product_variations", array());
            echo "
            <input type=\"hidden\" name=\"last_post_id\" value=\"\" />
            <input type=\"hidden\" name=\"languages_processed\" value=\"0\" />
            <div id=\"wcml_tt_sync_assignment\" style=\"";
            // line 11
            echo twig_escape_filter($this->env, ($context["display"] ?? null));
            echo "\" >
                <p>
                    <input class=\"button-secondary\" type=\"submit\" value=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_update", array()));
            echo "\" />
                    <img src=\"";
            // line 14
            echo twig_escape_filter($this->env, ($context["loader_url"] ?? null));
            echo "\" alt=\"loading\" height=\"16\" width=\"16\" class=\"wcml_tt_spinner\" />
                </p>
                <span class=\"errors icl_error_text\"></span>
            </div>
            <div class=\"wcml_tt_sycn_preview\"></div>
        </form>

        <div id=\"wcml_tt_sync_desc\" style=\"";
            // line 21
            echo twig_escape_filter($this->env, ($context["display_attr"] ?? null));
            echo "\">
            <p>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "auto_generate", array()), "html", null, true);
            echo "</p>
            ";
            // line 23
            if ( !twig_test_empty(($context["vars_to_create"] ?? null))) {
                // line 24
                echo "                <p>
                    ";
                // line 25
                echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "vars_to_create", array()), ($context["vars_to_create"] ?? null)), "html", null, true);
                echo "
                </p>
            ";
            }
            // line 28
            echo "        </div>
    ";
        } else {
            // line 30
            echo "        <form id=\"wcml_tt_sync_assignment\" style=\"";
            echo twig_escape_filter($this->env, ($context["display_tax"] ?? null));
            echo "\" data-sync=\"";
            if (($context["display_tax"] ?? null)) {
                echo "0";
            } else {
                echo "1";
            }
            echo "\">
            <input type=\"hidden\" name=\"taxonomy\" value=\"";
            // line 31
            echo twig_escape_filter($this->env, ($context["taxonomy"] ?? null), "html", null, true);
            echo "\"/>
            ";
            // line 32
            echo $this->getAttribute(($context["nonces"] ?? null), "sync_taxonomies", array());
            echo "
            <p>
                <input class=\"button-secondary\" type=\"submit\" value=\"";
            // line 34
            echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "sync_in_cont", array()), ($context["tax_name"] ?? null)));
            echo "\"/>
                <img src=\"";
            // line 35
            echo twig_escape_filter($this->env, ($context["loader_url"] ?? null));
            echo "\" alt=\"loading\" height=\"16\" width=\"16\" class=\"wcml_tt_spinner\"/>
            </p>
            <span class=\"errors icl_error_text\"></span>
        </form>
        <div id=\"wcml_tt_sync_preview\"></div>


        <p id=\"wcml_tt_sync_desc\" style=\"";
            // line 42
            echo twig_escape_filter($this->env, ($context["display_tax"] ?? null));
            echo "\">
            ";
            // line 43
            echo sprintf($this->getAttribute(($context["strings"] ?? null), "auto_apply", array()), ($context["tax_singular_name"] ?? null));
            echo "
        </p>
    ";
        }
        // line 46
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "sync-taxonomy.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 46,  123 => 43,  119 => 42,  109 => 35,  105 => 34,  100 => 32,  96 => 31,  85 => 30,  81 => 28,  75 => 25,  72 => 24,  70 => 23,  66 => 22,  62 => 21,  52 => 14,  48 => 13,  43 => 11,  37 => 8,  33 => 7,  29 => 6,  25 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "sync-taxonomy.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/sync-taxonomy.twig");
    }
}
