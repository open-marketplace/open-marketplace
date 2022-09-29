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

/* @SyliusAdmin/Dashboard/_orders.html.twig */
class __TwigTemplate_aa613862f829debe08c4d25d7cc93c9ade698886f2c760ca0a94d13ffa86b044 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_orders.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_orders.html.twig"));

        // line 1
        $macros["messages"] = $this->macros["messages"] = $this->loadTemplate("@SyliusUi/Macro/messages.html.twig", "@SyliusAdmin/Dashboard/_orders.html.twig", 1)->unwrap();
        // line 2
        $macros["buttons"] = $this->macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusAdmin/Dashboard/_orders.html.twig", 2)->unwrap();
        // line 3
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/Dashboard/_orders.html.twig", 3)->unwrap();
        // line 4
        echo "
<h3 class=\"ui top attached header\">";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.new_orders"), "html", null, true);
        echo "</h3>
<div class=\"ui attached segment\">
    ";
        // line 7
        if ((twig_length_filter($this->env, (isset($context["orders"]) || array_key_exists("orders", $context) ? $context["orders"] : (function () { throw new RuntimeError('Variable "orders" does not exist.', 7, $this->source); })())) > 0)) {
            // line 8
            echo "        <table class=\"ui stackable very basic table\" id=\"orders\">
            <thead>
                <th style=\"color: #ababab;\">";
            // line 10
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.order"), "html", null, true);
            echo "</th>
                <th style=\"color: #ababab;\">";
            // line 11
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.items"), "html", null, true);
            echo "</th>
                <th style=\"color: #ababab;\">";
            // line 12
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.total"), "html", null, true);
            echo "</th>
                <th></th>
            </thead>
            <tbody>
            ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["orders"]) || array_key_exists("orders", $context) ? $context["orders"] : (function () { throw new RuntimeError('Variable "orders" does not exist.', 16, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 17
                echo "                <tr>
                    <td>
                        <strong>";
                // line 19
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "customer", [], "any", false, false, false, 19), "fullName", [], "any", false, false, false, 19), "html", null, true);
                echo "</strong><br>
                        <div style=\"color: #ababab;\">";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["order"], "customer", [], "any", false, false, false, 20), "email", [], "any", false, false, false, 20), "html", null, true);
                echo "</div>
                    </td>
                    <td>
                        ";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "totalQuantity", [], "any", false, false, false, 23), "html", null, true);
                echo "
                    </td>
                    <td>
                        ";
                // line 26
                echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, $context["order"], "total", [], "any", false, false, false, 26), twig_get_attribute($this->env, $this->source, $context["order"], "currencyCode", [], "any", false, false, false, 26)], 26, $context, $this->getSourceContext());
                echo "
                    </td>
                    <td>
                        <div class=\"ui right floated buttons\">
                            ";
                // line 30
                echo twig_call_macro($macros["buttons"], "macro_show", [$this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_order_show", ["id" => twig_get_attribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 30)])], 30, $context, $this->getSourceContext());
                echo "
                        </div>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "            </tbody>
        </table>
    ";
        } else {
            // line 38
            echo "        ";
            echo twig_call_macro($macros["messages"], "macro_info", ["sylius.ui.no_results_to_display"], 38, $context, $this->getSourceContext());
            echo "
    ";
        }
        // line 40
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Dashboard/_orders.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 40,  125 => 38,  120 => 35,  109 => 30,  102 => 26,  96 => 23,  90 => 20,  86 => 19,  82 => 17,  78 => 16,  71 => 12,  67 => 11,  63 => 10,  59 => 8,  57 => 7,  52 => 5,  49 => 4,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/messages.html.twig' as messages %}
{% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}
{% import \"@SyliusAdmin/Common/Macro/money.html.twig\" as money %}

<h3 class=\"ui top attached header\">{{ 'sylius.ui.new_orders'|trans }}</h3>
<div class=\"ui attached segment\">
    {% if orders|length > 0 %}
        <table class=\"ui stackable very basic table\" id=\"orders\">
            <thead>
                <th style=\"color: #ababab;\">{{ 'sylius.ui.order'|trans }}</th>
                <th style=\"color: #ababab;\">{{ 'sylius.ui.items'|trans }}</th>
                <th style=\"color: #ababab;\">{{ 'sylius.ui.total'|trans }}</th>
                <th></th>
            </thead>
            <tbody>
            {% for order in orders %}
                <tr>
                    <td>
                        <strong>{{ order.customer.fullName }}</strong><br>
                        <div style=\"color: #ababab;\">{{ order.customer.email }}</div>
                    </td>
                    <td>
                        {{ order.totalQuantity }}
                    </td>
                    <td>
                        {{ money.format(order.total, order.currencyCode) }}
                    </td>
                    <td>
                        <div class=\"ui right floated buttons\">
                            {{ buttons.show(path('sylius_admin_order_show', {'id': order.id})) }}
                        </div>
                    </td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    {% else %}
        {{ messages.info('sylius.ui.no_results_to_display') }}
    {% endif %}
</div>
", "@SyliusAdmin/Dashboard/_orders.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Dashboard/_orders.html.twig");
    }
}
