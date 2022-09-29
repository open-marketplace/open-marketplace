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

/* @SyliusAdmin/Product/Show/_pricing.html.twig */
class __TwigTemplate_f410249746921ba8969307ce9fe808b8146f04250d565ff9bff9c29ec3e7fcb2 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_pricing.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_pricing.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/Product/Show/_pricing.html.twig", 1)->unwrap();
        // line 2
        echo "<div id=\"pricing\">
    <h4 class=\"ui top attached large header\">";
        // line 3
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.pricing"), "html", null, true);
        echo "</h4>
    <div class=\"ui attached segment\">
        <table id=\"pricing\" class=\"ui very basic celled table\">
            <thead>
                <tr>
                    <th><strong class=\"gray text\">";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.channels"), "html", null, true);
        echo "</strong></th>
                    <th><strong class=\"gray text\">";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.price"), "html", null, true);
        echo "</strong></th>
                    <th><strong class=\"gray text\">";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.original_price"), "html", null, true);
        echo "</strong></th>
                </tr>
            </thead>
            <tbody>
            ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 14, $this->source); })()), "variants", [], "any", false, false, false, 14), "first", [], "any", false, false, false, 14), "channelPricings", [], "any", false, false, false, 14));
        foreach ($context['_seq'] as $context["_key"] => $context["channelPricing"]) {
            // line 15
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 15, $this->source); })()), "channels", [], "any", false, false, false, 15), "first", [], "any", false, false, false, 15) != false)) {
                // line 16
                echo "                    <tr>
                        <td class=\"five wide gray text\">
                            <strong>";
                // line 18
                echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\AdminBundle\Twig\ChannelNameExtension']->getChannelNameByCode(twig_get_attribute($this->env, $this->source, $context["channelPricing"], "channelCode", [], "any", false, false, false, 18)), "html", null, true);
                echo " </strong>
                        </td>
                        <td>";
                // line 20
                echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, $context["channelPricing"], "price", [], "any", false, false, false, 20), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 20, $this->source); })()), "channels", [], "any", false, false, false, 20), "first", [], "any", false, false, false, 20), "baseCurrency", [], "any", false, false, false, 20)], 20, $context, $this->getSourceContext());
                echo "</td>
                        ";
                // line 21
                if ((twig_get_attribute($this->env, $this->source, $context["channelPricing"], "originalPrice", [], "any", false, false, false, 21) != null)) {
                    // line 22
                    echo "                            <td>";
                    echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, $context["channelPricing"], "originalPrice", [], "any", false, false, false, 22), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 22, $this->source); })()), "channels", [], "any", false, false, false, 22), "first", [], "any", false, false, false, 22), "baseCurrency", [], "any", false, false, false, 22)], 22, $context, $this->getSourceContext());
                    echo "</td>
                        ";
                } else {
                    // line 24
                    echo "                            <td>-</td>
                        ";
                }
                // line 26
                echo "                    </tr>
                ";
            }
            // line 28
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channelPricing'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "            </tbody>
        </table>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_pricing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 29,  107 => 28,  103 => 26,  99 => 24,  93 => 22,  91 => 21,  87 => 20,  82 => 18,  78 => 16,  75 => 15,  71 => 14,  64 => 10,  60 => 9,  56 => 8,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusAdmin/Common/Macro/money.html.twig\" as money %}
<div id=\"pricing\">
    <h4 class=\"ui top attached large header\">{{ 'sylius.ui.pricing'|trans }}</h4>
    <div class=\"ui attached segment\">
        <table id=\"pricing\" class=\"ui very basic celled table\">
            <thead>
                <tr>
                    <th><strong class=\"gray text\">{{ 'sylius.ui.channels'|trans }}</strong></th>
                    <th><strong class=\"gray text\">{{ 'sylius.ui.price'|trans }}</strong></th>
                    <th><strong class=\"gray text\">{{ 'sylius.ui.original_price'|trans }}</strong></th>
                </tr>
            </thead>
            <tbody>
            {% for channelPricing in product.variants.first.channelPricings %}
                {% if product.channels.first != false %}
                    <tr>
                        <td class=\"five wide gray text\">
                            <strong>{{ channelPricing.channelCode|sylius_channel_name }} </strong>
                        </td>
                        <td>{{ money.format(channelPricing.price, product.channels.first.baseCurrency) }}</td>
                        {% if channelPricing.originalPrice != null %}
                            <td>{{ money.format(channelPricing.originalPrice, product.channels.first.baseCurrency) }}</td>
                        {% else %}
                            <td>-</td>
                        {% endif %}
                    </tr>
                {% endif %}
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
", "@SyliusAdmin/Product/Show/_pricing.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_pricing.html.twig");
    }
}
