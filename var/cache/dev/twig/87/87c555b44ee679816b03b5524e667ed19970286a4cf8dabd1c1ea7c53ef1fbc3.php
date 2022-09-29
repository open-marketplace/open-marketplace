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

/* @SyliusAdmin/Dashboard/Statistics/_template.html.twig */
class __TwigTemplate_c22b3d6e96a13cdfa37e75df5a473bc509d1ae3c176c2e84f95efd1c4d6da3d2 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/Statistics/_template.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/Statistics/_template.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/Dashboard/Statistics/_template.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        list($context["labels"], $context["values"]) =         [twig_get_attribute($this->env, $this->source, (isset($context["sales_summary"]) || array_key_exists("sales_summary", $context) ? $context["sales_summary"] : (function () { throw new RuntimeError('Variable "sales_summary" does not exist.', 3, $this->source); })()), "intervals", [], "any", false, false, false, 3), twig_get_attribute($this->env, $this->source, (isset($context["sales_summary"]) || array_key_exists("sales_summary", $context) ? $context["sales_summary"] : (function () { throw new RuntimeError('Variable "sales_summary" does not exist.', 3, $this->source); })()), "sales", [], "any", false, false, false, 3)];
        // line 4
        echo "
<div class=\"ui grid\">
    <div class=\"column\">
        <div class=\"stats\">
            <div class=\"ui top attached action header\">
                ";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.sales_summary"), "html", null, true);
        echo "
                <div class=\"ui buttons\">
                    <button
                        class=\"ui basic button\"
                        data-stats-button=\"week\"
                        data-stats-url=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_admin_dashboard_statistics", ["channelCode" => twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 14, $this->source); })()), "channel_code", [], "any", false, false, false, 14)]), "html", null, true);
        echo "\">
                        ";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.statistics.2weeks"), "html", null, true);
        echo "
                    </button>
                    <button
                        class=\"ui basic button\"
                        data-stats-button=\"month\"
                        data-stats-url=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_admin_dashboard_statistics", ["channelCode" => twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 20, $this->source); })()), "channel_code", [], "any", false, false, false, 20)]), "html", null, true);
        echo "\">
                        ";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.statistics.month"), "html", null, true);
        echo "
                    </button>
                    <button
                        class=\"ui basic button\"
                        data-stats-button=\"year\"
                        data-stats-url=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_admin_dashboard_statistics", ["channelCode" => twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 26, $this->source); })()), "channel_code", [], "any", false, false, false, 26)]), "html", null, true);
        echo "\">
                        ";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.statistics.year"), "html", null, true);
        echo "
                    </button>
                </div>
            </div>
            <div class=\"ui attached segment spaceless\">
                <div class=\"stats-grid\">
                    <div class=\"stats-column\">
                        <div class=\"ui tiny statistic\">
                            <div id=\"total-sales\" data-stats-summary=\"total_sales\" class=\"value\" style=\"padding-bottom: 10px;\">
                                ";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["statistics"]) || array_key_exists("statistics", $context) ? $context["statistics"] : (function () { throw new RuntimeError('Variable "statistics" does not exist.', 36, $this->source); })()), "total_sales", [], "any", false, false, false, 36), "html", null, true);
        echo "
                            </div>
                            <div class=\"label\">
                                ";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.sales"), "html", null, true);
        echo "
                            </div>
                        </div>
                    </div>
                    <div class=\"stats-column\">
                        <div class=\"ui tiny statistic\">
                            <div id=\"new-orders\" data-stats-summary=\"number_of_new_orders\" class=\"value\" style=\"padding-bottom: 10px;\">
                                ";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["statistics"]) || array_key_exists("statistics", $context) ? $context["statistics"] : (function () { throw new RuntimeError('Variable "statistics" does not exist.', 46, $this->source); })()), "number_of_new_orders", [], "any", false, false, false, 46), "html", null, true);
        echo "
                            </div>
                            <div class=\"label\">
                                ";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.paid_orders"), "html", null, true);
        echo "
                            </div>
                        </div>
                    </div>
                    <div class=\"stats-column\">
                        <div class=\"ui tiny statistic\">
                            <div id=\"new-customers\" data-stats-summary=\"number_of_new_customers\" class=\"value\" style=\"padding-bottom: 10px;\">
                                ";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["statistics"]) || array_key_exists("statistics", $context) ? $context["statistics"] : (function () { throw new RuntimeError('Variable "statistics" does not exist.', 56, $this->source); })()), "number_of_new_customers", [], "any", false, false, false, 56), "html", null, true);
        echo "
                            </div>
                            <div class=\"label\">
                                ";
        // line 59
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.customers"), "html", null, true);
        echo "
                            </div>
                        </div>
                    </div>
                    <div class=\"stats-column\">
                        <div class=\"ui tiny statistic\">
                            <div id=\"average-order-value\" data-stats-summary=\"average_order_value\" class=\"value\" style=\"padding-bottom: 10px;\">
                                ";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["statistics"]) || array_key_exists("statistics", $context) ? $context["statistics"] : (function () { throw new RuntimeError('Variable "statistics" does not exist.', 66, $this->source); })()), "average_order_value", [], "any", false, false, false, 66), "html", null, true);
        echo "
                            </div>
                            <div class=\"label\">
                                ";
        // line 69
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.average_order_value"), "html", null, true);
        echo "
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ";
        // line 75
        if (((isset($context["labels"]) || array_key_exists("labels", $context) ? $context["labels"] : (function () { throw new RuntimeError('Variable "labels" does not exist.', 75, $this->source); })()) && (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 75, $this->source); })()))) {
            // line 76
            echo "                <div class=\"ui bottom attached segment stats-graph\">
                    <button id=\"navigation-prev\"
                            class=\"navigation navigation-prev\"
                            interval=\"year\"
                            data-stats-url=\"";
            // line 80
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_admin_dashboard_statistics", ["channelCode" => twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 80, $this->source); })()), "channel_code", [], "any", false, false, false, 80)]), "html", null, true);
            echo "\">
                        <i class=\"angle left icon\"></i>
                    </button>
                    <canvas
                        id=\"stats-graph\"
                        data-labels=\"";
            // line 85
            echo twig_escape_filter($this->env, json_encode((isset($context["labels"]) || array_key_exists("labels", $context) ? $context["labels"] : (function () { throw new RuntimeError('Variable "labels" does not exist.', 85, $this->source); })())), "html", null, true);
            echo "\"
                        data-values=\"";
            // line 86
            echo twig_escape_filter($this->env, json_encode((isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 86, $this->source); })())), "html", null, true);
            echo "\"
                        data-currency=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getFilter('sylius_currency_symbol')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 87, $this->source); })()), "base_currency_code", [], "any", false, false, false, 87)), "html", null, true);
            echo "\">
                    </canvas>
                    <button id=\"navigation-next\"
                            class=\"navigation navigation-next\"
                            interval=\"year\"
                            data-stats-url=\"";
            // line 92
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_admin_dashboard_statistics", ["channelCode" => twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 92, $this->source); })()), "channel_code", [], "any", false, false, false, 92)]), "html", null, true);
            echo "\">
                        <i class=\"angle right icon\"></i>
                    </button>
                </div>
            ";
        }
        // line 97
        echo "            <div class=\"ui inverted dimmer stats-loader\">
                <div class=\"ui loader\"></div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Dashboard/Statistics/_template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 97,  200 => 92,  192 => 87,  188 => 86,  184 => 85,  176 => 80,  170 => 76,  168 => 75,  159 => 69,  153 => 66,  143 => 59,  137 => 56,  127 => 49,  121 => 46,  111 => 39,  105 => 36,  93 => 27,  89 => 26,  81 => 21,  77 => 20,  69 => 15,  65 => 14,  57 => 9,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusAdmin/Common/Macro/money.html.twig\" as money %}

