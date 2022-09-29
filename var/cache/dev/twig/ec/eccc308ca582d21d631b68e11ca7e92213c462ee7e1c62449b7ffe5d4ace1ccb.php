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

/* @SyliusShop/Common/Order/_payments.html.twig */
class __TwigTemplate_941c77ff33654733777ac1e30ea4be70be5973d548e87d124765db6e47426f76 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/_payments.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/_payments.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Common/Order/_payments.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["state"] = twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 3, $this->source); })()), "paymentState", [], "any", false, false, false, 3);
        // line 4
        echo "
";
        // line 5
        if (((isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 5, $this->source); })()) != "cart")) {
            // line 6
            echo "    ";
            $this->loadTemplate("@SyliusShop/Common/Order/Label/PaymentState/orderPaymentState.html.twig", "@SyliusShop/Common/Order/_payments.html.twig", 6)->display($context);
        }
        // line 8
        echo "
";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 9, $this->source); })()), "payments", [], "any", false, false, false, 9));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["payment"]) {
            // line 10
            echo "    ";
            $context["state"] = twig_get_attribute($this->env, $this->source, $context["payment"], "state", [], "any", false, false, false, 10);
            // line 11
            echo "
    <div class=\"ui small icon message\">
        <i class=\"payment icon\"></i>
        <div class=\"content\">
            <div class=\"header\" id=\"sylius-payment-method\" ";
            // line 15
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("payment-method");
            echo ">
                ";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["payment"], "method", [], "any", false, false, false, 16), "html", null, true);
            echo "
            </div>
            <p ";
            // line 18
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("payment-price");
            echo ">";
            echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, $context["payment"], "amount", [], "any", false, false, false, 18), twig_get_attribute($this->env, $this->source, $context["payment"], "currencyCode", [], "any", false, false, false, 18)], 18, $context, $this->getSourceContext());
            echo "</p>
            ";
            // line 19
            if (((twig_get_attribute($this->env, $this->source, $context["payment"], "amount", [], "any", false, false, false, 19) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["payment"], "order", [], "any", false, false, false, 19), "total", [], "any", false, false, false, 19)) && ((isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 19, $this->source); })()) == "processing"))) {
                // line 20
                echo "                <i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.pay_pal.different_amount"), "html", null, true);
                echo "</i>
            ";
            }
            // line 22
            echo "            ";
            if (((isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 22, $this->source); })()) != "cart")) {
                // line 23
                echo "                <p id=\"payment-status\" ";
                echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("payment-state");
                echo ">
                    ";
                // line 24
                $this->loadTemplate("@SyliusShop/Common/Order/Label/PaymentState/singlePaymentState.html.twig", "@SyliusShop/Common/Order/_payments.html.twig", 24)->display(twig_array_merge($context, ["state" => (isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 24, $this->source); })())]));
                // line 25
                echo "                </p>
            ";
            }
            // line 27
            echo "        </div>
    </div>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['payment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Common/Order/_payments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 27,  121 => 25,  119 => 24,  114 => 23,  111 => 22,  105 => 20,  103 => 19,  97 => 18,  92 => 16,  88 => 15,  82 => 11,  79 => 10,  62 => 9,  59 => 8,  55 => 6,  53 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

{% set state = order.paymentState %}

{% if state != 'cart' %}
    {% include \"@SyliusShop/Common/Order/Label/PaymentState/orderPaymentState.html.twig\" %}
{% endif %}

{% for payment in order.payments %}
    {% set state = payment.state %}

    <div class=\"ui small icon message\">
        <i class=\"payment icon\"></i>
        <div class=\"content\">
            <div class=\"header\" id=\"sylius-payment-method\" {{ sylius_test_html_attribute('payment-method') }}>
                {{ payment.method }}
            </div>
            <p {{ sylius_test_html_attribute('payment-price') }}>{{ money.format(payment.amount, payment.currencyCode) }}</p>
            {% if payment.amount != payment.order.total and state == 'processing' %}
                <i>{{ 'sylius.pay_pal.different_amount'|trans }}</i>
            {% endif %}
            {% if state != 'cart' %}
                <p id=\"payment-status\" {{ sylius_test_html_attribute('payment-state') }}>
                    {% include \"@SyliusShop/Common/Order/Label/PaymentState/singlePaymentState.html.twig\" with { 'state': state } %}
                </p>
            {% endif %}
        </div>
    </div>
{% endfor %}
", "@SyliusShop/Common/Order/_payments.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/templates/bundles/SyliusShopBundle/Common/Order/_payments.html.twig");
    }
}
