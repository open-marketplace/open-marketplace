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

/* @SyliusShop/Common/Order/Table/_totals.html.twig */
class __TwigTemplate_76d4512e46331af3a96482feb0f59aaa3ff986e9d1ca8d0201d83a63cc51793f extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/Table/_totals.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/Table/_totals.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Common/Order/Table/_totals.html.twig", 1)->unwrap();
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
";
        // line 7
        $context["orderPromotionAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::ORDER_PROMOTION_ADJUSTMENT");
        // line 8
        $context["orderPromotions"] = $this->env->getFunction('sylius_aggregate_adjustments')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 8, $this->source); })()), "adjustmentsRecursively", [0 => (isset($context["orderPromotionAdjustment"]) || array_key_exists("orderPromotionAdjustment", $context) ? $context["orderPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "orderPromotionAdjustment" does not exist.', 8, $this->source); })())], "method", false, false, false, 8));
        // line 9
        echo "
<tr>
    <th colspan=\"4\" class=\"right aligned\" id=\"subtotal\" ";
        // line 11
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("subtotal");
        echo ">
        ";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.items_total"), "html", null, true);
        echo ": ";
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["itemsSubtotal"]) || array_key_exists("itemsSubtotal", $context) ? $context["itemsSubtotal"] : (function () { throw new RuntimeError('Variable "itemsSubtotal" does not exist.', 12, $this->source); })())], 12, $context, $this->getSourceContext());
        echo "
    </th>
</tr>
<tr";
        // line 15
        if (((isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 15, $this->source); })()) &&  !(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 15, $this->source); })()))) {
            echo "class=\"tax-disabled\"";
        }
        echo ">
    <td colspan=\"4\" class=\"right aligned\" id=\"tax-total\">
        <div style=\"display: flex; justify-content: flex-end; align-items: center\">
            <div>";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.taxes_total"), "html", null, true);
        echo ":&nbsp;</div>
            <div data-test=\"tax-total\" ";
        // line 19
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("tax-total");
        echo ">
            ";
        // line 20
        if (( !(isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 20, $this->source); })()) &&  !(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 20, $this->source); })()))) {
            // line 21
            echo "                <div id=\"sylius-cart-tax-none\">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [0], 21, $context, $this->getSourceContext());
            echo "</div>
            ";
        }
        // line 23
        echo "            ";
        if ((isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 23, $this->source); })())) {
            // line 24
            echo "                <div id=\"sylius-cart-tax-excluded\">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 24, $this->source); })())], 24, $context, $this->getSourceContext());
            echo "</div>
            ";
        }
        // line 26
        echo "            ";
        if ((isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 26, $this->source); })())) {
            // line 27
            echo "                <div class=\"tax-disabled\">
                    <small>(";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.included_in_price"), "html", null, true);
            echo ")</small>
                    <span id=\"sylius-cart-tax-included\">";
            // line 29
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 29, $this->source); })())], 29, $context, $this->getSourceContext());
            echo "</span>
                </div>
            ";
        }
        // line 32
        echo "            </div>
        </div>
    </td>
</tr>
<tr>
    <td colspan=\"4\" id=\"promotion-total\" class=\"right aligned\" ";
        // line 37
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("promotion-total");
        echo ">
        ";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.discount"), "html", null, true);
        echo ": ";
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 38, $this->source); })()), "orderPromotionTotal", [], "any", false, false, false, 38)], 38, $context, $this->getSourceContext());
        echo "
        ";
        // line 39
        if ((twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 39, $this->source); })()), "orderPromotionTotal", [], "any", false, false, false, 39) != 0)) {
            // line 40
            echo "            <i
                id=\"order-promotions-details\" class=\"question circle icon popup-js\"
                ";
            // line 42
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("order-promotions-details");
            echo "
                data-html=\"";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["orderPromotions"]) || array_key_exists("orderPromotions", $context) ? $context["orderPromotions"] : (function () { throw new RuntimeError('Variable "orderPromotions" does not exist.', 43, $this->source); })()));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                echo "<div>";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo ": ";
                echo twig_call_macro($macros["money"], "macro_convertAndFormat", [$context["value"]], 43, $context, $this->getSourceContext());
                echo "</div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "\"
            >
            </i>
        ";
        }
        // line 47
        echo "    </td>
</tr>
<tr>
    ";
        // line 50
        $this->loadTemplate("@SyliusShop/Common/Order/Table/_shipping.html.twig", "@SyliusShop/Common/Order/Table/_totals.html.twig", 50)->display(twig_array_merge($context, ["order" => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 50, $this->source); })())]));
        // line 51
        echo "</tr>
<tr>
    <td colspan=\"4\" class=\"right aligned\" style=\"font-size: 1.5em;\" id=\"total\" ";
        // line 53
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("order-total");
        echo ">
        ";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.total"), "html", null, true);
        echo ": ";
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 54, $this->source); })()), "total", [], "any", false, false, false, 54)], 54, $context, $this->getSourceContext());
        echo "
    </td>
