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

/* @SyliusAdmin/Order/Show/Summary/_totals.html.twig */
class __TwigTemplate_7addfa107faac10be65411015754c0cfe5cae2582bc3cf1052983fa374490201 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Summary/_totals.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Summary/_totals.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/Order/Show/Summary/_totals.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["orderShippingPromotionAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::ORDER_SHIPPING_PROMOTION_ADJUSTMENT");
        // line 4
        $context["shippingAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::SHIPPING_ADJUSTMENT");
        // line 5
        $context["taxAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::TAX_ADJUSTMENT");
        // line 6
        echo "
";
        // line 7
        $context["orderShippingPromotions"] = $this->env->getFunction('sylius_aggregate_adjustments')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 7, $this->source); })()), "getAdjustmentsRecursively", [0 => (isset($context["orderShippingPromotionAdjustment"]) || array_key_exists("orderShippingPromotionAdjustment", $context) ? $context["orderShippingPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "orderShippingPromotionAdjustment" does not exist.', 7, $this->source); })())], "method", false, false, false, 7));
        // line 8
        echo "
<tr>
    <th colspan=\"7\"></th>
    <th colspan=\"1\" id=\"tax-total\" class=\"right aligned\">
        <strong>";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.tax_total"), "html", null, true);
        echo "</strong>:
        ";
        // line 13
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 13, $this->source); })()), "taxTotal", [], "any", false, false, false, 13), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 13, $this->source); })()), "currencyCode", [], "any", false, false, false, 13)], 13, $context, $this->getSourceContext());
        echo "
    </th>
    <th colspan=\"1\" id=\"items-total\" class=\"right aligned\">
        <strong>";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.items_total"), "html", null, true);
        echo "</strong>:
        ";
        // line 17
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 17, $this->source); })()), "itemsTotal", [], "any", false, false, false, 17), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 17, $this->source); })()), "currencyCode", [], "any", false, false, false, 17)], 17, $context, $this->getSourceContext());
        echo "
    </th>
