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

/* @SyliusAdmin/Order/Show/Shipment/_resendConfirmationEmailButton.html.twig */
class __TwigTemplate_f3cb1957f8a77317191e9e39aa1aaccdf89420ee2fbb1104608a28d71039c177 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Shipment/_resendConfirmationEmailButton.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Shipment/_resendConfirmationEmailButton.html.twig"));

        // line 1
        if ((twig_get_attribute($this->env, $this->source, (isset($context["shipment"]) || array_key_exists("shipment", $context) ? $context["shipment"] : (function () { throw new RuntimeError('Variable "shipment" does not exist.', 1, $this->source); })()), "state", [], "any", false, false, false, 1) == (isset($context["shipped"]) || array_key_exists("shipped", $context) ? $context["shipped"] : (function () { throw new RuntimeError('Variable "shipped" does not exist.', 1, $this->source); })()))) {
            // line 2
            echo "    ";
            $context["path"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_shipment_resend_confirmation_email", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["shipment"]) || array_key_exists("shipment", $context) ? $context["shipment"] : (function () { throw new RuntimeError('Variable "shipment" does not exist.', 2, $this->source); })()), "id", [], "any", false, false, false, 2), "_csrf_token" => $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_get_attribute($this->env, $this->source, (isset($context["shipment"]) || array_key_exists("shipment", $context) ? $context["shipment"] : (function () { throw new RuntimeError('Variable "shipment" does not exist.', 2, $this->source); })()), "id", [], "any", false, false, false, 2))]);
            // line 3
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 3, $this->source); })()), "html", null, true);
            echo "\" class=\"ui icon labeled tiny fluid button\" style=\"margin: 7px 0 0;\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("resend-shipment-confirmation-email");
            echo ">
        <i class=\"send icon\"></i> ";
            // line 4
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.resend_the_shipment_confirmation_email"), "html", null, true);
            echo "
    </a>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/Shipment/_resendConfirmationEmailButton.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if shipment.state == shipped %}
    {% set path = path('sylius_admin_shipment_resend_confirmation_email', {'id': shipment.id, '_csrf_token': csrf_token(shipment.id)}) %}
    <a href=\"{{ path }}\" class=\"ui icon labeled tiny fluid button\" style=\"margin: 7px 0 0;\" {{ sylius_test_html_attribute('resend-shipment-confirmation-email') }}>
        <i class=\"send icon\"></i> {{ 'sylius.ui.resend_the_shipment_confirmation_email'|trans }}
    </a>
{% endif %}
", "@SyliusAdmin/Order/Show/Shipment/_resendConfirmationEmailButton.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Show/Shipment/_resendConfirmationEmailButton.html.twig");
    }
}
