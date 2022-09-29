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

/* @SyliusShop/Common/_address.html.twig */
class __TwigTemplate_d2cc1932ba4799d06e86f294bff939678b9a4a64b47ebfade6beb195282a298b extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/_address.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/_address.html.twig"));

        // line 1
        $macros["flags"] = $this->macros["flags"] = $this->loadTemplate("@SyliusUi/Macro/flags.html.twig", "@SyliusShop/Common/_address.html.twig", 1)->unwrap();
        // line 2
        echo "
<address ";
        // line 3
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("address-context", twig_sprintf("%s %s", twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 3, $this->source); })()), "firstName", [], "any", false, false, false, 3), twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 3, $this->source); })()), "lastName", [], "any", false, false, false, 3)));
        echo ">
    ";
        // line 4
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 4, $this->source); })()), "company", [], "any", false, false, false, 4))) {
            // line 5
            echo "        <strong>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 5, $this->source); })()), "company", [], "any", false, false, false, 5), "html", null, true);
            echo "</strong><br>
    ";
        }
        // line 7
        echo "    <strong ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("full-name ", twig_sprintf("%s %s", twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 7, $this->source); })()), "firstName", [], "any", false, false, false, 7), twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 7, $this->source); })()), "lastName", [], "any", false, false, false, 7)));
        echo ">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 7, $this->source); })()), "firstName", [], "any", false, false, false, 7), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 7, $this->source); })()), "lastName", [], "any", false, false, false, 7), "html", null, true);
        echo "</strong><br>
    ";
        // line 8
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 8, $this->source); })()), "phoneNumber", [], "any", false, false, false, 8))) {
            // line 9
            echo "        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 9, $this->source); })()), "phoneNumber", [], "any", false, false, false, 9), "html", null, true);
            echo "<br/>
    ";
        }
        // line 11
        echo "    ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 11, $this->source); })()), "street", [], "any", false, false, false, 11), "html", null, true);
        echo "<br/>
    ";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 12, $this->source); })()), "city", [], "any", false, false, false, 12), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 12, $this->source); })()), "postcode", [], "any", false, false, false, 12), "html", null, true);
        echo "<br/>
    ";
        // line 13
        if ( !twig_test_empty($this->env->getFilter('sylius_province_name')->getCallable()((isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 13, $this->source); })())))) {
            // line 14
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getFilter('sylius_province_name')->getCallable()((isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 14, $this->source); })())), "html", null, true);
            echo "<br/>
    ";
        }
        // line 16
        echo "    ";
        echo twig_call_macro($macros["flags"], "macro_fromCountryCode", [twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 16, $this->source); })()), "countryCode", [], "any", false, false, false, 16)], 16, $context, $this->getSourceContext());
        echo "
    ";
        // line 17
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->extensions['Sylius\Bundle\AddressingBundle\Twig\CountryNameExtension']->translateCountryIsoCode(twig_get_attribute($this->env, $this->source, (isset($context["address"]) || array_key_exists("address", $context) ? $context["address"] : (function () { throw new RuntimeError('Variable "address" does not exist.', 17, $this->source); })()), "countryCode", [], "any", false, false, false, 17))), "html", null, true);
        echo "
</address>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Common/_address.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 17,  96 => 16,  90 => 14,  88 => 13,  82 => 12,  77 => 11,  71 => 9,  69 => 8,  60 => 7,  54 => 5,  52 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusUi/Macro/flags.html.twig\" as flags %}

<address {{ sylius_test_html_attribute('address-context', \"%s %s\"|format(address.firstName, address.lastName)) }}>
    {% if address.company is not null %}
        <strong>{{ address.company }}</strong><br>
    {% endif %}
    <strong {{ sylius_test_html_attribute('full-name ', \"%s %s\"|format(address.firstName, address.lastName)) }}>{{ address.firstName }} {{ address.lastName }}</strong><br>
    {% if address.phoneNumber is not null %}
        {{ address.phoneNumber }}<br/>
    {% endif %}
    {{ address.street }}<br/>
    {{ address.city }}, {{ address.postcode }}<br/>
    {% if address|sylius_province_name is not empty %}
        {{ address|sylius_province_name }}<br/>
    {% endif %}
    {{ flags.fromCountryCode(address.countryCode) }}
    {{ address.countryCode|sylius_country_name|upper }}
</address>
", "@SyliusShop/Common/_address.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Common/_address.html.twig");
    }
}
