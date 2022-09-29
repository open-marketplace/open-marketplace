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

/* @SyliusAdmin/Common/Label/paymentState.html.twig */
class __TwigTemplate_20412a0795cadc43c50b6a292b8a7f5522e471ec207daa76decef4c8f533f349 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Common/Label/paymentState.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Common/Label/paymentState.html.twig"));

        // line 2
        $context["viewOptions"] = ["authorized" => ["icon" => "check", "color" => "orange"], "cancelled" => ["icon" => "ban", "color" => "yellow"], "cart" => ["icon" => "adjust", "color" => "grey"], "completed" => ["icon" => "adjust", "color" => "green"], "failed" => ["icon" => "ban", "color" => "red"], "new" => ["icon" => "clock", "color" => "olive"], "processing" => ["icon" => "check", "color" => "violet"], "refunded" => ["icon" => "reply all", "color" => "purple"]];
        // line 13
        echo "
";
        // line 14
        $context["value"] = ("sylius.ui." . (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 14, $this->source); })()));
        // line 15
        echo "
<span class=\"ui ";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["viewOptions"]) || array_key_exists("viewOptions", $context) ? $context["viewOptions"] : (function () { throw new RuntimeError('Variable "viewOptions" does not exist.', 16, $this->source); })()), (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 16, $this->source); })()), [], "array", false, false, false, 16), "color", [], "array", false, false, false, 16), "html", null, true);
        echo " label\">
    <i class=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["viewOptions"]) || array_key_exists("viewOptions", $context) ? $context["viewOptions"] : (function () { throw new RuntimeError('Variable "viewOptions" does not exist.', 17, $this->source); })()), (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 17, $this->source); })()), [], "array", false, false, false, 17), "icon", [], "array", false, false, false, 17), "html", null, true);
        echo " icon\"></i>
    ";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 18, $this->source); })())), "html", null, true);
        echo "
</span>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Common/Label/paymentState.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 18,  57 => 17,  53 => 16,  50 => 15,  48 => 14,  45 => 13,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
    set viewOptions = {
        authorized: { icon: 'check', color: 'orange' },
        cancelled: { icon: 'ban', color: 'yellow' },
        cart: { icon: 'adjust', color: 'grey' },
        completed: { icon: 'adjust', color: 'green' },
        failed: { icon: 'ban', color: 'red' },
        new: { icon: 'clock', color: 'olive' },
        processing: { icon: 'check', color: 'violet' },
        refunded: { icon: 'reply all', color: 'purple' },
    }
%}

{% set value = 'sylius.ui.' ~ data %}

<span class=\"ui {{ viewOptions[data]['color'] }} label\">
    <i class=\"{{ viewOptions[data]['icon'] }} icon\"></i>
    {{ value|trans }}
</span>
", "@SyliusAdmin/Common/Label/paymentState.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Common/Label/paymentState.html.twig");
    }
}
