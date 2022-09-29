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

/* @SyliusAdmin/Customer/Show/Details/_email.html.twig */
class __TwigTemplate_4563d403697b962322d17b3c0969c84df998ae1250c88465bc5a60f8193ad5a1 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Customer/Show/Details/_email.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Customer/Show/Details/_email.html.twig"));

        // line 1
        $macros["buttons"] = $this->macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusAdmin/Customer/Show/Details/_email.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"content\">
    <div id=\"subscribed-to-newsletter\">
        <i class=\"";
        // line 5
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 5, $this->source); })()), "subscribedToNewsletter", [], "any", false, false, false, 5)) ? ("green checkmark") : ("red remove"));
        echo " icon\"></i>
        ";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.subscribed_to_newsletter"), "html", null, true);
        echo "
    </div>
    ";
        // line 8
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 8, $this->source); })()), "user", [], "any", false, false, false, 8))) {
            // line 9
            echo "        ";
            $context["user"] = twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 9, $this->source); })()), "user", [], "any", false, false, false, 9);
            // line 10
            echo "        <div id=\"verified-email\">
            <i class=\"";
            // line 11
            echo ((twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 11, $this->source); })()), "verified", [], "any", false, false, false, 11)) ? ("green checkmark") : ("red remove"));
            echo " icon\"></i>
            ";
            // line 12
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.email_verified"), "html", null, true);
            echo "
        </div>
        <br />
        ";
            // line 15
            if ($this->env->getFunction('is_shop_enabled')->getCallable()()) {
                // line 16
                echo "            ";
                echo twig_call_macro($macros["buttons"], "macro_default", [$this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_impersonate_user", ["username" => twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 16, $this->source); })()), "emailCanonical", [], "any", false, false, false, 16)]), "sylius.ui.impersonate", "impersonate", "unhide", "blue"], 16, $context, $this->getSourceContext());
                echo "
        ";
            }
            // line 18
            echo "    ";
        }
        // line 19
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Customer/Show/Details/_email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 19,  85 => 18,  79 => 16,  77 => 15,  71 => 12,  67 => 11,  64 => 10,  61 => 9,  59 => 8,  54 => 6,  50 => 5,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}

<div class=\"content\">
    <div id=\"subscribed-to-newsletter\">
        <i class=\"{{ customer.subscribedToNewsletter ? 'green checkmark' : 'red remove' }} icon\"></i>
        {{ 'sylius.ui.subscribed_to_newsletter'|trans }}
    </div>
    {% if customer.user is not null %}
        {% set user = customer.user %}
        <div id=\"verified-email\">
            <i class=\"{{ user.verified ? 'green checkmark' : 'red remove' }} icon\"></i>
            {{ 'sylius.ui.email_verified'|trans }}
        </div>
        <br />
        {% if is_shop_enabled() %}
            {{ buttons.default(path('sylius_admin_impersonate_user', {'username': user.emailCanonical}), 'sylius.ui.impersonate', 'impersonate', 'unhide', 'blue') }}
        {% endif %}
    {% endif %}
</div>
", "@SyliusAdmin/Customer/Show/Details/_email.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Customer/Show/Details/_email.html.twig");
    }
}
