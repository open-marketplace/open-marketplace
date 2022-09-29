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

/* @SyliusAdmin/Order/Show/Summary/_totalsPromotions.html.twig */
class __TwigTemplate_b72c970808316219839d7ceceab26d8d2e6958784afa68431652e807355c4468 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Summary/_totalsPromotions.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Summary/_totalsPromotions.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/Order/Show/Summary/_totalsPromotions.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["orderPromotionAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::ORDER_PROMOTION_ADJUSTMENT");
        // line 4
        $context["unitPromotionAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::ORDER_UNIT_PROMOTION_ADJUSTMENT");
        // line 5
        echo "
<tr>
    <td colspan=\"5\" id=\"promotion-discounts\" class=\"promotion-disabled\">
        ";
        // line 8
        $context["orderPromotionAdjustments"] = $this->env->getFunction('sylius_aggregate_adjustments')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 8, $this->source); })()), "getAdjustmentsRecursively", [0 => (isset($context["orderPromotionAdjustment"]) || array_key_exists("orderPromotionAdjustment", $context) ? $context["orderPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "orderPromotionAdjustment" does not exist.', 8, $this->source); })())], "method", false, false, false, 8));
        // line 9
        echo "        ";
        $context["unitPromotionAdjustments"] = $this->env->getFunction('sylius_aggregate_adjustments')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 9, $this->source); })()), "getAdjustmentsRecursively", [0 => (isset($context["unitPromotionAdjustment"]) || array_key_exists("unitPromotionAdjustment", $context) ? $context["unitPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "unitPromotionAdjustment" does not exist.', 9, $this->source); })())], "method", false, false, false, 9));
        // line 10
        echo "        ";
        $context["promotionAdjustments"] = twig_array_merge((isset($context["orderPromotionAdjustments"]) || array_key_exists("orderPromotionAdjustments", $context) ? $context["orderPromotionAdjustments"] : (function () { throw new RuntimeError('Variable "orderPromotionAdjustments" does not exist.', 10, $this->source); })()), (isset($context["unitPromotionAdjustments"]) || array_key_exists("unitPromotionAdjustments", $context) ? $context["unitPromotionAdjustments"] : (function () { throw new RuntimeError('Variable "unitPromotionAdjustments" does not exist.', 10, $this->source); })()));
        // line 11
        echo "        ";
        if ( !twig_test_empty((isset($context["promotionAdjustments"]) || array_key_exists("promotionAdjustments", $context) ? $context["promotionAdjustments"] : (function () { throw new RuntimeError('Variable "promotionAdjustments" does not exist.', 11, $this->source); })()))) {
            // line 12
            echo "            <div class=\"ui relaxed divided list\">
                <div class=\"item\"><strong>";
            // line 13
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.promotions"), "html", null, true);
            echo ":</strong></div>
                ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["promotionAdjustments"]) || array_key_exists("promotionAdjustments", $context) ? $context["promotionAdjustments"] : (function () { throw new RuntimeError('Variable "promotionAdjustments" does not exist.', 14, $this->source); })()));
            foreach ($context['_seq'] as $context["label"] => $context["amount"]) {
                // line 15
                echo "                    <div class=\"item\">
                        <div class=\"right floated\">";
                // line 16
                echo twig_call_macro($macros["money"], "macro_format", [$context["amount"], twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 16, $this->source); })()), "currencyCode", [], "any", false, false, false, 16)], 16, $context, $this->getSourceContext());
                echo "</div>
                        <div class=\"content\"><strong>";
                // line 17
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo "</strong>:</div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['amount'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "            </div>
        ";
        } else {
            // line 22
            echo "            <p>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.no_promotion"), "html", null, true);
            echo ".</p>
        ";
        }
        // line 24
        echo "    </td>
    <td colspan=\"4\" id=\"promotion-total\" class=\"right aligned promotion-disabled\">
        ";
        // line 26
        $context["orderPromotionTotal"] = twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 26, $this->source); })()), "getAdjustmentsTotalRecursively", [0 => (isset($context["orderPromotionAdjustment"]) || array_key_exists("orderPromotionAdjustment", $context) ? $context["orderPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "orderPromotionAdjustment" does not exist.', 26, $this->source); })())], "method", false, false, false, 26);
        // line 27
        echo "        ";
        $context["unitPromotionTotal"] = twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 27, $this->source); })()), "getAdjustmentsTotalRecursively", [0 => (isset($context["unitPromotionAdjustment"]) || array_key_exists("unitPromotionAdjustment", $context) ? $context["unitPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "unitPromotionAdjustment" does not exist.', 27, $this->source); })())], "method", false, false, false, 27);
        // line 28
        echo "        <strong>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.promotion_total"), "html", null, true);
        echo "</strong>:
        ";
        // line 29
        echo twig_call_macro($macros["money"], "macro_format", [((isset($context["orderPromotionTotal"]) || array_key_exists("orderPromotionTotal", $context) ? $context["orderPromotionTotal"] : (function () { throw new RuntimeError('Variable "orderPromotionTotal" does not exist.', 29, $this->source); })()) + (isset($context["unitPromotionTotal"]) || array_key_exists("unitPromotionTotal", $context) ? $context["unitPromotionTotal"] : (function () { throw new RuntimeError('Variable "unitPromotionTotal" does not exist.', 29, $this->source); })())), twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 29, $this->source); })()), "currencyCode", [], "any", false, false, false, 29)], 29, $context, $this->getSourceContext());
        echo "
    </td>
