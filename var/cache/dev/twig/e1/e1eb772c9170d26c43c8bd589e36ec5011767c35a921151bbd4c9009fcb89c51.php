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

/* @SyliusShop/Common/Order/Label/ShipmentState/orderShipmentState.html.twig */
class __TwigTemplate_ab6fa6c02c5868a281db9be4885ee2f6c400b6c8b177d082871e46c6c4e53229 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/Label/ShipmentState/orderShipmentState.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Order/Label/ShipmentState/orderShipmentState.html.twig"));

        // line 2
        $context["viewOptions"] = ["cart" => ["icon" => "adjust", "color" => "grey"], "cancelled" => ["icon" => "ban", "color" => "red"], "shipped" => ["icon" => "plane", "color" => "green"], "partially_shipped" => ["icon" => "adjust", "color" => "yellow"], "ready" => ["icon" => "clock", "color" => "blue"]];
        // line 10
        echo "
";
        // line 11
        $context["value"] = ("sylius.ui." . (isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 11, $this->source); })()));
        // line 12
        echo "
<div class=\"ui top attached label ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["viewOptions"]) || array_key_exists("viewOptions", $context) ? $context["viewOptions"] : (function () { throw new RuntimeError('Variable "viewOptions" does not exist.', 13, $this->source); })()), (isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 13, $this->source); })()), [], "array", false, false, false, 13), "color", [], "array", false, false, false, 13), "html", null, true);
        echo "\" style=\"margin-left: 1rem; width: calc(100% - 2rem); margin-top: 1rem;\">
    <i class=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["viewOptions"]) || array_key_exists("viewOptions", $context) ? $context["viewOptions"] : (function () { throw new RuntimeError('Variable "viewOptions" does not exist.', 14, $this->source); })()), (isset($context["state"]) || array_key_exists("state", $context) ? $context["state"] : (function () { throw new RuntimeError('Variable "state" does not exist.', 14, $this->source); })()), [], "array", false, false, false, 14), "icon", [], "array", false, false, false, 14), "html", null, true);
        echo " icon\"></i>
    ";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.state"), "html", null, true);
        echo ": <span id=\"order-shipment-status\" ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("order-shipment-state");
        echo ">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 15, $this->source); })())), "html", null, true);
        echo "</span>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Common/Order/Label/ShipmentState/orderShipmentState.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 15,  57 => 14,  53 => 13,  50 => 12,  48 => 11,  45 => 10,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
    set viewOptions = {
    cart: { icon: \"adjust\", color: \"grey\" } ,
    cancelled: { icon: \"ban\", color: \"red\" } ,
    shipped: { icon: \"plane\", color: \"green\" } ,
    partially_shipped: { icon: \"adjust\", color: \"yellow\" } ,
    ready: { icon: \"clock\", color: \"blue\" } ,
    }
%}

{% set value = 'sylius.ui.' ~ state %}

<div class=\"ui top attached label {{ viewOptions[state]['color'] }}\" style=\"margin-left: 1rem; width: calc(100% - 2rem); margin-top: 1rem;\">
    <i class=\"{{ viewOptions[state]['icon'] }} icon\"></i>
    {{ 'sylius.ui.state'|trans }}: <span id=\"order-shipment-status\" {{ sylius_test_html_attribute('order-shipment-state') }}>{{ value|trans }}</span>
</div>
", "@SyliusShop/Common/Order/Label/ShipmentState/orderShipmentState.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Common/Order/Label/ShipmentState/orderShipmentState.html.twig");
    }
}
