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

/* @SyliusShop/Account/dashboard.html.twig */
class __TwigTemplate_2ff3f704bec61f709c3c41ed5c08ad511bf566225c8c82e1655e9501c4a7e0a7 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'breadcrumb' => [$this, 'block_breadcrumb'],
            'subcontent' => [$this, 'block_subcontent'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@SyliusShop/Account/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Account/dashboard.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Account/dashboard.html.twig"));

        $this->parent = $this->loadTemplate("@SyliusShop/Account/layout.html.twig", "@SyliusShop/Account/dashboard.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.my_account"), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_breadcrumb($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "breadcrumb"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "breadcrumb"));

        // line 6
        echo "    <div class=\"ui breadcrumb\">
        <a href=\"";
        // line 7
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_homepage");
        echo "\" class=\"section\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.home"), "html", null, true);
        echo "</a>
        <div class=\"divider\"> / </div>
        <div class=\"active section\">";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.my_account"), "html", null, true);
        echo "</div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 13
    public function block_subcontent($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "subcontent"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "subcontent"));

        // line 14
        echo "    <h1 class=\"ui dividing header\">
        ";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.my_account"), "html", null, true);
        echo "
        <div class=\"sub header\">";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.manage_your_personal_information_and_preferences"), "html", null, true);
        echo "</div>
    </h1>

    ";
        // line 19
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.account.dashboard.after_content_header", ["customer" => (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 19, $this->source); })())]);
        echo "

    <div class=\"ui large list\" id=\"customer-information\" ";
        // line 21
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("customer-information");
        echo ">
        <div class=\"item\">
            ";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 23, $this->source); })()), "fullName", [], "any", false, false, false, 23), "html", null, true);
        echo "
        </div>
        <div class=\"item\">
            <strong>
                ";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 27, $this->source); })()), "email", [], "any", false, false, false, 27), "html", null, true);
        echo "
            </strong>
        </div>
        <div class=\"item\">
            ";
        // line 31
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 31, $this->source); })()), "user", [], "any", false, false, false, 31), "verified", [], "any", false, false, false, 31)) {
            // line 32
            echo "                <span class=\"ui icon green basic label\"><i class=\"checkmark icon\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.verified"), "html", null, true);
            echo "</span>
            ";
        } else {
            // line 34
            echo "                <span class=\"ui icon red basic label\"><i class=\"remove icon\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.not_verified"), "html", null, true);
            echo "</span>
            ";
        }
        // line 36
        echo "        </div>
    </div>

    ";
        // line 39
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.account.dashboard.after_information", ["customer" => (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 39, $this->source); })())]);
        echo "

    <div class=\"ui text menu\">
        <a href=\"";
        // line 42
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_account_profile_update");
        echo "\" class=\"item\"><i class=\"pencil icon\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.edit"), "html", null, true);
        echo "</a>
        <a href=\"";
        // line 43
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_account_change_password");
        echo "\" class=\"item\"><i class=\"lock icon\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.change_password"), "html", null, true);
        echo "</a>
        ";
        // line 44
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 44, $this->source); })()), "user", [], "any", false, false, false, 44), "verified", [], "any", false, false, false, 44)) {
            // line 45
            echo "            <form class=\"item\" id=\"verification-form\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("verification-form");
            echo " action=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_user_request_verification_token");
            echo "\" method=\"post\">
                <button type=\"submit\" class=\"ui basic icon mini button\" ";
            // line 46
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("verification-button");
            echo ">
                    <i class=\"checkmark icon\"></i> ";
            // line 47
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.verify"), "html", null, true);
            echo "
                </button>
            </form>
        ";
        }
        // line 51
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Account/dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 51,  211 => 47,  207 => 46,  200 => 45,  198 => 44,  192 => 43,  186 => 42,  180 => 39,  175 => 36,  169 => 34,  163 => 32,  161 => 31,  154 => 27,  147 => 23,  142 => 21,  137 => 19,  131 => 16,  127 => 15,  124 => 14,  114 => 13,  101 => 9,  94 => 7,  91 => 6,  81 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@SyliusShop/Account/layout.html.twig' %}

{% block title %}{{ 'sylius.ui.my_account'|trans }} | {{ parent() }}{% endblock %}

{% block breadcrumb %}
    <div class=\"ui breadcrumb\">
        <a href=\"{{ path('sylius_shop_homepage') }}\" class=\"section\">{{ 'sylius.ui.home'|trans }}</a>
        <div class=\"divider\"> / </div>
        <div class=\"active section\">{{ 'sylius.ui.my_account'|trans }}</div>
    </div>
{% endblock %}

{% block subcontent %}
    <h1 class=\"ui dividing header\">
        {{ 'sylius.ui.my_account'|trans }}
        <div class=\"sub header\">{{ 'sylius.ui.manage_your_personal_information_and_preferences'|trans }}</div>
    </h1>

    {{ sylius_template_event('sylius.shop.account.dashboard.after_content_header', {'customer': customer}) }}

    <div class=\"ui large list\" id=\"customer-information\" {{ sylius_test_html_attribute('customer-information') }}>
        <div class=\"item\">
            {{ customer.fullName }}
        </div>
        <div class=\"item\">
            <strong>
                {{ customer.email }}
            </strong>
        </div>
        <div class=\"item\">
            {% if customer.user.verified %}
                <span class=\"ui icon green basic label\"><i class=\"checkmark icon\"></i> {{ 'sylius.ui.verified'|trans }}</span>
            {% else %}
                <span class=\"ui icon red basic label\"><i class=\"remove icon\"></i> {{ 'sylius.ui.not_verified'|trans }}</span>
            {% endif %}
        </div>
    </div>

    {{ sylius_template_event('sylius.shop.account.dashboard.after_information', {'customer': customer}) }}

    <div class=\"ui text menu\">
        <a href=\"{{ path('sylius_shop_account_profile_update') }}\" class=\"item\"><i class=\"pencil icon\"></i> {{ 'sylius.ui.edit'|trans }}</a>
        <a href=\"{{ path('sylius_shop_account_change_password') }}\" class=\"item\"><i class=\"lock icon\"></i> {{ 'sylius.ui.change_password'|trans }}</a>
        {% if not customer.user.verified %}
            <form class=\"item\" id=\"verification-form\" {{ sylius_test_html_attribute('verification-form') }} action=\"{{ path('sylius_shop_user_request_verification_token') }}\" method=\"post\">
                <button type=\"submit\" class=\"ui basic icon mini button\" {{ sylius_test_html_attribute('verification-button') }}>
                    <i class=\"checkmark icon\"></i> {{ 'sylius.ui.verify'|trans }}
                </button>
            </form>
        {% endif %}
    </div>
{% endblock %}
", "@SyliusShop/Account/dashboard.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Account/dashboard.html.twig");
    }
}
