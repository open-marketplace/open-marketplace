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

/* @SyliusShop/Cart/Widget/_popup.html.twig */
class __TwigTemplate_414b40dc14e40579020a64605d18cc981a0ae83d9bf4021097c0efc24014eb0e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Widget/_popup.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Widget/_popup.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Cart/Widget/_popup.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        if (twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 3, $this->source); })()), "empty", [], "any", false, false, false, 3)) {
            // line 4
            echo "    ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.your_cart_is_empty"), "html", null, true);
            echo ".
";
        } else {
            // line 6
            echo "    <div class=\"ui list\">
        ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 7, $this->source); })()), "items", [], "any", false, false, false, 7));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 8
                echo "            <div class=\"item\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 8), "html", null, true);
                echo " x <strong>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "product", [], "any", false, false, false, 8), "html", null, true);
                echo "</strong> ";
                echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, $context["item"], "unitPrice", [], "any", false, false, false, 8)], 8, $context, $this->getSourceContext());
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "        <div class=\"item\"><strong>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.subtotal"), "html", null, true);
            echo "</strong>: ";
            echo twig_call_macro($macros["money"], "macro_convertAndFormat", [twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 10, $this->source); })()), "itemsTotal", [], "any", false, false, false, 10)], 10, $context, $this->getSourceContext());
            echo "</div>
    </div>
    <a href=\"";
            // line 12
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_cart_summary");
            echo "\" class=\"ui fluid basic text button\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.view_and_edit_cart"), "html", null, true);
            echo "</a>
    <div class=\"ui divider\"></div>
    <a href=\"";
            // line 14
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_checkout_start");
            echo "\" class=\"ui fluid primary button\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.checkout"), "html", null, true);
            echo "</a>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Cart/Widget/_popup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 14,  84 => 12,  76 => 10,  63 => 8,  59 => 7,  56 => 6,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% if cart.empty %}
    {{ 'sylius.ui.your_cart_is_empty'|trans }}.
{% else %}
    <div class=\"ui list\">
        {% for item in cart.items %}
            <div class=\"item\">{{ item.quantity }} x <strong>{{ item.product }}</strong> {{ money.convertAndFormat(item.unitPrice) }}</div>
        {% endfor %}
        <div class=\"item\"><strong>{{ 'sylius.ui.subtotal'|trans }}</strong>: {{ money.convertAndFormat(cart.itemsTotal) }}</div>
    </div>
    <a href=\"{{ path('sylius_shop_cart_summary') }}\" class=\"ui fluid basic text button\">{{ 'sylius.ui.view_and_edit_cart'|trans }}</a>
    <div class=\"ui divider\"></div>
    <a href=\"{{ path('sylius_shop_checkout_start') }}\" class=\"ui fluid primary button\">{{ 'sylius.ui.checkout'|trans }}</a>
{% endif %}
", "@SyliusShop/Cart/Widget/_popup.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Cart/Widget/_popup.html.twig");
    }
}
