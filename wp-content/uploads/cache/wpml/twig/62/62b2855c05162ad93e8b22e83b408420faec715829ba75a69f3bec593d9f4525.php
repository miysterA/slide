<?php

/* /setup/header.twig */
class __TwigTemplate_96a17d3ca1b9ebe2b8ab4db483976671644f6fe4cc88e61a409e812fff9e18b9 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" ";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('language_attributes')->getCallable(), array()), "html", null, true);
        echo ">
<head>
    <meta name=\"viewport\" content=\"width=device-width\"/>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>
    <title>";
        // line 6
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
    ";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('wp_print_scripts')->getCallable(), array("wcml-setup")), "html", null, true);
        echo "
    ";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('wp_do_action')->getCallable(), array("admin_print_styles")), "html", null, true);
        echo "
    ";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('wp_do_action')->getCallable(), array("admin_head")), "html", null, true);
        echo "
</head>
<body class=\"wcml-setup wp-core-ui\">
<h1 id=\"wcml-logo\"><a href=\"https://wpml.org/woocommerce-multilingual\"><img
                src=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["WCML_PLUGIN_URL"] ?? null), "html", null, true);
        echo "/res/images/banner-772x120.png\"
                alt=\"WooCommerce Multilingual\"/></a></h1>

";
        // line 16
        if (($context["has_handler"] ?? null)) {
            // line 17
            echo "<form class=\"wcml-setup-form\" method=\"post\">
    <input type=\"hidden\" name=\"nonce\" value=\"";
            // line 18
            echo twig_escape_filter($this->env, ($context["nonce"] ?? null), "html", null, true);
            echo "\"/>
    <input type=\"hidden\" name=\"handle_step\" value=\"";
            // line 19
            echo twig_escape_filter($this->env, ($context["step"] ?? null), "html", null, true);
            echo "\"/>
";
        }
    }

    public function getTemplateName()
    {
        return "/setup/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 19,  59 => 18,  56 => 17,  54 => 16,  48 => 13,  41 => 9,  37 => 8,  33 => 7,  29 => 6,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/setup/header.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/setup/header.twig");
    }
}
