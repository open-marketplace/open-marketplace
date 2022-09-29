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

/* @SyliusShop/Order/thankYou.html.twig */
class __TwigTemplate_bac0f2bbc5b7d786064aa988b49bd8d59e9343c35c23ef151f401fc8b485b433 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@SyliusShop/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Order/thankYou.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Order/thankYou.html.twig"));

        $this->parent = $this->loadTemplate("@SyliusShop/layout.html.twig", "@SyliusShop/Order/thankYou.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
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
        echo "    <div class=\"ui hidden divider\"></div>
    <div class=\"ui grid\">
        <div class=\"center aligned sixteen wide column\">
            <h1 class=\"ui icon header\">
                ";
        // line 8
        $context["lastPayment"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 8, $this->source); })()), "payments", [], "any", false, false, false, 8), "last", [], "method", false, false, false, 8);
        // line 9
        echo "                <i class=\"circular rocket icon\"></i>
                <div class=\"content\" id=\"sylius-thank-you\" ";
        // line 10
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("thank-you");
        echo ">
                    ";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.thank_you"), "html", null, true);
        echo "
                    <div class=\"sub header\">";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.placed_an_order"), "html", null, true);
        echo "</div>
                </div>
            </h1>

            ";
        // line 16
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.order.thank_you.after_message", ["order" => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 16, $this->source); })())]);
        echo "

            ";
        // line 18
        if (((isset($context["lastPayment"]) || array_key_exists("lastPayment", $context) ? $context["lastPayment"] : (function () { throw new RuntimeError('Variable "lastPayment" does not exist.', 18, $this->source); })()) != false)) {
            // line 19
            echo "                ";
            if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["lastPayment"]) || array_key_exists("lastPayment", $context) ? $context["lastPayment"] : (function () { throw new RuntimeError('Variable "lastPayment" does not exist.', 19, $this->source); })()), "method", [], "any", false, false, false, 19), "instructions", [], "any", false, false, false, 19))) {
                // line 20
                echo "                    <div id=\"sylius-payment-method-instructions\" class=\"ui segment\" ";
                echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("payment-method-instructions");
                echo ">
                        ";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["lastPayment"]) || array_key_exists("lastPayment", $context) ? $context["lastPayment"] : (function () { throw new RuntimeError('Variable "lastPayment" does not exist.', 21, $this->source); })()), "method", [], "any", false, false, false, 21), "instructions", [], "any", false, false, false, 21), "html", null, true);
                echo "
                    </div>
                ";
            }
            // line 24
            echo "                <div class=\"ui hidden divider\"></div>
            ";
        }
        // line 26
        echo "
            ";
        // line 27
        if ( !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 27, $this->source); })()), "customer", [], "any", false, false, false, 27), "user", [], "any", false, false, false, 27))) {
            // line 28
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_account_order_show", ["number" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 28, $this->source); })()), "number", [], "any", false, false, false, 28)]), "html", null, true);
            echo "\" id=\"sylius-show-order-in-account\" class=\"ui large blue button\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("show-order-in-account");
            echo ">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.view_order"), "html", null, true);
            echo "</a>
            ";
        } else {
            // line 30
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, (isset($context["lastPayment"]) || array_key_exists("lastPayment", $context) ? $context["lastPayment"] : (function () { throw new RuntimeError('Variable "lastPayment" does not exist.', 30, $this->source); })()), "state", [], "any", false, false, false, 30) != "completed")) {
                // line 31
                echo "                    <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_order_show", ["tokenValue" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 31, $this->source); })()), "tokenValue", [], "any", false, false, false, 31)]), "html", null, true);
                echo "\" id=\"payment-method-page\" class=\"ui large blue button\" ";
                echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("payment-method-page");
                echo ">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.change_payment_method"), "html", null, true);
                echo "</a>
                ";
            }
            // line 33
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_register_after_checkout", ["tokenValue" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 33, $this->source); })()), "tokenValue", [], "any", false, false, false, 33)]), "html", null, true);
            echo "\" class=\"ui large green button\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("create-an-account");
            echo ">
                    <i class=\"signup icon\"></i>
                    ";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.create_an_account"), "html", null, true);
            echo "
                </a>
            ";
        }
        // line 38
        echo "        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Order/thankYou.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 38,  155 => 35,  147 => 33,  137 => 31,  134 => 30,  124 => 28,  122 => 27,  119 => 26,  115 => 24,  109 => 21,  104 => 20,  101 => 19,  99 => 18,  94 => 16,  87 => 12,  83 => 11,  79 => 10,  76 => 9,  74 => 8,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@SyliusShop/layout.html.twig' %}

{% block content %}
    <div class=\"ui hidden divider\"></div>
    <div class=\"ui grid\">
        <div class=\"center aligned sixteen wide column\">
            <h1 class=\"ui icon header\">
                {% set lastPayment = order.payments.last() %}
                <i class=\"circular rocket icon\"></i>
                <div class=\"content\" id=\"sylius-thank-you\" {{ sylius_test_html_attribute('thank-you') }}>
                    {{ 'sylius.ui.thank_you'|trans }}
                    <div class=\"sub header\">{{ 'sylius.ui.placed_an_order'|trans }}</div>
                </div>
            </h1>

            {{ sylius_template_event('sylius.shop.order.thank_you.after_message', {'order': order}) }}

            {% if lastPayment != false %}
                {%  if lastPayment.method.instructions is not null %}
                    <div id=\"sylius-payment-method-instructions\" class=\"ui segment\" {{ sylius_test_html_attribute('payment-method-instructions') }}>
                        {{ lastPayment.method.instructions }}
                    </div>
                {% endif %}
                <div class=\"ui hidden divider\"></div>
            {% endif %}

            {% if order.customer.user is not null %}
                <a href=\"{{ path('sylius_shop_account_order_show', {'number': order.number}) }}\" id=\"sylius-show-order-in-account\" class=\"ui large blue button\" {{ sylius_test_html_attribute('show-order-in-account') }}>{{ 'sylius.ui.view_order'|trans }}</a>
            {% else %}
                {% if lastPayment.state != 'completed' %}
                    <a href=\"{{ path('sylius_shop_order_show', {'tokenValue': order.tokenValue}) }}\" id=\"payment-method-page\" class=\"ui large blue button\" {{ sylius_test_html_attribute('payment-method-page') }}>{{ 'sylius.ui.change_payment_method'|trans }}</a>
                {% endif %}
                <a href=\"{{ path('sylius_shop_register_after_checkout', {'tokenValue': order.tokenValue}) }}\" class=\"ui large green button\" {{ sylius_test_html_attribute('create-an-account') }}>
                    <i class=\"signup icon\"></i>
                    {{ 'sylius.ui.create_an_account'|trans }}
                </a>
            {% endif %}
        </div>
    </div>
{% endblock %}
", "@SyliusShop/Order/thankYou.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/templates/bundles/SyliusShopBundle/Order/thankYou.html.twig");
    }
}
