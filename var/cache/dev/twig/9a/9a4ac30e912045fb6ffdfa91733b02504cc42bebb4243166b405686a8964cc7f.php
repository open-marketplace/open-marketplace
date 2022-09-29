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

/* @SyliusAdmin/Product/Tab/_details.html.twig */
class __TwigTemplate_bf73b92ba34748a00d1795662f63d5ecae7ef6ddf0b67e294031a7c2706ad67a extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Tab/_details.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Tab/_details.html.twig"));

        // line 1
        $macros["__internal_parse_23"] = $this->macros["__internal_parse_23"] = $this->loadTemplate("@SyliusAdmin/Macro/translationForm.html.twig", "@SyliusAdmin/Product/Tab/_details.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"ui active tab\" data-tab=\"details\">
    <h3 class=\"ui top attached header\">";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.details"), "html", null, true);
        echo "</h3>

    <div class=\"ui attached segment\">
        ";
        // line 7
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), 'errors');
        echo "

        <div class=\"ui two column stackable grid\">
            <div class=\"column\">
                <div class=\"ui segment\">
                    ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "code", [], "any", false, false, false, 12), 'row');
        echo "
                    ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "enabled", [], "any", false, false, false, 13), 'row');
        echo "
                    ";
        // line 14
        if (twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 14, $this->source); })()), "simple", [], "any", false, false, false, 14)) {
            // line 15
            echo "                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "variant", [], "any", false, false, false, 15), "shippingRequired", [], "any", false, false, false, 15), 'row');
            echo "
                    ";
        } else {
            // line 17
            echo "                        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "options", [], "any", false, false, false, 17), 'row');
            echo "
                        ";
            // line 18
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "variantSelectionMethod", [], "any", false, false, false, 18), 'row');
            echo "
                    ";
        }
        // line 20
        echo "
                    ";
        // line 22
        echo "                    <div class=\"ui hidden element\">
                        ";
        // line 23
        if (twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 23, $this->source); })()), "simple", [], "any", false, false, false, 23)) {
            // line 24
            echo "                            ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 24, $this->source); })()), "variant", [], "any", false, false, false, 24), "translations", [], "any", false, false, false, 24), 'row');
            echo "
                            ";
            // line 25
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), "variantSelectionMethod", [], "any", false, false, false, 25), 'row');
            echo "
                        ";
        }
        // line 27
        echo "                    </div>
                </div>
            </div>
            <div class=\"column\">
                ";
        // line 31
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "channels", [], "any", false, false, false, 31), 'row');
        echo "
            </div>
        </div>
        ";
        // line 34
        if (twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 34, $this->source); })()), "simple", [], "any", false, false, false, 34)) {
            // line 35
            echo "            <div class=\"ui one column stackable grid\">
                <div class=\"column\">
                    <h4 class=\"ui dividing header\">";
            // line 37
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.pricing"), "html", null, true);
            echo "</h4>
                    ";
            // line 38
            $this->loadTemplate("@SyliusAdmin/Product/_channel_pricing.html.twig", "@SyliusAdmin/Product/Tab/_details.html.twig", 38)->display(twig_to_array(["product" => (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 38, $this->source); })()), "variantForm" => twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 38, $this->source); })()), "variant", [], "any", false, false, false, 38)]));
            // line 39
            echo "                </div>
            </div>
        ";
        }
        // line 42
        echo "        <div class=\"ui hidden divider\"></div>
        ";
        // line 43
        echo twig_call_macro($macros["__internal_parse_23"], "macro_translationFormWithSlug", [twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "translations", [], "any", false, false, false, 43), "@SyliusAdmin/Product/_slugField.html.twig", (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 43, $this->source); })())], 43, $context, $this->getSourceContext());
        echo "
        ";
        // line 44
        if (twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 44, $this->source); })()), "simple", [], "any", false, false, false, 44)) {
            // line 45
            echo "        <div class=\"ui hidden divider\"></div>
        <div class=\"ui two column stackable grid\">
            <div class=\"column\">
                <h4 class=\"ui top attached header\">";
            // line 48
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping"), "html", null, true);
            echo "</h4>
                <div class=\"ui attached segment\">
                    ";
            // line 50
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "variant", [], "any", false, false, false, 50), "shippingCategory", [], "any", false, false, false, 50), 'row');
            echo "
                    ";
            // line 51
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "variant", [], "any", false, false, false, 51), "width", [], "any", false, false, false, 51), 'row');
            echo "
                    ";
            // line 52
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "variant", [], "any", false, false, false, 52), "height", [], "any", false, false, false, 52), 'row');
            echo "
                    ";
            // line 53
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 53, $this->source); })()), "variant", [], "any", false, false, false, 53), "depth", [], "any", false, false, false, 53), 'row');
            echo "
                    ";
            // line 54
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "variant", [], "any", false, false, false, 54), "weight", [], "any", false, false, false, 54), 'row');
            echo "
                </div>
            </div>
            <div class=\"column\">
                <h4 class=\"ui top attached header\">";
            // line 58
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.taxes"), "html", null, true);
            echo "</h4>
                <div class=\"ui attached segment\">
                    ";
            // line 60
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "variant", [], "any", false, false, false, 60), "taxCategory", [], "any", false, false, false, 60), 'row');
            echo "
                </div>
            </div>
        </div>
        ";
        }
        // line 65
        echo "
        ";
        // line 66
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render([0 => (("sylius.admin.product." . (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 66, $this->source); })())) . ".tab_details"), 1 => "sylius.admin.product.tab_details"], ["form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })())]);
        echo "
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Tab/_details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 66,  191 => 65,  183 => 60,  178 => 58,  171 => 54,  167 => 53,  163 => 52,  159 => 51,  155 => 50,  150 => 48,  145 => 45,  143 => 44,  139 => 43,  136 => 42,  131 => 39,  129 => 38,  125 => 37,  121 => 35,  119 => 34,  113 => 31,  107 => 27,  102 => 25,  97 => 24,  95 => 23,  92 => 22,  89 => 20,  84 => 18,  79 => 17,  73 => 15,  71 => 14,  67 => 13,  63 => 12,  55 => 7,  49 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% from '@SyliusAdmin/Macro/translationForm.html.twig' import translationFormWithSlug %}

