<?php

/* /setup/ready.twig */
class __TwigTemplate_c648b976c6c5aaff289a36f45d2ec1f63ca5eb75c49efe6a7c19106f201fd568 extends Twig_Template
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
        echo sprintf($this->getAttribute(($context["strings"] ?? null), "description1", array()), "<strong>", "</strong>");
        echo "</p>

<p>";
        // line 6
        echo sprintf($this->getAttribute(($context["strings"] ?? null), "description2", array()), "<strong>", "</strong>");
        echo "</p>


<p class=\"wcml-setup-actions step\">
    <a href=\"";
        // line 10
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
        return "/setup/ready.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 10,  34 => 6,  29 => 4,  24 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/setup/ready.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/setup/ready.twig");
    }
}
