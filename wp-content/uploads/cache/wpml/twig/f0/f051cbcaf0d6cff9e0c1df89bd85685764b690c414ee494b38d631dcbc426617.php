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

/* settings-ui.twig */
class __TwigTemplate_8a2aac449f9a54cad6e6a8cbf535ffa5d0fd6b151a3290730d58dd1853962d7a extends \WCML\Twig\Template
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
        echo "<form method=\"post\" action=\"";
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "action", []), "html", null, true);
        echo "\">

    ";
        // line 3
        if ($this->getAttribute(($context["form"] ?? null), "translation_interface", [])) {
            // line 4
            echo "        <div class=\"wcml-section\">
            <div class=\"wcml-section-header\">
                <h3>
                    ";
            // line 7
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "heading", []), "html", null, true);
            echo "
                    <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
            // line 8
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "tip", []), "html", null, true);
            echo "\"></i>
                </h3>
            </div>
            <div class=\"wcml-section-content\">

                <div id=\"wcml-translation-interface-dialog-confirm\" title=\"";
            // line 13
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "heading", []), "html", null, true);
            echo "\" class=\"hidden\">
                    <p>";
            // line 14
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "pb_warning", []), "html", null, true);
            echo "</p>
                    <input type=\"hidden\" class=\"ok-button\" value=\"";
            // line 15
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "pb_warning_ok_button", []), "html", null, true);
            echo "\" />
                    <input type=\"hidden\" class=\"cancel-button\" value=\"";
            // line 16
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "pb_warning_cancel_button", []), "html", null, true);
            echo "\"/>
                </div>

                <ul>
                    <li>
                        <input type=\"radio\" name=\"trnsl_interface\" value=\"";
            // line 21
            echo \WCML\twig_escape_filter($this->env, ($context["wpml_translation"] ?? null), "html", null, true);
            echo "\"
                                ";
            // line 22
            if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "controls_value", []) == ($context["wpml_translation"] ?? null))) {
                echo " checked=\"checked\"";
            }
            echo " id=\"wcml_trsl_interface_wcml\" />
                        <label for=\"wcml_trsl_interface_wcml\">";
            // line 23
            echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "wcml", []), "label", []), "html", null, true);
            echo "</label>
                    </li>
                    <li>
                        <input type=\"radio\" name=\"trnsl_interface\" value=\"";
            // line 26
            echo \WCML\twig_escape_filter($this->env, ($context["native_translation"] ?? null), "html", null, true);
            echo "\"
                                ";
            // line 27
            if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "controls_value", []) == ($context["native_translation"] ?? null))) {
                echo " checked=\"checked\"";
            }
            echo " id=\"wcml_trsl_interface_native\" />
                        <label for=\"wcml_trsl_interface_native\">";
            // line 28
            echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", []), "native", []), "label", []);
            echo "</label>
                    </li>
                </ul>

            </div> <!-- .wcml-section-content -->

        </div> <!-- .wcml-section -->
    ";
        }
        // line 36
        echo "    <div class=\"wcml-section\">

        <div class=\"wcml-section-header\">
            <h3>
                ";
        // line 40
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", []), "heading", []), "html", null, true);
        echo "
                <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 41
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", []), "tip", []), "html", null, true);
        echo "\"></i>
            </h3>
        </div>

        <div class=\"wcml-section-content\">

            <ul>
                <li>
                    <input type=\"checkbox\" name=\"products_sync_date\" value=\"1\"
                            ";
        // line 50
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", []), "sync_date", []), "value", []) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " id=\"wcml_products_sync_date\" />
                    <label for=\"wcml_products_sync_date\">";
        // line 51
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", []), "sync_date", []), "label", []), "html", null, true);
        echo "</label>
                </li>
                <li>
                    <input type=\"checkbox\" name=\"products_sync_order\" value=\"1\"
                            ";
        // line 55
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", []), "sync_order", []), "value", []) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " id=\"wcml_products_sync_order\" />
                    <label for=\"wcml_products_sync_order\">";
        // line 56
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", []), "sync_order", []), "label", []), "html", null, true);
        echo "</label>
                </li>
            </ul>

        </div>

    </div>


    <div class=\"wcml-section\">

        <div class=\"wcml-section-header\">
            <h3>
                ";
        // line 69
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", []), "heading", []), "html", null, true);
        echo "
                <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 70
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", []), "tip", []), "html", null, true);
        echo "\"></i>
            </h3>
        </div>

        <div class=\"wcml-section-content\">

            <ul>
                <li>
                    <input type=\"radio\" name=\"wcml_file_path_sync\" value=\"1\"
                            ";
        // line 79
        if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", []), "value", []) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " id=\"wcml_file_path_sync_auto\" />
                    <label for=\"wcml_file_path_sync_auto\">";
        // line 80
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", []), "label_same", []), "html", null, true);
        echo "</label>
                </li>
                <li>
                    <input type=\"radio\" name=\"wcml_file_path_sync\" value=\"0\"
                            ";
        // line 84
        if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", []), "value", []) == 0)) {
            echo " checked=\"checked\"";
        }
        echo " id=\"wcml_file_path_sync_self\" />
                    <label for=\"wcml_file_path_sync_self\">";
        // line 85
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", []), "label_diff", []), "html", null, true);
        echo "</label>
                </li>
            </ul>


        </div> <!-- .wcml-section-content -->

    </div> <!-- .wcml-section -->


    <div class=\"wcml-section cart-sync-section\">
        <div class=\"wcml-section-header\">
            <h3>
                ";
        // line 98
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "heading", []), "html", null, true);
        echo "
                <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 99
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "tip", []), "html", null, true);
        echo "\"></i>
            </h3>
        </div>
        <div class=\"wcml-section-content\">

            ";
        // line 104
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "wpml_cookie_enabled", [])) {
            // line 105
            echo "                <i class=\"otgs-ico-warning\"></i>
                <strong>";
            // line 106
            echo $this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "cookie_not_enabled_message", []);
            echo "</strong>
            ";
        }
        // line 108
        echo "
            <div class=\"wcml-section-content-inner\">
                <h4>
                    ";
        // line 111
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "lang_switch", []), "heading", []), "html", null, true);
        echo "
                </h4>
                <ul>
                    <li>
                        <input type=\"radio\" name=\"cart_sync_lang\" value=\"";
        // line 115
        echo \WCML\twig_escape_filter($this->env, ($context["wcml_cart_sync"] ?? null), "html", null, true);
        echo "\"
                                ";
        // line 116
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "lang_switch", []), "value", []) == ($context["wcml_cart_sync"] ?? null))) {
            echo " checked=\"checked\"";
        }
        // line 117
        echo "                                ";
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "wpml_cookie_enabled", [])) {
            echo " disabled=\"disabled\"";
        }
        // line 118
        echo "                               id=\"wcml_cart_sync_lang_sync\" />
                        <label for=\"wcml_cart_sync_lang_sync\">";
        // line 119
        echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "lang_switch", []), "sync_label", []);
        echo "</label>
                    </li>
                    <li>
                        <input type=\"radio\" name=\"cart_sync_lang\" value=\"";
        // line 122
        echo \WCML\twig_escape_filter($this->env, ($context["wcml_cart_clear"] ?? null), "html", null, true);
        echo "\"
                                ";
        // line 123
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "lang_switch", []), "value", []) == ($context["wcml_cart_clear"] ?? null))) {
            echo " checked=\"checked\"";
        }
        // line 124
        echo "                                ";
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "wpml_cookie_enabled", [])) {
            echo " disabled=\"disabled\"";
        }
        // line 125
        echo "                               id=\"wcml_cart_sync_lang_clear\" />
                        <label for=\"wcml_cart_sync_lang_clear\">";
        // line 126
        echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "lang_switch", []), "clear_label", []);
        echo "</label>
                    </li>
                </ul>
            </div>
            <div class=\"wcml-section-content-inner\">
                <h4>
                    ";
        // line 132
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "currency_switch", []), "heading", []), "html", null, true);
        echo "
                </h4>
                <ul>
                    <li>
                        <input type=\"radio\" name=\"cart_sync_currencies\" value=\"";
        // line 136
        echo \WCML\twig_escape_filter($this->env, ($context["wcml_cart_sync"] ?? null), "html", null, true);
        echo "\"
                                ";
        // line 137
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "currency_switch", []), "value", []) == ($context["wcml_cart_sync"] ?? null))) {
            echo " checked=\"checked\"";
        }
        // line 138
        echo "                                ";
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "wpml_cookie_enabled", [])) {
            echo " disabled=\"disabled\"";
        }
        // line 139
        echo "                               id=\"wcml_cart_sync_curr_sync\" />
                        <label for=\"wcml_cart_sync_curr_sync\">";
        // line 140
        echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "currency_switch", []), "sync_label", []);
        echo "</label>
                    </li>
                    <li>
                        <input type=\"radio\" name=\"cart_sync_currencies\" value=\"";
        // line 143
        echo \WCML\twig_escape_filter($this->env, ($context["wcml_cart_clear"] ?? null), "html", null, true);
        echo "\"
                                ";
        // line 144
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "currency_switch", []), "value", []) == ($context["wcml_cart_clear"] ?? null))) {
            echo " checked=\"checked\"";
        }
        // line 145
        echo "                                ";
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "wpml_cookie_enabled", [])) {
            echo " disabled=\"disabled\"";
        }
        // line 146
        echo "                               id=\"wcml_cart_sync_curr_clear\" />
                        <label for=\"wcml_cart_sync_curr_clear\">";
        // line 147
        echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "currency_switch", []), "clear_label", []);
        echo "</label>
                    </li>
                </ul>
                <p>
                    ";
        // line 151
        echo $this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", []), "doc_link", []);
        echo "
                </p>
            </div>
        </div> <!-- .wcml-section-content -->

    </div> <!-- .wcml-section -->

    ";
        // line 158
        echo \WCML\twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('wp_do_action')->getCallable(), ["wcml_settings_ui_after_default"]), "html", null, true);
        echo "

    ";
        // line 160
        echo $this->getAttribute(($context["form"] ?? null), "nonce", []);
        echo "
    <p class=\"wpml-margin-top-sm\">
        <input type='submit' name=\"wcml_save_settings\" value='";
        // line 162
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "save_label", []), "html", null, true);
        echo "' class='button-primary'/>
    </p>