<div class=\"ui active tab\" data-tab=\"details\">
    <h3 class=\"ui top attached header\">{{ 'sylius.ui.details'|trans }}</h3>

    <div class=\"ui attached segment\">
        {{ form_errors(form) }}

        <div class=\"ui two column stackable grid\">
            <div class=\"column\">
                <div class=\"ui segment\">
                    {{ form_row(form.code) }}
                    {{ form_row(form.enabled) }}
                    {% if product.simple %}
                        {{ form_row(form.variant.shippingRequired) }}
                    {% else %}
                        {{ form_row(form.options) }}
                        {{ form_row(form.variantSelectionMethod) }}
                    {% endif %}

                    {# Nothing to see here. #}
                    <div class=\"ui hidden element\">
                        {% if product.simple %}
                            {{ form_row(form.variant.translations) }}
                            {{ form_row(form.variantSelectionMethod) }}
                        {% endif %}
                    </div>
                </div>
            </div>
            <div class=\"column\">
                {{ form_row(form.channels) }}
            </div>
        </div>
        {% if product.simple %}
            <div class=\"ui one column stackable grid\">
                <div class=\"column\">
                    <h4 class=\"ui dividing header\">{{ 'sylius.ui.pricing'|trans }}</h4>
                    {% include \"@SyliusAdmin/Product/_channel_pricing.html.twig\" with { product: product, variantForm: form.variant } only %}
                </div>
            </div>
        {% endif %}
        <div class=\"ui hidden divider\"></div>
        {{ translationFormWithSlug(form.translations, '@SyliusAdmin/Product/_slugField.html.twig', product) }}
        {% if product.simple %}
        <div class=\"ui hidden divider\"></div>
        <div class=\"ui two column stackable grid\">
            <div class=\"column\">
                <h4 class=\"ui top attached header\">{{ 'sylius.ui.shipping'|trans }}</h4>
                <div class=\"ui attached segment\">
                    {{ form_row(form.variant.shippingCategory) }}
                    {{ form_row(form.variant.width) }}
                    {{ form_row(form.variant.height) }}
                    {{ form_row(form.variant.depth) }}
                    {{ form_row(form.variant.weight) }}
                </div>
            </div>
            <div class=\"column\">
                <h4 class=\"ui top attached header\">{{ 'sylius.ui.taxes'|trans }}</h4>
                <div class=\"ui attached segment\">
                    {{ form_row(form.variant.taxCategory) }}
                </div>
            </div>
        </div>
        {% endif %}

        {{ sylius_template_event(['sylius.admin.product.' ~ action ~ '.tab_details', 'sylius.admin.product.tab_details'], {'form': form}) }}
    </div>
</div>
", "@SyliusAdmin/Product/Tab/_details.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Tab/_details.html.twig");
    }
}
