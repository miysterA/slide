<?php

/* settings-ui.twig */
class __TwigTemplate_c26fe139ac36f29a0cf7e212df98e11be65668f3493fbd21e303f2cf02a2acc6 extends Twig_Template
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
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "action", array()), "html", null, true);
        echo "\">

    ";
        // line 3
        if ($this->getAttribute(($context["form"] ?? null), "translation_interface", array())) {
            // line 4
            echo "        <div class=\"wcml-section\">
            <div class=\"wcml-section-header\">
                <h3>
                    ";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "heading", array()), "html", null, true);
            echo "
                    <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "tip", array()), "html", null, true);
            echo "\"></i>
                </h3>
            </div>
            <div class=\"wcml-section-content\">

                <div id=\"wcml-translation-interface-dialog-confirm\" title=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "heading", array()), "html", null, true);
            echo "\" class=\"hidden\">
                    <p>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "pb_warning", array()), "html", null, true);
            echo "</p>
                    <input type=\"hidden\" class=\"ok-button\" value=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "pb_warning_ok_button", array()), "html", null, true);
            echo "\" />
                    <input type=\"hidden\" class=\"cancel-button\" value=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "pb_warning_cancel_button", array()), "html", null, true);
            echo "\"/>
                </div>

                <ul>
                    <li>
                        <input type=\"radio\" name=\"trnsl_interface\" value=\"";
            // line 21
            echo twig_escape_filter($this->env, ($context["wpml_translation"] ?? null), "html", null, true);
            echo "\"
                                ";
            // line 22
            if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "controls_value", array()) == ($context["wpml_translation"] ?? null))) {
                echo " checked=\"checked\"";
            }
            echo " id=\"wcml_trsl_interface_wcml\" />
                        <label for=\"wcml_trsl_interface_wcml\">";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "wcml", array()), "label", array()), "html", null, true);
            echo "</label>
                    </li>
                    <li>
                        <input type=\"radio\" name=\"trnsl_interface\" value=\"";
            // line 26
            echo twig_escape_filter($this->env, ($context["native_translation"] ?? null), "html", null, true);
            echo "\"
                                ";
            // line 27
            if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "controls_value", array()) == ($context["native_translation"] ?? null))) {
                echo " checked=\"checked\"";
            }
            echo " id=\"wcml_trsl_interface_native\" />
                        <label for=\"wcml_trsl_interface_native\">";
            // line 28
            echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "translation_interface", array()), "native", array()), "label", array());
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", array()), "heading", array()), "html", null, true);
        echo "
                <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", array()), "tip", array()), "html", null, true);
        echo "\"></i>
            </h3>
        </div>

        <div class=\"wcml-section-content\">

            <ul>
                <li>
                    <input type=\"checkbox\" name=\"products_sync_date\" value=\"1\"
                            ";
        // line 50
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", array()), "sync_date", array()), "value", array()) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " id=\"wcml_products_sync_date\" />
                    <label for=\"wcml_products_sync_date\">";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", array()), "sync_date", array()), "label", array()), "html", null, true);
        echo "</label>
                </li>
                <li>
                    <input type=\"checkbox\" name=\"products_sync_order\" value=\"1\"
                            ";
        // line 55
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", array()), "sync_order", array()), "value", array()) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " id=\"wcml_products_sync_order\" />
                    <label for=\"wcml_products_sync_order\">";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "synchronization", array()), "sync_order", array()), "label", array()), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", array()), "heading", array()), "html", null, true);
        echo "
                <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", array()), "tip", array()), "html", null, true);
        echo "\"></i>
            </h3>
        </div>

        <div class=\"wcml-section-content\">

            <ul>
                <li>
                    <input type=\"radio\" name=\"wcml_file_path_sync\" value=\"1\"
                            ";
        // line 79
        if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", array()), "value", array()) == 1)) {
            echo " checked=\"checked\"";
        }
        echo " id=\"wcml_file_path_sync_auto\" />
                    <label for=\"wcml_file_path_sync_auto\">";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", array()), "label_same", array()), "html", null, true);
        echo "</label>
                </li>
                <li>
                    <input type=\"radio\" name=\"wcml_file_path_sync\" value=\"0\"
                            ";
        // line 84
        if (($this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", array()), "value", array()) == 0)) {
            echo " checked=\"checked\"";
        }
        echo " id=\"wcml_file_path_sync_self\" />
                    <label for=\"wcml_file_path_sync_self\">";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "file_sync", array()), "label_diff", array()), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "heading", array()), "html", null, true);
        echo "
                <i class=\"otgs-ico-help wcml-tip\" data-tip=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "tip", array()), "html", null, true);
        echo "\"></i>
            </h3>
        </div>
        <div class=\"wcml-section-content\">

            ";
        // line 104
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "wpml_cookie_enabled", array())) {
            // line 105
            echo "                <i class=\"otgs-ico-warning\"></i>
                <strong>";
            // line 106
            echo $this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "cookie_not_enabled_message", array());
            echo "</strong>
            ";
        }
        // line 108
        echo "
            <div class=\"wcml-section-content-inner\">
                <h4>
                    ";
        // line 111
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "lang_switch", array()), "heading", array()), "html", null, true);
        echo "
                </h4>
                <ul>
                    <li>
                        <input type=\"radio\" name=\"cart_sync_lang\" value=\"";
        // line 115
        echo twig_escape_filter($this->env, ($context["wcml_cart_sync"] ?? null), "html", null, true);
        echo "\"
                                ";
        // line 116
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "lang_switch", array()), "value", array()) == ($context["wcml_cart_sync"] ?? null))) {
            echo " checked=\"checked\"";
        }
        // line 117
        echo "                                ";
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "wpml_cookie_enabled", array())) {
            echo " disabled=\"disabled\"";
        }
        // line 118
        echo "                               id=\"wcml_cart_sync_lang_sync\" />
                        <label for=\"wcml_cart_sync_lang_sync\">";
        // line 119
        echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "lang_switch", array()), "sync_label", array());
        echo "</label>
                    </li>
                    <li>
                        <input type=\"radio\" name=\"cart_sync_lang\" value=\"";
        // line 122
        echo twig_escape_filter($this->env, ($context["wcml_cart_clear"] ?? null), "html", null, true);
        echo "\"
                                ";
        // line 123
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "lang_switch", array()), "value", array()) == ($context["wcml_cart_clear"] ?? null))) {
            echo " checked=\"checked\"";
        }
        // line 124
        echo "                                ";
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "wpml_cookie_enabled", array())) {
            echo " disabled=\"disabled\"";
        }
        // line 125
        echo "                               id=\"wcml_cart_sync_lang_clear\" />
                        <label for=\"wcml_cart_sync_lang_clear\">";
        // line 126
        echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "lang_switch", array()), "clear_label", array());
        echo "</label>
                    </li>
                </ul>
            </div>
            <div class=\"wcml-section-content-inner\">
                <h4>
                    ";
        // line 132
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "currency_switch", array()), "heading", array()), "html", null, true);
        echo "
                </h4>
                <ul>
                    <li>
                        <input type=\"radio\" name=\"cart_sync_currencies\" value=\"";
        // line 136
        echo twig_escape_filter($this->env, ($context["wcml_cart_sync"] ?? null), "html", null, true);
        echo "\"
                                ";
        // line 137
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "currency_switch", array()), "value", array()) == ($context["wcml_cart_sync"] ?? null))) {
            echo " checked=\"checked\"";
        }
        // line 138
        echo "                                ";
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "wpml_cookie_enabled", array())) {
            echo " disabled=\"disabled\"";
        }
        // line 139
        echo "                               id=\"wcml_cart_sync_curr_sync\" />
                        <label for=\"wcml_cart_sync_curr_sync\">";
        // line 140
        echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "currency_switch", array()), "sync_label", array());
        echo "</label>
                    </li>
                    <li>
                        <input type=\"radio\" name=\"cart_sync_currencies\" value=\"";
        // line 143
        echo twig_escape_filter($this->env, ($context["wcml_cart_clear"] ?? null), "html", null, true);
        echo "\"
                                ";
        // line 144
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "currency_switch", array()), "value", array()) == ($context["wcml_cart_clear"] ?? null))) {
            echo " checked=\"checked\"";
        }
        // line 145
        echo "                                ";
        if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "wpml_cookie_enabled", array())) {
            echo " disabled=\"disabled\"";
        }
        // line 146
        echo "                               id=\"wcml_cart_sync_curr_clear\" />
                        <label for=\"wcml_cart_sync_curr_clear\">";
        // line 147
        echo $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "currency_switch", array()), "clear_label", array());
        echo "</label>
                    </li>
                </ul>
                <p>
                    ";
        // line 151
        echo $this->getAttribute($this->getAttribute(($context["form"] ?? null), "cart_sync", array()), "doc_link", array());
        echo "
                </p>
            </div>
        </div> <!-- .wcml-section-content -->

    </div> <!-- .wcml-section -->

    ";
        // line 158
        echo $this->getAttribute(($context["form"] ?? null), "nonce", array());
        echo "
    <p class=\"wpml-margin-top-sm\">
        <input type='submit' name=\"wcml_save_settings\" value='";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute(($context["form"] ?? null), "save_label", array()), "html", null, true);
        echo "' class='button-primary'/>
    </p>
