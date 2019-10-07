<?php

/* store-pages.twig */
class __TwigTemplate_9c406ca8e866b1154fc878e44dab0c132762e6133c81b315f47c847caec2f292 extends Twig_Template
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
        echo "<div class=\"wcml-section wc-store-pages-section\">
    <div class=\"wcml-section-header\">
        <h3>
            ";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "store_pages", array()), "html", null, true);
        echo "
            <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "pages_trnsl", array()));
        echo "\"></i>
        </h3>
    </div>
    <div class=\"wcml-section-content\">
        <ul class=\"wcml-status-list\">
            ";
        // line 10
        if ((($context["miss_lang"] ?? null) == "non_exist")) {
            // line 11
            echo "                <li>
                    <i class=\"otgs-ico-warning\"></i>
                    ";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "not_created", array()), "html", null, true);
            echo "
                </li>
                <li>
                    <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, ($context["install_link"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "install", array()), "html", null, true);
            echo "</a>
                </li>
            ";
        } elseif (        // line 18
($context["miss_lang"] ?? null)) {
            // line 19
            echo "                <form method=\"post\" action=\"";
            echo twig_escape_filter($this->env, ($context["request_uri"] ?? null), "html", null, true);
            echo "\">
                    ";
            // line 20
            echo $this->getAttribute(($context["nonces"] ?? null), "create_pages", array());
            echo "
                    <input type=\"hidden\" name=\"create_missing_pages\" value=\"1\"/>

                    ";
            // line 23
            if ($this->getAttribute(($context["miss_lang"] ?? null), "lang", array(), "any", true, true)) {
                // line 24
                echo "                        <li>
                            <i class=\"otgs-ico-warning\"></i>
                            ";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "not_exist", array()), "html", null, true);
                echo "
                            <ul class=\"wcml-lang-list\">
                                ";
                // line 28
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["miss_lang"] ?? null), "lang", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["missed_lang"]) {
                    // line 29
                    echo "                                    <li>
                                        <span class=\"wpml-title-flag\">
                                            <img src=\"";
                    // line 31
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('get_flag_url')->getCallable(), array($this->getAttribute($context["missed_lang"], "code", array()))), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["missed_lang"], "english_name", array()));
                    echo "\">
                                        </span>
                                        ";
                    // line 33
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["missed_lang"], "display_name", array())), "html", null, true);
                    echo "
                                    </li>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['missed_lang'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "                            </ul>

                            <button class=\"button-secondary aligncenter\" type=\"submit\" name=\"create_pages\">
                                ";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "create_transl", array()), "html", null, true);
                echo "
                            </button>
                        </li>
                    ";
            }
            // line 43
            echo "
                    ";
            // line 44
            if ($this->getAttribute(($context["miss_lang"] ?? null), "in_progress", array(), "any", true, true)) {
                // line 45
                echo "                        <li>
                            <i class=\"otgs-ico-in-progress\"></i>
                            ";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "translated_wpml", array()), "html", null, true);
                echo "
                            <ul class=\"wcml-lang-list\">
                                ";
                // line 49
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["miss_lang"] ?? null), "in_progress", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["in_progress_pages"]) {
                    // line 50
                    echo "                                    <li>
                                        <span class=\"wpml-title-flag\">";
                    // line 51
                    echo twig_escape_filter($this->env, $this->getAttribute($context["in_progress_pages"], "page", array()), "html", null, true);
                    echo "</span>
                                        <ul class=\"wcml-lang-list\">
                                            ";
                    // line 53
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["in_progress_pages"], "lang", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["miss_in_progress"]) {
                        // line 54
                        echo "                                                <li>
                                                    <span class=\"wpml-title-flag\">
                                                        <img src=\"";
                        // line 56
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('get_flag_url')->getCallable(), array($this->getAttribute($context["miss_in_progress"], "code", array()))), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["miss_in_progress"], "english_name", array()));
                        echo "\">
                                                    </span>
                                                    ";
                        // line 58
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["miss_in_progress"], "display_name", array())), "html", null, true);
                        echo "
                                                </li>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['miss_in_progress'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 61
                    echo "                                        </ul>
                                    </li>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['in_progress_pages'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "                            </ul>
                        </li>
                    ";
            }
            // line 67
            echo "                </form>
            ";
        } else {
            // line 69
            echo "                <li>
                    <i class=\"otgs-ico-ok\"></i>
                    ";
            // line 71
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "translated", array()), "html", null, true);
            echo "
                </li>
            ";
        }
        // line 74
        echo "        </ul>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "store-pages.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  192 => 74,  186 => 71,  182 => 69,  178 => 67,  173 => 64,  165 => 61,  156 => 58,  149 => 56,  145 => 54,  141 => 53,  136 => 51,  133 => 50,  129 => 49,  124 => 47,  120 => 45,  118 => 44,  115 => 43,  108 => 39,  103 => 36,  94 => 33,  87 => 31,  83 => 29,  79 => 28,  74 => 26,  70 => 24,  68 => 23,  62 => 20,  57 => 19,  55 => 18,  48 => 16,  42 => 13,  38 => 11,  36 => 10,  28 => 5,  24 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "store-pages.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/status/store-pages.twig");
    }
}
