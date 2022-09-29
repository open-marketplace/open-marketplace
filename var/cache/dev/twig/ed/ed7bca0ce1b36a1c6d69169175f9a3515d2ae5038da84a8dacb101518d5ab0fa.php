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

/* @SyliusShop/Checkout/_summary.html.twig */
class __TwigTemplate_14809a011f2acaae4894d66ac44cd1b2b3b7b54792c2f4338732b4922723daa3 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/_summary.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/_summary.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Checkout/_summary.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["itemsSubtotal"] = $this->extensions['Sylius\Bundle\ShopBundle\Twig\OrderItemsSubtotalExtension']->getSubtotal((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 3, $this->source); })()));
        // line 4
        $context["taxIncluded"] = $this->extensions['Sylius\Bundle\ShopBundle\Twig\OrderTaxesTotalExtension']->getIncludedTax((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 4, $this->source); })()));
        // line 5
        $context["taxExcluded"] = $this->extensions['Sylius\Bundle\ShopBundle\Twig\OrderTaxesTotalExtension']->getExcludedTax((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 5, $this->source); })()));
        // line 6
        echo "
<div class=\"ui segment\">
    <table class=\"ui very basic table\" id=\"sylius-checkout-subtotal\" ";
        // line 8
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("checkout-subtotal");
        echo ">
        <thead>
        <tr>
            <th class=\"sylius-table-column-item\">";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.item"), "html", null, true);
        echo "</th>
            <th class=\"sylius-table-column-qty\">";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.qty"), "html", null, true);
        echo "</th>
            <th class=\"sylius-table-column-subtotal\">";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.subtotal"), "html", null, true);
        echo "</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 17, $this->source); })()), "items", [], "any", false, false, false, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 18
            echo "            <tr>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "getVariant", [], "any", false, false, false, 19), "product", [], "any", false, false, false, 19), "name", [], "any", false, false, false, 19), "html", null, true);
            echo "</td>
                <td class=\"center aligned\">
                    ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 21), "html", null, true);
            echo "
                </td>
                <td class=\"right aligned\" id=\"sylius-item-";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "variant", [], "any", false, false, false, 23), "product", [], "any", false, false, false, 23), "slug", [], "any", false, false, false, 23), "html", null, true);
            echo "-subtotal\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("item-subtotal", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "variant", [], "any", false, false, false, 23), "product", [], "any", false, false, false, 23), "slug", [], "any", false, false, false, 23));
            echo ">
                    ";
            // line 24
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, $context["item"], "subtotal", [], "any", false, false, false, 24)], 24, $context, $this->getSourceContext());
            echo "
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        </tbody>
        <tfoot>
            <tr>
                <td colspan=\"1\" style=\"border-top: 2px solid #ddd;\">
                    <strong>";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.items_total"), "html", null, true);
        echo ":</strong>
                </td>
                <td colspan=\"2\" id=\"sylius-summary-items-subtotal\" class=\"right aligned\" style=\"border-top: 2px solid #ddd;\">
                    ";
        // line 35
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["itemsSubtotal"]) || array_key_exists("itemsSubtotal", $context) ? $context["itemsSubtotal"] : (function () { throw new RuntimeError('Variable "itemsSubtotal" does not exist.', 35, $this->source); })())], 35, $context, $this->getSourceContext());
        echo "
                </td>
            </tr>
            <tr ";
        // line 38
        if (((isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 38, $this->source); })()) &&  !(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 38, $this->source); })()))) {
            echo "class=\"tax-disabled\" ";
        }
        echo ">
                <td colspan=\"1\">
                    <strong>";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.taxes_total"), "html", null, true);
        echo ":</strong>
                </td>
                <td colspan=\"2\" class=\"right aligned\">
                    ";
        // line 43
        if (( !(isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 43, $this->source); })()) &&  !(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 43, $this->source); })()))) {
            // line 44
            echo "                        <div id=\"sylius-summary-tax-none\">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [0], 44, $context, $this->getSourceContext());
            echo "</div>
                    ";
        }
        // line 46
        echo "                    ";
        if ((isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 46, $this->source); })())) {
            // line 47
            echo "                        <div id=\"sylius-summary-tax-excluded\">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 47, $this->source); })())], 47, $context, $this->getSourceContext());
            echo "</div>
                    ";
        }
        // line 49
        echo "                    ";
        if ((isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 49, $this->source); })())) {
            // line 50
            echo "                        <div class=\"tax-disabled\">
                            <span id=\"sylius-summary-tax-included\">";
            // line 51
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 51, $this->source); })())], 51, $context, $this->getSourceContext());
            echo "</span>
                            <div><small>(";
            // line 52
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.included_in_price"), "html", null, true);
            echo ")</small></div>
                        </div>
                    ";
        }
        // line 55
        echo "                </td>
            </tr>
            <tr>
                <td colspan=\"1\">
                    <strong>";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.discount"), "html", null, true);
        echo ":</strong>
                </td>
                <td colspan=\"2\" id=\"sylius-summary-promotion-total\" class=\"right aligned\">
                    ";
        // line 62
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 62, $this->source); })()), "orderPromotionTotal", [], "any", false, false, false, 62)], 62, $context, $this->getSourceContext());
        echo "
                </td>
            </tr>
            ";
        // line 65
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 65, $this->source); })()), "shipments", [], "any", false, false, false, 65))) {
            // line 66
            echo "                <tr>
                    <td colspan=\"1\">
                        <strong>";
            // line 68
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_estimated_cost"), "html", null, true);
            echo ":</strong>
                    </td>
                    <td colspan=\"2\" class=\"right aligned\">
                        ";
            // line 71
            if ((twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 71, $this->source); })()), "getAdjustmentsTotal", [0 => "shipping"], "method", false, false, false, 71) > twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 71, $this->source); })()), "shippingTotal", [], "any", false, false, false, 71))) {
                // line 72
                echo "                            <div class=\"old-price\">";
                echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 72, $this->source); })()), "getAdjustmentsTotal", [0 => "shipping"], "method", false, false, false, 72)], 72, $context, $this->getSourceContext());
                echo "</div>
                        ";
            }
            // line 74
            echo "                        <span id=\"sylius-summary-shipping-total\">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 74, $this->source); })()), "shippingTotal", [], "any", false, false, false, 74)], 74, $context, $this->getSourceContext());
            echo "</span>
                    </td>
                </tr>
            ";
        }
        // line 78
        echo "            <tr class=\"ui large header\">
                <td colspan=\"1\">
                    <strong>";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.order_total"), "html", null, true);
        echo ":</strong>
                </td>
                <td colspan=\"2\" id=\"sylius-summary-grand-total\" class=\"right aligned\">
                    ";
        // line 83
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 83, $this->source); })()), "total", [], "any", false, false, false, 83)], 83, $context, $this->getSourceContext());
        echo "
                </td>
            </tr>
        </tfoot>
    </table>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Checkout/_summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  232 => 83,  226 => 80,  222 => 78,  214 => 74,  208 => 72,  206 => 71,  200 => 68,  196 => 66,  194 => 65,  188 => 62,  182 => 59,  176 => 55,  170 => 52,  166 => 51,  163 => 50,  160 => 49,  154 => 47,  151 => 46,  145 => 44,  143 => 43,  137 => 40,  130 => 38,  124 => 35,  118 => 32,  112 => 28,  102 => 24,  96 => 23,  91 => 21,  86 => 19,  83 => 18,  79 => 17,  72 => 13,  68 => 12,  64 => 11,  58 => 8,  54 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% set itemsSubtotal = sylius_order_items_subtotal(order) %}
{% set taxIncluded = sylius_order_tax_included(order) %}
{% set taxExcluded = sylius_order_tax_excluded(order) %}

