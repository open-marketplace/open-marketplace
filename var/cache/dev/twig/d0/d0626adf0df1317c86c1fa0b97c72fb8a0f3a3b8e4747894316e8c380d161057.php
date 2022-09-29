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

/* @SyliusAdmin/Promotion/_form.html.twig */
class __TwigTemplate_bcae46efc1fe937dbdd78cc213521d3cf110180110e6ba27a93249e04fa0a78a extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Promotion/_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Promotion/_form.html.twig"));

        // line 1
        echo "<div class=\"ui two column stackable grid\">
    <div class=\"column\">
        ";
        // line 3
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), 'errors');
        echo "
        <div class=\"ui segment\">
            <div class=\"two fields\">
                ";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), "code", [], "any", false, false, false, 6), 'row');
        echo "
                ";
        // line 7
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "name", [], "any", false, false, false, 7), 'row');
        echo "
            </div>
            ";
        // line 9
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "description", [], "any", false, false, false, 9), 'row');
        echo "
        </div>
    </div>
    <div class=\"column\">
        <div class=\"ui two column stackable grid\">
            <div class=\"column\">
                ";
        // line 15
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "usageLimit", [], "any", false, false, false, 15), 'row');
        echo "
                ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "couponBased", [], "any", false, false, false, 16), 'row');
        echo "
                ";
        // line 17
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "exclusive", [], "any", false, false, false, 17), 'row');
        echo "
                <div class=\"ui toggle checkbox\" >
                    ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "appliesToDiscounted", [], "any", false, false, false, 19), 'widget');
        echo "
                    ";
        // line 20
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "appliesToDiscounted", [], "any", false, false, false, 20), 'label');
        echo "
                    <small class=\"text gray \">";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.form.promotion.applies_to_discounted_details"), "html", null, true);
        echo "</small>
                </div>
            </div>
            <div class=\"column\">
                ";
        // line 25
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "priority", [], "any", false, false, false, 25), 'row');
        echo "
                ";
        // line 26
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 26, $this->source); })()), "channels", [], "any", false, false, false, 26), 'row');
        echo "
            </div>
        </div>
        <h4 class=\"ui dividing header\">";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.start_date"), "html", null, true);
        echo " & ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.end_date"), "html", null, true);
        echo "</h4>

        <div class=\"two fields\">
            ";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "startsAt", [], "any", false, false, false, 32), 'row');
        echo "
            ";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "endsAt", [], "any", false, false, false, 33), 'row');
        echo "
        </div>
    </div>
</div>
<div class=\"ui segment\">
    <h4 class=\"ui dividing header\">";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.configuration"), "html", null, true);
        echo "</h4>

    <div class=\"ui two column stackable grid\">
        <div class=\"column\" id=\"rules\">
            ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "rules", [], "any", false, false, false, 42), 'row');
        echo "
        </div>
        <div class=\"column\" id=\"actions\">
            ";
        // line 45
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "actions", [], "any", false, false, false, 45), 'row');
        echo "
        </div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Promotion/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 45,  136 => 42,  129 => 38,  121 => 33,  117 => 32,  109 => 29,  103 => 26,  99 => 25,  92 => 21,  88 => 20,  84 => 19,  79 => 17,  75 => 16,  71 => 15,  62 => 9,  57 => 7,  53 => 6,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui two column stackable grid\">
    <div class=\"column\">
        {{ form_errors(form) }}
        <div class=\"ui segment\">
            <div class=\"two fields\">
                {{ form_row(form.code) }}
                {{ form_row(form.name) }}
            </div>
            {{ form_row(form.description) }}
        </div>
    </div>
    <div class=\"column\">
        <div class=\"ui two column stackable grid\">
            <div class=\"column\">
                {{ form_row(form.usageLimit) }}
                {{ form_row(form.couponBased) }}
                {{ form_row(form.exclusive) }}
                <div class=\"ui toggle checkbox\" >
                    {{ form_widget(form.appliesToDiscounted) }}
                    {{ form_label(form.appliesToDiscounted) }}
                    <small class=\"text gray \">{{ 'sylius.form.promotion.applies_to_discounted_details'|trans }}</small>
                </div>
            </div>
            <div class=\"column\">
                {{ form_row(form.priority) }}
                {{ form_row(form.channels) }}
            </div>
        </div>
        <h4 class=\"ui dividing header\">{{ 'sylius.ui.start_date'|trans }} & {{ 'sylius.ui.end_date'|trans }}</h4>

        <div class=\"two fields\">
            {{ form_row(form.startsAt) }}
            {{ form_row(form.endsAt) }}
        </div>
    </div>
</div>
<div class=\"ui segment\">
    <h4 class=\"ui dividing header\">{{ 'sylius.ui.configuration'|trans }}</h4>

    <div class=\"ui two column stackable grid\">
        <div class=\"column\" id=\"rules\">
            {{ form_row(form.rules) }}
        </div>
        <div class=\"column\" id=\"actions\">
            {{ form_row(form.actions) }}
        </div>
    </div>
</div>
", "@SyliusAdmin/Promotion/_form.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Promotion/_form.html.twig");
    }
}
