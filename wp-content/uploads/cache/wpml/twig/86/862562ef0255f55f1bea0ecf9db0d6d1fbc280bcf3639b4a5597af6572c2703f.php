<?php

/* taxonomies.twig */
class __TwigTemplate_d87c7f0014b09b2597056e2883d5c419be4fcf1bc94bc3a12ea2c3f5f3ab5aa7 extends Twig_Template
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
        echo "<div class=\"wcml-section wc-missing-translation-section\">
    <div class=\"wcml-section-header\">
        <h3>
            ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "tax_missing", array()), "html", null, true);
        echo "
            <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "run_site", array()));
        echo "\"></i>
        </h3>
    </div>
    <div class=\"wcml-section-content js-tax-translation\">
        <ul class=\"wcml-status-list wcml-tax-translation-list\">
            ";
        // line 10
        $context["no_tax_to_update"] = true;
        // line 11
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["taxonomies"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["taxonomy"]) {
            // line 12
            echo "\t\t\t    ";
            $context["no_tax_to_update"] = false;
            // line 13
            echo "                <li class=\"js-tax-translation-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["taxonomy"], "tax", array()), "html", null, true);
            echo "\">
                    ";
            // line 14
            if ($this->getAttribute($context["taxonomy"], "untranslated", array())) {
                // line 15
                echo "                        ";
                if ($this->getAttribute($context["taxonomy"], "fully_trans", array())) {
                    // line 16
                    echo "                            <i class=\"otgs-ico-ok\"></i>
                            ";
                    // line 17
                    echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "not_req_trnsl", array()), $this->getAttribute($context["taxonomy"], "name", array())), "html", null, true);
                    echo "
                        ";
                } else {
                    // line 19
                    echo "                            <i class=\"otgs-ico-warning\"></i>
                            ";
                    // line 20
                    if (($this->getAttribute($context["taxonomy"], "untranslated", array()) == 1)) {
                        // line 21
                        echo "                                ";
                        echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "miss_trnsl_one", array()), $this->getAttribute($context["taxonomy"], "untranslated", array()), $this->getAttribute($context["taxonomy"], "name_singular", array())), "html", null, true);
                        echo "
                            ";
                    } else {
                        // line 23
                        echo "                                ";
                        echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "miss_trnsl_more", array()), $this->getAttribute($context["taxonomy"], "untranslated", array()), $this->getAttribute($context["taxonomy"], "name", array())), "html", null, true);
                        echo "
                            ";
                    }
                    // line 25
                    echo "                            <a class=\"button button-secondary button-small\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["taxonomy"], "url", array()), "html", null, true);
                    echo "\">
                                ";
                    // line 26
                    echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "trnsl", array()), $this->getAttribute($context["taxonomy"], "name", array())), "html", null, true);
                    echo "
                            </a>
                        ";
                }
                // line 29
                echo "                    ";
            } else {
                // line 30
                echo "                        <i class=\"otgs-ico-ok\"></i>
                        ";
                // line 31
                echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "all_trnsl", array()), $this->getAttribute($context["taxonomy"], "name", array())), "html", null, true);
                echo "
                    ";
            }
            // line 33
            echo "                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxonomy'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "            ";
        if (($context["no_tax_to_update"] ?? null)) {
            // line 36
            echo "                <li>
                    <i class=\"otgs-ico-ok\"></i>
                    ";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "not_to_trnsl", array()), "html", null, true);
            echo "
                </li>
            ";
        }
        // line 41
        echo "        </ul>
        <span>";
        // line 42
        echo $this->getAttribute(($context["strings"] ?? null), "conf_warning", array());
        echo "</span>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "taxonomies.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 42,  123 => 41,  117 => 38,  113 => 36,  110 => 35,  103 => 33,  98 => 31,  95 => 30,  92 => 29,  86 => 26,  81 => 25,  75 => 23,  69 => 21,  67 => 20,  64 => 19,  59 => 17,  56 => 16,  53 => 15,  51 => 14,  46 => 13,  43 => 12,  38 => 11,  36 => 10,  28 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "taxonomies.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/status/taxonomies.twig");
    }
}
