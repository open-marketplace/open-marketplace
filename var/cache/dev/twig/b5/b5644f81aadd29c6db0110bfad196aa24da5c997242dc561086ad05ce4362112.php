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

/* @SyliusAdmin/Dashboard/_customers.html.twig */
class __TwigTemplate_e1e462dff9ddf4aa56dc1e31c9f074bd17d96f7d77842f2eeac39aa521166e97 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_customers.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_customers.html.twig"));

        // line 1
        $macros["messages"] = $this->macros["messages"] = $this->loadTemplate("@SyliusUi/Macro/messages.html.twig", "@SyliusAdmin/Dashboard/_customers.html.twig", 1)->unwrap();
        // line 2
        $macros["buttons"] = $this->macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusAdmin/Dashboard/_customers.html.twig", 2)->unwrap();
        // line 3
        $macros["labels"] = $this->macros["labels"] = $this->loadTemplate("@SyliusUi/Macro/labels.html.twig", "@SyliusAdmin/Dashboard/_customers.html.twig", 3)->unwrap();
        // line 4
        echo "
<h3 class=\"ui top attached header\">";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.new_customers"), "html", null, true);
        echo "</h3>
<div class=\"ui attached segment\">
    ";
        // line 7
        if ((twig_length_filter($this->env, (isset($context["customers"]) || array_key_exists("customers", $context) ? $context["customers"] : (function () { throw new RuntimeError('Variable "customers" does not exist.', 7, $this->source); })())) > 0)) {
            // line 8
            echo "        <table class=\"ui stackable very basic table\" id=\"customers\">
            <thead>
                <th style=\"color: #ababab;\">";
            // line 10
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.name"), "html", null, true);
            echo "</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["customers"]) || array_key_exists("customers", $context) ? $context["customers"] : (function () { throw new RuntimeError('Variable "customers" does not exist.', 15, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["customer"]) {
                // line 16
                echo "                <tr>
                    <td>
                        <strong>";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customer"], "fullName", [], "any", false, false, false, 18), "html", null, true);
                echo "</strong><br>
                        <div style=\"color: #ababab;\">";
                // line 19
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["customer"], "email", [], "any", false, false, false, 19), "html", null, true);
                echo "</div>
                    </td>
                    <td>
                        ";
                // line 22
                if ((null === twig_get_attribute($this->env, $this->source, $context["customer"], "user", [], "any", false, false, false, 22))) {
                    // line 23
                    echo "                            <span class=\"ui icon label\">
                                <i class=\"spy icon\"></i> ";
                    // line 24
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.guest"), "html", null, true);
                    echo "
                            </span>
                        ";
                }
                // line 27
                echo "                    </td>
                    <td>
                        <div class=\"ui right floated buttons\">
                            ";
                // line 30
                echo twig_call_macro($macros["buttons"], "macro_show", [$this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_customer_show", ["id" => twig_get_attribute($this->env, $this->source, $context["customer"], "id", [], "any", false, false, false, 30)])], 30, $context, $this->getSourceContext());
                echo "
                        </div>
                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer'], $context['_parent'], $context['loop']);
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
        return "@SyliusAdmin/Dashboard/_customers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 40,  121 => 38,  116 => 35,  105 => 30,  100 => 27,  94 => 24,  91 => 23,  89 => 22,  83 => 19,  79 => 18,  75 => 16,  71 => 15,  63 => 10,  59 => 8,  57 => 7,  52 => 5,  49 => 4,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/messages.html.twig' as messages %}
{% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}
{% import '@SyliusUi/Macro/labels.html.twig' as labels %}

<h3 class=\"ui top attached header\">{{ 'sylius.ui.new_customers'|trans }}</h3>
<div class=\"ui attached segment\">
    {% if customers|length > 0 %}
        <table class=\"ui stackable very basic table\" id=\"customers\">
            <thead>
                <th style=\"color: #ababab;\">{{ 'sylius.ui.name'|trans }}</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            {% for customer in customers %}
                <tr>
                    <td>
                        <strong>{{ customer.fullName }}</strong><br>
                        <div style=\"color: #ababab;\">{{ customer.email }}</div>
                    </td>
                    <td>
                        {% if customer.user is null %}
                            <span class=\"ui icon label\">
                                <i class=\"spy icon\"></i> {{ 'sylius.ui.guest'|trans }}
                            </span>
                        {% endif %}
                    </td>
                    <td>
                        <div class=\"ui right floated buttons\">
                            {{ buttons.show(path('sylius_admin_customer_show', {'id': customer.id})) }}
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
", "@SyliusAdmin/Dashboard/_customers.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Dashboard/_customers.html.twig");
    }
}
