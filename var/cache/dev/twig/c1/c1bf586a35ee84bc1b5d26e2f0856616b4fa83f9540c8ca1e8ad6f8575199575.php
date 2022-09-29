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

/* @SyliusAdmin/Order/Show/_headerItems.html.twig */
class __TwigTemplate_f86e87a89ca642ec1c64388d2b3021ee06be81a33fdecc4f79ee2ff15debb741 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/_headerItems.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/_headerItems.html.twig"));

        // line 1
        $macros["flags"] = $this->macros["flags"] = $this->loadTemplate("@SyliusUi/Macro/flags.html.twig", "@SyliusAdmin/Order/Show/_headerItems.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"item\">
    ";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDateTime($this->env, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 4, $this->source); })()), "checkoutCompletedAt", [], "any", false, false, false, 4)), "html", null, true);
        echo "
</div>
<div class=\"item\" id=\"sylius-order-state\">
    ";
        // line 7
        $this->loadTemplate([0 => ((("@SyliusAdmin/Order/Label/State" . "/") . twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 7, $this->source); })()), "state", [], "any", false, false, false, 7)) . ".html.twig"), 1 => "@SyliusUi/Label/_default.html.twig"], "@SyliusAdmin/Order/Show/_headerItems.html.twig", 7)->display(twig_array_merge($context, ["value" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(("sylius.ui." . twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 7, $this->source); })()), "state", [], "any", false, false, false, 7)))]));
        // line 8
        echo "</div>
<div class=\"item\" id=\"sylius-order-currency\">
    ";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 10, $this->source); })()), "currencyCode", [], "any", false, false, false, 10), "html", null, true);
        echo "
</div>
<div class=\"item\">
    ";
        // line 13
        echo twig_call_macro($macros["flags"], "macro_fromLocaleCode", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 13, $this->source); })()), "localeCode", [], "any", false, false, false, 13)], 13, $context, $this->getSourceContext());
        echo twig_escape_filter($this->env, $this->env->getFilter('sylius_locale_name')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 13, $this->source); })()), "localeCode", [], "any", false, false, false, 13)), "html", null, true);
        echo "
</div>
<div class=\"item\">
    ";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.purchased_from"), "html", null, true);
        echo "
    ";
        // line 17
        $this->loadTemplate("@SyliusAdmin/Common/_channel.html.twig", "@SyliusAdmin/Order/Show/_headerItems.html.twig", 17)->display(twig_array_merge($context, ["channel" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 17, $this->source); })()), "channel", [], "any", false, false, false, 17)]));
        // line 18
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/_headerItems.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 18,  78 => 17,  74 => 16,  67 => 13,  61 => 10,  57 => 8,  55 => 7,  49 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/flags.html.twig' as flags %}

<div class=\"item\">
    {{ order.checkoutCompletedAt|format_datetime }}
</div>
<div class=\"item\" id=\"sylius-order-state\">
    {% include [('@SyliusAdmin/Order/Label/State' ~ '/' ~ order.state ~ '.html.twig'), '@SyliusUi/Label/_default.html.twig'] with {'value': ('sylius.ui.' ~ order.state)|trans} %}
</div>
<div class=\"item\" id=\"sylius-order-currency\">
    {{ order.currencyCode }}
</div>
<div class=\"item\">
    {{ flags.fromLocaleCode(order.localeCode) }}{{ order.localeCode|sylius_locale_name }}
</div>
<div class=\"item\">
    {{ 'sylius.ui.purchased_from'|trans }}
    {% include '@SyliusAdmin/Common/_channel.html.twig' with {'channel': order.channel} %}
</div>
", "@SyliusAdmin/Order/Show/_headerItems.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Show/_headerItems.html.twig");
    }
}