</tr>
<tr>
    <td colspan=\"";
        // line 21
        echo (((isset($context["orderShippingPromotions"]) || array_key_exists("orderShippingPromotions", $context) ? $context["orderShippingPromotions"] : (function () { throw new RuntimeError('Variable "orderShippingPromotions" does not exist.', 21, $this->source); })())) ? (2) : (5));
        echo "\" id=\"shipping-charges\">
        ";
        // line 22
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 22, $this->source); })()), "adjustments", [0 => (isset($context["shippingAdjustment"]) || array_key_exists("shippingAdjustment", $context) ? $context["shippingAdjustment"] : (function () { throw new RuntimeError('Variable "shippingAdjustment" does not exist.', 22, $this->source); })())], "method", false, false, false, 22), "isEmpty", [], "method", false, false, false, 22)) {
            // line 23
            echo "            <div class=\"ui relaxed divided list\">
                <div class=\"item\"><strong>";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping"), "html", null, true);
            echo ":</strong></div>
                ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 25, $this->source); })()), "shipments", [], "any", false, false, false, 25));
            foreach ($context['_seq'] as $context["_key"] => $context["shipment"]) {
                // line 26
                echo "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["shipment"], "adjustments", [0 => (isset($context["shippingAdjustment"]) || array_key_exists("shippingAdjustment", $context) ? $context["shippingAdjustment"] : (function () { throw new RuntimeError('Variable "shippingAdjustment" does not exist.', 26, $this->source); })())], "method", false, false, false, 26));
                foreach ($context['_seq'] as $context["_key"] => $context["adjustment"]) {
                    // line 27
                    echo "                        <div class=\"item\">
                            <div id=\"shipping-base-value\" class=\"right floated\">";
                    // line 28
                    echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, $context["adjustment"], "amount", [], "any", false, false, false, 28), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 28, $this->source); })()), "currencyCode", [], "any", false, false, false, 28)], 28, $context, $this->getSourceContext());
                    echo "</div>
                            <div class=\"content\">
                                <div id=\"shipping-adjustment-label\" class=\"description\">
                                    <strong>";
                    // line 31
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["adjustment"], "label", [], "any", false, false, false, 31), "html", null, true);
                    echo "</strong>:
                                </div>
                            </div>
                        </div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['adjustment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "
                    ";
                // line 37
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["shipment"], "adjustments", [0 => (isset($context["taxAdjustment"]) || array_key_exists("taxAdjustment", $context) ? $context["taxAdjustment"] : (function () { throw new RuntimeError('Variable "taxAdjustment" does not exist.', 37, $this->source); })())], "method", false, false, false, 37));
                foreach ($context['_seq'] as $context["_key"] => $context["adjustment"]) {
                    // line 38
                    echo "                        <div class=\"item";
                    if (twig_get_attribute($this->env, $this->source, $context["adjustment"], "isNeutral", [], "any", false, false, false, 38)) {
                        echo " tax-disabled";
                    }
                    echo "\">
                            <div id=\"shipping-tax-value\" class=\"right floated\">
                                ";
                    // line 40
                    echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, $context["adjustment"], "amount", [], "any", false, false, false, 40), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 40, $this->source); })()), "currencyCode", [], "any", false, false, false, 40)], 40, $context, $this->getSourceContext());
                    echo "
                                ";
                    // line 41
                    if (twig_get_attribute($this->env, $this->source, $context["adjustment"], "isNeutral", [], "any", false, false, false, 41)) {
                        // line 42
                        echo "                                    <small>(";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.included_in_price"), "html", null, true);
                        echo ")</small>
                                ";
                    }
                    // line 44
                    echo "                            </div>
                            <div class=\"content\">
                                <div id=\"shipping-adjustment-label\" class=\"description\">
                                    <strong";
                    // line 47
                    if (twig_get_attribute($this->env, $this->source, $context["adjustment"], "isNeutral", [], "any", false, false, false, 47)) {
                        echo " class=\"tax-disabled\"";
                    }
                    echo ">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["adjustment"], "label", [], "any", false, false, false, 47), "html", null, true);
                    echo "</strong>:
                                </div>
                            </div>
                        </div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['adjustment'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 52
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['shipment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "            </div>
        ";
        } else {
            // line 55
            echo "            <p><small>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.no_shipping_charges"), "html", null, true);
            echo "</small></p>
        ";
        }
        // line 57
        echo "    </td>
    ";
        // line 58
        if ( !twig_test_empty((isset($context["orderShippingPromotions"]) || array_key_exists("orderShippingPromotions", $context) ? $context["orderShippingPromotions"] : (function () { throw new RuntimeError('Variable "orderShippingPromotions" does not exist.', 58, $this->source); })()))) {
            // line 59
            echo "    <td colspan=\"3\" id=\"promotion-shipping-discounts\">
        <div class=\"ui relaxed divided list\">
            <div class=\"item\"><strong>";
            // line 61
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_discount"), "html", null, true);
            echo ":</strong></div>
            ";
            // line 62
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["orderShippingPromotions"]) || array_key_exists("orderShippingPromotions", $context) ? $context["orderShippingPromotions"] : (function () { throw new RuntimeError('Variable "orderShippingPromotions" does not exist.', 62, $this->source); })()));
            foreach ($context['_seq'] as $context["label"] => $context["amount"]) {
                // line 63
                echo "                <div class=\"item\">
                    <div id=\"shipping-discount-value\" class=\"right floated\">
                        ";
                // line 65
                echo twig_call_macro($macros["money"], "macro_format", [$context["amount"], twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 65, $this->source); })()), "currencyCode", [], "any", false, false, false, 65)], 65, $context, $this->getSourceContext());
                echo "
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['amount'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "        </div>
    </td>
    ";
        }
        // line 72
        echo "    <td colspan=\"4\" id=\"shipping-total\" class=\"right aligned\">
        <strong>";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_total"), "html", null, true);
        echo "</strong>:
        ";
        // line 74
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 74, $this->source); })()), "shippingTotal", [], "any", false, false, false, 74), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 74, $this->source); })()), "currencyCode", [], "any", false, false, false, 74)], 74, $context, $this->getSourceContext());
        echo "
    </td>
</tr>

";
        // line 78
        $this->loadTemplate("@SyliusAdmin/Order/Show/Summary/_totalsPromotions.html.twig", "@SyliusAdmin/Order/Show/Summary/_totals.html.twig", 78)->display($context);
        // line 79
        echo "
<tr>
    <td colspan=\"9\" id=\"total\" class=\"ui large header right aligned\">
        <strong>";
        // line 82
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.order_total"), "html", null, true);
        echo "</strong>:
        ";
        // line 83
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 83, $this->source); })()), "total", [], "any", false, false, false, 83), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 83, $this->source); })()), "currencyCode", [], "any", false, false, false, 83)], 83, $context, $this->getSourceContext());
        echo "
    </td>
