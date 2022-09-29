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

/* @SyliusUi/Grid/Body/_table.html.twig */
class __TwigTemplate_b77944d5d617bf946e85608e03668f5e7d7732192d027ec43d9565af77a59fc5 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Grid/Body/_table.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Grid/Body/_table.html.twig"));

        // line 1
        $macros["table"] = $this->macros["table"] = $this->loadTemplate("@SyliusUi/Macro/table.html.twig", "@SyliusUi/Grid/Body/_table.html.twig", 1)->unwrap();
        // line 2
        $macros["messages"] = $this->macros["messages"] = $this->loadTemplate("@SyliusUi/Macro/messages.html.twig", "@SyliusUi/Grid/Body/_table.html.twig", 2)->unwrap();
        // line 3
        echo "
";
        // line 4
        if ((twig_length_filter($this->env, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 4, $this->source); })())) > 0)) {
            // line 5
            echo "    <div class=\"ui segment spaceless sylius-grid-table-wrapper\">
        <table class=\"ui sortable stackable very basic celled table\" ";
            // line 6
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("grid-table");
            echo ">
            <thead>
            <tr>
                ";
            // line 9
            echo twig_call_macro($macros["table"], "macro_headers", [(isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 9, $this->source); })()), (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 9, $this->source); })()), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 9, $this->source); })()), "request", [], "any", false, false, false, 9), "attributes", [], "any", false, false, false, 9)], 9, $context, $this->getSourceContext());
            echo "
            </tr>
            </thead>
            <tbody ";
            // line 12
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("grid-table-body");
            echo ">
            ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 13, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                // line 14
                echo "                ";
                echo twig_call_macro($macros["table"], "macro_row", [(isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 14, $this->source); })()), (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 14, $this->source); })()), $context["row"]], 14, $context, $this->getSourceContext());
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "            </tbody>
        </table>
    </div>
";
        } else {
            // line 20
            echo "    ";
            echo twig_call_macro($macros["messages"], "macro_info", ["sylius.ui.no_results_to_display"], 20, $context, $this->getSourceContext());
            echo "
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusUi/Grid/Body/_table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 20,  84 => 16,  75 => 14,  71 => 13,  67 => 12,  61 => 9,  55 => 6,  52 => 5,  50 => 4,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/table.html.twig' as table %}
{% import '@SyliusUi/Macro/messages.html.twig' as messages %}

{% if data|length > 0 %}
    <div class=\"ui segment spaceless sylius-grid-table-wrapper\">
        <table class=\"ui sortable stackable very basic celled table\" {{ sylius_test_html_attribute('grid-table') }}>
            <thead>
            <tr>
                {{ table.headers(grid, definition, app.request.attributes) }}
            </tr>
            </thead>
            <tbody {{ sylius_test_html_attribute('grid-table-body') }}>
            {% for row in data %}
                {{ table.row(grid, definition, row) }}
            {% endfor %}
            </tbody>
        </table>
    </div>
{% else %}
    {{ messages.info('sylius.ui.no_results_to_display') }}
{% endif %}
", "@SyliusUi/Grid/Body/_table.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Grid/Body/_table.html.twig");
    }
}
