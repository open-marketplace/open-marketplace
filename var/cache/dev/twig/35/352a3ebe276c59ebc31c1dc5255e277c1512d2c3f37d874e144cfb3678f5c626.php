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

/* @SyliusPayum/Action/Stripe/obtainCheckoutToken.html.twig */
class __TwigTemplate_217232a550d989ea2950bb52800b626808b2a2d31d5ca7634dfb2a5d3a6934b1 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((isset($context["layout"]) || array_key_exists("layout", $context) ? $context["layout"] : (function () { throw new RuntimeError('Variable "layout" does not exist.', 1, $this->source); })())) ? ((isset($context["layout"]) || array_key_exists("layout", $context) ? $context["layout"] : (function () { throw new RuntimeError('Variable "layout" does not exist.', 1, $this->source); })())) : ("@SyliusPayum/layout.html.twig")), "@SyliusPayum/Action/Stripe/obtainCheckoutToken.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusPayum/Action/Stripe/obtainCheckoutToken.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusPayum/Action/Stripe/obtainCheckoutToken.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    ";
        $this->displayParentBlock("content", $context, $blocks);
        echo "

    <form action=\"";
        // line 6
        echo twig_escape_filter($this->env, ((array_key_exists("actionUrl", $context)) ? (_twig_default_filter((isset($context["actionUrl"]) || array_key_exists("actionUrl", $context) ? $context["actionUrl"] : (function () { throw new RuntimeError('Variable "actionUrl" does not exist.', 6, $this->source); })()), "")) : ("")), "html", null, true);
        echo "\" method=\"POST\">
        <script
                src=\"https://checkout.stripe.com/checkout.js\" class=\"stripe-button\"
                data-key=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["publishable_key"]) || array_key_exists("publishable_key", $context) ? $context["publishable_key"] : (function () { throw new RuntimeError('Variable "publishable_key" does not exist.', 9, $this->source); })()), "html", null, true);
        echo "\"
                data-image=\"";
        // line 10
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "image", [], "any", true, true, false, 10)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "image", [], "any", false, false, false, 10), "")) : ("")), "html", null, true);
        echo "\"
                data-name=\"";
        // line 11
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "name", [], "any", true, true, false, 11)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "name", [], "any", false, false, false, 11), "")) : ("")), "html", null, true);
        echo "\"
                data-description=\"";
        // line 12
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "description", [], "any", true, true, false, 12)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "description", [], "any", false, false, false, 12), "")) : ("")), "html", null, true);
        echo "\"
                data-amount=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["model"]) || array_key_exists("model", $context) ? $context["model"] : (function () { throw new RuntimeError('Variable "model" does not exist.', 13, $this->source); })()), "amount", [], "any", false, false, false, 13), "html", null, true);
        echo "\"
                data-currency=\"";
        // line 14
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "currency", [], "any", true, true, false, 14)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "currency", [], "any", false, false, false, 14), "USD")) : ("USD")), "html", null, true);
        echo "\">
        </script>
    </form>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 19
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 20
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script type=\"text/javascript\">
        \$(function() {\$('form .stripe-button-el').click();});
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusPayum/Action/Stripe/obtainCheckoutToken.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 20,  114 => 19,  100 => 14,  96 => 13,  92 => 12,  88 => 11,  84 => 10,  80 => 9,  74 => 6,  68 => 4,  58 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends layout ?: '@SyliusPayum/layout.html.twig' %}

{% block content %}
    {{ parent() }}

    <form action=\"{{ actionUrl|default('') }}\" method=\"POST\">
        <script
                src=\"https://checkout.stripe.com/checkout.js\" class=\"stripe-button\"
                data-key=\"{{ publishable_key }}\"
                data-image=\"{{ model.image|default(\"\") }}\"
                data-name=\"{{ model.name|default(\"\") }}\"
                data-description=\"{{ model.description|default(\"\") }}\"
                data-amount=\"{{ model.amount }}\"
                data-currency=\"{{ model.currency|default(\"USD\") }}\">
        </script>
    </form>
{% endblock %}

{% block javascripts %}
    {{ parent() }}

    <script type=\"text/javascript\">
        \$(function() {\$('form .stripe-button-el').click();});
    </script>
{% endblock %}
", "@SyliusPayum/Action/Stripe/obtainCheckoutToken.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/PayumBundle/Resources/views/Action/Stripe/obtainCheckoutToken.html.twig");
    }
}
