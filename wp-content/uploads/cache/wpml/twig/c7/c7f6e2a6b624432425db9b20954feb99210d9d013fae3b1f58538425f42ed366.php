<?php

/* template.twig */
class __TwigTemplate_aba3e7261c92b44a13b6440744b78a4f634338f5ee583a8cd2cdb653f47ba00b extends Twig_Template
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
        $context["css_classes_flag"] = twig_trim_filter(("wpml-ls-flag " . $this->getAttribute(($context["backward_compatibility"] ?? null), "css_classes_flag", array())));
        // line 2
        $context["css_classes_native"] = twig_trim_filter(("wpml-ls-native " . $this->getAttribute(($context["backward_compatibility"] ?? null), "css_classes_native", array())));
        // line 3
        $context["css_classes_display"] = twig_trim_filter(("wpml-ls-display " . $this->getAttribute(($context["backward_compatibility"] ?? null), "css_classes_display", array())));
        // line 4
        $context["css_classes_bracket"] = twig_trim_filter(("wpml-ls-bracket " . $this->getAttribute(($context["backward_compatibility"] ?? null), "css_classes_bracket", array())));
        // line 5
        $context["css_classes_link"] = twig_trim_filter(((($context["css_classes_link"] ?? null) . " ") . $this->getAttribute($this->getAttribute(($context["language"] ?? null), "backward_compatibility", array()), "css_classes_a", array())));
        // line 6
        echo "
<div class=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["css_classes"] ?? null), "html", null, true);
        echo " wpml-ls-legacy-list-vertical\"";
        if ($this->getAttribute(($context["backward_compatibility"] ?? null), "css_id", array())) {
            echo " id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["backward_compatibility"] ?? null), "css_id", array()), "html", null, true);
            echo "\"";
        }
        echo ">
\t<ul>

\t\t";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["code"] => $context["language"]) {
            // line 11
            echo "\t\t\t<li class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "css_classes", array()), "html", null, true);
            echo " wpml-ls-item-legacy-list-vertical\">
\t\t\t\t<a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "url", array()), "html", null, true);
            echo "\" class=\"";
            echo twig_escape_filter($this->env, ($context["css_classes_link"] ?? null), "html", null, true);
            echo "\">";
            // line 13
            if ($this->getAttribute($context["language"], "flag_url", array())) {
                // line 14
                echo "<img class=\"";
                echo twig_escape_filter($this->env, ($context["css_classes_flag"] ?? null), "html", null, true);
                echo "\" src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "flag_url", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "code", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "flag_title", array()), "html", null, true);
                echo "\">";
            }
            // line 17
            if (($this->getAttribute($context["language"], "is_current", array()) && ($this->getAttribute($context["language"], "native_name", array()) || $this->getAttribute($context["language"], "display_name", array())))) {
                // line 19
                $context["current_language_name"] = (($this->getAttribute($context["language"], "native_name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["language"], "native_name", array()), $this->getAttribute($context["language"], "display_name", array()))) : ($this->getAttribute($context["language"], "display_name", array())));
                // line 20
                echo "<span class=\"";
                echo twig_escape_filter($this->env, ($context["css_classes_native"] ?? null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, ($context["current_language_name"] ?? null), "html", null, true);
                echo "</span>";
            } else {
                // line 24
                if ($this->getAttribute($context["language"], "native_name", array())) {
                    // line 25
                    echo "<span class=\"";
                    echo twig_escape_filter($this->env, ($context["css_classes_native"] ?? null), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "native_name", array()), "html", null, true);
                    echo "</span>";
                }
                // line 28
                if ($this->getAttribute($context["language"], "display_name", array())) {
                    // line 29
                    echo "<span class=\"";
                    echo twig_escape_filter($this->env, ($context["css_classes_display"] ?? null), "html", null, true);
                    echo "\">";
                    // line 30
                    if ($this->getAttribute($context["language"], "native_name", array())) {
                        echo "<span class=\"";
                        echo twig_escape_filter($this->env, ($context["css_classes_bracket"] ?? null), "html", null, true);
                        echo "\"> (</span>";
                    }
                    // line 31
                    echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "display_name", array()), "html", null, true);
                    // line 32
                    if ($this->getAttribute($context["language"], "native_name", array())) {
                        echo "<span class=\"";
                        echo twig_escape_filter($this->env, ($context["css_classes_bracket"] ?? null), "html", null, true);
                        echo "\">)</span>";
                    }
                    // line 33
                    echo "</span>";
                }
            }
            // line 37
            echo "</a>
\t\t\t</li>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['code'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "
\t</ul>
</div>";
    }

    public function getTemplateName()
    {
        return "template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 40,  115 => 37,  111 => 33,  105 => 32,  103 => 31,  97 => 30,  93 => 29,  91 => 28,  84 => 25,  82 => 24,  75 => 20,  73 => 19,  71 => 17,  60 => 14,  58 => 13,  53 => 12,  48 => 11,  44 => 10,  32 => 7,  29 => 6,  27 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "template.twig", "/home/websites/wp_slider/wp-content/plugins/sitepress-multilingual-cms/templates/language-switchers/legacy-list-vertical/template.twig");
    }
}