{% set labels, values = sales_summary.intervals, sales_summary.sales %}

<div class=\"ui grid\">
    <div class=\"column\">
        <div class=\"stats\">
            <div class=\"ui top attached action header\">
                {{ 'sylius.ui.sales_summary'|trans }}
                <div class=\"ui buttons\">
                    <button
                        class=\"ui basic button\"
                        data-stats-button=\"week\"
                        data-stats-url=\"{{ url('sylius_admin_dashboard_statistics', {channelCode: channel.channel_code}) }}\">
                        {{ 'sylius.ui.statistics.2weeks'|trans }}
                    </button>
                    <button
                        class=\"ui basic button\"
                        data-stats-button=\"month\"
                        data-stats-url=\"{{ url('sylius_admin_dashboard_statistics', {channelCode: channel.channel_code}) }}\">
                        {{ 'sylius.ui.statistics.month'|trans }}
                    </button>
                    <button
                        class=\"ui basic button\"
                        data-stats-button=\"year\"
                        data-stats-url=\"{{ url('sylius_admin_dashboard_statistics', {channelCode: channel.channel_code}) }}\">
                        {{ 'sylius.ui.statistics.year'|trans }}
                    </button>
                </div>
            </div>
            <div class=\"ui attached segment spaceless\">
                <div class=\"stats-grid\">
                    <div class=\"stats-column\">
                        <div class=\"ui tiny statistic\">
                            <div id=\"total-sales\" data-stats-summary=\"total_sales\" class=\"value\" style=\"padding-bottom: 10px;\">
                                {{ statistics.total_sales }}
                            </div>
                            <div class=\"label\">
                                {{ 'sylius.ui.sales'|trans }}
                            </div>
                        </div>
                    </div>
                    <div class=\"stats-column\">
                        <div class=\"ui tiny statistic\">
                            <div id=\"new-orders\" data-stats-summary=\"number_of_new_orders\" class=\"value\" style=\"padding-bottom: 10px;\">
                                {{ statistics.number_of_new_orders }}
                            </div>
                            <div class=\"label\">
                                {{ 'sylius.ui.paid_orders'|trans }}
                            </div>
                        </div>
                    </div>
                    <div class=\"stats-column\">
                        <div class=\"ui tiny statistic\">
                            <div id=\"new-customers\" data-stats-summary=\"number_of_new_customers\" class=\"value\" style=\"padding-bottom: 10px;\">
                                {{ statistics.number_of_new_customers }}
                            </div>
                            <div class=\"label\">
                                {{ 'sylius.ui.customers'|trans }}
                            </div>
                        </div>
                    </div>
                    <div class=\"stats-column\">
                        <div class=\"ui tiny statistic\">
                            <div id=\"average-order-value\" data-stats-summary=\"average_order_value\" class=\"value\" style=\"padding-bottom: 10px;\">
                                {{ statistics.average_order_value }}
                            </div>
                            <div class=\"label\">
                                {{ 'sylius.ui.average_order_value'|trans }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {% if labels and values %}
                <div class=\"ui bottom attached segment stats-graph\">
                    <button id=\"navigation-prev\"
                            class=\"navigation navigation-prev\"
                            interval=\"year\"
                            data-stats-url=\"{{ url('sylius_admin_dashboard_statistics', {channelCode: channel.channel_code}) }}\">
                        <i class=\"angle left icon\"></i>
                    </button>
                    <canvas
                        id=\"stats-graph\"
                        data-labels=\"{{ labels|json_encode() }}\"
                        data-values=\"{{ values|json_encode() }}\"
                        data-currency=\"{{ channel.base_currency_code|sylius_currency_symbol }}\">
                    </canvas>
                    <button id=\"navigation-next\"
                            class=\"navigation navigation-next\"
                            interval=\"year\"
                            data-stats-url=\"{{ url('sylius_admin_dashboard_statistics', {channelCode: channel.channel_code}) }}\">
                        <i class=\"angle right icon\"></i>
                    </button>
                </div>
            {% endif %}
            <div class=\"ui inverted dimmer stats-loader\">
                <div class=\"ui loader\"></div>
            </div>
        </div>
    </div>
</div>
", "@SyliusAdmin/Dashboard/Statistics/_template.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Dashboard/Statistics/_template.html.twig");
    }
}
