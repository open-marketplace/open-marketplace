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

/* @SyliusShop/Account/AddressBook/index.html.twig */
class __TwigTemplate_56e984c06b04be4ec892d4bd959a6578120d67ca8d96775164535aa276e89d38 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'subcontent' => [$this, 'block_subcontent'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@SyliusShop/Account/AddressBook/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Account/AddressBook/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Account/AddressBook/index.html.twig"));

        // line 3
        $macros["messages"] = $this->macros["messages"] = $this->loadTemplate("@SyliusUi/Macro/messages.html.twig", "@SyliusShop/Account/AddressBook/index.html.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("@SyliusShop/Account/AddressBook/layout.html.twig", "@SyliusShop/Account/AddressBook/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.address_book"), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 7
    public function block_subcontent($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "subcontent"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "subcontent"));

        // line 8
        echo "    <div class=\"ui stackable two column grid\">
        <div class=\"column\">
            <h1 class=\"ui header\">
                ";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.address_book"), "html", null, true);
        echo "
                <div class=\"sub header\">";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.manage_your_saved_addresses"), "html", null, true);
        echo "</div>
            </h1>

            ";
        // line 15
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.account.address_book.index.after_content_header", ["addresses" => (isset($context["addresses"]) || array_key_exists("addresses", $context) ? $context["addresses"] : (function () { throw new RuntimeError('Variable "addresses" does not exist.', 15, $this->source); })())]);
        echo "
        </div>
        <div class=\"middle aligned column\">
            <a href=\"";
        // line 18
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_account_address_book_create");
        echo "\" class=\"ui right floated blue button\"><i class=\"circle plus icon\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.add_address"), "html", null, true);
        echo "</a>

            ";
        // line 20
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.account.address_book.index.after_add_address_button", ["addresses" => (isset($context["addresses"]) || array_key_exists("addresses", $context) ? $context["addresses"] : (function () { throw new RuntimeError('Variable "addresses" does not exist.', 20, $this->source); })())]);
        echo "
        </div>
    </div>

    ";
        // line 24
        if ((twig_length_filter($this->env, (isset($context["addresses"]) || array_key_exists("addresses", $context) ? $context["addresses"] : (function () { throw new RuntimeError('Variable "addresses" does not exist.', 24, $this->source); })())) > 0)) {
            // line 25
            echo "        ";
            $context["default_address"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sylius"]) || array_key_exists("sylius", $context) ? $context["sylius"] : (function () { throw new RuntimeError('Variable "sylius" does not exist.', 25, $this->source); })()), "customer", [], "any", false, false, false, 25), "defaultAddress", [], "any", false, false, false, 25);
            // line 26
            echo "        ";
            if ( !(null === (isset($context["default_address"]) || array_key_exists("default_address", $context) ? $context["default_address"] : (function () { throw new RuntimeError('Variable "default_address" does not exist.', 26, $this->source); })()))) {
                // line 27
                echo "            ";
                $this->loadTemplate("@SyliusShop/Account/AddressBook/_defaultAddress.html.twig", "@SyliusShop/Account/AddressBook/index.html.twig", 27)->display(twig_array_merge($context, ["address" => (isset($context["default_address"]) || array_key_exists("default_address", $context) ? $context["default_address"] : (function () { throw new RuntimeError('Variable "default_address" does not exist.', 27, $this->source); })())]));
                // line 28
                echo "        ";
            }
            // line 29
            echo "    <div class=\"ui stackable grid\" id=\"sylius-addresses\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("addresses");
            echo ">
        ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_array_filter($this->env, (isset($context["addresses"]) || array_key_exists("addresses", $context) ? $context["addresses"] : (function () { throw new RuntimeError('Variable "addresses" does not exist.', 30, $this->source); })()), function ($__address__) use ($context, $macros) { $context["address"] = $__address__; return ((null === (isset($context["default_address"]) || array_key_exists("default_address", $context) ? $context["default_address"] : (function () { throw new RuntimeError('Variable "default_address" does not exist.', 30, $this->source); })())) || (twig_get_attribute($this->env, $this->source, $context["address"], "id", [], "any", false, false, false, 30) != twig_get_attribute($this->env, $this->source, (isset($context["default_address"]) || array_key_exists("default_address", $context) ? $context["default_address"] : (function () { throw new RuntimeError('Variable "default_address" does not exist.', 30, $this->source); })()), "id", [], "any", false, false, false, 30))); }));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
                // line 31
                echo "            ";
                $this->loadTemplate("@SyliusShop/Account/AddressBook/_item.html.twig", "@SyliusShop/Account/AddressBook/index.html.twig", 31)->display($context);
                // line 32
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "    </div>
    ";
        } else {
            // line 35
            echo "        ";
            echo twig_call_macro($macros["messages"], "macro_info", ["sylius.ui.you_have_no_addresses_defined"], 35, $context, $this->getSourceContext());
            echo "
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Account/AddressBook/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 35,  181 => 33,  167 => 32,  164 => 31,  147 => 30,  142 => 29,  139 => 28,  136 => 27,  133 => 26,  130 => 25,  128 => 24,  121 => 20,  114 => 18,  108 => 15,  102 => 12,  98 => 11,  93 => 8,  83 => 7,  62 => 5,  51 => 1,  49 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@SyliusShop/Account/AddressBook/layout.html.twig' %}

{% import '@SyliusUi/Macro/messages.html.twig' as messages %}

{% block title %}{{ 'sylius.ui.address_book'|trans }} | {{ parent() }}{% endblock %}

{% block subcontent %}
    <div class=\"ui stackable two column grid\">
        <div class=\"column\">
            <h1 class=\"ui header\">
                {{ 'sylius.ui.address_book'|trans }}
                <div class=\"sub header\">{{ 'sylius.ui.manage_your_saved_addresses'|trans }}</div>
            </h1>

            {{ sylius_template_event('sylius.shop.account.address_book.index.after_content_header', {'addresses': addresses}) }}
        </div>
        <div class=\"middle aligned column\">
            <a href=\"{{ path('sylius_shop_account_address_book_create') }}\" class=\"ui right floated blue button\"><i class=\"circle plus icon\"></i> {{ 'sylius.ui.add_address'|trans }}</a>

            {{ sylius_template_event('sylius.shop.account.address_book.index.after_add_address_button', {'addresses': addresses}) }}
        </div>
    </div>

    {% if addresses|length > 0 %}
        {% set default_address = (sylius.customer.defaultAddress) %}
        {% if default_address is not null %}
            {% include '@SyliusShop/Account/AddressBook/_defaultAddress.html.twig' with {'address': default_address} %}
        {% endif %}
    <div class=\"ui stackable grid\" id=\"sylius-addresses\" {{ sylius_test_html_attribute('addresses') }}>
        {% for address in addresses|filter(address => default_address is null or address.id != default_address.id) %}
            {% include '@SyliusShop/Account/AddressBook/_item.html.twig' %}
        {% endfor %}
    </div>
    {% else %}
        {{ messages.info('sylius.ui.you_have_no_addresses_defined') }}
    {% endif %}
{% endblock %}
", "@SyliusShop/Account/AddressBook/index.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Account/AddressBook/index.html.twig");
    }
}
