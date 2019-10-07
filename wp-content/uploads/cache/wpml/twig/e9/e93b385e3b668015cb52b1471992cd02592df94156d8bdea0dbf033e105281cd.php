<?php

/* pagination.twig */
class __TwigTemplate_fa2406228a2e48f1b6be0d8de0235254638ba8d4f50677b2dea570177fa200dd extends Twig_Template
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
        if (($context["display"] ?? null)) {
            // line 2
            echo "\t<div class=\"tablenav bottom clearfix\">
\t\t<div class=\"tablenav-pages\">
\t\t\t<span class=\"displaying-num\">";
            // line 4
            echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "items", array()), ($context["products_count"] ?? null)), "html", null, true);
            echo "</span>
\t\t\t<span class=\"pagination-links\">
\t\t\t\t";
            // line 6
            if (($context["show"] ?? null)) {
                // line 7
                echo "\t\t\t\t\t<a class=\"first-page ";
                if ((($context["pn"] ?? null) == 1)) {
                    echo " disabled ";
                }
                echo "\"
\t\t\t\t\t   href=\"";
                // line 8
                echo twig_escape_filter($this->env, ($context["pagination_first"] ?? null), "html", null, true);
                echo "\"
\t\t\t\t\t   title=\"";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "first", array()));
                echo "\">&laquo;</a>

\t\t\t\t\t<a class=\"prev-page ";
                // line 11
                if ((($context["pn"] ?? null) == 1)) {
                    echo " disabled ";
                }
                echo "\"
\t\t\t\t\t   href=\"";
                // line 12
                echo twig_escape_filter($this->env, ($context["pagination_prev"] ?? null), "html", null, true);
                echo "\"
\t\t\t\t\t   title=\"";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "previous", array()));
                echo "\">&lsaquo;</a>

\t\t\t\t\t<span class=\"paging-input\">
\t\t\t\t\t\t<label for=\"current-page-selector\" class=\"screen-reader-text\">
\t\t\t\t\t\t\t";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "select", array()), "html", null, true);
                echo "
\t\t\t\t\t\t</label>
\t\t\t\t\t\t<input class=\"current-page\" id=\"current-page-selector\"
\t\t\t\t\t\t\t   title=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "current", array()));
                echo "\"
\t\t\t\t\t\t\t   type=\"text\" name=\"paged\" value=\"";
                // line 21
                echo twig_escape_filter($this->env, ($context["pn"] ?? null), "html", null, true);
                echo "\" size=\"2\">
\t\t\t\t\t\t&nbsp;";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "of", array()), "html", null, true);
                echo "&nbsp;
\t\t\t\t\t\t<span\tclass=\"total-pages\">";
                // line 23
                echo twig_escape_filter($this->env, ($context["last"] ?? null), "html", null, true);
                echo "</span>
\t\t\t\t\t</span>

\t\t\t\t\t<a class=\"next-page ";
                // line 26
                if ((($context["pn"] ?? null) == ($context["last"] ?? null))) {
                    echo " disabled ";
                }
                echo "\"
\t\t\t\t\t   href=\"";
                // line 27
                echo twig_escape_filter($this->env, ($context["pagination_next"] ?? null), "html", null, true);
                echo "\"
\t\t\t\t\t   title=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "next", array()));
                echo "\">&rsaquo;</a>

\t\t\t\t\t<a class=\"last-page ";
                // line 30
                if ((($context["pn"] ?? null) == ($context["last"] ?? null))) {
                    echo " disabled ";
                }
                echo "\"
\t\t\t\t\t   href=\"";
                // line 31
                echo twig_escape_filter($this->env, ($context["pagination_last"] ?? null), "html", null, true);
                echo "\"
\t\t\t\t\t   title=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "last", array()));
                echo "\">&raquo;</a>
\t\t\t\t";
            }
            // line 34
            echo "\t\t\t</span>
\t\t</div>
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "pagination.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 34,  114 => 32,  110 => 31,  104 => 30,  99 => 28,  95 => 27,  89 => 26,  83 => 23,  79 => 22,  75 => 21,  71 => 20,  65 => 17,  58 => 13,  54 => 12,  48 => 11,  43 => 9,  39 => 8,  32 => 7,  30 => 6,  25 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "pagination.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/products-list/pagination.twig");
    }
}