</tr>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/Summary/_totals.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  252 => 83,  248 => 82,  243 => 79,  241 => 78,  234 => 74,  230 => 73,  227 => 72,  222 => 69,  212 => 65,  208 => 63,  204 => 62,  200 => 61,  196 => 59,  194 => 58,  191 => 57,  185 => 55,  181 => 53,  175 => 52,  160 => 47,  155 => 44,  149 => 42,  147 => 41,  143 => 40,  135 => 38,  131 => 37,  128 => 36,  117 => 31,  111 => 28,  108 => 27,  103 => 26,  99 => 25,  95 => 24,  92 => 23,  90 => 22,  86 => 21,  79 => 17,  75 => 16,  69 => 13,  65 => 12,  59 => 8,  57 => 7,  54 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusAdmin/Common/Macro/money.html.twig\" as money %}

{% set orderShippingPromotionAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::ORDER_SHIPPING_PROMOTION_ADJUSTMENT') %}
{% set shippingAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::SHIPPING_ADJUSTMENT') %}
{% set taxAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::TAX_ADJUSTMENT') %}

{% set orderShippingPromotions = sylius_aggregate_adjustments(order.getAdjustmentsRecursively(orderShippingPromotionAdjustment)) %}

<tr>
    <th colspan=\"7\"></th>
    <th colspan=\"1\" id=\"tax-total\" class=\"right aligned\">
        <strong>{{ 'sylius.ui.tax_total'|trans }}</strong>:
        {{ money.format(order.taxTotal, order.currencyCode) }}
    </th>
    <th colspan=\"1\" id=\"items-total\" class=\"right aligned\">
        <strong>{{ 'sylius.ui.items_total'|trans }}</strong>:
        {{ money.format(order.itemsTotal, order.currencyCode) }}
    </th>
</tr>
<tr>
    <td colspan=\"{{ orderShippingPromotions ? 2 : 5 }}\" id=\"shipping-charges\">
        {% if not order.adjustments(shippingAdjustment).isEmpty() %}
            <div class=\"ui relaxed divided list\">
                <div class=\"item\"><strong>{{ 'sylius.ui.shipping'|trans }}:</strong></div>
                {% for shipment in order.shipments %}
                    {% for adjustment in shipment.adjustments(shippingAdjustment) %}
                        <div class=\"item\">
                            <div id=\"shipping-base-value\" class=\"right floated\">{{ money.format(adjustment.amount, order.currencyCode) }}</div>
                            <div class=\"content\">
                                <div id=\"shipping-adjustment-label\" class=\"description\">
                                    <strong>{{ adjustment.label }}</strong>:
                                </div>
                            </div>
                        </div>
                    {% endfor %}

                    {% for adjustment in shipment.adjustments(taxAdjustment) %}
                        <div class=\"item{% if adjustment.isNeutral %} tax-disabled{% endif %}\">
                            <div id=\"shipping-tax-value\" class=\"right floated\">
                                {{ money.format(adjustment.amount, order.currencyCode) }}
                                {% if adjustment.isNeutral %}
                                    <small>({{ 'sylius.ui.included_in_price'|trans }})</small>
                                {% endif %}
                            </div>
                            <div class=\"content\">
                                <div id=\"shipping-adjustment-label\" class=\"description\">
                                    <strong{% if adjustment.isNeutral %} class=\"tax-disabled\"{% endif %}>{{ adjustment.label }}</strong>:
                                </div>
                            </div>
                        </div>
                    {% endfor %}
                {% endfor %}
            </div>
        {% else %}
            <p><small>{{ 'sylius.ui.no_shipping_charges'|trans }}</small></p>
        {% endif %}
    </td>
    {% if not orderShippingPromotions is empty %}
    <td colspan=\"3\" id=\"promotion-shipping-discounts\">
        <div class=\"ui relaxed divided list\">
            <div class=\"item\"><strong>{{ 'sylius.ui.shipping_discount'|trans }}:</strong></div>
            {% for label, amount in orderShippingPromotions %}
                <div class=\"item\">
                    <div id=\"shipping-discount-value\" class=\"right floated\">
                        {{ money.format(amount, order.currencyCode) }}
                    </div>
                </div>
            {% endfor %}
        </div>
    </td>
    {% endif %}
    <td colspan=\"4\" id=\"shipping-total\" class=\"right aligned\">
        <strong>{{ 'sylius.ui.shipping_total'|trans }}</strong>:
        {{ money.format(order.shippingTotal, order.currencyCode) }}
    </td>
</tr>

{% include '@SyliusAdmin/Order/Show/Summary/_totalsPromotions.html.twig' %}

<tr>
    <td colspan=\"9\" id=\"total\" class=\"ui large header right aligned\">
        <strong>{{ 'sylius.ui.order_total'|trans }}</strong>:
        {{ money.format(order.total, order.currencyCode) }}
    </td>
</tr>
", "@SyliusAdmin/Order/Show/Summary/_totals.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Show/Summary/_totals.html.twig");
    }
}