</tr>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/Summary/_totalsPromotions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 29,  114 => 28,  111 => 27,  109 => 26,  105 => 24,  99 => 22,  95 => 20,  86 => 17,  82 => 16,  79 => 15,  75 => 14,  71 => 13,  68 => 12,  65 => 11,  62 => 10,  59 => 9,  57 => 8,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusAdmin/Common/Macro/money.html.twig\" as money %}

{% set orderPromotionAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::ORDER_PROMOTION_ADJUSTMENT') %}
{% set unitPromotionAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::ORDER_UNIT_PROMOTION_ADJUSTMENT') %}

<tr>
    <td colspan=\"5\" id=\"promotion-discounts\" class=\"promotion-disabled\">
        {% set orderPromotionAdjustments = sylius_aggregate_adjustments(order.getAdjustmentsRecursively(orderPromotionAdjustment)) %}
        {% set unitPromotionAdjustments = sylius_aggregate_adjustments(order.getAdjustmentsRecursively(unitPromotionAdjustment)) %}
        {% set promotionAdjustments = orderPromotionAdjustments|merge(unitPromotionAdjustments) %}
        {% if not promotionAdjustments is empty %}
            <div class=\"ui relaxed divided list\">
                <div class=\"item\"><strong>{{ 'sylius.ui.promotions'|trans }}:</strong></div>
                {% for label, amount in promotionAdjustments %}
                    <div class=\"item\">
                        <div class=\"right floated\">{{ money.format(amount, order.currencyCode) }}</div>
                        <div class=\"content\"><strong>{{ label }}</strong>:</div>
                    </div>
                {% endfor %}
            </div>
        {% else %}
            <p>{{ 'sylius.ui.no_promotion'|trans }}.</p>
        {% endif %}
    </td>
    <td colspan=\"4\" id=\"promotion-total\" class=\"right aligned promotion-disabled\">
        {% set orderPromotionTotal = order.getAdjustmentsTotalRecursively(orderPromotionAdjustment) %}
        {% set unitPromotionTotal = order.getAdjustmentsTotalRecursively(unitPromotionAdjustment) %}
        <strong>{{ 'sylius.ui.promotion_total'|trans }}</strong>:
        {{ money.format(orderPromotionTotal + unitPromotionTotal, order.currencyCode) }}
    </td>
</tr>
", "@SyliusAdmin/Order/Show/Summary/_totalsPromotions.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Show/Summary/_totalsPromotions.html.twig");
    }
}
