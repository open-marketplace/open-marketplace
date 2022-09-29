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

/* @SyliusAdmin/Order/Show/Shipment/_showButton.html.twig */
class __TwigTemplate_b88d231329b702c0b62dff7b7cdeb4b513fe27300e8615852ca0b4764ae926bd extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Shipment/_showButton.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/Shipment/_showButton.html.twig"));

        // line 1
        if ((twig_get_attribute($this->env, $this->source, (isset($context["shipment"]) || array_key_exists("shipment", $context) ? $context["shipment"] : (function () { throw new RuntimeError('Variable "shipment" does not exist.', 1, $this->source); })()), "state", [], "any", false, false, false, 1) != (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 1, $this->source); })()))) {
            // line 2
            echo "    <a class=\"ui icon labeled tiny fluid button\" style=\"color: gray; margin-top: 10px;\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_shipment_show", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["shipment"]) || array_key_exists("shipment", $context) ? $context["shipment"] : (function () { throw new RuntimeError('Variable "shipment" does not exist.', 2, $this->source); })()), "id", [], "any", false, false, false, 2)]), "html", null, true);
            echo "\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipment-show-button");
            echo ">
        <i class=\"icon search\"></i>";
            // line 3
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.show"), "html", null, true);
            echo "
    </a>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/Shipment/_showButton.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if shipment.state != cart %}
    <a class=\"ui icon labeled tiny fluid button\" style=\"color: gray; margin-top: 10px;\" href=\"{{ path('sylius_admin_shipment_show', {'id': shipment.id}) }}\" {{ sylius_test_html_attribute('shipment-show-button') }}>
        <i class=\"icon search\"></i>{{ 'sylius.ui.show'|trans }}
    </a>
{% endif %}
", "@SyliusAdmin/Order/Show/Shipment/_showButton.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Show/Shipment/_showButton.html.twig");
    }
}
