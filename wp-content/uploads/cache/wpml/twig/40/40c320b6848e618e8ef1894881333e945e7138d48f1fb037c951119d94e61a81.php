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

/* trnsl-attributes.twig */
class __TwigTemplate_ddd19b369f93884e0663489f55ef65a8a501cacdb57554a2f9a1205683c066d7 extends \WCML\Twig\Template
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
        if (($context["edit_mode"] ?? null)) {
            // line 2
            echo "    <div class=\"wcml-is-translatable-attr-block\" style=\"display: none\">
        <table>
            <tr class=\"form-field\">
                <th scope=\"row\" valign=\"top\">
                    <label for=\"wcml-is-translatable-attr\">";
            // line 6
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "label", []), "html", null, true);
            echo "</label>
                </th>
                <td>
                    <input name=\"wcml-is-translatable-attr\" id=\"wcml-is-translatable-attr\" type=\"checkbox\" value=\"1\" ";
            // line 9
            if (($context["checked"] ?? null)) {
                echo " checked=\"checked\" ";
            }
            echo " />
                    <p class=\"description\">";
            // line 10
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "description", []), "html", null, true);
            echo "</p>
                </td>
            </tr>
        </table>
    </div>
    <input type=\"hidden\" id=\"wcml-is-translatable-attr-notice\" value=\"";
            // line 15
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "notice", []), "html", null, true);
            echo "\" />
";
        } else {
            // line 17
            echo "    <div class=\"wcml-is-translatable-attr-block\" style=\"display: none\">
        <div class=\"form-field\">
            <label for=\"wcml-is-translatable-attr\">
                <input name=\"wcml-is-translatable-attr\" id=\"wcml-is-translatable-attr\" type=\"checkbox\" value=\"1\" ";
            // line 20
            if (($context["checked"] ?? null)) {
                echo " checked=\"checked\" ";
            }
            echo " />
                ";
            // line 21
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "label", []), "html", null, true);
            echo "
            </label>
            <p class=\"description\">";
            // line 23
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "description", []), "html", null, true);
            echo "</p>
        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "trnsl-attributes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 23,  76 => 21,  70 => 20,  65 => 17,  60 => 15,  52 => 10,  46 => 9,  40 => 6,  34 => 2,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "trnsl-attributes.twig", "D:\\projets\\woocommerce\\wp_slider\\wp-content\\plugins\\woocommerce-multilingual\\templates\\trnsl-attributes.twig");
    }
}
