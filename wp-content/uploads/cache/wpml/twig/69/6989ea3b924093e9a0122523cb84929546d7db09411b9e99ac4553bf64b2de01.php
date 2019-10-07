<?php

/* /setup/notice.twig */
class __TwigTemplate_d1f5ee9b59dd5093aa272b71528b1dd57aa0b05cab9e0098f56324ed4e5337d3 extends Twig_Template
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
        echo "<div id=\"wcml-setup-wizard\" class=\"updated message wpml-message\">
    <p>
        <strong>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "prepare", array()), "html", null, true);
        echo "</strong><br/>
        ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "help", array()), "html", null, true);
        echo "
    <ul class=\"wcml-notice-list\">
        <li>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "store", array()), "html", null, true);
        echo "</li>
        <li>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "attributes", array()), "html", null, true);
        echo "</li>
        <li>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "currencies", array()), "html", null, true);
        echo "</li>
    </ul>
    </p>
    <p class=\"submit\">
        <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, ($context["setup_url"] ?? null), "html", null, true);
        echo "\"
           class=\"button-primary\">";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "start", array()), "html", null, true);
        echo "</a>
        <a href=\"";
        // line 14
        echo ($context["skip_url"] ?? null);
        echo "\"
           class=\"button-secondary skip\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute(($context["text"] ?? null), "skip", array()), "html", null, true);
        echo "</a>
    </p>
</div>
";
    }

    public function getTemplateName()
    {
        return "/setup/notice.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 15,  55 => 14,  51 => 13,  47 => 12,  40 => 8,  36 => 7,  32 => 6,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/setup/notice.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/setup/notice.twig");
    }
}
