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

/* @SyliusAdmin/Order/Show/_addresses.html.twig */
class __TwigTemplate_4a1608e58a6eb1aab4171f1a3789c1ce536c27c2e3c09d2634c7de255f3f6b4b extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/_addresses.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/_addresses.html.twig"));

        // line 1
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 1, $this->source); })()), "billingAddress", [], "any", false, false, false, 1))) {
            // line 2
            echo "    <h4 class=\"ui attached styled header top\">
        ";
            // line 3
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.billing_address"), "html", null, true);
            echo "
    </h4>
    <div class=\"ui attached segment\" id=\"billing-address\">
        ";
            // line 6
            $this->loadTemplate("@SyliusAdmin/Common/_address.html.twig", "@SyliusAdmin/Order/Show/_addresses.html.twig", 6)->display(twig_array_merge($context, ["address" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 6, $this->source); })()), "billingAddress", [], "any", false, false, false, 6)]));
            // line 7
            echo "    </div>
";
        }
        // line 9
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 9, $this->source); })()), "shippingAddress", [], "any", false, false, false, 9))) {
            // line 10
            echo "    <h4 class=\"ui attached styled header";
            if ((null === twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 10, $this->source); })()), "billingAddress", [], "any", false, false, false, 10))) {
                echo " top";
            }
            echo "\">
        ";
            // line 11
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_address"), "html", null, true);
            echo "
    </h4>
    <div class=\"ui attached segment\" id=\"shipping-address\">
        ";
            // line 14
            $this->loadTemplate("@SyliusAdmin/Common/_address.html.twig", "@SyliusAdmin/Order/Show/_addresses.html.twig", 14)->display(twig_array_merge($context, ["address" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 14, $this->source); })()), "shippingAddress", [], "any", false, false, false, 14)]));
            // line 15
            echo "    </div>
";
        }
        // line 17
        echo "<div class=\"ui attached segment\" id=\"edit-addresses\">
    <a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_order_update", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 18, $this->source); })()), "id", [], "any", false, false, false, 18)]), "html", null, true);
        echo "\" class=\"ui icon labeled tiny fluid button\">
        <i class=\"pencil icon\"></i> ";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.edit_addresses"), "html", null, true);
        echo "
    </a>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/_addresses.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 19,  84 => 18,  81 => 17,  77 => 15,  75 => 14,  69 => 11,  62 => 10,  60 => 9,  56 => 7,  54 => 6,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if order.billingAddress is not null %}
    <h4 class=\"ui attached styled header top\">
        {{ 'sylius.ui.billing_address'|trans }}
    </h4>
    <div class=\"ui attached segment\" id=\"billing-address\">
        {% include '@SyliusAdmin/Common/_address.html.twig' with {'address': order.billingAddress} %}
    </div>
{% endif %}
{% if order.shippingAddress is not null %}
    <h4 class=\"ui attached styled header{% if order.billingAddress is null %} top{% endif %}\">
        {{ 'sylius.ui.shipping_address'|trans }}
    </h4>
    <div class=\"ui attached segment\" id=\"shipping-address\">
        {% include '@SyliusAdmin/Common/_address.html.twig' with {'address': order.shippingAddress} %}
    </div>
{% endif %}
<div class=\"ui attached segment\" id=\"edit-addresses\">
    <a href=\"{{ path('sylius_admin_order_update', {'id': order.id}) }}\" class=\"ui icon labeled tiny fluid button\">
        <i class=\"pencil icon\"></i> {{ 'sylius.ui.edit_addresses'|trans }}
    </a>
</div>
", "@SyliusAdmin/Order/Show/_addresses.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Show/_addresses.html.twig");
    }
}