</tr>
";
        // line 57
        if ( !(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 57, $this->source); })()), "currencyCode", [], "any", false, false, false, 57) === twig_get_attribute($this->env, $this->source, (isset($context["sylius"]) || array_key_exists("sylius", $context) ? $context["sylius"] : (function () { throw new RuntimeError('Variable "sylius" does not exist.', 57, $this->source); })()), "currencyCode", [], "any", false, false, false, 57))) {
            // line 58
            echo "    <tr>
        <td colspan=\"4\" class=\"right aligned\" id=\"base-total\" ";
            // line 59
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("summary-order-total");
            echo ">
            ";
            // line 60
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.total_in_base_currency"), "html", null, true);
            echo ": ";
            echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 60, $this->source); })()), "total", [], "any", false, false, false, 60), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 60, $this->source); })()), "currencyCode", [], "any", false, false, false, 60)], 60, $context, $this->getSourceContext());
            echo "
        </td>
    </tr>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Common/Order/Table/_totals.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 60,  199 => 59,  196 => 58,  194 => 57,  186 => 54,  182 => 53,  178 => 51,  176 => 50,  171 => 47,  153 => 43,  149 => 42,  145 => 40,  143 => 39,  137 => 38,  133 => 37,  126 => 32,  120 => 29,  116 => 28,  113 => 27,  110 => 26,  104 => 24,  101 => 23,  95 => 21,  93 => 20,  89 => 19,  85 => 18,  77 => 15,  69 => 12,  65 => 11,  61 => 9,  59 => 8,  57 => 7,  54 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% set itemsSubtotal = sylius_order_items_subtotal(order) %}
{% set taxIncluded = sylius_order_tax_included(order) %}
{% set taxExcluded = sylius_order_tax_excluded(order) %}

{% set orderPromotionAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::ORDER_PROMOTION_ADJUSTMENT') %}
{% set orderPromotions = sylius_aggregate_adjustments(order.adjustmentsRecursively(orderPromotionAdjustment)) %}

<tr>
    <th colspan=\"4\" class=\"right aligned\" id=\"subtotal\" {{ sylius_test_html_attribute('subtotal') }}>
        {{ 'sylius.ui.items_total'|trans }}: {{ money.convertAndFormat(itemsSubtotal) }}
    </th>
</tr>
<tr{% if taxIncluded and not taxExcluded %}class=\"tax-disabled\"{% endif %}>
    <td colspan=\"4\" class=\"right aligned\" id=\"tax-total\">
        <div style=\"display: flex; justify-content: flex-end; align-items: center\">
            <div>{{ 'sylius.ui.taxes_total'|trans }}:&nbsp;</div>
            <div data-test=\"tax-total\" {{ sylius_test_html_attribute('tax-total') }}>
            {% if not taxIncluded and not taxExcluded %}
                <div id=\"sylius-cart-tax-none\">{{ money.convertAndFormat(0) }}</div>
            {% endif %}
            {% if taxExcluded %}
                <div id=\"sylius-cart-tax-excluded\">{{ money.convertAndFormat(taxExcluded) }}</div>
            {% endif %}
            {% if taxIncluded %}
                <div class=\"tax-disabled\">
                    <small>({{ 'sylius.ui.included_in_price'|trans }})</small>
                    <span id=\"sylius-cart-tax-included\">{{ money.convertAndFormat(taxIncluded) }}</span>
                </div>
            {% endif %}
            </div>
        </div>
    </td>
</tr>
<tr>
    <td colspan=\"4\" id=\"promotion-total\" class=\"right aligned\" {{ sylius_test_html_attribute('promotion-total') }}>
        {{ 'sylius.ui.discount'|trans }}: {{ money.convertAndFormat(order.orderPromotionTotal)  }}
        {% if order.orderPromotionTotal != 0 %}
            <i
                id=\"order-promotions-details\" class=\"question circle icon popup-js\"
                {{ sylius_test_html_attribute('order-promotions-details') }}
                data-html=\"{% for key, value in orderPromotions %}<div>{{ key }}: {{ money.convertAndFormat(value) }}</div>{% endfor %}\"
            >
            </i>
        {% endif %}
    </td>
</tr>
<tr>
    {% include '@SyliusShop/Common/Order/Table/_shipping.html.twig' with {'order': order} %}
</tr>
<tr>
    <td colspan=\"4\" class=\"right aligned\" style=\"font-size: 1.5em;\" id=\"total\" {{ sylius_test_html_attribute('order-total') }}>
        {{ 'sylius.ui.total'|trans }}: {{ money.convertAndFormat(order.total) }}
    </td>
</tr>
{% if order.currencyCode is not same as(sylius.currencyCode) %}
    <tr>
        <td colspan=\"4\" class=\"right aligned\" id=\"base-total\" {{ sylius_test_html_attribute('summary-order-total') }}>
            {{ 'sylius.ui.total_in_base_currency'|trans }}: {{ money.format(order.total, order.currencyCode) }}
        </td>
    </tr>
{% endif %}
", "@SyliusShop/Common/Order/Table/_totals.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Common/Order/Table/_totals.html.twig");
    }
}