</form>
<a class=\"alignright\" href=\"";
        // line 165
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["troubleshooting"] ?? null), "url", []), "html", null, true);
        echo "\">";
        echo \WCML\twig_escape_filter($this->env, $this->getAttribute(($context["troubleshooting"] ?? null), "label", []), "html", null, true);
        echo "</a>";
    }

    public function getTemplateName()
    {
        return "settings-ui.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  381 => 165,  375 => 162,  370 => 160,  365 => 158,  355 => 151,  348 => 147,  345 => 146,  340 => 145,  336 => 144,  332 => 143,  326 => 140,  323 => 139,  318 => 138,  314 => 137,  310 => 136,  303 => 132,  294 => 126,  291 => 125,  286 => 124,  282 => 123,  278 => 122,  272 => 119,  269 => 118,  264 => 117,  260 => 116,  256 => 115,  249 => 111,  244 => 108,  239 => 106,  236 => 105,  234 => 104,  226 => 99,  222 => 98,  206 => 85,  200 => 84,  193 => 80,  187 => 79,  175 => 70,  171 => 69,  155 => 56,  149 => 55,  142 => 51,  136 => 50,  124 => 41,  120 => 40,  114 => 36,  103 => 28,  97 => 27,  93 => 26,  87 => 23,  81 => 22,  77 => 21,  69 => 16,  65 => 15,  61 => 14,  57 => 13,  49 => 8,  45 => 7,  40 => 4,  38 => 3,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "settings-ui.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/settings-ui.twig");
    }
}
