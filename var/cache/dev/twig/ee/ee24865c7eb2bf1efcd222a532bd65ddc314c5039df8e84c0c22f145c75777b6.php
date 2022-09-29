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

/* @SyliusAdmin/Order/Show/_payment.html.twig */
class __TwigTemplate_6087a89e9b3271be18c167239642e187dd0035854723199a2fb63a10e6cef52e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/_payment.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/_payment.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/Order/Show/_payment.html.twig", 1)->unwrap();
        // line 2
        $macros["label"] = $this->macros["label"] = $this->loadTemplate("@SyliusUi/Macro/labels.html.twig", "@SyliusAdmin/Order/Show/_payment.html.twig", 2)->unwrap();
        // line 3
        echo "
<div class=\"item\">
    <div class=\"right floated content\">
        ";
        // line 6
        $this->loadTemplate("@SyliusAdmin/Common/Label/paymentState.html.twig", "@SyliusAdmin/Order/Show/_payment.html.twig", 6)->display(twig_array_merge($context, ["data" => twig_get_attribute($this->env, $this->source, (isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 6, $this->source); })()), "state", [], "any", false, false, false, 6)]));
        // line 7
        echo "    </div>
    <i class=\"large payment icon\"></i>
    <div class=\"content\">
        <div class=\"header\">
            ";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 11, $this->source); })()), "method", [], "any", false, false, false, 11), "html", null, true);
        echo "
        </div>
        <div class=\"description\">
            ";
        // line 14
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 14, $this->source); })()), "amount", [], "any", false, false, false, 14), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 14, $this->source); })()), "order", [], "any", false, false, false, 14), "currencyCode", [], "any", false, false, false, 14)], 14, $context, $this->getSourceContext());
        echo "
        </div>
    </div>
    ";
        // line 17
        if ($this->extensions['SM\Extension\Twig\SMExtension']->can((isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 17, $this->source); })()), "complete", "sylius_payment")) {
            // line 18
            echo "        <div class=\"ui segment\">
            <form action=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_order_payment_complete", ["orderId" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 19, $this->source); })()), "id", [], "any", false, false, false, 19), "id" => twig_get_attribute($this->env, $this->source, (isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 19, $this->source); })()), "id", [], "any", false, false, false, 19)]), "html", null, true);
            echo "\" method=\"post\" novalidate>
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_get_attribute($this->env, $this->source, (isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 20, $this->source); })()), "id", [], "any", false, false, false, 20)), "html", null, true);
            echo "\" />
                <input type=\"hidden\" name=\"_method\" value=\"PUT\">
                <button type=\"submit\" class=\"ui icon labeled tiny blue fluid loadable button\"><i class=\"check icon\"></i> ";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.complete"), "html", null, true);
            echo "</button>
            </form>
        </div>
    ";
        }
        // line 26
        echo "    ";
        if ($this->extensions['SM\Extension\Twig\SMExtension']->can((isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 26, $this->source); })()), "refund", "sylius_payment")) {
            // line 27
            echo "        <div class=\"ui segment\">
            <form action=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_order_payment_refund", ["orderId" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 28, $this->source); })()), "id", [], "any", false, false, false, 28), "id" => twig_get_attribute($this->env, $this->source, (isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 28, $this->source); })()), "id", [], "any", false, false, false, 28)]), "html", null, true);
            echo "\" method=\"post\" novalidate>
                <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_get_attribute($this->env, $this->source, (isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 29, $this->source); })()), "id", [], "any", false, false, false, 29)), "html", null, true);
            echo "\" />
                <input type=\"hidden\" name=\"_method\" value=\"PUT\">
                <button type=\"submit\" class=\"ui icon labeled tiny yellow fluid loadable button\"><i class=\"reply all icon\"></i> ";
            // line 31
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.refund"), "html", null, true);
            echo "</button>
            </form>
        </div>
    ";
        }
        // line 35
        echo "    ";
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 36
(isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 36, $this->source); })()), "method", [], "any", false, false, false, 36), "gatewayConfig", [], "any", false, false, false, 36), "factoryName", [], "any", false, false, false, 36) == "sylius.pay_pal") && (twig_get_attribute($this->env, $this->source,         // line 37
(isset($context["payment"]) || array_key_exists("payment", $context) ? $context["payment"] : (function () { throw new RuntimeError('Variable "payment" does not exist.', 37, $this->source); })()), "state", [], "any", false, false, false, 37) == "refunded"))) {
            // line 39
            echo "        <div class=\"ui icon mini message\">
            <i class=\"paypal icon\"></i>
            <div class=\"content\">
                <p>";
            // line 42
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.pay_pal.tender_type"), "html", null, true);
            echo "</p>
            </div>
        </div>
    ";
        }
        // line 46
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/_payment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 46,  125 => 42,  120 => 39,  118 => 37,  117 => 36,  115 => 35,  108 => 31,  103 => 29,  99 => 28,  96 => 27,  93 => 26,  86 => 22,  81 => 20,  77 => 19,  74 => 18,  72 => 17,  66 => 14,  60 => 11,  54 => 7,  52 => 6,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusAdmin/Common/Macro/money.html.twig\" as money %}
{% import '@SyliusUi/Macro/labels.html.twig' as label %}

<div class=\"item\">
    <div class=\"right floated content\">
        {% include '@SyliusAdmin/Common/Label/paymentState.html.twig' with {'data': payment.state} %}
    </div>
    <i class=\"large payment icon\"></i>
    <div class=\"content\">
        <div class=\"header\">
            {{ payment.method }}
        </div>
        <div class=\"description\">
            {{ money.format(payment.amount, payment.order.currencyCode) }}
        </div>
    </div>
    {% if sm_can(payment, 'complete', 'sylius_payment') %}
        <div class=\"ui segment\">
            <form action=\"{{ path('sylius_admin_order_payment_complete', {'orderId': order.id, 'id': payment.id}) }}\" method=\"post\" novalidate>
                <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token(payment.id) }}\" />
                <input type=\"hidden\" name=\"_method\" value=\"PUT\">
                <button type=\"submit\" class=\"ui icon labeled tiny blue fluid loadable button\"><i class=\"check icon\"></i> {{ 'sylius.ui.complete'|trans }}</button>
            </form>
        </div>
    {% endif %}
    {% if sm_can(payment, 'refund', 'sylius_payment') %}
        <div class=\"ui segment\">
            <form action=\"{{ path('sylius_admin_order_payment_refund', {'orderId': order.id, 'id': payment.id}) }}\" method=\"post\" novalidate>
                <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token(payment.id) }}\" />
                <input type=\"hidden\" name=\"_method\" value=\"PUT\">
                <button type=\"submit\" class=\"ui icon labeled tiny yellow fluid loadable button\"><i class=\"reply all icon\"></i> {{ 'sylius.ui.refund'|trans }}</button>
            </form>
        </div>
    {% endif %}
    {% if
        payment.method.gatewayConfig.factoryName == 'sylius.pay_pal' and
        payment.state == 'refunded'
    %}
        <div class=\"ui icon mini message\">
            <i class=\"paypal icon\"></i>
            <div class=\"content\">
                <p>{{ 'sylius.pay_pal.tender_type'|trans }}</p>
            </div>
        </div>
    {% endif %}
</div>
", "@SyliusAdmin/Order/Show/_payment.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/templates/bundles/SyliusAdminBundle/Order/Show/_payment.html.twig");
    }
}
