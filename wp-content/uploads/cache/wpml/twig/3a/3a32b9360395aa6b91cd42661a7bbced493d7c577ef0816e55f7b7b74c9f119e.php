<?php

/* conf-warn.twig */
class __TwigTemplate_9e17d9ebd09c2c4cd990e9c3d7eba06c67c487ad0d7c968546ec8aea6d1bf2ce extends Twig_Template
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
        if (( !twig_test_empty(($context["xml_config_errors"] ?? null)) ||  !twig_test_empty(($context["miss_slug_lang"] ?? null)))) {
            // line 2
            echo "    <div class=\"wcml-section\">
        <div class=\"wcml-section-header\">
            <h3>
                ";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "conf", array()), "html", null, true);
            echo "
            </h3>
        </div>
        <div class=\"wcml-section-content\">
            <ul class=\"wcml-status-list\">
                ";
            // line 10
            if ( !twig_test_empty(($context["miss_slug_lang"] ?? null))) {
                // line 11
                echo "                    <li>
                        <i class=\"otgs-ico-warning\"></i>
                        ";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "base_not_trnsl", array()), "html", null, true);
                echo "
                        <ul class=\"wcml-lang-list\">
                            ";
                // line 15
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["miss_slug_lang"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["miss_lang"]) {
                    // line 16
                    echo "                                <li>
                                    <span class=\"wpml-title-flag\">
                                        <img src=\"";
                    // line 18
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('get_flag_url')->getCallable(), array($this->getAttribute($context["miss_lang"], "code", array()))), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["miss_lang"], "english_name", array()));
                    echo "\" />
                                    </span>
                                    ";
                    // line 20
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["miss_lang"], "display_name", array())), "html", null, true);
                    echo "
                                </li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['miss_lang'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                echo "                        </ul>
                        <a class=\"button-secondary\" href=\"";
                // line 24
                echo twig_escape_filter($this->env, ($context["slugs_tab"] ?? null), "html", null, true);
                echo "\">
                            ";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "trsl_urls", array()), "html", null, true);
                echo "
                        </a>
                    </li>
                ";
            }
            // line 29
            echo "
                ";
            // line 30
            if ( !twig_test_empty(($context["xml_config_errors"] ?? null))) {
                // line 31
                echo "                    <li class=\"wcml_xml_config_warnings\">
                        <i class=\"otgs-ico-warning\"></i>
                        <strong>";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "over_sett", array()), "html", null, true);
                echo "</strong>
                        <p>
                            ";
                // line 35
                echo sprintf($this->getAttribute(($context["strings"] ?? null), "check_conf", array()), $this->getAttribute(($context["strings"] ?? null), "cont_set", array()));
                echo "
                        </p>
                        <ul>
                            ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["xml_config_errors"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 39
                    echo "                                <li>";
                    echo $context["error"];
                    echo "</li>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 41
                echo "                        </ul>
                    </li>
                ";
            }
            // line 44
            echo "            </ul>
        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "conf-warn.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 44,  116 => 41,  107 => 39,  103 => 38,  97 => 35,  92 => 33,  88 => 31,  86 => 30,  83 => 29,  76 => 25,  72 => 24,  69 => 23,  60 => 20,  53 => 18,  49 => 16,  45 => 15,  40 => 13,  36 => 11,  34 => 10,  26 => 5,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "conf-warn.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/status/conf-warn.twig");
    }
}
