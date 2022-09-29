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

/* @SyliusAdmin/Crud/Update/_content.html.twig */
class __TwigTemplate_3b70da1b21039f8c2f34bcad3cc4ab45a1b79e8079908e6ee63928199c97f5a3 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Crud/Update/_content.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Crud/Update/_content.html.twig"));

        // line 1
        $context["index_url"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 2
($context["configuration"] ?? null), "vars", [], "any", false, true, false, 2), "index", [], "any", false, true, false, 2), "route", [], "any", false, true, false, 2), "name", [], "any", true, true, false, 2)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 2), "index", [], "any", false, true, false, 2), "route", [], "any", false, true, false, 2), "name", [], "any", false, false, false, 2), twig_get_attribute($this->env, $this->source, (isset($context["configuration"]) || array_key_exists("configuration", $context) ? $context["configuration"] : (function () { throw new RuntimeError('Variable "configuration" does not exist.', 2, $this->source); })()), "getRouteName", [0 => "index"], "method", false, false, false, 2))) : (twig_get_attribute($this->env, $this->source, (isset($context["configuration"]) || array_key_exists("configuration", $context) ? $context["configuration"] : (function () { throw new RuntimeError('Variable "configuration" does not exist.', 2, $this->source); })()), "getRouteName", [0 => "index"], "method", false, false, false, 2))), ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 3
($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "index", [], "any", false, true, false, 3), "route", [], "any", false, true, false, 3), "parameters", [], "any", true, true, false, 3)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "index", [], "any", false, true, false, 3), "route", [], "any", false, true, false, 3), "parameters", [], "any", false, false, false, 3), ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "route", [], "any", false, true, false, 3), "parameters", [], "any", true, true, false, 3)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "route", [], "any", false, true, false, 3), "parameters", [], "any", false, false, false, 3), [])) : ([])))) : (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "route", [], "any", false, true, false, 3), "parameters", [], "any", true, true, false, 3)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "route", [], "any", false, true, false, 3), "parameters", [], "any", false, false, false, 3), [])) : ([])))));
        // line 6
        echo "
<div class=\"ui segment\">
    ";
        // line 8
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, (isset($context["configuration"]) || array_key_exists("configuration", $context) ? $context["configuration"] : (function () { throw new RuntimeError('Variable "configuration" does not exist.', 8, $this->source); })()), "getRouteName", [0 => "update"], "method", false, false, false, 8), ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 8), "route", [], "any", false, true, false, 8), "parameters", [], "any", true, true, false, 8)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 8), "route", [], "any", false, true, false, 8), "parameters", [], "any", false, false, false, 8), ["id" => twig_get_attribute($this->env, $this->source, (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8)])) : (["id" => twig_get_attribute($this->env, $this->source, (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 8, $this->source); })()), "id", [], "any", false, false, false, 8)]))), "attr" => ["class" => "ui loadable form", "novalidate" => "novalidate"]]);
        echo "
    <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
    ";
        // line 10
        $this->loadTemplate("@SyliusAdmin/Crud/form_validation_errors_checker.html.twig", "@SyliusAdmin/Crud/Update/_content.html.twig", 10)->display($context);
        // line 11
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 11), "templates", [], "any", false, true, false, 11), "form", [], "any", true, true, false, 11)) {
            // line 12
            echo "        ";
            $this->loadTemplate(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["configuration"]) || array_key_exists("configuration", $context) ? $context["configuration"] : (function () { throw new RuntimeError('Variable "configuration" does not exist.', 12, $this->source); })()), "vars", [], "any", false, false, false, 12), "templates", [], "any", false, false, false, 12), "form", [], "any", false, false, false, 12), "@SyliusAdmin/Crud/Update/_content.html.twig", 12)->display($context);
            // line 13
            echo "        ";
            if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "_token", [], "any", false, false, false, 13), "isRendered", [], "any", false, false, false, 13)) {
                // line 14
                echo "            ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "_token", [], "any", false, false, false, 14), 'row');
                echo "
        ";
            }
            // line 16
            echo "    ";
        } else {
            // line 17
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), 'widget');
            echo "
    ";
        }
        // line 19
        echo "
    ";
        // line 20
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render([0 => ((isset($context["event_prefix"]) || array_key_exists("event_prefix", $context) ? $context["event_prefix"] : (function () { throw new RuntimeError('Variable "event_prefix" does not exist.', 20, $this->source); })()) . ".form"), 1 => "sylius.admin.update.form"], ["metadata" => (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 20, $this->source); })()), "resource" => (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 20, $this->source); })()), "form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })())]);
        echo "

    ";
        // line 22
        $this->loadTemplate("@SyliusUi/Form/Buttons/_update.html.twig", "@SyliusAdmin/Crud/Update/_content.html.twig", 22)->display(twig_array_merge($context, ["paths" => ["cancel" => (isset($context["index_url"]) || array_key_exists("index_url", $context) ? $context["index_url"] : (function () { throw new RuntimeError('Variable "index_url" does not exist.', 22, $this->source); })())]]));
        // line 23
        echo "
    ";
        // line 24
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), 'form_end', ["render_rest" => false]);
        echo "
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Crud/Update/_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 24,  92 => 23,  90 => 22,  85 => 20,  82 => 19,  76 => 17,  73 => 16,  67 => 14,  64 => 13,  61 => 12,  58 => 11,  56 => 10,  51 => 8,  47 => 6,  45 => 3,  44 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set index_url = path(
        configuration.vars.index.route.name|default(configuration.getRouteName('index')),
        configuration.vars.index.route.parameters|default(configuration.vars.route.parameters|default({}))
    )
%}

<div class=\"ui segment\">
    {{ form_start(form, {'action': path(configuration.getRouteName('update'), configuration.vars.route.parameters|default({ 'id': resource.id })), 'attr': {'class': 'ui loadable form', 'novalidate': 'novalidate'}}) }}
    <input type=\"hidden\" name=\"_method\" value=\"PUT\" />
    {% include '@SyliusAdmin/Crud/form_validation_errors_checker.html.twig' %}
    {% if configuration.vars.templates.form is defined %}
        {% include configuration.vars.templates.form %}
        {% if not form._token.isRendered %}
            {{ form_row(form._token) }}
        {% endif %}
    {% else %}
        {{ form_widget(form) }}
    {% endif %}

    {{ sylius_template_event([event_prefix ~ '.form', 'sylius.admin.update.form'], {'metadata': metadata, 'resource': resource, 'form': form}) }}

    {% include '@SyliusUi/Form/Buttons/_update.html.twig' with {'paths': {'cancel': index_url}} %}

    {{ form_end(form, {'render_rest': false}) }}
</div>
", "@SyliusAdmin/Crud/Update/_content.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Crud/Update/_content.html.twig");
    }
}