<div class=\"ui segment\">
    <table class=\"ui very basic table\" id=\"sylius-checkout-subtotal\" {{ sylius_test_html_attribute('checkout-subtotal') }}>
        <thead>
        <tr>
            <th class=\"sylius-table-column-item\">{{ 'sylius.ui.item'|trans }}</th>
            <th class=\"sylius-table-column-qty\">{{ 'sylius.ui.qty'|trans }}</th>
            <th class=\"sylius-table-column-subtotal\">{{ 'sylius.ui.subtotal'|trans }}</th>
        </tr>
        </thead>
        <tbody>
        {% for item in order.items %}
            <tr>
                <td>{{ item.getVariant.product.name }}</td>
                <td class=\"center aligned\">
                    {{ item.quantity }}
                </td>
                <td class=\"right aligned\" id=\"sylius-item-{{ item.variant.product.slug }}-subtotal\" {{ sylius_test_html_attribute('item-subtotal', item.variant.product.slug) }}>
                    {{ money.convertAndFormat(item.subtotal) }}
                </td>
            </tr>
        {% endfor %}
        </tbody>
        <tfoot>
            <tr>
                <td colspan=\"1\" style=\"border-top: 2px solid #ddd;\">
                    <strong>{{ 'sylius.ui.items_total'|trans }}:</strong>
                </td>
                <td colspan=\"2\" id=\"sylius-summary-items-subtotal\" class=\"right aligned\" style=\"border-top: 2px solid #ddd;\">
                    {{ money.convertAndFormat(itemsSubtotal) }}
                </td>
            </tr>
            <tr {% if taxIncluded and not taxExcluded %}class=\"tax-disabled\" {% endif %}>
                <td colspan=\"1\">
                    <strong>{{ 'sylius.ui.taxes_total'|trans }}:</strong>
                </td>
                <td colspan=\"2\" class=\"right aligned\">
                    {% if not taxIncluded and not taxExcluded %}
                        <div id=\"sylius-summary-tax-none\">{{ money.convertAndFormat(0) }}</div>
                    {% endif %}
                    {% if taxExcluded %}
                        <div id=\"sylius-summary-tax-excluded\">{{ money.convertAndFormat(taxExcluded) }}</div>
                    {% endif %}
                    {% if taxIncluded %}
                        <div class=\"tax-disabled\">
                            <span id=\"sylius-summary-tax-included\">{{ money.convertAndFormat(taxIncluded) }}</span>
                            <div><small>({{ 'sylius.ui.included_in_price'|trans }})</small></div>
                        </div>
                    {% endif %}
                </td>
            </tr>
            <tr>
                <td colspan=\"1\">
                    <strong>{{ 'sylius.ui.discount'|trans }}:</strong>
                </td>
                <td colspan=\"2\" id=\"sylius-summary-promotion-total\" class=\"right aligned\">
                    {{ money.convertAndFormat(order.orderPromotionTotal) }}
                </td>
            </tr>
            {% if order.shipments is not empty %}
                <tr>
                    <td colspan=\"1\">
                        <strong>{{ 'sylius.ui.shipping_estimated_cost'|trans }}:</strong>
                    </td>
                    <td colspan=\"2\" class=\"right aligned\">
                        {% if order.getAdjustmentsTotal('shipping') > order.shippingTotal %}
                            <div class=\"old-price\">{{ money.convertAndFormat(order.getAdjustmentsTotal('shipping')) }}</div>
                        {% endif %}
                        <span id=\"sylius-summary-shipping-total\">{{ money.convertAndFormat(order.shippingTotal) }}</span>
                    </td>
                </tr>
            {% endif %}
            <tr class=\"ui large header\">
                <td colspan=\"1\">
                    <strong>{{ 'sylius.ui.order_total'|trans }}:</strong>
                </td>
                <td colspan=\"2\" id=\"sylius-summary-grand-total\" class=\"right aligned\">
                    {{ money.convertAndFormat(order.total) }}
                </td>
            </tr>
        </tfoot>
    </table>
</div>
", "@SyliusShop/Checkout/_summary.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Checkout/_summary.html.twig");
    }
}
