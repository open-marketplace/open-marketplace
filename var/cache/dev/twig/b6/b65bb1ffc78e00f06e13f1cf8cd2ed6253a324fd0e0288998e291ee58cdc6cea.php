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

/* @SyliusShop/Cart/Summary/_item.html.twig */
class __TwigTemplate_03e1664d1cc42e490b12210f7613aed409e9d76b9cf405acbd9c5df091c82ece extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Summary/_item.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Summary/_item.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Cart/Summary/_item.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["product_variant"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 3, $this->source); })()), "variant", [], "any", false, false, false, 3);
        // line 4
        $context["original_price_to_display"] = $this->extensions['Sylius\Bundle\ShopBundle\Twig\OrderItemOriginalPriceToDisplayExtension']->getOriginalPriceToDisplay((isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 4, $this->source); })()));
        // line 5
        echo "
<tr ";
        // line 6
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-product-row", twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 6, $this->source); })()), "productName", [], "any", false, false, false, 6));
        echo ">
    <td class=\"single line\" ";
        // line 7
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-item", ((array_key_exists("loop_index", $context)) ? (_twig_default_filter((isset($context["loop_index"]) || array_key_exists("loop_index", $context) ? $context["loop_index"] : (function () { throw new RuntimeError('Variable "loop_index" does not exist.', 7, $this->source); })()), null)) : (null)));
        echo ">
        ";
        // line 8
        $this->loadTemplate("@SyliusShop/Product/_info.html.twig", "@SyliusShop/Cart/Summary/_item.html.twig", 8)->display(twig_array_merge($context, ["variant" => (isset($context["product_variant"]) || array_key_exists("product_variant", $context) ? $context["product_variant"] : (function () { throw new RuntimeError('Variable "product_variant" does not exist.', 8, $this->source); })())]));
        // line 9
        echo "    </td>
    <td class=\"right aligned\">
        ";
        // line 11
        if ( !(null === (isset($context["original_price_to_display"]) || array_key_exists("original_price_to_display", $context) ? $context["original_price_to_display"] : (function () { throw new RuntimeError('Variable "original_price_to_display" does not exist.', 11, $this->source); })()))) {
            // line 12
            echo "            <span class=\"sylius-regular-unit-price\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-product-regular-unit-price");
            echo ">
                <span class=\"old-price\">";
            // line 13
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["original_price_to_display"]) || array_key_exists("original_price_to_display", $context) ? $context["original_price_to_display"] : (function () { throw new RuntimeError('Variable "original_price_to_display" does not exist.', 13, $this->source); })())], 13, $context, $this->getSourceContext());
            echo "</span>
            </span>
        ";
        }
        // line 16
        echo "        <span class=\"sylius-unit-price\" ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-product-unit-price", twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 16, $this->source); })()), "productName", [], "any", false, false, false, 16));
        echo ">";
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 16, $this->source); })()), "discountedUnitPrice", [], "any", false, false, false, 16)], 16, $context, $this->getSourceContext());
        echo "</span>
    </td>
    <td class=\"center aligned\">
        <span class=\"sylius-quantity ui form\">";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "quantity", [], "any", false, false, false, 19), 'widget', $this->env->getFilter('sylius_merge_recursive')->getCallable()($this->env->getFunction('sylius_test_form_attribute')->getCallable()("cart-item-quantity-input", twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 19, $this->source); })()), "productName", [], "any", false, false, false, 19)), ["attr" => ["form" => (isset($context["main_form"]) || array_key_exists("main_form", $context) ? $context["main_form"] : (function () { throw new RuntimeError('Variable "main_form" does not exist.', 19, $this->source); })())]]));
        echo "</span>
    </td>
    <td class=\"center aligned\">
        <form action=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_cart_item_remove", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 22, $this->source); })()), "id", [], "any", false, false, false, 22)]), "html", null, true);
        echo "\" method=\"post\">
            <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 24, $this->source); })()), "id", [], "any", false, false, false, 24)), "html", null, true);
        echo "\" />
            <button type=\"submit\" class=\"ui circular icon button sylius-cart-remove-button\" ";
        // line 25
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-remove-button", twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 25, $this->source); })()), "productName", [], "any", false, false, false, 25));
        echo " ><i class=\"remove icon\"></i></button>
        </form>
    </td>
    <td class=\"right aligned\">
        <span class=\"sylius-total\" ";
        // line 29
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-product-subtotal");
        echo ">";
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 29, $this->source); })()), "subtotal", [], "any", false, false, false, 29)], 29, $context, $this->getSourceContext());
        echo "</span>
    </td>
</tr>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Cart/Summary/_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 29,  106 => 25,  102 => 24,  97 => 22,  91 => 19,  82 => 16,  76 => 13,  71 => 12,  69 => 11,  65 => 9,  63 => 8,  59 => 7,  55 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% set product_variant = item.variant %}
{% set original_price_to_display = sylius_order_item_original_price_to_display(item) %}

<tr {{ sylius_test_html_attribute('cart-product-row', item.productName) }}>
    <td class=\"single line\" {{ sylius_test_html_attribute('cart-item', loop_index|default(null) ) }}>
        {% include '@SyliusShop/Product/_info.html.twig' with {'variant': product_variant} %}
    </td>
    <td class=\"right aligned\">
        {% if original_price_to_display is not null %}
            <span class=\"sylius-regular-unit-price\" {{ sylius_test_html_attribute('cart-product-regular-unit-price') }}>
                <span class=\"old-price\">{{ money.convertAndFormat(original_price_to_display) }}</span>
            </span>
        {% endif %}
        <span class=\"sylius-unit-price\" {{ sylius_test_html_attribute('cart-product-unit-price', item.productName) }}>{{ money.convertAndFormat(item.discountedUnitPrice) }}</span>
    </td>
    <td class=\"center aligned\">
        <span class=\"sylius-quantity ui form\">{{ form_widget(form.quantity, sylius_test_form_attribute('cart-item-quantity-input', item.productName)|sylius_merge_recursive({'attr': {'form': main_form}})) }}</span>
    </td>
    <td class=\"center aligned\">
        <form action=\"{{ path('sylius_shop_cart_item_remove', {'id': item.id}) }}\" method=\"post\">
            <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token(item.id) }}\" />
            <button type=\"submit\" class=\"ui circular icon button sylius-cart-remove-button\" {{ sylius_test_html_attribute('cart-remove-button', item.productName) }} ><i class=\"remove icon\"></i></button>
        </form>
    </td>
    <td class=\"right aligned\">
        <span class=\"sylius-total\" {{ sylius_test_html_attribute('cart-product-subtotal') }}>{{ money.convertAndFormat(item.subtotal) }}</span>
    </td>
</tr>
", "@SyliusShop/Cart/Summary/_item.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Cart/Summary/_item.html.twig");
    }
}
