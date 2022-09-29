<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @SyliusShop/Cart/Summary/_totals.html.twig */
class __TwigTemplate_31fa7d7745c475def9c4da6459271ad4fb9f7686d6446657255a72124c391150 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Summary/_totals.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Summary/_totals.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Cart/Summary/_totals.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["itemsSubtotal"] = $this->extensions['Sylius\Bundle\ShopBundle\Twig\OrderItemsSubtotalExtension']->getSubtotal((isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 3, $this->source); })()));
        // line 4
        $context["taxIncluded"] = $this->extensions['Sylius\Bundle\ShopBundle\Twig\OrderTaxesTotalExtension']->getIncludedTax((isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 4, $this->source); })()));
        // line 5
        $context["taxExcluded"] = $this->extensions['Sylius\Bundle\ShopBundle\Twig\OrderTaxesTotalExtension']->getExcludedTax((isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 5, $this->source); })()));
        // line 6
        echo "
<div class=\"ui segment\">
    <h2 class=\"ui dividing header\">";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.summary"), "html", null, true);
        echo "</h2>

    ";
        // line 10
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.cart.summary.totals", ["cart" => (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 10, $this->source); })())]);
        echo "

    <table class=\"ui very basic table\">
        <tbody>
        <tr>
            <td>";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.items_total"), "html", null, true);
        echo ":</td>
            <td class=\"right aligned\" ";
        // line 16
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-items-total");
        echo ">";
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["itemsSubtotal"]) || array_key_exists("itemsSubtotal", $context) ? $context["itemsSubtotal"] : (function () { throw new RuntimeError('Variable "itemsSubtotal" does not exist.', 16, $this->source); })())], 16, $context, $this->getSourceContext());
        echo "</td>
        </tr>
        ";
        // line 18
        if (twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 18, $this->source); })()), "orderPromotionTotal", [], "any", false, false, false, 18)) {
            // line 19
            echo "            <tr>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.discount"), "html", null, true);
            echo ":</td>
                <td id=\"sylius-cart-promotion-total\" ";
            // line 21
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-promotion-total");
            echo " class=\"right aligned\">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 21, $this->source); })()), "orderPromotionTotal", [], "any", false, false, false, 21)], 21, $context, $this->getSourceContext());
            echo "</td>
            </tr>
        ";
        }
        // line 24
        echo "        ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 24, $this->source); })()), "shipments", [], "any", false, false, false, 24))) {
            // line 25
            echo "            <tr>
                <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_estimated_cost"), "html", null, true);
            echo ":</td>
                <td class=\"right aligned\">
                    ";
            // line 28
            if ((twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 28, $this->source); })()), "getAdjustmentsTotal", [0 => "shipping"], "method", false, false, false, 28) > twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 28, $this->source); })()), "shippingTotal", [], "any", false, false, false, 28))) {
                // line 29
                echo "                        <span class=\"old-price\">";
                echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 29, $this->source); })()), "getAdjustmentsTotal", [0 => "shipping"], "method", false, false, false, 29)], 29, $context, $this->getSourceContext());
                echo "</span>
                    ";
            }
            // line 31
            echo "                    <span id=\"sylius-cart-shipping-total\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-shipping-total");
            echo ">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 31, $this->source); })()), "shippingTotal", [], "any", false, false, false, 31)], 31, $context, $this->getSourceContext());
            echo "</span>
                </td>
            </tr>
        ";
        }
        // line 35
        echo "        <tr ";
        if (((isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 35, $this->source); })()) &&  !(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 35, $this->source); })()))) {
            echo "class=\"tax-disabled\"";
        }
        echo ">
            <td>";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.taxes_total"), "html", null, true);
        echo ":</td>
            <td class=\"right aligned\">
                ";
        // line 38
        if (( !(isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 38, $this->source); })()) &&  !(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 38, $this->source); })()))) {
            // line 39
            echo "                    <div id=\"sylius-cart-tax-none\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-no-tax");
            echo ">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [0], 39, $context, $this->getSourceContext());
            echo "</div>
                ";
        }
        // line 41
        echo "                ";
        if ((isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 41, $this->source); })())) {
            // line 42
            echo "                    <div id=\"sylius-cart-tax-excluded\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-tax-exluded");
            echo ">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 42, $this->source); })())], 42, $context, $this->getSourceContext());
            echo "</div>
                ";
        }
        // line 44
        echo "                ";
        if ((isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 44, $this->source); })())) {
            // line 45
            echo "                    <div class=\"tax-disabled\">
                        <small>(";
            // line 46
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.included_in_price"), "html", null, true);
            echo ")</small>
                        <span id=\"sylius-cart-tax-included\" ";
            // line 47
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-tax-included");
            echo ">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 47, $this->source); })())], 47, $context, $this->getSourceContext());
            echo "</span>
                    </div>
                ";
        }
        // line 50
        echo "            </td>
        </tr>
        <tr class=\"ui large header\">
            <td>";
        // line 53
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.order_total"), "html", null, true);
        echo ":</td>
            <td id=\"sylius-cart-grand-total\" ";
        // line 54
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-grand-total");
        echo " class=\"right aligned\">";
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 54, $this->source); })()), "total", [], "any", false, false, false, 54)], 54, $context, $this->getSourceContext());
        echo "</td>
        </tr>
        ";
        // line 56
        if ( !(twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 56, $this->source); })()), "currencyCode", [], "any", false, false, false, 56) === twig_get_attribute($this->env, $this->source, (isset($context["sylius"]) || array_key_exists("sylius", $context) ? $context["sylius"] : (function () { throw new RuntimeError('Variable "sylius" does not exist.', 56, $this->source); })()), "currencyCode", [], "any", false, false, false, 56))) {
            // line 57
            echo "            <tr>
                <td>";
            // line 58
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.base_currency_order_total"), "html", null, true);
            echo ":</td>
                <td id=\"sylius-cart-base-grand-total\" ";
            // line 59
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-base-grand-total");
            echo " class=\"right aligned\">";
            echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 59, $this->source); })()), "total", [], "any", false, false, false, 59), twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 59, $this->source); })()), "currencyCode", [], "any", false, false, false, 59)], 59, $context, $this->getSourceContext());
            echo "</td>
            </tr>
        ";
        }
        // line 62
        echo "        </tbody>
    </table>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Cart/Summary/_totals.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 62,  204 => 59,  200 => 58,  197 => 57,  195 => 56,  188 => 54,  184 => 53,  179 => 50,  171 => 47,  167 => 46,  164 => 45,  161 => 44,  153 => 42,  150 => 41,  142 => 39,  140 => 38,  135 => 36,  128 => 35,  118 => 31,  112 => 29,  110 => 28,  105 => 26,  102 => 25,  99 => 24,  91 => 21,  87 => 20,  84 => 19,  82 => 18,  75 => 16,  71 => 15,  63 => 10,  58 => 8,  54 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% set itemsSubtotal = sylius_order_items_subtotal(cart) %}
{% set taxIncluded = sylius_order_tax_included(cart) %}
{% set taxExcluded = sylius_order_tax_excluded(cart) %}

