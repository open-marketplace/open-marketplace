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

/* @SyliusAdmin/Dashboard/_chart.html.twig */
class __TwigTemplate_d9f295a96f4e62f7911b285c686279c4031ee38defebab3c2e463f8822648872 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_chart.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_chart.html.twig"));

        // line 1
        @trigger_error("This template is deprecated since Sylius 1.8"." (\"@SyliusAdmin/Dashboard/_chart.html.twig\" at line 1).", E_USER_DEPRECATED);
        // line 2
        list($context["labels"], $context["values"]) =         [twig_get_attribute($this->env, $this->source, (isset($context["sales_summary"]) || array_key_exists("sales_summary", $context) ? $context["sales_summary"] : (function () { throw new RuntimeError('Variable "sales_summary" does not exist.', 2, $this->source); })()), "months", [], "any", false, false, false, 2), twig_get_attribute($this->env, $this->source, (isset($context["sales_summary"]) || array_key_exists("sales_summary", $context) ? $context["sales_summary"] : (function () { throw new RuntimeError('Variable "sales_summary" does not exist.', 2, $this->source); })()), "sales", [], "any", false, false, false, 2)];
        // line 3
        echo "
";
        // line 4
        if (((isset($context["labels"]) || array_key_exists("labels", $context) ? $context["labels"] : (function () { throw new RuntimeError('Variable "labels" does not exist.', 4, $this->source); })()) && (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 4, $this->source); })()))) {
            // line 5
            echo "    <div class=\"ui grid\">
        <div class=\"column\">
            <h3 class=\"ui top attached header\">";
            // line 7
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.sales_summary"), "html", null, true);
            echo "</h3>
            <div class=\"ui attached segment\" style=\"height: 400px;\">
                <canvas id=\"dashboard-chart\" data-labels=\"";
            // line 9
            echo twig_escape_filter($this->env, json_encode((isset($context["labels"]) || array_key_exists("labels", $context) ? $context["labels"] : (function () { throw new RuntimeError('Variable "labels" does not exist.', 9, $this->source); })())), "html", null, true);
            echo "\" data-values=\"";
            echo twig_escape_filter($this->env, json_encode((isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 9, $this->source); })())), "html", null, true);
            echo "\" data-currency=\"";
            echo twig_escape_filter($this->env, $this->env->getFilter('sylius_currency_symbol')->getCallable()((isset($context["currency"]) || array_key_exists("currency", $context) ? $context["currency"] : (function () { throw new RuntimeError('Variable "currency" does not exist.', 9, $this->source); })())), "html", null, true);
            echo "\"></canvas>
            </div>
        </div>
    </div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Dashboard/_chart.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 9,  56 => 7,  52 => 5,  50 => 4,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% deprecated \"This template is deprecated since Sylius 1.8\" %}
{% set labels, values = sales_summary.months, sales_summary.sales %}

{% if labels and values %}
    <div class=\"ui grid\">
        <div class=\"column\">
            <h3 class=\"ui top attached header\">{{ 'sylius.ui.sales_summary'|trans }}</h3>
            <div class=\"ui attached segment\" style=\"height: 400px;\">
                <canvas id=\"dashboard-chart\" data-labels=\"{{ labels|json_encode() }}\" data-values=\"{{ values|json_encode() }}\" data-currency=\"{{ currency|sylius_currency_symbol }}\"></canvas>
            </div>
        </div>
    </div>
{% endif %}
", "@SyliusAdmin/Dashboard/_chart.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Dashboard/_chart.html.twig");
    }
}
