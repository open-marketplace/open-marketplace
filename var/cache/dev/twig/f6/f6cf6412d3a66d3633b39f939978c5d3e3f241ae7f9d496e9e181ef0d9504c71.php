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

/* @SyliusShop/Product/Show/_variants.html.twig */
class __TwigTemplate_53a2453a5c9125511228c1761ed035cb7800cb1c1cd7d4a52a0d94341c882fc7 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_variants.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_variants.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Product/Show/_variants.html.twig", 1)->unwrap();
        // line 2
        echo "
<table class=\"ui single line small table\" id=\"sylius-product-variants\" ";
        // line 3
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("product-variants");
        echo ">
    <thead>
    <tr>
        <th>";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.variant"), "html", null, true);
        echo "</th>
        <th>";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.price"), "html", null, true);
        echo "</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 12, $this->source); })()), "enabledVariants", [], "any", false, false, false, 12));
        foreach ($context['_seq'] as $context["key"] => $context["variant"]) {
            // line 13
            echo "        ";
            $context["channelPricing"] = twig_get_attribute($this->env, $this->source, $context["variant"], "getChannelPricingForChannel", [0 => twig_get_attribute($this->env, $this->source, (isset($context["sylius"]) || array_key_exists("sylius", $context) ? $context["sylius"] : (function () { throw new RuntimeError('Variable "sylius" does not exist.', 13, $this->source); })()), "channel", [], "any", false, false, false, 13)], "method", false, false, false, 13);
            // line 14
            echo "        <tr ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("product-variants-row");
            echo ">
            <td>
                ";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["variant"], "name", [], "any", false, false, false, 16), "html", null, true);
            echo "
                ";
            // line 17
            if (twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 17, $this->source); })()), "hasOptions", [], "method", false, false, false, 17)) {
                // line 18
                echo "                    <div class=\"ui horizontal divided list\">
                        ";
                // line 19
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["variant"], "optionValues", [], "any", false, false, false, 19));
                foreach ($context['_seq'] as $context["_key"] => $context["optionValue"]) {
                    // line 20
                    echo "                            <div class=\"item\">
                                ";
                    // line 21
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["optionValue"], "value", [], "any", false, false, false, 21), "html", null, true);
                    echo "
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['optionValue'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 24
                echo "                    </div>
                ";
            }
            // line 26
            echo "            </td>
            ";
            // line 27
            $context["appliedPromotions"] = twig_array_map($this->env, twig_get_attribute($this->env, $this->source, (isset($context["channelPricing"]) || array_key_exists("channelPricing", $context) ? $context["channelPricing"] : (function () { throw new RuntimeError('Variable "channelPricing" does not exist.', 27, $this->source); })()), "appliedPromotions", [], "any", false, false, false, 27), function ($__promotion__) use ($context, $macros) { $context["promotion"] = $__promotion__; return ["label" => twig_get_attribute($this->env, $this->source, (isset($context["promotion"]) || array_key_exists("promotion", $context) ? $context["promotion"] : (function () { throw new RuntimeError('Variable "promotion" does not exist.', 27, $this->source); })()), "label", [], "any", false, false, false, 27), "description" => twig_get_attribute($this->env, $this->source, (isset($context["promotion"]) || array_key_exists("promotion", $context) ? $context["promotion"] : (function () { throw new RuntimeError('Variable "promotion" does not exist.', 27, $this->source); })()), "description", [], "any", false, false, false, 27)]; });
            // line 28
            echo "            <td class=\"sylius-product-variant-price\" data-applied-promotions=\"";
            echo twig_escape_filter($this->env, json_encode((isset($context["appliedPromotions"]) || array_key_exists("appliedPromotions", $context) ? $context["appliedPromotions"] : (function () { throw new RuntimeError('Variable "appliedPromotions" does not exist.', 28, $this->source); })())), "html", null, true);
            echo "\"  ";
            if ($this->env->getFilter('sylius_has_discount')->getCallable()($context["variant"], ["channel" => twig_get_attribute($this->env, $this->source, (isset($context["sylius"]) || array_key_exists("sylius", $context) ? $context["sylius"] : (function () { throw new RuntimeError('Variable "sylius" does not exist.', 28, $this->source); })()), "channel", [], "any", false, false, false, 28)])) {
                echo "data-original-price=\"";
                echo twig_call_macro($macros["money"], "macro_calculateOriginalPrice", [$context["variant"]], 28, $context, $this->getSourceContext());
                echo "\"";
            }
            echo ">
                ";
            // line 29
            echo twig_call_macro($macros["money"], "macro_calculatePrice", [$context["variant"]], 29, $context, $this->getSourceContext());
            echo "
            </td>
            <td class=\"right aligned\">
                ";
            // line 32
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "cartItem", [], "any", false, false, false, 32), "variant", [], "any", false, false, false, 32), $context["key"], [], "array", false, false, false, 32), 'widget', ["label" => false]);
            echo "
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['variant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "    </tbody>
</table>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Show/_variants.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 36,  130 => 32,  124 => 29,  113 => 28,  111 => 27,  108 => 26,  104 => 24,  95 => 21,  92 => 20,  88 => 19,  85 => 18,  83 => 17,  79 => 16,  73 => 14,  70 => 13,  66 => 12,  58 => 7,  54 => 6,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

<table class=\"ui single line small table\" id=\"sylius-product-variants\" {{ sylius_test_html_attribute('product-variants') }}>
    <thead>
    <tr>
        <th>{{ 'sylius.ui.variant'|trans }}</th>
        <th>{{ 'sylius.ui.price'|trans }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    {% for key, variant in product.enabledVariants %}
        {% set channelPricing = variant.getChannelPricingForChannel(sylius.channel) %}
        <tr {{ sylius_test_html_attribute('product-variants-row') }}>
            <td>
                {{ variant.name }}
                {% if product.hasOptions() %}
                    <div class=\"ui horizontal divided list\">
                        {% for optionValue in variant.optionValues %}
                            <div class=\"item\">
                                {{ optionValue.value }}
                            </div>
                        {% endfor %}
                    </div>
                {% endif %}
            </td>
            {% set appliedPromotions = channelPricing.appliedPromotions|map(promotion => ({'label': promotion.label, 'description': promotion.description})) %}
            <td class=\"sylius-product-variant-price\" data-applied-promotions=\"{{ appliedPromotions|json_encode }}\"  {% if variant|sylius_has_discount({'channel': sylius.channel}) %}data-original-price=\"{{ money.calculateOriginalPrice(variant) }}\"{% endif %}>
                {{ money.calculatePrice(variant) }}
            </td>
            <td class=\"right aligned\">
                {{ form_widget(form.cartItem.variant[key], {'label': false}) }}
            </td>
        </tr>
    {% endfor %}
    </tbody>
</table>
", "@SyliusShop/Product/Show/_variants.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Show/_variants.html.twig");
    }
}
