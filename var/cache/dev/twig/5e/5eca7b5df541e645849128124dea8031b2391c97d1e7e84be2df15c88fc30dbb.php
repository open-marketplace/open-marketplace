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

/* @SyliusAdmin/CatalogPromotion/Show/Action/fixed_discount.html.twig */
class __TwigTemplate_777aad9258c710763e0343403ba8c572277f9c116d0bf43435a5b71621cc3d8a extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/Show/Action/fixed_discount.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/Show/Action/fixed_discount.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusAdmin/Common/Macro/money.html.twig", "@SyliusAdmin/CatalogPromotion/Show/Action/fixed_discount.html.twig", 1)->unwrap();
        // line 2
        echo "
<table class=\"ui very basic celled table\">
    <tbody>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.type"), "html", null, true);
        echo "</strong></td>
        <td>";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.fixed_discount"), "html", null, true);
        echo "</td>
    </tr>
    ";
        // line 9
        $context["currencies"] = $this->extensions['Sylius\Bundle\AdminBundle\Twig\ChannelsCurrenciesExtension']->getAllCurrencies();
        // line 10
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 10, $this->source); })()), "configuration", [], "any", false, false, false, 10));
        foreach ($context['_seq'] as $context["channelCode"] => $context["channelConfiguration"]) {
            // line 11
            echo "    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">";
            // line 12
            echo twig_escape_filter($this->env, $context["channelCode"], "html", null, true);
            echo "</strong></td>
        <td ";
            // line 13
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()((("action-" . $context["channelCode"]) . "-amount"));
            echo ">
            ";
            // line 14
            echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, $context["channelConfiguration"], "amount", [], "any", false, false, false, 14), twig_get_attribute($this->env, $this->source, (isset($context["currencies"]) || array_key_exists("currencies", $context) ? $context["currencies"] : (function () { throw new RuntimeError('Variable "currencies" does not exist.', 14, $this->source); })()), $context["channelCode"], [], "array", false, false, false, 14)], 14, $context, $this->getSourceContext());
            echo "
        </td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['channelCode'], $context['channelConfiguration'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    </tbody>
</table>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/CatalogPromotion/Show/Action/fixed_discount.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 18,  78 => 14,  74 => 13,  70 => 12,  67 => 11,  62 => 10,  60 => 9,  55 => 7,  51 => 6,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusAdmin/Common/Macro/money.html.twig\" as money %}

<table class=\"ui very basic celled table\">
    <tbody>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.type'|trans }}</strong></td>
        <td>{{ 'sylius.ui.fixed_discount'|trans }}</td>
    </tr>
    {% set currencies = sylius_channels_currencies() %}
    {% for channelCode, channelConfiguration in action.configuration %}
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">{{ channelCode }}</strong></td>
        <td {{ sylius_test_html_attribute('action-' ~ channelCode ~ '-amount') }}>
            {{ money.format(channelConfiguration.amount, currencies[channelCode]) }}
        </td>
    </tr>
    {% endfor %}
    </tbody>
</table>
", "@SyliusAdmin/CatalogPromotion/Show/Action/fixed_discount.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/CatalogPromotion/Show/Action/fixed_discount.html.twig");
    }
}
