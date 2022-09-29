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

/* @SyliusAdmin/Order/Show/Summary/_item.html.twig */
class __TwigTemplate_d89eddbce42702aea977d4f1503fa734e01046f8e1f394acae3546f3e25d6907 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Summary/_item.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Summary/_item.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/Order/Show/Summary/_item.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["orderPromotionAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::ORDER_PROMOTION_ADJUSTMENT");
        // line 4
        $context["unitPromotionAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::ORDER_UNIT_PROMOTION_ADJUSTMENT");
        // line 5
        $context["shippingAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::SHIPPING_ADJUSTMENT");
        // line 6
        $context["taxAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::TAX_ADJUSTMENT");
        // line 7
        echo "
";
        // line 8
        $context["variant"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 8, $this->source); })()), "variant", [], "any", false, false, false, 8);
        // line 9
        $context["product"] = twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 9, $this->source); })()), "product", [], "any", false, false, false, 9);
        // line 10
        echo "
";
        // line 11
        $context["aggregatedUnitPromotionAdjustments"] = (twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 11, $this->source); })()), "getAdjustmentsTotalRecursively", [0 => (isset($context["unitPromotionAdjustment"]) || array_key_exists("unitPromotionAdjustment", $context) ? $context["unitPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "unitPromotionAdjustment" does not exist.', 11, $this->source); })())], "method", false, false, false, 11) + twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 11, $this->source); })()), "getAdjustmentsTotalRecursively", [0 => (isset($context["orderPromotionAdjustment"]) || array_key_exists("orderPromotionAdjustment", $context) ? $context["orderPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "orderPromotionAdjustment" does not exist.', 11, $this->source); })())], "method", false, false, false, 11));
        // line 12
        $context["subtotal"] = ((twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 12, $this->source); })()), "unitPrice", [], "any", false, false, false, 12) * twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 12, $this->source); })()), "quantity", [], "any", false, false, false, 12)) + (isset($context["aggregatedUnitPromotionAdjustments"]) || array_key_exists("aggregatedUnitPromotionAdjustments", $context) ? $context["aggregatedUnitPromotionAdjustments"] : (function () { throw new RuntimeError('Variable "aggregatedUnitPromotionAdjustments" does not exist.', 12, $this->source); })()));
        // line 13
        echo "
";
        // line 14
        $context["taxIncluded"] = $this->extensions['Sylius\Bundle\AdminBundle\Twig\OrderUnitTaxesExtension']->getIncludedTax((isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 14, $this->source); })()));
        // line 15
        $context["taxExcluded"] = $this->extensions['Sylius\Bundle\AdminBundle\Twig\OrderUnitTaxesExtension']->getExcludedTax((isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 15, $this->source); })()));
        // line 16
        echo "
<tr>
    <td class=\"single line\">
        ";
        // line 19
        $this->loadTemplate("@SyliusAdmin/Product/_info.html.twig", "@SyliusAdmin/Order/Show/Summary/_item.html.twig", 19)->display($context);
        // line 20
        echo "    </td>
    <td class=\"right aligned unit-price\">
        ";
        // line 22
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 22, $this->source); })()), "unitPrice", [], "any", false, false, false, 22), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 22, $this->source); })()), "currencyCode", [], "any", false, false, false, 22)], 22, $context, $this->getSourceContext());
        echo "
    </td>
    <td class=\"right aligned unit-discount\">
        ";
        // line 25
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 25, $this->source); })()), "units", [], "any", false, false, false, 25), "first", [], "any", false, false, false, 25), "adjustmentsTotal", [0 => (isset($context["unitPromotionAdjustment"]) || array_key_exists("unitPromotionAdjustment", $context) ? $context["unitPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "unitPromotionAdjustment" does not exist.', 25, $this->source); })())], "method", false, false, false, 25), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 25, $this->source); })()), "currencyCode", [], "any", false, false, false, 25)], 25, $context, $this->getSourceContext());
        echo "
    </td>
    <td class=\"right aligned unit-order-discount\">
        <span style=\"font-style: italic;\">~ ";
        // line 28
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 28, $this->source); })()), "units", [], "any", false, false, false, 28), "first", [], "any", false, false, false, 28), "adjustmentsTotal", [0 => (isset($context["orderPromotionAdjustment"]) || array_key_exists("orderPromotionAdjustment", $context) ? $context["orderPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "orderPromotionAdjustment" does not exist.', 28, $this->source); })())], "method", false, false, false, 28), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 28, $this->source); })()), "currencyCode", [], "any", false, false, false, 28)], 28, $context, $this->getSourceContext());
        echo "</span>
    </td>
    <td class=\"right aligned discounted-unit-price\">
        ";
        // line 31
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 31, $this->source); })()), "fullDiscountedUnitPrice", [], "any", false, false, false, 31), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 31, $this->source); })()), "currencyCode", [], "any", false, false, false, 31)], 31, $context, $this->getSourceContext());
        echo "
    </td>
    <td class=\"right aligned quantity\">
        ";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 34, $this->source); })()), "quantity", [], "any", false, false, false, 34), "html", null, true);
        echo "
    </td>
    <td class=\"right aligned subtotal\">
      ";
        // line 37
        echo twig_call_macro($macros["money"], "macro_format", [(isset($context["subtotal"]) || array_key_exists("subtotal", $context) ? $context["subtotal"] : (function () { throw new RuntimeError('Variable "subtotal" does not exist.', 37, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 37, $this->source); })()), "currencyCode", [], "any", false, false, false, 37)], 37, $context, $this->getSourceContext());
        echo "
    </td>
    <td class=\"right aligned tax\">
        <div class=\"tax-excluded\">";
        // line 40
        echo twig_call_macro($macros["money"], "macro_format", [(isset($context["taxExcluded"]) || array_key_exists("taxExcluded", $context) ? $context["taxExcluded"] : (function () { throw new RuntimeError('Variable "taxExcluded" does not exist.', 40, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 40, $this->source); })()), "currencyCode", [], "any", false, false, false, 40)], 40, $context, $this->getSourceContext());
        echo "</div>
        <div class=\"tax-disabled\">
            <div class=\"tax-included\"> ";
        // line 42
        echo twig_call_macro($macros["money"], "macro_format", [(isset($context["taxIncluded"]) || array_key_exists("taxIncluded", $context) ? $context["taxIncluded"] : (function () { throw new RuntimeError('Variable "taxIncluded" does not exist.', 42, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 42, $this->source); })()), "currencyCode", [], "any", false, false, false, 42)], 42, $context, $this->getSourceContext());
        echo "
            </div>
            <small>(";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.included_in_price"), "html", null, true);
        echo ")</small>
        </div>
    </td>
    <td class=\"right aligned total\">
        ";
        // line 48
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 48, $this->source); })()), "total", [], "any", false, false, false, 48), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 48, $this->source); })()), "currencyCode", [], "any", false, false, false, 48)], 48, $context, $this->getSourceContext());
        echo "
    </td>
