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

/* @SyliusShop/Common/Order/Table/_item.html.twig */
class __TwigTemplate_5a2bc07915a6aa5bf96378339af50fd0a45f103f4e1fd18b703a6f5d53be71db extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/Table/_item.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/Table/_item.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Common/Order/Table/_item.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["unitPromotionAdjustment"] = twig_constant("Sylius\\Component\\Core\\Model\\AdjustmentInterface::ORDER_UNIT_PROMOTION_ADJUSTMENT");
        // line 4
        $context["unitPromotions"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 4, $this->source); })()), "units", [], "any", false, false, false, 4), "first", [], "any", false, false, false, 4), "adjustments", [0 => (isset($context["unitPromotionAdjustment"]) || array_key_exists("unitPromotionAdjustment", $context) ? $context["unitPromotionAdjustment"] : (function () { throw new RuntimeError('Variable "unitPromotionAdjustment" does not exist.', 4, $this->source); })())], "method", false, false, false, 4);
        // line 5
        echo "<tr ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("product-row", twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 5, $this->source); })()), "productName", [], "any", false, false, false, 5));
        echo ">
    <td>
        ";
        // line 7
        $this->loadTemplate("@SyliusShop/Product/_info.html.twig", "@SyliusShop/Common/Order/Table/_item.html.twig", 7)->display(twig_array_merge($context, ["variant" => twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 7, $this->source); })()), "variant", [], "any", false, false, false, 7)]));
        // line 8
        echo "    </td>
    <td>
        ";
        // line 10
        if ((twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 10, $this->source); })()), "unitPrice", [], "any", false, false, false, 10) != twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 10, $this->source); })()), "discountedUnitPrice", [], "any", false, false, false, 10))) {
            // line 11
            echo "            <span class=\"old-price\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("product-old-price", twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 11, $this->source); })()), "productName", [], "any", false, false, false, 11));
            echo ">";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 11, $this->source); })()), "unitPrice", [], "any", false, false, false, 11)], 11, $context, $this->getSourceContext());
            echo "</span>
        ";
        }
        // line 13
        echo "        <span class=\"sylius-unit-price\" ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("product-unit-price", twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 13, $this->source); })()), "productName", [], "any", false, false, false, 13));
        echo ">";
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 13, $this->source); })()), "discountedUnitPrice", [], "any", false, false, false, 13)], 13, $context, $this->getSourceContext());
        echo "
            ";
        // line 14
        if ((twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 14, $this->source); })()), "unitPrice", [], "any", false, false, false, 14) != twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 14, $this->source); })()), "discountedUnitPrice", [], "any", false, false, false, 14))) {
            // line 15
            echo "            <i id=\"item-promotion-details\" class=\"question circle icon unit-promotions popup-js\"
               data-html=\"";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["unitPromotions"]) || array_key_exists("unitPromotions", $context) ? $context["unitPromotions"] : (function () { throw new RuntimeError('Variable "unitPromotions" does not exist.', 16, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["promotion"]) {
                echo "<div>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["promotion"], "label", [], "any", false, false, false, 16), "html", null, true);
                echo ": ";
                echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, $context["promotion"], "amount", [], "any", false, false, false, 16)], 16, $context, $this->getSourceContext());
                echo "</div>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['promotion'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "\">
            </i>
            ";
        }
        // line 19
        echo "        </span>
    </td>
    <td class=\"center aligned\">";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 21, $this->source); })()), "quantity", [], "any", false, false, false, 21), "html", null, true);
        echo "</td>
    <td class=\"right aligned\">";
        // line 22
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 22, $this->source); })()), "subtotal", [], "any", false, false, false, 22)], 22, $context, $this->getSourceContext());
        echo "</td>
</tr>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Common/Order/Table/_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 22,  107 => 21,  103 => 19,  86 => 16,  83 => 15,  81 => 14,  74 => 13,  66 => 11,  64 => 10,  60 => 8,  58 => 7,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% set unitPromotionAdjustment = constant('Sylius\\\\Component\\\\Core\\\\Model\\\\AdjustmentInterface::ORDER_UNIT_PROMOTION_ADJUSTMENT') %}
{% set unitPromotions = item.units.first.adjustments(unitPromotionAdjustment) %}
<tr {{ sylius_test_html_attribute('product-row', item.productName) }}>
    <td>
        {% include '@SyliusShop/Product/_info.html.twig' with {'variant': item.variant} %}
    </td>
    <td>
        {% if item.unitPrice != item.discountedUnitPrice %}
            <span class=\"old-price\" {{ sylius_test_html_attribute('product-old-price', item.productName) }}>{{ money.convertAndFormat(item.unitPrice) }}</span>
        {% endif %}
        <span class=\"sylius-unit-price\" {{ sylius_test_html_attribute('product-unit-price', item.productName) }}>{{ money.convertAndFormat(item.discountedUnitPrice) }}
            {% if item.unitPrice != item.discountedUnitPrice %}
            <i id=\"item-promotion-details\" class=\"question circle icon unit-promotions popup-js\"
               data-html=\"{% for promotion in unitPromotions %}<div>{{ promotion.label }}: {{ money.convertAndFormat(promotion.amount) }}</div>{% endfor %}\">
            </i>
            {% endif %}
        </span>
    </td>
    <td class=\"center aligned\">{{ item.quantity }}</td>
    <td class=\"right aligned\">{{ money.convertAndFormat(item.subtotal) }}</td>
</tr>
", "@SyliusShop/Common/Order/Table/_item.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Common/Order/Table/_item.html.twig");
    }
}
