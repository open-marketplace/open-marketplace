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

/* @SyliusAdmin/Customer/Show/Statistics/_perChannel.html.twig */
class __TwigTemplate_8f14112cfa590d4103f6e9c7bb94928bf716c751b3da75dd2586bcd73d33395b extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Customer/Show/Statistics/_perChannel.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Customer/Show/Statistics/_perChannel.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/Customer/Show/Statistics/_perChannel.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"title";
        // line 3
        if (twig_get_attribute($this->env, $this->source, (isset($context["loop"]) || array_key_exists("loop", $context) ? $context["loop"] : (function () { throw new RuntimeError('Variable "loop" does not exist.', 3, $this->source); })()), "first", [], "any", false, false, false, 3)) {
            echo " active";
        }
        echo "\">
    <i class=\"dropdown icon\"></i>
    ";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 5, $this->source); })()), "channel", [], "any", false, false, false, 5), "name", [], "any", false, false, false, 5), "html", null, true);
        echo "
</div>
<div class=\"content";
        // line 7
        if (twig_get_attribute($this->env, $this->source, (isset($context["loop"]) || array_key_exists("loop", $context) ? $context["loop"] : (function () { throw new RuntimeError('Variable "loop" does not exist.', 7, $this->source); })()), "first", [], "any", false, false, false, 7)) {
            echo " active";
        }
        echo "\">
    <div class=\"ui center aligned stackable divided grid\">
        <div class=\"four column row\">
            <div class=\"column middle aligned\">
                <div class=\"ui tiny statistic\">
                    <div class=\"value sylius-channel-name\">
                        ";
        // line 13
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 13, $this->source); })()), "channel", [], "any", false, false, false, 13), "color", [], "any", false, false, false, 13))) {
            // line 14
            echo "                            <span class=\"ui large empty horizontal circular label\" style=\"background-color: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 14, $this->source); })()), "channel", [], "any", false, false, false, 14), "color", [], "any", false, false, false, 14), "html", null, true);
            echo "\"></span>
                        ";
        }
        // line 16
        echo "                        ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 16, $this->source); })()), "channel", [], "any", false, false, false, 16), "name", [], "any", false, false, false, 16), "html", null, true);
        echo "
                    </div>
                    <div class=\"label\">
                        ";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.channel"), "html", null, true);
        echo "
                    </div>
                </div>
            </div>
            <div class=\"column middle aligned\">
                <div class=\"ui statistic\">
                    <div class=\"value sylius-orders-count\">
                        ";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 26, $this->source); })()), "ordersCount", [], "any", false, false, false, 26), "html", null, true);
        echo "
                    </div>
                    <div class=\"label\">
                        ";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.orders"), "html", null, true);
        echo "
                    </div>
                </div>
            </div>
            <div class=\"column middle aligned\">
                <div class=\"ui statistic\">
                    <div class=\"value sylius-orders-total\">
                        ";
        // line 36
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 36, $this->source); })()), "ordersValue", [], "any", false, false, false, 36), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 36, $this->source); })()), "channel", [], "any", false, false, false, 36), "baseCurrency", [], "any", false, false, false, 36), "code", [], "any", false, false, false, 36)], 36, $context, $this->getSourceContext());
        echo "
                    </div>
                    <div class=\"label\">
                        ";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.total_value_of_orders"), "html", null, true);
        echo "
                    </div>
                </div>
            </div>
            <div class=\"column middle aligned\">
                <div class=\"ui statistic\">
                    <div class=\"value sylius-average-order-value\">
                        ";
        // line 46
        echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 46, $this->source); })()), "averageOrderValue", [], "any", false, false, false, 46), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["statistic"]) || array_key_exists("statistic", $context) ? $context["statistic"] : (function () { throw new RuntimeError('Variable "statistic" does not exist.', 46, $this->source); })()), "channel", [], "any", false, false, false, 46), "baseCurrency", [], "any", false, false, false, 46), "code", [], "any", false, false, false, 46)], 46, $context, $this->getSourceContext());
        echo "
                    </div>
                    <div class=\"label\">
                        ";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.average_order_value"), "html", null, true);
        echo "
                    </div>
                </div>
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
        return "@SyliusAdmin/Customer/Show/Statistics/_perChannel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 49,  128 => 46,  118 => 39,  112 => 36,  102 => 29,  96 => 26,  86 => 19,  79 => 16,  73 => 14,  71 => 13,  60 => 7,  55 => 5,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusAdmin/Common/Macro/money.html.twig' as money %}

<div class=\"title{% if loop.first %} active{% endif %}\">
    <i class=\"dropdown icon\"></i>
    {{ statistic.channel.name }}
</div>
<div class=\"content{% if loop.first %} active{% endif %}\">
    <div class=\"ui center aligned stackable divided grid\">
        <div class=\"four column row\">
            <div class=\"column middle aligned\">
                <div class=\"ui tiny statistic\">
                    <div class=\"value sylius-channel-name\">
                        {% if statistic.channel.color is not empty %}
                            <span class=\"ui large empty horizontal circular label\" style=\"background-color: {{ statistic.channel.color }}\"></span>
                        {% endif %}
                        {{ statistic.channel.name }}
                    </div>
                    <div class=\"label\">
                        {{ 'sylius.ui.channel'|trans }}
                    </div>
                </div>
            </div>
            <div class=\"column middle aligned\">
                <div class=\"ui statistic\">
                    <div class=\"value sylius-orders-count\">
                        {{ statistic.ordersCount }}
                    </div>
                    <div class=\"label\">
                        {{ 'sylius.ui.orders'|trans }}
                    </div>
                </div>
            </div>
            <div class=\"column middle aligned\">
                <div class=\"ui statistic\">
                    <div class=\"value sylius-orders-total\">
                        {{ money.format(statistic.ordersValue, statistic.channel.baseCurrency.code) }}
                    </div>
                    <div class=\"label\">
                        {{ 'sylius.ui.total_value_of_orders'|trans }}
                    </div>
                </div>
            </div>
            <div class=\"column middle aligned\">
                <div class=\"ui statistic\">
                    <div class=\"value sylius-average-order-value\">
                        {{ money.format(statistic.averageOrderValue, statistic.channel.baseCurrency.code) }}
                    </div>
                    <div class=\"label\">
                        {{ 'sylius.ui.average_order_value'|trans }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
", "@SyliusAdmin/Customer/Show/Statistics/_perChannel.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Customer/Show/Statistics/_perChannel.html.twig");
    }
}
