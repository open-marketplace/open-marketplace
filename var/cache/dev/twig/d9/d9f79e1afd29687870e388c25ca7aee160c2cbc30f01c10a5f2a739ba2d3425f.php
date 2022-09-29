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

/* @SyliusShop/Account/Order/Show/_header.html.twig */
class __TwigTemplate_59e003da447b937c0c2db6a0788af0b97108164cf290def45c8f8bfcf2b1dd6c extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Account/Order/Show/_header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Account/Order/Show/_header.html.twig"));

        // line 1
        $macros["buttons"] = $this->macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusShop/Account/Order/Show/_header.html.twig", 1)->unwrap();
        // line 2
        $macros["flags"] = $this->macros["flags"] = $this->loadTemplate("@SyliusUi/Macro/flags.html.twig", "@SyliusShop/Account/Order/Show/_header.html.twig", 2)->unwrap();
        // line 3
        echo "
<h1 class=\"ui header\">
    <i class=\"circular cart icon\"></i>
    <div class=\"content\">
        ";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.order"), "html", null, true);
        echo " #";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 7, $this->source); })()), "number", [], "any", false, false, false, 7), "html", null, true);
        echo "
        <div class=\"sub header\">
            <div class=\"ui horizontal divided list\">
                <div class=\"item\">
                    ";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDate($this->env, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 11, $this->source); })()), "checkoutCompletedAt", [], "any", false, false, false, 11)), "html", null, true);
        echo "
                </div>
                <div class=\"item\">
                    ";
        // line 14
        $this->loadTemplate([0 => ((("@SyliusShop/Account/Order/Label/State" . "/") . twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 14, $this->source); })()), "state", [], "any", false, false, false, 14)) . ".html.twig"), 1 => "@SyliusUi/Label/_default.html.twig"], "@SyliusShop/Account/Order/Show/_header.html.twig", 14)->display(twig_array_merge($context, ["value" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(("sylius.ui." . twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 14, $this->source); })()), "state", [], "any", false, false, false, 14)))]));
        // line 15
        echo "                </div>
                <div class=\"item\">
                    ";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 17, $this->source); })()), "currencyCode", [], "any", false, false, false, 17), "html", null, true);
        echo "
                </div>
                <div class=\"item\">
                    ";
        // line 20
        echo twig_call_macro($macros["flags"], "macro_fromLocaleCode", [twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 20, $this->source); })()), "localeCode", [], "any", false, false, false, 20)], 20, $context, $this->getSourceContext());
        echo twig_escape_filter($this->env, $this->env->getFilter('sylius_locale_name')->getCallable()(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 20, $this->source); })()), "localeCode", [], "any", false, false, false, 20)), "html", null, true);
        echo "
                </div>
            </div>
        </div>
    </div>
</h1>

";
        // line 27
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 27, $this->source); })()), "paymentState", [], "any", false, false, false, 27), [0 => "awaiting_payment"])) {
            // line 28
            echo "    ";
            echo twig_call_macro($macros["buttons"], "macro_default", [$this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_order_show", ["tokenValue" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 28, $this->source); })()), "tokenValue", [], "any", false, false, false, 28)]), "sylius.ui.pay", null, "credit card alternative", "fluid blue"], 28, $context, $this->getSourceContext());
            echo "
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Account/Order/Show/_header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 28,  91 => 27,  80 => 20,  74 => 17,  70 => 15,  68 => 14,  62 => 11,  53 => 7,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}
{% import '@SyliusUi/Macro/flags.html.twig' as flags %}

<h1 class=\"ui header\">
    <i class=\"circular cart icon\"></i>
    <div class=\"content\">
        {{ 'sylius.ui.order'|trans }} #{{ order.number }}
        <div class=\"sub header\">
            <div class=\"ui horizontal divided list\">
                <div class=\"item\">
                    {{ order.checkoutCompletedAt|format_date }}
                </div>
                <div class=\"item\">
                    {% include [('@SyliusShop/Account/Order/Label/State' ~ '/' ~ order.state ~ '.html.twig'), '@SyliusUi/Label/_default.html.twig'] with {'value': ('sylius.ui.' ~ order.state)|trans} %}
                </div>
                <div class=\"item\">
                    {{ order.currencyCode }}
                </div>
                <div class=\"item\">
                    {{ flags.fromLocaleCode(order.localeCode) }}{{ order.localeCode|sylius_locale_name }}
                </div>
            </div>
        </div>
    </div>
</h1>

{% if order.paymentState in ['awaiting_payment'] %}
    {{ buttons.default(path('sylius_shop_order_show', {'tokenValue': order.tokenValue}), 'sylius.ui.pay', null, 'credit card alternative', 'fluid blue') }}
{% endif %}
", "@SyliusShop/Account/Order/Show/_header.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Account/Order/Show/_header.html.twig");
    }
}
