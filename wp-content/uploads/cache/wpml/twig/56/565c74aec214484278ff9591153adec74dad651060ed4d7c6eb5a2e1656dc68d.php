<?php

/* /setup/attributes.twig */
class __TwigTemplate_170276d893d15369d3846398f68952c2e27a01f0428e03dbfd0eb302195953ba extends Twig_Template
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
        echo $this->getAttribute(($context["strings"] ?? null), "heading", array());
        echo "</h1>

";
        // line 4
        if (($context["attributes"] ?? null)) {
            // line 5
            echo "    <ul class=\"no-bullets\" >
    ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["attributes"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["attribute"]) {
                // line 7
                echo "    <li>
        <label>
            <input type=\"hidden\" name=\"attributes[";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "name", array()), "html", null, true);
                echo "]\" value=\"0\" />
            <input type=\"checkbox\" name=\"attributes[";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "name", array()), "html", null, true);
                echo "]\" value=\"1\" ";
                if ($this->getAttribute($context["attribute"], "translated", array())) {
                    echo "checked=\"cehcked\"";
                }
                echo " />
            ";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "label", array()), "html", null, true);
                echo "
        </label>
    </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "    </ul>
";
        } else {
            // line 17
            echo "    <p><i>";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "no_attributes", array()), "html", null, true);
            echo "</i></p>
";
        }
        // line 19
        echo "
<p class=\"wcml-setup-actions step\">
    <a href=\"";
        // line 21
        echo twig_escape_filter($this->env, ($context["continue_url"] ?? null), "html", null, true);
        echo "\" class=\"button button-large button-primary submit\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "continue", array()), "html", null, true);
        echo "</a>
</p>
</span>
";
    }

    public function getTemplateName()
    {
        return "/setup/attributes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 21,  74 => 19,  68 => 17,  64 => 15,  54 => 11,  46 => 10,  42 => 9,  38 => 7,  34 => 6,  31 => 5,  29 => 4,  24 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/setup/attributes.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/setup/attributes.twig");
    }
}
