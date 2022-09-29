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

/* @SyliusAdmin/Shipment/Grid/Action/_shipWithTrackingCodeContent.html.twig */
class __TwigTemplate_795dd1fe538729a081a0ae6e56bf5f30cc8a2f1ef5eaf3557696c051e1d21ef6 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Shipment/Grid/Action/_shipWithTrackingCodeContent.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Shipment/Grid/Action/_shipWithTrackingCodeContent.html.twig"));

        // line 1
        if ($this->extensions['SM\Extension\Twig\SMExtension']->can((isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 1, $this->source); })()), "ship", "sylius_shipment")) {
            // line 2
            echo "    ";
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment(Symfony\Bridge\Twig\Extension\HttpKernelExtension::controller("sylius.controller.shipment:updateAction", ["_sylius" => ["event" => "ship", "repository" => ["method" => "findOneByOrderId", "arguments" => ["id" => twig_get_attribute($this->env, $this->source,             // line 8
(isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8), "orderId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 9
(isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 9, $this->source); })()), "order", [], "any", false, false, false, 9), "id", [], "any", false, false, false, 9)]], "state_machine" => ["graph" => "sylius_shipment", "transition" => "ship"], "section" => "admin", "permission" => true, "template" => "@SyliusAdmin/Shipment/Grid/_ship.html.twig", "form" => "Sylius\\Bundle\\ShippingBundle\\Form\\Type\\ShipmentShipType", "vars" => ["route" => ["parameters" => ["id" => twig_get_attribute($this->env, $this->source,             // line 23
(isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 23, $this->source); })()), "id", [], "any", false, false, false, 23), "orderId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 24
(isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 24, $this->source); })()), "order", [], "any", false, false, false, 24), "id", [], "any", false, false, false, 24)]]]]]));
            // line 29
            echo "
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Shipment/Grid/Action/_shipWithTrackingCodeContent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 29,  50 => 24,  49 => 23,  48 => 9,  47 => 8,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if sm_can(data, 'ship', 'sylius_shipment') %}
    {{ render(controller('sylius.controller.shipment:updateAction', {
        '_sylius': {
            'event': 'ship',
            'repository': {
                'method': 'findOneByOrderId',
                'arguments': {
                    'id': data.id,
                    'orderId': data.order.id
                }
            },
            'state_machine': {
                'graph': 'sylius_shipment',
                'transition': 'ship'
            },
            'section': 'admin',
            'permission': true,
            'template': '@SyliusAdmin/Shipment/Grid/_ship.html.twig',
            'form': 'Sylius\\\\Bundle\\\\ShippingBundle\\\\Form\\\\Type\\\\ShipmentShipType',
            'vars': {
                'route': {
                    'parameters': {
                        'id': data.id,
                        'orderId': data.order.id
                    }
                }
            }
        }
    })) }}
{% endif %}
", "@SyliusAdmin/Shipment/Grid/Action/_shipWithTrackingCodeContent.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Shipment/Grid/Action/_shipWithTrackingCodeContent.html.twig");
    }
}
