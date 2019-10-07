<?php

/* /setup/translation-options.twig */
class __TwigTemplate_b3cd380caa0e84dad332fc29790d437a5e0e7ae669f8fd36ea236089a6fafbbc extends Twig_Template
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
        echo "<span id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "step_id", array()), "html", null, true);
        echo "\">
<h1>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "heading", array()), "html", null, true);
        echo "</h1>

<p>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "description", array()), "html", null, true);
        echo "</p>

<ul class=\"no-bullets\">
    <li>
        <label class=\"display-as-translated-yes\">
            <input type=\"radio\" value=\"1\" name=\"translation-option\" ";
        // line 9
        if (($context["is_display_as_translated_checked"] ?? null)) {
            echo "checked=\"checked\"";
        }
        echo " />
            ";
        // line 10
        echo $this->getAttribute(($context["strings"] ?? null), "label_display_as_translated", array());
        echo "
        </label>
    </li>
    <li>
        <label class=\"display-as-translated-no\">
            <input type=\"radio\" value=\"2\" name=\"translation-option\" />
            ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "label_translated", array()), "html", null, true);
        echo "
        </label>
    </li>
</ul>

<p>";
        // line 21
        echo sprintf($this->getAttribute(($context["strings"] ?? null), "description_footer", array()), "<strong>", "</strong>");
        echo "</p>

<p class=\"wcml-setup-actions step\">
    <a href=\"";
        // line 24
        echo twig_escape_filter($this->env, ($context["continue_url"] ?? null), "html", null, true);
        echo "\" class=\"button button-large button-primary submit\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "continue", array()), "html", null, true);
        echo "</a>
</p>
</span>";
    }

    public function getTemplateName()
    {
        return "/setup/translation-options.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 24,  60 => 21,  52 => 16,  43 => 10,  37 => 9,  29 => 4,  24 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/setup/translation-options.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/setup/translation-options.twig");
    }
}
