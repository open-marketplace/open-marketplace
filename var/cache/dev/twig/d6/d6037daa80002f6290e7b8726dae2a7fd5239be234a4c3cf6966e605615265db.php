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

/* @SyliusShop/Common/Order/_shipments.html.twig */
class __TwigTemplate_3d89f51627b3d1b390ac1d26912ce57cb96b55a48539b04d569d27336b27cbd1 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/_shipments.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/_shipments.html.twig"));

        // line 1
        $context["state"] = twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 1, $this->source); })()), "shippingState", [], "any", false, false, false, 1);
        // line 2
        if (((isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 2, $this->source); })()) != "cart")) {
            // line 3
            echo "    ";
            $this->loadTemplate("@SyliusShop/Common/Order/Label/ShipmentState/orderShipmentState.html.twig", "@SyliusShop/Common/Order/_shipments.html.twig", 3)->display($context);
        }
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 5, $this->source); })()), "shipments", [], "any", false, false, false, 5));
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
        foreach ($context['_seq'] as $context["_key"] => $context["shipment"]) {
            // line 6
            echo "    ";
            $context["state"] = twig_get_attribute($this->env, $this->source, $context["shipment"], "state", [], "any", false, false, false, 6);
            // line 7
            echo "    <div class=\"ui small icon message\">
        <i class=\"truck icon\"></i>
        <div class=\"content\">
            <div class=\"header\" id=\"sylius-shipping-method\" ";
            // line 10
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipping-method");
            echo ">
                ";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["shipment"], "method", [], "any", false, false, false, 11), "html", null, true);
            echo "
            </div>
            ";
            // line 13
            if (((isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 13, $this->source); })()) != "cart")) {
                // line 14
                echo "            <p id=\"shipment-status\" ";
                echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipment-state");
                echo ">
                ";
                // line 15
                $this->loadTemplate("@SyliusShop/Common/Order/Label/ShipmentState/singleShipmentState.html.twig", "@SyliusShop/Common/Order/_shipments.html.twig", 15)->display(twig_array_merge($context, ["state" => (isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 15, $this->source); })())]));
                // line 16
                echo "            </p>
            ";
            }
            // line 18
            echo "        </div>
    </div>
";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['shipment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Common/Order/_shipments.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 18,  94 => 16,  92 => 15,  87 => 14,  85 => 13,  80 => 11,  76 => 10,  71 => 7,  68 => 6,  51 => 5,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set state = order.shippingState %}
{% if state != 'cart' %}
    {% include \"@SyliusShop/Common/Order/Label/ShipmentState/orderShipmentState.html.twig\" %}
{% endif %}
{% for shipment in order.shipments %}
    {% set state = shipment.state %}
    <div class=\"ui small icon message\">
        <i class=\"truck icon\"></i>
        <div class=\"content\">
            <div class=\"header\" id=\"sylius-shipping-method\" {{ sylius_test_html_attribute('shipping-method') }}>
                {{ shipment.method }}
            </div>
            {% if state != 'cart' %}
            <p id=\"shipment-status\" {{ sylius_test_html_attribute('shipment-state') }}>
                {% include \"@SyliusShop/Common/Order/Label/ShipmentState/singleShipmentState.html.twig\" with { 'state': state } %}
            </p>
            {% endif %}
        </div>
    </div>
{% endfor %}
", "@SyliusShop/Common/Order/_shipments.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Common/Order/_shipments.html.twig");
    }
}
