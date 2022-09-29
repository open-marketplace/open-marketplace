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

/* @SyliusShop/Account/AddressBook/_defaultAddress.html.twig */
class __TwigTemplate_a515ed04f305bf39054f256054093c8542a7027ace28e84408724beacf72f8f3 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Account/AddressBook/_defaultAddress.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Account/AddressBook/_defaultAddress.html.twig"));

        // line 1
        $macros["buttons"] = $this->macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusShop/Account/AddressBook/_defaultAddress.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"ui top attached styled header\">";
        // line 3
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.your_default_address"), "html", null, true);
        echo "</div>
<div class=\"ui attached segment\" id=\"sylius-default-address\" ";
        // line 4
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("default-address");
        echo ">
    <div class=\"ui stackable two column grid\" ";
        // line 5
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("address", twig_sprintf("%s %s", twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 5, $this->source); })()), "firstName", [], "any", false, false, false, 5), twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 5, $this->source); })()), "lastName", [], "any", false, false, false, 5)));
        echo ">
        <div class=\"column\">
            ";
        // line 7
        $this->loadTemplate("@SyliusShop/Common/_address.html.twig", "@SyliusShop/Account/AddressBook/_defaultAddress.html.twig", 7)->display(twig_array_merge($context, ["address" => (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 7, $this->source); })())]));
        // line 8
        echo "        </div>
        <div class=\"right aligned column\">
            <div class=\"ui vertical icon labeled buttons\">
                <div ";
        // line 11
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("edit-button");
        echo ">";
        echo twig_call_macro($macros["buttons"], "macro_edit", [$this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_account_address_book_update", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 11, $this->source); })()), "id", [], "any", false, false, false, 11)])], 11, $context, $this->getSourceContext());
        echo "</div>
                ";
        // line 12
        echo twig_call_macro($macros["buttons"], "macro_delete", [$this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_account_address_book_delete", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12)]), null, true, twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12)], 12, $context, $this->getSourceContext());
        echo "
            </div>
        </div>
    </div>
</div>
<div class=\"ui divider\"></div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Account/AddressBook/_defaultAddress.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 12,  68 => 11,  63 => 8,  61 => 7,  56 => 5,  52 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}

<div class=\"ui top attached styled header\">{{ 'sylius.ui.your_default_address'|trans }}</div>
<div class=\"ui attached segment\" id=\"sylius-default-address\" {{ sylius_test_html_attribute('default-address') }}>
    <div class=\"ui stackable two column grid\" {{ sylius_test_html_attribute('address', \"%s %s\"|format(address.firstName, address.lastName)) }}>
        <div class=\"column\">
            {% include '@SyliusShop/Common/_address.html.twig' with {'address': address} %}
        </div>
        <div class=\"right aligned column\">
            <div class=\"ui vertical icon labeled buttons\">
                <div {{ sylius_test_html_attribute('edit-button') }}>{{ buttons.edit(path('sylius_shop_account_address_book_update', {'id': address.id})) }}</div>
                {{ buttons.delete(path('sylius_shop_account_address_book_delete', {'id': address.id}), null, true, address.id) }}
            </div>
        </div>
    </div>
</div>
<div class=\"ui divider\"></div>
", "@SyliusShop/Account/AddressBook/_defaultAddress.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Account/AddressBook/_defaultAddress.html.twig");
    }
}
