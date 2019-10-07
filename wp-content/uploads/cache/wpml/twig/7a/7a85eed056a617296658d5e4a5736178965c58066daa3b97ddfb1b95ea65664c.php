<?php

/* store-urls.twig */
class __TwigTemplate_97c0ed30f42c60e9d1cb15333d3f09dbcfc43eaacbe6fab7b17e4e39c5abbc12 extends Twig_Template
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
        echo "<div>
    <p>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "notice", array()), "html", null, true);
        echo "</p>
    <p>";
        // line 3
        echo $this->getAttribute(($context["strings"] ?? null), "notice_defaults", array());
        echo "</p>
</div>
<table class=\"widefat wpml-list-table wp-list-table striped\" cellspacing=\"0\">
    <thead>
        <tr>
            <th scope=\"col\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "slug_type", array()), "html", null, true);
        echo "</th>
            <th scope=\"col\" id=\"date\" class=\"wpml-col-url\">
                ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "orig_slug", array()), "html", null, true);
        echo "
            </th>
            <th scope=\"col\" class=\"wpml-col-languages\">
                ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["data"] ?? null), "flags", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 14
            echo "                    <span title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()));
            echo "\">
\t\t\t\t\t\t\t<img src=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "flag_url", array()), "html", null, true);
            echo "\"  alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()));
            echo "\"/>
\t\t\t\t\t\t</span>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <strong>
                    ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "shop", array()), "html", null, true);
        echo "
                </strong>
            </td>

            <td class=\"wpml-col-url\">
                <img src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["shop_base"] ?? null), "flag", array()), "html", null, true);
        echo "\" />
                <strong>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute(($context["shop_base"] ?? null), "orig_value", array()), "html", null, true);
        echo "</strong>
            </td>

            <td class=\"wpml-col-languages\">
                ";
        // line 35
        echo $this->getAttribute(($context["shop_base"] ?? null), "statuses", array());
        echo "
            </td>

        </tr>
        <tr>
            <td>
                <strong>
                    ";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "product", array()), "html", null, true);
        echo "
                </strong>
            </td>

            <td class=\"wpml-col-url\">
                <img src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product_base"] ?? null), "flag", array()), "html", null, true);
        echo "\" />
                <strong>";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product_base"] ?? null), "orig_value", array()), "html", null, true);
        echo "</strong>
            </td>

            <td class=\"wpml-col-languages\">
                ";
        // line 52
        echo $this->getAttribute(($context["product_base"] ?? null), "statuses", array());
        echo "
            </td>

        </tr>
        <tr>
            <td>
                <strong>
                    ";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "category", array()), "html", null, true);
        echo "
                </strong>
            </td>

            <td class=\"wpml-col-url\">
                <img src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute(($context["cat_base"] ?? null), "flag", array()), "html", null, true);
        echo "\" />
                <strong>";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute(($context["cat_base"] ?? null), "orig_value", array()), "html", null, true);
        echo "</strong>
            </td>

            <td class=\"wpml-col-languages\">
                ";
        // line 69
        echo $this->getAttribute(($context["cat_base"] ?? null), "statuses", array());
        echo "
            </td>

        </tr>
        <tr>
            <td>
                <strong>
                    ";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "tag", array()), "html", null, true);
        echo "
                </strong>
            </td>

            <td class=\"wpml-col-url\">
                <img src=\"";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute(($context["tag_base"] ?? null), "flag", array()), "html", null, true);
        echo "\" />
                <strong>";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute(($context["tag_base"] ?? null), "orig_value", array()), "html", null, true);
        echo "</strong>
            </td>

            <td class=\"wpml-col-languages\">
                ";
        // line 86
        echo $this->getAttribute(($context["tag_base"] ?? null), "statuses", array());
        echo "
            </td>

        </tr>
        <tr>
            <td>
                <strong>
                    ";
        // line 93
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "attr", array()), "html", null, true);
        echo "
                </strong>
            </td>

            <td class=\"wpml-col-url\">
                <img src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute(($context["attr_base"] ?? null), "flag", array()), "html", null, true);
        echo "\" />
                <strong>";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute(($context["attr_base"] ?? null), "orig_value", array()), "html", null, true);
        echo "</strong>
            </td>

            <td class=\"wpml-col-languages\">
                ";
        // line 103
        echo $this->getAttribute(($context["attr_base"] ?? null), "statuses", array());
        echo "
            </td>
        </tr>
        ";
        // line 106
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["endpoints_base"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["endpoint"]) {
            // line 107
            echo "            <tr>
                <td>
                    <strong>
                        ";
            // line 110
            echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "endpoint", array()), $this->getAttribute($context["endpoint"], "key", array())), "html", null, true);
            echo "
                    </strong>
                </td>

                <td class=\"wpml-col-url\">
                    <img src=\"";
            // line 115
            echo twig_escape_filter($this->env, $this->getAttribute($context["endpoint"], "flag", array()), "html", null, true);
            echo "\" />
                    <strong>";
            // line 116
            echo twig_escape_filter($this->env, $this->getAttribute($context["endpoint"], "orig_value", array()), "html", null, true);
            echo "</strong>
                </td>

                <td class=\"wpml-col-languages\">
                    ";
            // line 120
            echo $this->getAttribute($context["endpoint"], "statuses", array());
            echo "
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['endpoint'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attribute_slugs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["slug"]) {
            // line 125
            echo "            <tr>
                <td>
                    <strong>
                        ";
            // line 128
            echo twig_escape_filter($this->env, sprintf($this->getAttribute(($context["strings"] ?? null), "attribute_slug", array()), $this->getAttribute($context["slug"], "label", array())), "html", null, true);
            echo "
                    </strong>
                </td>

                <td class=\"wpml-col-url\">
                    <img src=\"";
            // line 133
            echo twig_escape_filter($this->env, $this->getAttribute($context["slug"], "flag", array()), "html", null, true);
            echo "\" />
                    <strong>";
            // line 134
            echo twig_escape_filter($this->env, $this->getAttribute($context["slug"], "orig_value", array()), "html", null, true);
            echo "</strong>
                </td>

                <td class=\"wpml-col-languages\">
                    ";
            // line 138
            echo $this->getAttribute($context["slug"], "statuses", array());
            echo "
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slug'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 142
        echo "    </tbody>
</table>


";
        // line 146
        echo $this->getAttribute(($context["nonces"] ?? null), "edit_base", array());
        echo "
";
        // line 147
        echo $this->getAttribute(($context["nonces"] ?? null), "update_base", array());
    }

    public function getTemplateName()
    {
        return "store-urls.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  302 => 147,  298 => 146,  292 => 142,  282 => 138,  275 => 134,  271 => 133,  263 => 128,  258 => 125,  253 => 124,  243 => 120,  236 => 116,  232 => 115,  224 => 110,  219 => 107,  215 => 106,  209 => 103,  202 => 99,  198 => 98,  190 => 93,  180 => 86,  173 => 82,  169 => 81,  161 => 76,  151 => 69,  144 => 65,  140 => 64,  132 => 59,  122 => 52,  115 => 48,  111 => 47,  103 => 42,  93 => 35,  86 => 31,  82 => 30,  74 => 25,  65 => 18,  54 => 15,  49 => 14,  45 => 13,  39 => 10,  34 => 8,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "store-urls.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/store-urls/store-urls.twig");
    }
}
