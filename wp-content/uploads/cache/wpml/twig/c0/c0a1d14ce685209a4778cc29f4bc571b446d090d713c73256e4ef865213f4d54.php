<?php

/* plugins-status.twig */
class __TwigTemplate_f46add970b1d91c72e260da357c294424abaaebfcc643dfdce35d827422a3b11 extends Twig_Template
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
        echo "<div class=\"wcml-section\">
    <div class=\"wcml-section-header\">
        <h3>
            ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "status", array()), "html", null, true);
        echo "
            <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "depends", array()));
        echo "\"></i>
        </h3>
    </div>
    <div class=\"wcml-section-content\">
        <ul class=\"wcml-status-list wcml-plugins-status-list\">
            ";
        // line 10
        if (($context["icl_version"] ?? null)) {
            // line 11
            echo "                <li>
                    <i class=\"otgs-ico-ok\"></i>
                    ";
            // line 13
            echo sprintf($this->getAttribute(($context["strings"] ?? null), "inst_active", array()), $this->getAttribute(($context["strings"] ?? null), "wpml", array()));
            echo "
                </li>
                ";
            // line 15
            if (($context["icl_setup"] ?? null)) {
                // line 16
                echo "                    <li>
                        <i class=\"otgs-ico-ok\"></i>
                        ";
                // line 18
                echo sprintf($this->getAttribute(($context["strings"] ?? null), "is_setup", array()), $this->getAttribute(($context["strings"] ?? null), "wpml", array()));
                echo "
                    </li>
                ";
            } else {
                // line 21
                echo "                    <li>
                        <i class=\"otgs-ico-warning\"></i>
                        ";
                // line 23
                echo sprintf($this->getAttribute(($context["strings"] ?? null), "not_setup", array()), $this->getAttribute(($context["strings"] ?? null), "wpml", array()));
                echo "
                    </li>
                ";
            }
            // line 26
            echo "            ";
        }
        // line 27
        echo "            ";
        if (($context["tm_version"] ?? null)) {
            // line 28
            echo "                <li>
                    <i class=\"otgs-ico-ok\"></i>
                    ";
            // line 30
            echo sprintf($this->getAttribute(($context["strings"] ?? null), "inst_active", array()), $this->getAttribute(($context["strings"] ?? null), "tm", array()));
            echo "
                </li>
            ";
        }
        // line 33
        echo "            ";
        if (($context["st_version"] ?? null)) {
            // line 34
            echo "                <li>
                    <i class=\"otgs-ico-ok\"></i>
                    ";
            // line 36
            echo sprintf($this->getAttribute(($context["strings"] ?? null), "inst_active", array()), $this->getAttribute(($context["strings"] ?? null), "st", array()));
            echo "
                </li>
            ";
        }
        // line 39
        echo "            ";
        if (($context["wc"] ?? null)) {
            // line 40
            echo "                <li>
                    <i class=\"otgs-ico-ok\"></i>
                    ";
            // line 42
            echo sprintf($this->getAttribute(($context["strings"] ?? null), "inst_active", array()), $this->getAttribute(($context["strings"] ?? null), "wc", array()));
            echo "
                </li>
            ";
        }
        // line 45
        echo "        </ul>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "plugins-status.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 45,  105 => 42,  101 => 40,  98 => 39,  92 => 36,  88 => 34,  85 => 33,  79 => 30,  75 => 28,  72 => 27,  69 => 26,  63 => 23,  59 => 21,  53 => 18,  49 => 16,  47 => 15,  42 => 13,  38 => 11,  36 => 10,  28 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "plugins-status.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/status/plugins-status.twig");
    }
}
