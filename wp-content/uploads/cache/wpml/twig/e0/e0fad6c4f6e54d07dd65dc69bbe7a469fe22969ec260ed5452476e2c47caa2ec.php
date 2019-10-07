<?php

/* media.twig */
class __TwigTemplate_7e7ea50e29197064a61f8cdf09154f9e81e2c25baca28565a9e393e7e099a464 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "heading", array()), "html", null, true);
        echo "
            <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "media_tip", array()));
        echo "\"></i>
        </h3>
    </div>
    <div class=\"wcml-section-content\">
        <ul class=\"wcml-status-list wcml-plugins-status-list\">
            <li>
                ";
        // line 11
        if (($context["media_translation_active"] ?? null)) {
            // line 12
            echo "                    <i class=\"otgs-ico-ok\"></i>
                    ";
            // line 13
            echo $this->getAttribute(($context["strings"] ?? null), "using_media_translation", array());
            echo "
                ";
        } else {
            // line 15
            echo "                    <i class=\"otgs-ico-warning\"></i>
                    ";
            // line 16
            echo $this->getAttribute(($context["strings"] ?? null), "not_using_media_translation", array());
            echo "
                    <p class=\"description\">";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "why_use_media_translation", array()), "html", null, true);
            echo "</p>
                ";
        }
        // line 19
        echo "            </li>
        </ul>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "media.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 19,  54 => 17,  50 => 16,  47 => 15,  42 => 13,  39 => 12,  37 => 11,  28 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "media.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/status/media.twig");
    }
}
