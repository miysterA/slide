<?php

/* /setup/introduction.twig */
class __TwigTemplate_da7a055b949ba110f0a8e9932b7b47e4d362690b59631b2de2a69bf27b77c5c5 extends Twig_Template
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
        echo "
<span id=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "step_id", array()), "html", null, true);
        echo "\">
<h1>";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "heading", array()), "html", null, true);
        echo "</h1>

<p>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "description1", array()), "html", null, true);
        echo "</p>
<div>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["strings"] ?? null), "description2", array()), "title", array()), "html", null, true);
        echo "</div>
<ul>
    <li>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["strings"] ?? null), "description2", array()), "step1", array()), "html", null, true);
        echo "</li>
    <li>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["strings"] ?? null), "description2", array()), "step2", array()), "html", null, true);
        echo "</li>
    <li>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["strings"] ?? null), "description2", array()), "step3", array()), "html", null, true);
        echo "</li>
</ul>
<p>";
        // line 12
        echo $this->getAttribute(($context["strings"] ?? null), "description3", array());
        echo "</p>

<p class=\"wcml-setup-actions step\">
    <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["later_url"] ?? null), "html", null, true);
        echo "\" class=\"setup_later\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "later", array()), "html", null, true);
        echo "</a>
    <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["continue_url"] ?? null), "html", null, true);
        echo "\" class=\"button button-primary button-large\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "continue", array()), "html", null, true);
        echo "</a>
</p>
</span>
";
    }

    public function getTemplateName()
    {
        return "/setup/introduction.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 16,  59 => 15,  53 => 12,  48 => 10,  44 => 9,  40 => 8,  35 => 6,  31 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/setup/introduction.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/setup/introduction.twig");
    }
}
