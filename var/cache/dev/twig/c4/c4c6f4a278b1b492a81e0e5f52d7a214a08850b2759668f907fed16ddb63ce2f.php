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

/* @SyliusAdmin/CatalogPromotion/_form.html.twig */
class __TwigTemplate_e96427ace2c625384d21bc28c6e6d6087ea4a8c3066b9fb11624fd73f197f5a8 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/_form.html.twig"));

        // line 1
        $macros["__internal_parse_26"] = $this->macros["__internal_parse_26"] = $this->loadTemplate("@SyliusAdmin/Macro/translationForm.html.twig", "@SyliusAdmin/CatalogPromotion/_form.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), [0 => "@SyliusAdmin/CatalogPromotion/theme.html.twig"], true);
        // line 4
        echo "
<div class=\"ui two column stackable grid\">
    <div class=\"column\">
        ";
        // line 7
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), 'errors');
        echo "
        <div class=\"ui segment\">
            ";
        // line 9
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "code", [], "any", false, false, false, 9), 'row');
        echo "
            ";
        // line 10
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), "name", [], "any", false, false, false, 10), 'row');
        echo "
            <div class=\"ui negative message\">
                <i class=\"close icon\"></i>
                ";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.catalog_promotion.dates_details"), "html", null, true);
        echo "
            </div>
            ";
        // line 15
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "startDate", [], "any", false, false, false, 15), 'row');
        echo "
            ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "endDate", [], "any", false, false, false, 16), 'row');
        echo "
            ";
        // line 17
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "enabled", [], "any", false, false, false, 17), 'row');
        echo "
            ";
        // line 18
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "priority", [], "any", false, false, false, 18), 'row');
        echo "
            ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "exclusive", [], "any", false, false, false, 19), 'row');
        echo "
            ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "channels", [], "any", false, false, false, 20), 'row');
        echo "
        </div>


    </div>
    <div class=\"column\">
        ";
        // line 26
        echo twig_call_macro($macros["__internal_parse_26"], "macro_translationForm", [twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 26, $this->source); })()), "translations", [], "any", false, false, false, 26)], 26, $context, $this->getSourceContext());
        echo "
    </div>
    <div class=\"ui segment\">
        <h4 class=\"ui dividing header\">";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.configuration"), "html", null, true);
        echo "</h4>
        <div class=\"ui two column stackable grid\">
            <div class=\"column\" id=\"scopes\">
                ";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "scopes", [], "any", false, false, false, 32), 'row');
        echo "
            </div>
            <div class=\"column\" id=\"actions\">
                ";
        // line 35
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "actions", [], "any", false, false, false, 35), 'row');
        echo "
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/CatalogPromotion/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 35,  116 => 32,  110 => 29,  104 => 26,  95 => 20,  91 => 19,  87 => 18,  83 => 17,  79 => 16,  75 => 15,  70 => 13,  64 => 10,  60 => 9,  55 => 7,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% from '@SyliusAdmin/Macro/translationForm.html.twig' import translationForm %}

{% form_theme form '@SyliusAdmin/CatalogPromotion/theme.html.twig' %}

<div class=\"ui two column stackable grid\">
    <div class=\"column\">
        {{ form_errors(form) }}
        <div class=\"ui segment\">
            {{ form_row(form.code) }}
            {{ form_row(form.name) }}
            <div class=\"ui negative message\">
                <i class=\"close icon\"></i>
                {{ 'sylius.ui.catalog_promotion.dates_details'|trans }}
            </div>
            {{ form_row(form.startDate) }}
            {{ form_row(form.endDate) }}
            {{ form_row(form.enabled) }}
            {{ form_row(form.priority) }}
            {{ form_row(form.exclusive) }}
            {{ form_row(form.channels) }}
        </div>


    </div>
    <div class=\"column\">
        {{ translationForm(form.translations) }}
    </div>
    <div class=\"ui segment\">
        <h4 class=\"ui dividing header\">{{ 'sylius.ui.configuration'|trans }}</h4>
        <div class=\"ui two column stackable grid\">
            <div class=\"column\" id=\"scopes\">
                {{ form_row(form.scopes) }}
            </div>
            <div class=\"column\" id=\"actions\">
                {{ form_row(form.actions) }}
            </div>
        </div>
    </div>
</div>
", "@SyliusAdmin/CatalogPromotion/_form.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/CatalogPromotion/_form.html.twig");
    }
}
