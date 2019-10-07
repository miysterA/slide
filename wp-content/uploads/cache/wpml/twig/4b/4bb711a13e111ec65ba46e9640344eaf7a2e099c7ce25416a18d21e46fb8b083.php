<?php

namespace WCML;

use \WCML\Twig\Environment;
use \WCML\Twig\Error\LoaderError;
use \WCML\Twig\Error\RuntimeError;
use \WCML\Twig\Markup;
use \WCML\Twig\Sandbox\SecurityError;
use \WCML\Twig\Sandbox\SecurityNotAllowedTagError;
use \WCML\Twig\Sandbox\SecurityNotAllowedFilterError;
use \WCML\Twig\Sandbox\SecurityNotAllowedFunctionError;
use \WCML\Twig\Source;
use \WCML\Twig\Template;

/* st-taxonomy-ui.twig */
class __TwigTemplate_190004921e3667bf972c6ac41bb9c287008269aa2ba84b3dc65735948b8331c3 extends \WCML\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<p>
    <a href=\"";
        // line 2
        echo \WCML\twig_escape_filter($this->env, ($context["link_url"] ?? null), "html", null, true);
        echo "\">
        ";
        // line 3
        echo \WCML\twig_escape_filter($this->env, ($context["link_label"] ?? null), "html", null, true);
        echo "
    </a>
</p>
";
    }

    public function getTemplateName()
    {
        return "st-taxonomy-ui.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 3,  35 => 2,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "st-taxonomy-ui.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/st-taxonomy-ui.twig");
    }
}
