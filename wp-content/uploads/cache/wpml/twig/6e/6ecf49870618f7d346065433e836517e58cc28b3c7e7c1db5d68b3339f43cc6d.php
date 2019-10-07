<?php

/* edit-base.twig */
class __TwigTemplate_49c7bb505a3117aa123d00d0a72aa64cd2f0984eb6ea4ca95f1f707abe24966b extends Twig_Template
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
        echo "<div class=\"wcml-dialog hidden\" id=\"wcml-edit-base-slug-";
        echo twig_escape_filter($this->env, ($context["original_base"] ?? null));
        echo "-";
        echo twig_escape_filter($this->env, ($context["language"] ?? null));
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "label_name", array()), "html", null, true);
        echo "\">
    <form class=\"wcml-slug-dialog\" >

        <h3 class=\"wpml-header-original\">";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "orig", array()), "html", null, true);
        echo ":
\t\t\t\t<span class=\"wpml-title-flag\">
\t\t\t\t\t<img src=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["orig_flag_url"] ?? null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, ($context["orig_display_name"] ?? null));
        echo "\"/>
\t\t\t\t</span>
            <strong>";
        // line 8
        echo twig_escape_filter($this->env, ($context["orig_display_name"] ?? null), "html", null, true);
        echo "</strong>
        </h3>

        <h3 class=\"wpml-header-translation\">";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "trnsl_to", array()), "html", null, true);
        echo ":
\t\t\t\t<span class=\"wpml-title-flag\">
\t\t\t\t\t<img src=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["trnsl_flag_url"] ?? null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, ($context["trnsl_display_name"] ?? null));
        echo "\"/>
\t\t\t\t</span>
            <strong>";
        // line 15
        echo twig_escape_filter($this->env, ($context["trnsl_display_name"] ?? null), "html", null, true);
        echo "</strong>
        </h3>

        <div class=\"wpml-form-row\">
            <input readonly id=\"base-original\" class=\"original_value\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "original_base_value", array()), "html", null, true);
        echo "\"
                   type=\"text\">

            <input id=\"base-translation\"
                   class=\"translated_value\"
                   name=\"base_translation\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute(($context["data"] ?? null), "translated_base_value", array()), "html", null, true);
        echo "\" type=\"text\"/>
        </div>

        <footer class=\"wpml-dialog-footer\">
            <input type=\"button\" class=\"cancel wcml-dialog-close-button wpml-dialog-close-button wcml_cancel_base alignleft\"
                   value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "cancel", array()));
        echo "\" />
            <input type=\"submit\" class=\"wcml-dialog-close-button wpml-dialog-close-button button-primary wcml_save_base alignright\"
                   value=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "save", array()));
        echo "\" data-base=\"";
        echo twig_escape_filter($this->env, ($context["original_base"] ?? null));
        echo "\" data-language=\"";
        echo twig_escape_filter($this->env, ($context["language"] ?? null));
        echo "\"/>
        </footer>
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "edit-base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 31,  83 => 29,  75 => 24,  67 => 19,  60 => 15,  53 => 13,  48 => 11,  42 => 8,  35 => 6,  30 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "edit-base.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/store-urls/edit-base.twig");
    }
}
