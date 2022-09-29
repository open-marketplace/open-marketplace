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

/* @SyliusShop/Checkout/SelectShipping/_choice.html.twig */
class __TwigTemplate_5db0d12d2b07fdd70f5b85b7cf892d3002ae6564c9f95636bab656d11c1aa300 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/SelectShipping/_choice.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/SelectShipping/_choice.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Checkout/SelectShipping/_choice.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"item\" ";
        // line 3
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-item");
        echo ">
    <div class=\"field\">
        <div class=\"ui radio checkbox\" ";
        // line 5
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-method-checkbox");
        echo ">
            ";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), 'widget', $this->env->getFunction('sylius_test_form_attribute')->getCallable()("shipping-method-select"));
        echo "
        </div>
    </div>
    <div class=\"content\">
        <a class=\"header\" ";
        // line 10
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-method-label");
        echo ">";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), 'label');
        echo "</a>
        ";
        // line 11
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 11, $this->source); })()), "description", [], "any", false, false, false, 11))) {
            // line 12
            echo "            <div class=\"description\">
                <p>";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 13, $this->source); })()), "description", [], "any", false, false, false, 13), "html", null, true);
            echo "</p>
            </div>
        ";
        }
        // line 16
        echo "    </div>
    <div class=\"extra\">
        <div class=\"ui large right floated fee label\" ";
        // line 18
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-method-fee");
        echo ">
            ";
        // line 19
        echo twig_call_macro($macros["money"], "macro_convertAndFormat", [(isset($context["fee"]) || array_key_exists("fee", $context) ? $context["fee"] : (function () { throw new RuntimeError('Variable "fee" does not exist.', 19, $this->source); })())], 19, $context, $this->getSourceContext());
        echo "
        </div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Checkout/SelectShipping/_choice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 19,  85 => 18,  81 => 16,  75 => 13,  72 => 12,  70 => 11,  64 => 10,  57 => 6,  53 => 5,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusShop/Common/Macro/money.html.twig' as money %}

<div class=\"item\" {{ sylius_test_html_attribute('shipping-item') }}>
    <div class=\"field\">
        <div class=\"ui radio checkbox\" {{ sylius_test_html_attribute('shipping-method-checkbox') }}>
            {{ form_widget(form, sylius_test_form_attribute('shipping-method-select')) }}
        </div>
    </div>
    <div class=\"content\">
        <a class=\"header\" {{ sylius_test_html_attribute('shipping-method-label') }}>{{ form_label(form) }}</a>
        {% if method.description is not null %}
            <div class=\"description\">
                <p>{{ method.description }}</p>
            </div>
        {% endif %}
    </div>
    <div class=\"extra\">
        <div class=\"ui large right floated fee label\" {{ sylius_test_html_attribute('shipping-method-fee') }}>
            {{ money.convertAndFormat(fee) }}
        </div>
    </div>
</div>
", "@SyliusShop/Checkout/SelectShipping/_choice.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Checkout/SelectShipping/_choice.html.twig");
    }
}