</tr>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/Summary/_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 48,  134 => 44,  129 => 42,  124 => 40,  118 => 37,  112 => 34,  106 => 31,  100 => 28,  94 => 25,  88 => 22,  84 => 20,  82 => 19,  77 => 16,  75 => 15,  73 => 14,  70 => 13,  68 => 12,  66 => 11,  63 => 10,  61 => 9,  59 => 8,  56 => 7,  54 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusAdmin/Common/Macro/money.html.twig\" as money %}

{% set orderPromotionAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::ORDER_PROMOTION_ADJUSTMENT') %}
{% set unitPromotionAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::ORDER_UNIT_PROMOTION_ADJUSTMENT') %}
{% set shippingAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::SHIPPING_ADJUSTMENT') %}
{% set taxAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::TAX_ADJUSTMENT') %}

{% set variant = item.variant %}
{% set product = variant.product %}

{% set aggregatedUnitPromotionAdjustments = item.getAdjustmentsTotalRecursively(unitPromotionAdjustment) + item.getAdjustmentsTotalRecursively(orderPromotionAdjustment) %}
{% set subtotal = (item.unitPrice * item.quantity) + aggregatedUnitPromotionAdjustments %}

{% set taxIncluded = sylius_admin_order_unit_tax_included(item) %}
{% set taxExcluded = sylius_admin_order_unit_tax_excluded(item) %}

<tr>
    <td class=\"single line\">
        {% include '@SyliusAdmin/Product/_info.html.twig' %}
    </td>
    <td class=\"right aligned unit-price\">
        {{ money.format(item.unitPrice, order.currencyCode) }}
    </td>
    <td class=\"right aligned unit-discount\">
        {{ money.format(item.units.first.adjustmentsTotal(unitPromotionAdjustment), order.currencyCode) }}
    </td>
    <td class=\"right aligned unit-order-discount\">
        <span style=\"font-style: italic;\">~ {{ money.format(item.units.first.adjustmentsTotal(orderPromotionAdjustment), order.currencyCode) }}</span>
    </td>
    <td class=\"right aligned discounted-unit-price\">
        {{ money.format(item.fullDiscountedUnitPrice, order.currencyCode) }}
    </td>
    <td class=\"right aligned quantity\">
        {{ item.quantity }}
    </td>
    <td class=\"right aligned subtotal\">
      {{ money.format(subtotal, order.currencyCode) }}
    </td>
    <td class=\"right aligned tax\">
        <div class=\"tax-excluded\">{{ money.format(taxExcluded, order.currencyCode) }}</div>
        <div class=\"tax-disabled\">
            <div class=\"tax-included\"> {{ money.format(taxIncluded, order.currencyCode) }}
            </div>
            <small>({{ 'sylius.ui.included_in_price'|trans }})</small>
        </div>
    </td>
    <td class=\"right aligned total\">
        {{ money.format(item.total, order.currencyCode) }}
    </td>
</tr>
", "@SyliusAdmin/Order/Show/Summary/_item.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Show/Summary/_item.html.twig");
    }
}
