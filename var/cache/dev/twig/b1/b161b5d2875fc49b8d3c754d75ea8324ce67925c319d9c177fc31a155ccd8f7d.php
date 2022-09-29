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

/* @SyliusShop/Cart/Summary/_header.html.twig */
class __TwigTemplate_91fb16ddb3b8a6ca0600f52e310f15d1957e31ea7f65dc13ccd61a92359ff54d extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Summary/_header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Summary/_header.html.twig"));

        // line 1
        $macros["headers"] = $this->macros["headers"] = $this->loadTemplate("@SyliusUi/Macro/headers.html.twig", "@SyliusShop/Cart/Summary/_header.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"ui hidden divider\"></div>
<div class=\"ui two column stackable grid\">
    <div class=\"column\">
        ";
        // line 6
        echo twig_call_macro($macros["headers"], "macro_default", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["header"]) || array_key_exists("header", $context) ? $context["header"] : (function () { throw new RuntimeError('Variable "header" does not exist.', 6, $this->source); })())), "cart", $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.edit_your_items_apply_coupon_or_proceed_to_the_checkout")], 6, $context, $this->getSourceContext());
        echo "
    </div>
    <div class=\"middle aligned column\">
        <form method=\"post\" action=\"";
        // line 9
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_cart_clear");
        echo "\" >
            <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 11, $this->source); })()), "id", [], "any", false, false, false, 11)), "html", null, true);
        echo "\" />
            <button type=\"submit\" id=\"sylius-cart-clear\" ";
        // line 12
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-clear-button");
        echo " class=\"ui right floated basic red button\">
                <i class=\"icon remove\"></i> ";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.clear_cart"), "html", null, true);
        echo "
            </button>
        </form>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Cart/Summary/_header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 13,  66 => 12,  62 => 11,  57 => 9,  51 => 6,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/headers.html.twig' as headers %}

<div class=\"ui hidden divider\"></div>
<div class=\"ui two column stackable grid\">
    <div class=\"column\">
        {{ headers.default(header|trans, 'cart', 'sylius.ui.edit_your_items_apply_coupon_or_proceed_to_the_checkout'|trans) }}
    </div>
    <div class=\"middle aligned column\">
        <form method=\"post\" action=\"{{ path('sylius_shop_cart_clear') }}\" >
            <input type=\"hidden\" name=\"_method\" value=\"DELETE\" />
            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token(cart.id) }}\" />
            <button type=\"submit\" id=\"sylius-cart-clear\" {{ sylius_test_html_attribute('cart-clear-button') }} class=\"ui right floated basic red button\">
                <i class=\"icon remove\"></i> {{ 'sylius.ui.clear_cart'|trans }}
            </button>
        </form>
    </div>
</div>
", "@SyliusShop/Cart/Summary/_header.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Cart/Summary/_header.html.twig");
    }
}
