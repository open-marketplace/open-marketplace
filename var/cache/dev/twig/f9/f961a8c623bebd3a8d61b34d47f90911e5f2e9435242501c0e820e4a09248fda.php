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

/* @SyliusAdmin/ShippingMethod/_form.html.twig */
class __TwigTemplate_9d5212a14614554dfabcc4a86cce761d23133d91a7fba473679def4b7292e771 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ShippingMethod/_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ShippingMethod/_form.html.twig"));

        // line 1
        $macros["__internal_parse_21"] = $this->macros["__internal_parse_21"] = $this->loadTemplate("@SyliusAdmin/Macro/translationForm.html.twig", "@SyliusAdmin/ShippingMethod/_form.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"ui two column stackable grid\">
    <div class=\"column\">
        <div class=\"ui segment\">
            ";
        // line 6
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), 'errors');
        echo "
            <div class=\"three fields\">
                ";
        // line 8
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "code", [], "any", false, false, false, 8), 'row');
        echo "
                ";
        // line 9
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "zone", [], "any", false, false, false, 9), 'row');
        echo "
                ";
        // line 10
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), "position", [], "any", false, false, false, 10), 'row');
        echo "
            </div>
            ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "enabled", [], "any", false, false, false, 12), 'row');
        echo "
            <h4 class=\"ui dividing header\">";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.availability"), "html", null, true);
        echo "</h4>
            ";
        // line 14
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "channels", [], "any", false, false, false, 14), 'row');
        echo "
            <h4 class=\"ui dividing header\">";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.category_requirements"), "html", null, true);
        echo "</h4>
            ";
        // line 16
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), "category", [], "any", false, false, false, 16), 'row');
        echo "
            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "categoryRequirement", [], "any", false, false, false, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["categoryRequirementChoiceForm"]) {
            // line 18
            echo "                ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["categoryRequirementChoiceForm"], 'row');
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categoryRequirementChoiceForm'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "            <h4 class=\"ui dividing header\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.taxes"), "html", null, true);
        echo "</h4>
            ";
        // line 21
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 21, $this->source); })()), "taxCategory", [], "any", false, false, false, 21), 'row');
        echo "
            <h4 class=\"ui dividing header\">";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_charges"), "html", null, true);
        echo "</h4>
            ";
        // line 23
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 23, $this->source); })()), "calculator", [], "any", false, false, false, 23), 'row');
        echo "
            ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "vars", [], "any", false, false, false, 24), "prototypes", [], "any", false, false, false, 24));
        foreach ($context['_seq'] as $context["name"] => $context["calculatorConfigurationPrototype"]) {
            // line 25
            echo "                <div id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "calculator", [], "any", false, false, false, 25), "vars", [], "any", false, false, false, 25), "id", [], "any", false, false, false, 25), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $context["name"], "html", null, true);
            echo "\" data-container=\".configuration\"
                     data-prototype=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["calculatorConfigurationPrototype"], 'widget'));
            echo "\">
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['calculatorConfigurationPrototype'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "            <div class=\"ui segment configuration\">
                ";
        // line 30
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "configuration", [], "any", true, true, false, 30)) {
            // line 31
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "configuration", [], "any", false, false, false, 31));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 32
                echo "                        ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'row');
                echo "
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "                ";
        }
        // line 35
        echo "            </div>

            <h4 class=\"ui dividing header\">";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.rules"), "html", null, true);
        echo "</h4>
            <div id=\"rules\">
                ";
        // line 39
        $this->loadTemplate("@SyliusAdmin/ShippingMethod/_rules.html.twig", "@SyliusAdmin/ShippingMethod/_form.html.twig", 39)->display($context);
        // line 40
        echo "            </div>
        </div>
    </div>
    <div class=\"column\">
        ";
        // line 44
        echo twig_call_macro($macros["__internal_parse_21"], "macro_translationForm", [twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 44, $this->source); })()), "translations", [], "any", false, false, false, 44)], 44, $context, $this->getSourceContext());
        echo "
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/ShippingMethod/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 44,  172 => 40,  170 => 39,  165 => 37,  161 => 35,  158 => 34,  149 => 32,  144 => 31,  142 => 30,  139 => 29,  130 => 26,  123 => 25,  119 => 24,  115 => 23,  111 => 22,  107 => 21,  102 => 20,  93 => 18,  89 => 17,  85 => 16,  81 => 15,  77 => 14,  73 => 13,  69 => 12,  64 => 10,  60 => 9,  56 => 8,  51 => 6,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% from '@SyliusAdmin/Macro/translationForm.html.twig' import translationForm %}

<div class=\"ui two column stackable grid\">
    <div class=\"column\">
        <div class=\"ui segment\">
            {{ form_errors(form) }}
            <div class=\"three fields\">
                {{ form_row(form.code) }}
                {{ form_row(form.zone) }}
                {{ form_row(form.position) }}
            </div>
            {{ form_row(form.enabled) }}
            <h4 class=\"ui dividing header\">{{ 'sylius.ui.availability'|trans }}</h4>
            {{ form_row(form.channels) }}
            <h4 class=\"ui dividing header\">{{ 'sylius.ui.category_requirements'|trans }}</h4>
            {{ form_row(form.category) }}
            {% for categoryRequirementChoiceForm in form.categoryRequirement %}
                {{ form_row(categoryRequirementChoiceForm) }}
            {% endfor %}
            <h4 class=\"ui dividing header\">{{ 'sylius.ui.taxes'|trans }}</h4>
            {{ form_row(form.taxCategory) }}
            <h4 class=\"ui dividing header\">{{ 'sylius.ui.shipping_charges'|trans }}</h4>
            {{ form_row(form.calculator) }}
            {% for name, calculatorConfigurationPrototype in form.vars.prototypes %}
                <div id=\"{{ form.calculator.vars.id }}_{{ name }}\" data-container=\".configuration\"
                     data-prototype=\"{{ form_widget(calculatorConfigurationPrototype)|e }}\">
                </div>
            {% endfor %}
            <div class=\"ui segment configuration\">
                {% if form.configuration is defined %}
                    {% for field in form.configuration %}
                        {{ form_row(field) }}
                    {% endfor %}
                {% endif %}
            </div>

            <h4 class=\"ui dividing header\">{{ 'sylius.ui.rules'|trans }}</h4>
            <div id=\"rules\">
                {% include '@SyliusAdmin/ShippingMethod/_rules.html.twig' %}
            </div>
        </div>
    </div>
    <div class=\"column\">
        {{ translationForm(form.translations) }}
    </div>
</div>
", "@SyliusAdmin/ShippingMethod/_form.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/ShippingMethod/_form.html.twig");
    }
}
