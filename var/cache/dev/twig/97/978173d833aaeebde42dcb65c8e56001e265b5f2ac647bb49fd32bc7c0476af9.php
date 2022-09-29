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

/* @SyliusShop/Product/Show/_price.html.twig */
class __TwigTemplate_f4bcc1d7fa32fc5db3f71c5d8bfcfd3163b43856ffbffb1577615aece283cf6e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_price.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_price.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Product/Show/_price.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["variant"] = $this->env->getFilter('sylius_resolve_variant')->getCallable()((isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 3, $this->source); })()));
        // line 4
        $context["hasDiscount"] = $this->env->getFilter('sylius_has_discount')->getCallable()((isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 4, $this->source); })()), ["channel" => twig_get_attribute($this->env, $this->source, (isset($context["sylius"]) || array_key_exists("sylius", $context) ? $context["sylius"] : (function () { throw new RuntimeError('Variable "sylius" does not exist.', 4, $this->source); })()), "channel", [], "any", false, false, false, 4)]);
        // line 5
        $context["appliedPromotions"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 5, $this->source); })()), "getChannelPricingForChannel", [0 => twig_get_attribute($this->env, $this->source, (isset($context["sylius"]) || array_key_exists("sylius", $context) ? $context["sylius"] : (function () { throw new RuntimeError('Variable "sylius" does not exist.', 5, $this->source); })()), "channel", [], "any", false, false, false, 5)], "method", false, false, false, 5), "getAppliedPromotions", [], "method", false, false, false, 5);
        // line 6
        echo "
<span class=\"ui small header\" id=\"product-original-price\"";
        // line 7
        if ( !(isset($context["hasDiscount"]) || array_key_exists("hasDiscount", $context) ? $context["hasDiscount"] : (function () { throw new RuntimeError('Variable "hasDiscount" does not exist.', 7, $this->source); })())) {
            echo " style=\"display: none;\"";
        }
        echo " ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("product-original-price", twig_call_macro($macros["money"], "macro_calculateOriginalPrice", [(isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 7, $this->source); })())], 7, $context, $this->getSourceContext()));
        echo ">
    ";
        // line 8
        if ((isset($context["hasDiscount"]) || array_key_exists("hasDiscount", $context) ? $context["hasDiscount"] : (function () { throw new RuntimeError('Variable "hasDiscount" does not exist.', 8, $this->source); })())) {
            // line 9
            echo "        <del>";
            echo twig_call_macro($macros["money"], "macro_calculateOriginalPrice", [(isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 9, $this->source); })())], 9, $context, $this->getSourceContext());
            echo "</del>
    ";
        }
        // line 11
        echo "</span>

";
        // line 13
        $this->loadTemplate("@SyliusShop/Product/Show/_catalogPromotionLabels.html.twig", "@SyliusShop/Product/Show/_price.html.twig", 13)->display(twig_array_merge($context, ["appliedPromotions" => (isset($context["appliedPromotions"]) || array_key_exists("appliedPromotions", $context) ? $context["appliedPromotions"] : (function () { throw new RuntimeError('Variable "appliedPromotions" does not exist.', 13, $this->source); })()), "withDescription" => true]));
        // line 14
        echo "
<span class=\"ui huge header\" id=\"product-price\" ";
        // line 15
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("product-price", twig_call_macro($macros["money"], "macro_calculatePrice", [(isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 15, $this->source); })())], 15, $context, $this->getSourceContext()));
        echo ">
    ";
        // line 16
        echo twig_call_macro($macros["money"], "macro_calculatePrice", [(isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 16, $this->source); })())], 16, $context, $this->getSourceContext());
        echo "
</span>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Show/_price.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 16,  82 => 15,  79 => 14,  77 => 13,  73 => 11,  67 => 9,  65 => 8,  57 => 7,  54 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% set variant = product|sylius_resolve_variant %}
{% set hasDiscount = variant|sylius_has_discount({'channel': sylius.channel}) %}
{% set appliedPromotions = variant.getChannelPricingForChannel(sylius.channel).getAppliedPromotions() %}

<span class=\"ui small header\" id=\"product-original-price\"{% if not hasDiscount %} style=\"display: none;\"{% endif %} {{ sylius_test_html_attribute('product-original-price', money.calculateOriginalPrice(variant)) }}>
    {% if hasDiscount %}
        <del>{{ money.calculateOriginalPrice(variant) }}</del>
    {% endif %}
</span>

{% include '@SyliusShop/Product/Show/_catalogPromotionLabels.html.twig' with {'appliedPromotions': appliedPromotions, 'withDescription': true} %}

<span class=\"ui huge header\" id=\"product-price\" {{ sylius_test_html_attribute('product-price', money.calculatePrice(variant)) }}>
    {{ money.calculatePrice(variant) }}
</span>
", "@SyliusShop/Product/Show/_price.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Show/_price.html.twig");
    }
}
