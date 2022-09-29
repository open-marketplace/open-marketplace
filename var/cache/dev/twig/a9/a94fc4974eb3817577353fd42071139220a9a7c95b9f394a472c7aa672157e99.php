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

/* @SyliusAdmin/PaymentMethod/Gateways/paymentGateways.html.twig */
class __TwigTemplate_4b920af89ccf7f13b3219a655d5afbc2e4e3e8ad36e49742395ceaaa59fbc632 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/PaymentMethod/Gateways/paymentGateways.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/PaymentMethod/Gateways/paymentGateways.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["gatewayFactories"]) || array_key_exists("gatewayFactories", $context) ? $context["gatewayFactories"] : (function () { throw new RuntimeError('Variable "gatewayFactories" does not exist.', 1, $this->source); })()));
        foreach ($context['_seq'] as $context["name"] => $context["gateway"]) {
            // line 2
            echo "    <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_admin_payment_method_create", ["factory" => $context["name"]]), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" class=\"item\" ";
            if (($context["name"] == "sylius.pay_pal")) {
                echo "data-confirm-pay-pal-consent";
            }
            echo ">
        ";
            // line 3
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans($context["gateway"]), "html", null, true);
            echo "
    </a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['gateway'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/PaymentMethod/Gateways/paymentGateways.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 3,  47 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% for name, gateway in gatewayFactories %}
    <a href=\"{{ url('sylius_admin_payment_method_create', { 'factory': name }) }}\" id=\"{{ name }}\" class=\"item\" {% if name == 'sylius.pay_pal' %}data-confirm-pay-pal-consent{% endif %}>
        {{ gateway|trans }}
    </a>
{% endfor %}
", "@SyliusAdmin/PaymentMethod/Gateways/paymentGateways.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/templates/bundles/SyliusAdminBundle/PaymentMethod/Gateways/paymentGateways.html.twig");
    }
}
