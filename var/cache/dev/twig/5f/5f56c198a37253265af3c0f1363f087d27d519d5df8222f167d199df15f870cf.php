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

/* @SyliusShop/Checkout/SelectPayment/_choice.html.twig */
class __TwigTemplate_6045d7065646c84ce4e9e1828064add3d9af59b49c083cb3d4ae79170d9937eb extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/SelectPayment/_choice.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/SelectPayment/_choice.html.twig"));

        // line 1
        echo "<div class=\"item\" ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("payment-item");
        echo ">
    <div class=\"field\">
        <div class=\"ui radio checkbox\" ";
        // line 3
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("payment-method-checkbox");
        echo ">
            ";
        // line 4
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), 'widget', $this->env->getFunction('sylius_test_form_attribute')->getCallable()("payment-method-select"));
        echo "
        </div>
    </div>
    <div class=\"content\">
        <a class=\"header\">";
        // line 8
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), 'label', ["label_attr" => ["data-test-payment-method-label" => ""]]);
        echo "</a>
        ";
        // line 9
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 9, $this->source); })()), "description", [], "any", false, false, false, 9))) {
            // line 10
            echo "            <div class=\"description\">
                <p>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 11, $this->source); })()), "description", [], "any", false, false, false, 11), "html", null, true);
            echo "</p>
            </div>
        ";
        }
        // line 14
        echo "        ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 14, $this->source); })()), "gatewayConfig", [], "any", false, false, false, 14), "factoryName", [], "any", false, false, false, 14) == "sylius.pay_pal")) {
            // line 15
            echo "            ";
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("Sylius\\PayPalPlugin\\Controller\\PayPalButtonsController:renderPaymentPageButtonsAction", ["orderId" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15)]));
            echo "
        ";
        }
        // line 17
        echo "    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Checkout/SelectPayment/_choice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 17,  78 => 15,  75 => 14,  69 => 11,  66 => 10,  64 => 9,  60 => 8,  53 => 4,  49 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"item\" {{ sylius_test_html_attribute('payment-item') }}>
    <div class=\"field\">
        <div class=\"ui radio checkbox\" {{ sylius_test_html_attribute('payment-method-checkbox') }}>
            {{ form_widget(form, sylius_test_form_attribute('payment-method-select')) }}
        </div>
    </div>
    <div class=\"content\">
        <a class=\"header\">{{ form_label(form, null, {'label_attr': {'data-test-payment-method-label': ''}}) }}</a>
        {% if method.description is not null %}
            <div class=\"description\">
                <p>{{ method.description }}</p>
            </div>
        {% endif %}
        {% if method.gatewayConfig.factoryName == 'sylius.pay_pal' %}
            {{ render(controller('Sylius\\\\PayPalPlugin\\\\Controller\\\\PayPalButtonsController:renderPaymentPageButtonsAction', {'orderId': order.id})) }}
        {% endif %}
    </div>
</div>
", "@SyliusShop/Checkout/SelectPayment/_choice.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/templates/bundles/SyliusShopBundle/Checkout/SelectPayment/_choice.html.twig");
    }
}
