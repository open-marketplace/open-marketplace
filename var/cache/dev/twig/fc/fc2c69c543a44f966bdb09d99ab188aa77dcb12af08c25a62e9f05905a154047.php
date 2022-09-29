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

/* @SyliusShop/Common/Order/Table/_shipping.html.twig */
class __TwigTemplate_4161fadf9511e683511137e80be35575807ed1f8e1eae117ae15699d97ce12c5 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/Table/_shipping.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/Table/_shipping.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Common/Order/Table/_shipping.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["orderShippingPromotionAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::ORDER_SHIPPING_PROMOTION_ADJUSTMENT");
        // line 4
        $context["shippingAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::SHIPPING_ADJUSTMENT");
        // line 5
        $context["orderShippingPromotions"] = $this->env->getFunction('sylius_aggregate_adjustments')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 5, $this->source); })()), "getAdjustmentsRecursively", [0 => (isset($context["orderShippingPromotionAdjustment"]) || array_key_exists("orderShippingPromotionAdjustment", $context) ? $context["orderShippingPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "orderShippingPromotionAdjustment" does not exist.', 5, $this->source); })())], "method", false, false, false, 5));
        // line 6
        echo "
";
        // line 7
        if ( !twig_test_empty((isset($context["orderShippingPromotions"]) || array_key_exists("orderShippingPromotions", $context) ? $context["orderShippingPromotions"] : (function () { throw new RuntimeError('Variable "orderShippingPromotions" does not exist.', 7, $this->source); })()))) {
            // line 8
            echo "    <td colspan=\"4\" class=\"right aligned\" id=\"promotion-shipping-discounts\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("promotion-shipping-discounts");
            echo ">
        ";
            // line 9
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_total"), "html", null, true);
            echo ":
        <span class=\"old-price\">";
            // line 10
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 10, $this->source); })()), "getAdjustmentsTotal", [0 => (isset($context["shippingAdjustment"]) || array_key_exists("shippingAdjustment", $context) ? $context["shippingAdjustment"] : (function () { throw new RuntimeError('Variable "shippingAdjustment" does not exist.', 10, $this->source); })())], "method", false, false, false, 10)], 10, $context, $this->getSourceContext());
            echo "</span>
        <span>
           <span id=\"shipping-total\" ";
            // line 12
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-total");
            echo ">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 12, $this->source); })()), "getAdjustmentsTotal", [0 => (isset($context["shippingAdjustment"]) || array_key_exists("shippingAdjustment", $context) ? $context["shippingAdjustment"] : (function () { throw new RuntimeError('Variable "shippingAdjustment" does not exist.', 12, $this->source); })())], "method", false, false, false, 12) + twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 12, $this->source); })()), "getAdjustmentsTotal", [0 => (isset($context["orderShippingPromotionAdjustment"]) || array_key_exists("orderShippingPromotionAdjustment", $context) ? $context["orderShippingPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "orderShippingPromotionAdjustment" does not exist.', 12, $this->source); })())], "method", false, false, false, 12))], 12, $context, $this->getSourceContext());
            echo "</span>
            <i id=\"shipping-promotion-details\" class=\"question circle icon popup-js\"
               ";
            // line 14
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-promotion-details");
            echo "
               data-html=\"";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["orderShippingPromotions"]) || array_key_exists("orderShippingPromotions", $context) ? $context["orderShippingPromotions"] : (function () { throw new RuntimeError('Variable "orderShippingPromotions" does not exist.', 15, $this->source); })()));
            foreach ($context['_seq'] as $context["label"] => $context["amount"]) {
                echo "<div>";
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo ": ";
                echo twig_call_macro($macros["money"], "macro_convertAndFormat", [$context["amount"]], 15, $context, $this->getSourceContext());
                echo "</div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['amount'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "\"
            ></i>
        </span>
    </td>
";
        } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 19
(isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 19, $this->source); })()), "shipments", [], "any", false, false, false, 19))) {
            // line 20
            echo "    <td colspan=\"4\" class=\"right aligned\" id=\"shipping-total\">
        ";
            // line 21
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_total"), "html", null, true);
            echo ":
        <span ";
            // line 22
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-total");
            echo ">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 22, $this->source); })()), "shippingTotal", [], "any", false, false, false, 22)], 22, $context, $this->getSourceContext());
            echo "</span>
    </td>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Common/Order/Table/_shipping.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 22,  107 => 21,  104 => 20,  102 => 19,  84 => 15,  80 => 14,  73 => 12,  68 => 10,  64 => 9,  59 => 8,  57 => 7,  54 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% set orderShippingPromotionAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::ORDER_SHIPPING_PROMOTION_ADJUSTMENT') %}
{% set shippingAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::SHIPPING_ADJUSTMENT') %}
{% set orderShippingPromotions = sylius_aggregate_adjustments(order.getAdjustmentsRecursively(orderShippingPromotionAdjustment)) %}

{% if not orderShippingPromotions is empty %}
    <td colspan=\"4\" class=\"right aligned\" id=\"promotion-shipping-discounts\" {{ sylius_test_html_attribute('promotion-shipping-discounts') }}>
        {{ 'sylius.ui.shipping_total'|trans }}:
        <span class=\"old-price\">{{ money.convertAndFormat(order.getAdjustmentsTotal(shippingAdjustment)) }}</span>
        <span>
           <span id=\"shipping-total\" {{ sylius_test_html_attribute('shipping-total') }}>{{ money.convertAndFormat(order.getAdjustmentsTotal(shippingAdjustment) + order.getAdjustmentsTotal(orderShippingPromotionAdjustment)) }}</span>
            <i id=\"shipping-promotion-details\" class=\"question circle icon popup-js\"
               {{ sylius_test_html_attribute('shipping-promotion-details') }}
               data-html=\"{% for label, amount in orderShippingPromotions %}<div>{{ label }}: {{ money.convertAndFormat(amount) }}</div>{% endfor %}\"
            ></i>
        </span>
    </td>
{% elseif order.shipments is not empty %}
    <td colspan=\"4\" class=\"right aligned\" id=\"shipping-total\">
        {{ 'sylius.ui.shipping_total'|trans }}:
        <span {{ sylius_test_html_attribute('shipping-total') }}>{{ money.convertAndFormat(order.shippingTotal) }}</span>
    </td>
{% endif %}
", "@SyliusShop/Common/Order/Table/_shipping.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Common/Order/Table/_shipping.html.twig");
    }
}