<div class=\"ui segment\">
    <h2 class=\"ui dividing header\">{{ 'sylius.ui.summary'|trans }}</h2>

    {{ sylius_template_event('sylius.shop.cart.summary.totals', {'cart': cart}) }}

    <table class=\"ui very basic table\">
        <tbody>
        <tr>
            <td>{{ 'sylius.ui.items_total'|trans }}:</td>
            <td class=\"right aligned\" {{ sylius_test_html_attribute('cart-items-total') }}>{{ money.convertAndFormat(itemsSubtotal) }}</td>
        </tr>
        {% if cart.orderPromotionTotal %}
            <tr>
                <td>{{ 'sylius.ui.discount'|trans }}:</td>
                <td id=\"sylius-cart-promotion-total\" {{ sylius_test_html_attribute('cart-promotion-total') }} class=\"right aligned\">{{ money.convertAndFormat(cart.orderPromotionTotal) }}</td>
            </tr>
        {% endif %}
        {% if cart.shipments is not empty %}
            <tr>
                <td>{{ 'sylius.ui.shipping_estimated_cost'|trans }}:</td>
                <td class=\"right aligned\">
                    {% if cart.getAdjustmentsTotal('shipping') > cart.shippingTotal %}
                        <span class=\"old-price\">{{ money.convertAndFormat(cart.getAdjustmentsTotal('shipping')) }}</span>
                    {% endif %}
                    <span id=\"sylius-cart-shipping-total\" {{ sylius_test_html_attribute('cart-shipping-total') }}>{{ money.convertAndFormat(cart.shippingTotal) }}</span>
                </td>
            </tr>
        {% endif %}
        <tr {% if taxIncluded and not taxExcluded %}class=\"tax-disabled\"{% endif %}>
            <td>{{ 'sylius.ui.taxes_total'|trans }}:</td>
            <td class=\"right aligned\">
                {% if not taxIncluded and not taxExcluded %}
                    <div id=\"sylius-cart-tax-none\" {{ sylius_test_html_attribute('cart-no-tax') }}>{{ money.convertAndFormat(0) }}</div>
                {% endif %}
                {% if taxExcluded %}
                    <div id=\"sylius-cart-tax-excluded\" {{ sylius_test_html_attribute('cart-tax-exluded') }}>{{ money.convertAndFormat(taxExcluded) }}</div>
                {% endif %}
                {% if taxIncluded %}
                    <div class=\"tax-disabled\">
                        <small>({{ 'sylius.ui.included_in_price'|trans }})</small>
                        <span id=\"sylius-cart-tax-included\" {{ sylius_test_html_attribute('cart-tax-included') }}>{{ money.convertAndFormat(taxIncluded) }}</span>
                    </div>
                {% endif %}
            </td>
        </tr>
        <tr class=\"ui large header\">
            <td>{{ 'sylius.ui.order_total'|trans }}:</td>
            <td id=\"sylius-cart-grand-total\" {{ sylius_test_html_attribute('cart-grand-total') }} class=\"right aligned\">{{ money.convertAndFormat(cart.total) }}</td>
        </tr>
        {% if cart.currencyCode is not same as(sylius.currencyCode) %}
            <tr>
                <td>{{ 'sylius.ui.base_currency_order_total'|trans }}:</td>
                <td id=\"sylius-cart-base-grand-total\" {{ sylius_test_html_attribute('cart-base-grand-total') }} class=\"right aligned\">{{ money.format(cart.total, cart.currencyCode) }}</td>
            </tr>
        {% endif %}
        </tbody>
    </table>
</div>
", "@SyliusShop/Cart/Summary/_totals.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Cart/Summary/_totals.html.twig");
    }
}
