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

/* @SyliusAdmin/ProductVariant/Grid/Field/inventory.html.twig */
class __TwigTemplate_cb8b0770064c7cb9d24f574f4130fc39fd9f243341ec041bac29e8f271fac9c6 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ProductVariant/Grid/Field/inventory.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ProductVariant/Grid/Field/inventory.html.twig"));

        // line 1
        if (twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 1, $this->source); })()), "isTracked", [], "any", false, false, false, 1)) {
            // line 2
            echo "<div class=\"ui ";
            echo (((twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 2, $this->source); })()), "onHand", [], "any", false, false, false, 2) > 0)) ? ("green") : ("red"));
            echo " icon label\">
    <i class=\"cube icon\"></i>
    <span class=\"onHand\" data-product-variant-id=\"";
            // line 4
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 4, $this->source); })()), "id", [], "any", false, false, false, 4), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 4, $this->source); })()), "onHand", [], "any", false, false, false, 4), "html", null, true);
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.available_on_hand"), "html", null, true);
            echo "
    ";
            // line 5
            if ((twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 5, $this->source); })()), "onHold", [], "any", false, false, false, 5) > 0)) {
                // line 6
                echo "    <div class=\"detail\">
        <span class=\"onHold\" data-product-variant-id=\"";
                // line 7
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 7, $this->source); })()), "id", [], "any", false, false, false, 7), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 7, $this->source); })()), "onHold", [], "any", false, false, false, 7), "html", null, true);
                echo "</span> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.reserved"), "html", null, true);
                echo "
    </div>
    ";
            }
            // line 10
            echo "</div>
";
        } else {
            // line 12
            echo "    <span class=\"ui red label\">
        <i class=\"remove icon\"></i>
        ";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.not_tracked"), "html", null, true);
            echo "
    </span>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/ProductVariant/Grid/Field/inventory.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 14,  78 => 12,  74 => 10,  64 => 7,  61 => 6,  59 => 5,  51 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if data.isTracked %}
<div class=\"ui {{ data.onHand > 0 ? 'green' : 'red' }} icon label\">
    <i class=\"cube icon\"></i>
    <span class=\"onHand\" data-product-variant-id=\"{{ data.id }}\">{{ data.onHand }}</span> {{ 'sylius.ui.available_on_hand'|trans }}
    {% if data.onHold > 0 %}
    <div class=\"detail\">
        <span class=\"onHold\" data-product-variant-id=\"{{ data.id }}\">{{ data.onHold }}</span> {{ 'sylius.ui.reserved'|trans }}
    </div>
    {% endif %}
</div>
{% else %}
    <span class=\"ui red label\">
        <i class=\"remove icon\"></i>
        {{ 'sylius.ui.not_tracked'|trans }}
    </span>
{% endif %}
", "@SyliusAdmin/ProductVariant/Grid/Field/inventory.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/ProductVariant/Grid/Field/inventory.html.twig");
    }
}
