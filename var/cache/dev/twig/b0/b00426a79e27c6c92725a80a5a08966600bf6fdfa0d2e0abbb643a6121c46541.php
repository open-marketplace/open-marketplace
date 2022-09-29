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

/* @SyliusShop/Login/_login.html.twig */
class __TwigTemplate_7bacc0ab75b2979d2c0a0ff0140afd9dfb6cab087313442976375ca7fad3a8b3 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Login/_login.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Login/_login.html.twig"));

        // line 1
        echo "<h4 class=\"ui dividing header\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.registered_customers"), "html", null, true);
        echo "</h4>
<p>";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.if_you_have_an_account_sign_in_with_your_email_address"), "html", null, true);
        echo ".</p>
";
        // line 3
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_login_check"), "attr" => ["class" => "ui loadable form", "novalidate" => "novalidate"]]);
        echo "
    ";
        // line 4
        $this->loadTemplate("@SyliusShop/Login/_form.html.twig", "@SyliusShop/Login/_login.html.twig", 4)->display($context);
        // line 5
        echo "
    ";
        // line 6
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.login.form", ["form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })())]);
        echo "

    <button type=\"submit\" class=\"ui blue submit button\" ";
        // line 8
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("login-button");
        echo ">
        ";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.login"), "html", null, true);
        echo "
    </button>

    <a href=\"";
        // line 12
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_request_password_reset_token");
        echo "\" class=\"ui right floated button\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.forgot_password"), "html", null, true);
        echo "</a>

    <input type=\"hidden\" name=\"_csrf_shop_security_token\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("shop_authenticate"), "html", null, true);
        echo "\">
";
        // line 15
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), 'form_end', ["render_rest" => false]);
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Login/_login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 15,  83 => 14,  76 => 12,  70 => 9,  66 => 8,  61 => 6,  58 => 5,  56 => 4,  52 => 3,  48 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h4 class=\"ui dividing header\">{{ 'sylius.ui.registered_customers'|trans }}</h4>
<p>{{ 'sylius.ui.if_you_have_an_account_sign_in_with_your_email_address'|trans }}.</p>
{{ form_start(form, {'action': path('sylius_shop_login_check'), 'attr': {'class': 'ui loadable form', 'novalidate': 'novalidate'}}) }}
    {% include '@SyliusShop/Login/_form.html.twig' %}

    {{ sylius_template_event('sylius.shop.login.form', {'form': form}) }}

    <button type=\"submit\" class=\"ui blue submit button\" {{ sylius_test_html_attribute('login-button') }}>
        {{ 'sylius.ui.login'|trans }}
    </button>

    <a href=\"{{ path('sylius_shop_request_password_reset_token') }}\" class=\"ui right floated button\">{{ 'sylius.ui.forgot_password'|trans }}</a>

    <input type=\"hidden\" name=\"_csrf_shop_security_token\" value=\"{{ csrf_token('shop_authenticate') }}\">
{{ form_end(form, {'render_rest': false}) }}
", "@SyliusShop/Login/_login.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Login/_login.html.twig");
    }
}
