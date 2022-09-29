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

/* @SyliusShop/Common/Form/_address.html.twig */
class __TwigTemplate_14451c475394e49e2d64f287b395beb0607bf7956279dd88aca91ebc21f64521 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Form/_address.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Common/Form/_address.html.twig"));

        // line 1
        if (array_key_exists("type", $context)) {
            // line 2
            echo "    ";
            $context["type"] = ((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 2, $this->source); })()) . "-");
        } else {
            // line 4
            echo "    ";
            $context["type"] = null;
        }
        // line 6
        echo "
<div class=\"two fields\">
    ";
        // line 8
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "firstName", [], "any", false, false, false, 8), 'row', $this->env->getFunction('sylius_test_form_attribute')->getCallable()(((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 8, $this->source); })()) . "first-name")));
        echo "
    ";
        // line 9
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "lastName", [], "any", false, false, false, 9), 'row', $this->env->getFunction('sylius_test_form_attribute')->getCallable()(((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 9, $this->source); })()) . "last-name")));
        echo "
</div>
";
        // line 11
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "company", [], "any", false, false, false, 11), 'row', $this->env->getFunction('sylius_test_form_attribute')->getCallable()(((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 11, $this->source); })()) . "company")));
        echo "
";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "street", [], "any", false, false, false, 12), 'row', $this->env->getFunction('sylius_test_form_attribute')->getCallable()(((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 12, $this->source); })()) . "street")));
        echo "

";
        // line 14
        $this->loadTemplate("@SyliusShop/Common/Form/_countryCode.html.twig", "@SyliusShop/Common/Form/_address.html.twig", 14)->display(twig_array_merge($context, ["form" => twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "countryCode", [], "any", false, false, false, 14)]));
        // line 15
        echo "
<div class=\"province-container field\" data-url=\"";
        // line 16
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_ajax_render_province_form");
        echo "\">
    ";
        // line 17
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "provinceCode", [], "any", true, true, false, 17)) {
            // line 18
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "provinceCode", [], "any", false, false, false, 18), 'row', $this->env->getFilter('sylius_merge_recursive')->getCallable()($this->env->getFunction('sylius_test_form_attribute')->getCallable()("province-code"), ["attr" => ["class" => "ui dropdown"]]));
            echo "
    ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 19
($context["form"] ?? null), "provinceName", [], "any", true, true, false, 19)) {
            // line 20
            echo "        ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 20, $this->source); })()), "provinceName", [], "any", false, false, false, 20), 'row', $this->env->getFunction('sylius_test_form_attribute')->getCallable()("province-name"));
            echo "
    ";
        }
        // line 22
        echo "</div>

";
        // line 24
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "provinceCode", [], "any", true, true, false, 24)) {
            // line 25
            echo "    ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 25, $this->source); })()), 'errors');
            echo "
";
        }
        // line 27
        echo "
<div class=\"two fields\">
    ";
        // line 29
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "city", [], "any", false, false, false, 29), 'row', $this->env->getFunction('sylius_test_form_attribute')->getCallable()(((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 29, $this->source); })()) . "city")));
        echo "
    ";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), "postcode", [], "any", false, false, false, 30), 'row', $this->env->getFunction('sylius_test_form_attribute')->getCallable()(((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 30, $this->source); })()) . "postcode")));
        echo "
</div>
";
        // line 32
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 32, $this->source); })()), "phoneNumber", [], "any", false, false, false, 32), 'row');
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Common/Form/_address.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 32,  119 => 30,  115 => 29,  111 => 27,  105 => 25,  103 => 24,  99 => 22,  93 => 20,  91 => 19,  86 => 18,  84 => 17,  80 => 16,  77 => 15,  75 => 14,  70 => 12,  66 => 11,  61 => 9,  57 => 8,  53 => 6,  49 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if type is defined %}
    {% set type = type ~ '-' %}
{% else %}
    {% set type = null %}
{% endif %}

<div class=\"two fields\">
    {{ form_row(form.firstName, sylius_test_form_attribute(type ~ 'first-name')) }}
    {{ form_row(form.lastName, sylius_test_form_attribute(type ~ 'last-name')) }}
</div>
{{ form_row(form.company, sylius_test_form_attribute(type ~ 'company')) }}
{{ form_row(form.street, sylius_test_form_attribute(type ~ 'street')) }}

{% include '@SyliusShop/Common/Form/_countryCode.html.twig' with {'form': form.countryCode} %}

<div class=\"province-container field\" data-url=\"{{ path('sylius_shop_ajax_render_province_form') }}\">
    {% if form.provinceCode is defined %}
        {{ form_row(form.provinceCode, sylius_test_form_attribute('province-code')|sylius_merge_recursive( {'attr': {'class': 'ui dropdown'}})) }}
    {% elseif form.provinceName is defined %}
        {{ form_row(form.provinceName, sylius_test_form_attribute('province-name')) }}
    {% endif %}
</div>

{% if form.provinceCode is defined %}
    {{ form_errors(form) }}
{% endif %}

<div class=\"two fields\">
    {{ form_row(form.city, sylius_test_form_attribute(type ~ 'city')) }}
    {{ form_row(form.postcode, sylius_test_form_attribute(type ~ 'postcode')) }}
</div>
{{ form_row(form.phoneNumber) }}
", "@SyliusShop/Common/Form/_address.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Common/Form/_address.html.twig");
    }
}
