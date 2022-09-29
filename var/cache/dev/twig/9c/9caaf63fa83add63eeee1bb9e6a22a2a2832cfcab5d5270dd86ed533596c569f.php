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

/* @SyliusShop/Checkout/_header.html.twig */
class __TwigTemplate_4e71cacbb77c20411d4d2b48150bd063f2e557669146eeef4b46800fb10a1c5f extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/_header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/_header.html.twig"));

        // line 1
        echo "<div class=\"ui basic segment\">
    <div class=\"ui large text menu\">
        <div class=\"ui small image\">
            <a href=\"";
        // line 4
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_homepage");
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/shop/img/logo.png"), "html", null, true);
        echo "\" /></a>
        </div>
        <div class=\"right menu\">
            ";
        // line 7
        if ( !(null === ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "customer", [], "any", false, true, false, 7), "id", [], "any", true, true, false, 7)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "customer", [], "any", false, true, false, 7), "id", [], "any", false, false, false, 7), null)) : (null)))) {
            // line 8
            echo "                <div class=\"item\" id=\"purchaser-email\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("purchaser-name-or-email");
            echo ">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.checking_out_as"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, (((null === twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "user", [], "any", false, false, false, 8))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 8, $this->source); })()), "customer", [], "any", false, false, false, 8), "email", [], "any", false, false, false, 8)) : (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "customer", [], "any", false, true, false, 8), "fullName", [], "any", true, true, false, 8)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "customer", [], "any", false, true, false, 8), "fullName", [], "any", false, false, false, 8), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 8, $this->source); })()), "customer", [], "any", false, false, false, 8), "email", [], "any", false, false, false, 8))) : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 8, $this->source); })()), "customer", [], "any", false, false, false, 8), "email", [], "any", false, false, false, 8))))), "html", null, true);
            echo ".</div>
            ";
        } else {
            // line 10
            echo "                <a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_login");
            echo "\" class=\"item\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.sign_in"), "html", null, true);
            echo "</a>
            ";
        }
        // line 12
        echo "        </div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Checkout/_header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 12,  68 => 10,  58 => 8,  56 => 7,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui basic segment\">
    <div class=\"ui large text menu\">
        <div class=\"ui small image\">
            <a href=\"{{ path('sylius_shop_homepage') }}\"><img src=\"{{ asset('assets/shop/img/logo.png') }}\" /></a>
        </div>
        <div class=\"right menu\">
            {% if order.customer.id|default(null) is not null %}
                <div class=\"item\" id=\"purchaser-email\" {{ sylius_test_html_attribute('purchaser-name-or-email') }}>{{ 'sylius.ui.checking_out_as'|trans }} {{ app.user is null ? order.customer.email : order.customer.fullName|default(order.customer.email) }}.</div>
            {% else %}
                <a href=\"{{ path('sylius_shop_login') }}\" class=\"item\">{{ 'sylius.ui.sign_in'|trans }}</a>
            {% endif %}
        </div>
    </div>
</div>
", "@SyliusShop/Checkout/_header.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Checkout/_header.html.twig");
    }
}
