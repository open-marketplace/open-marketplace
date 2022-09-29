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

/* @SyliusShop/Checkout/Address/_form.html.twig */
class __TwigTemplate_87e9b63d2ce0b717a58e66f5af3d441e283c0a0b1a5811e750fc3b4f51bbdc25 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/Address/_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/Address/_form.html.twig"));

        // line 1
        echo "<div id=\"sylius-billing-address\" ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("billing-address");
        echo ">
    ";
        // line 2
        $this->loadTemplate("@SyliusShop/Checkout/Address/_addressBookSelect.html.twig", "@SyliusShop/Checkout/Address/_form.html.twig", 2)->display($context);
        // line 3
        echo "    <h3 class=\"ui dividing header\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.billing_address"), "html", null, true);
        echo "</h3>
    ";
        // line 4
        if ((null === twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "user", [], "any", false, false, false, 4))) {
            // line 5
            echo "        ";
            $this->loadTemplate("@SyliusShop/Common/Form/_login.html.twig", "@SyliusShop/Checkout/Address/_form.html.twig", 5)->display(twig_array_merge($context, ["form" => twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "customer", [], "any", false, false, false, 5)]));
            // line 6
            echo "    ";
        }
        // line 7
        echo "    ";
        $this->loadTemplate("@SyliusShop/Common/Form/_address.html.twig", "@SyliusShop/Checkout/Address/_form.html.twig", 7)->display(twig_array_merge($context, ["form" => twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "billingAddress", [], "any", false, false, false, 7), "order" => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 7, $this->source); })()), "type" => "billing"]));
        // line 8
        echo "    ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "differentShippingAddress", [], "any", false, false, false, 8), 'row', $this->env->getFilter('sylius_merge_recursive')->getCallable()($this->env->getFunction('sylius_test_form_attribute')->getCallable()("different-shipping-address"), ["attr" => ["data-toggles" => "sylius-shipping-address"], "label_attr" => ["data-test-different-shipping-address-label" => ""]]));
        echo "

    ";
        // line 10
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.checkout.address.billing_address_form", ["order" => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 10, $this->source); })())]);
        echo "
</div>

<div id=\"sylius-shipping-address\" ";
        // line 13
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-address");
        echo ">
    <div class=\"ui hidden divider\"></div>
    ";
        // line 15
        $this->loadTemplate("@SyliusShop/Checkout/Address/_addressBookSelect.html.twig", "@SyliusShop/Checkout/Address/_form.html.twig", 15)->display($context);
        // line 16
        echo "    <h3 class=\"ui dividing header\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_address"), "html", null, true);
        echo "</h3>
    ";
        // line 17
        $this->loadTemplate("@SyliusShop/Common/Form/_address.html.twig", "@SyliusShop/Checkout/Address/_form.html.twig", 17)->display(twig_array_merge($context, ["form" => twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "shippingAddress", [], "any", false, false, false, 17), "order" => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 17, $this->source); })()), "type" => "shipping"]));
        // line 18
        echo "
    ";
        // line 19
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.checkout.address.shipping_address_form", ["order" => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 19, $this->source); })())]);
        echo "
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Checkout/Address/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 19,  92 => 18,  90 => 17,  85 => 16,  83 => 15,  78 => 13,  72 => 10,  66 => 8,  63 => 7,  60 => 6,  57 => 5,  55 => 4,  50 => 3,  48 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"sylius-billing-address\" {{ sylius_test_html_attribute('billing-address') }}>
    {% include '@SyliusShop/Checkout/Address/_addressBookSelect.html.twig' %}
    <h3 class=\"ui dividing header\">{{ 'sylius.ui.billing_address'|trans }}</h3>
    {% if app.user is null %}
        {% include '@SyliusShop/Common/Form/_login.html.twig' with {'form': form.customer} %}
    {% endif %}
    {% include '@SyliusShop/Common/Form/_address.html.twig' with {'form': form.billingAddress, 'order': order, 'type': 'billing'} %}
    {{ form_row(form.differentShippingAddress, sylius_test_form_attribute('different-shipping-address')|sylius_merge_recursive({'attr': {'data-toggles': 'sylius-shipping-address'}, 'label_attr': {'data-test-different-shipping-address-label': ''}} )) }}

    {{ sylius_template_event('sylius.shop.checkout.address.billing_address_form', {'order': order}) }}
</div>

<div id=\"sylius-shipping-address\" {{ sylius_test_html_attribute('shipping-address') }}>
    <div class=\"ui hidden divider\"></div>
    {% include '@SyliusShop/Checkout/Address/_addressBookSelect.html.twig' %}
    <h3 class=\"ui dividing header\">{{ 'sylius.ui.shipping_address'|trans }}</h3>
    {% include '@SyliusShop/Common/Form/_address.html.twig' with {'form': form.shippingAddress, 'order': order, 'type': 'shipping'} %}

    {{ sylius_template_event('sylius.shop.checkout.address.shipping_address_form', {'order': order}) }}
</div>
", "@SyliusShop/Checkout/Address/_form.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Checkout/Address/_form.html.twig");
    }
}