</form>
<a class=\"alignright\" href=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->getAttribute(($context["troubleshooting"] ?? null), "url", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["troubleshooting"] ?? null), "label", array()), "html", null, true);
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
        return array (  363 => 163,  357 => 160,  352 => 158,  342 => 151,  335 => 147,  332 => 146,  327 => 145,  323 => 144,  319 => 143,  313 => 140,  310 => 139,  305 => 138,  301 => 137,  297 => 136,  290 => 132,  281 => 126,  278 => 125,  273 => 124,  269 => 123,  265 => 122,  259 => 119,  256 => 118,  251 => 117,  247 => 116,  243 => 115,  236 => 111,  231 => 108,  226 => 106,  223 => 105,  221 => 104,  213 => 99,  209 => 98,  193 => 85,  187 => 84,  180 => 80,  174 => 79,  162 => 70,  158 => 69,  142 => 56,  136 => 55,  129 => 51,  123 => 50,  111 => 41,  107 => 40,  101 => 36,  90 => 28,  84 => 27,  80 => 26,  74 => 23,  68 => 22,  64 => 21,  56 => 16,  52 => 15,  48 => 14,  44 => 13,  36 => 8,  32 => 7,  27 => 4,  25 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "settings-ui.twig", "/home/websites/wp_slider/wp-content/plugins/woocommerce-multilingual/templates/settings-ui.twig");
    }
}
