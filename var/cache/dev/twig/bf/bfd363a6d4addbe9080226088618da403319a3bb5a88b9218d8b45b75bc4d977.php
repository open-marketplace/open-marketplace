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

/* @SyliusAdmin/PaymentMethod/_form.html.twig */
class __TwigTemplate_ea3161e33d17448106a037d6e43492faaba37b77f9bf40c33bf5f79cce351a55 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/PaymentMethod/_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/PaymentMethod/_form.html.twig"));

        // line 1
        $macros["flags"] = $this->macros["flags"] = $this->loadTemplate("@SyliusUi/Macro/flags.html.twig", "@SyliusAdmin/PaymentMethod/_form.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), 'errors');
        echo "

<div class=\"ui segment\">
    <h4 class=\"ui dividing header\">";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.details"), "html", null, true);
        echo "</h4>
    ";
        // line 7
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), 'errors');
        echo "

    <div class=\"two fields\">
        ";
        // line 10
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 10, $this->source); })()), "code", [], "any", false, false, false, 10), 'row');
        echo "
        ";
        // line 11
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "position", [], "any", false, false, false, 11), 'row');
        echo "
    </div>
    ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "enabled", [], "any", false, false, false, 13), 'row');
        echo "
    ";
        // line 14
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "channels", [], "any", false, false, false, 14), 'row');
        echo "
</div>

<div class=\"ui segment\">
    <h4 class=\"ui dividing header\">";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.gateway_configuration"), "html", null, true);
        echo "</h4>

    ";
        // line 20
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 20, $this->source); })()), "gatewayConfig", [], "any", false, false, false, 20), "factoryName", [], "any", false, false, false, 20) == "stripe_checkout")) {
            // line 21
            echo "        <div class=\"ui icon negative orange message sylius-flash-message\">
            <i class=\"close icon\"></i>
            <i class=\"warning icon\"></i>
            <div class=\"content\">
                <div class=\"header\">
                    ";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.gateway.no_sca_support_notice"), "html", null, true);
            echo "
                </div>
            </div>
        </div>
    ";
        }
        // line 31
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 31, $this->source); })()), "gatewayConfig", [], "any", false, false, false, 31), "factoryName", [], "any", false, false, false, 31) == "paypal_express_checkout")) {
            // line 32
            echo "        <div class=\"ui icon negative orange message sylius-flash-message\">
            <i class=\"close icon\"></i>
            <i class=\"warning icon\"></i>
            <div class=\"content\">
                <div class=\"header\">
                    ";
            // line 37
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.gateway.pay_pal_express_checkout_deprecation_notice");
            // line 38
            echo "                </div>
            </div>
        </div>
    ";
        }
        // line 42
        echo "
    ";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 43, $this->source); })()), "gatewayConfig", [], "any", false, false, false, 43), "factoryName", [], "any", false, false, false, 43), 'row');
        echo "
    ";
        // line 44
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "gatewayConfig", [], "any", false, true, false, 44), "config", [], "any", true, true, false, 44)) {
            // line 45
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "gatewayConfig", [], "any", false, false, false, 45), "config", [], "any", false, false, false, 45));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 46
                echo "            ";
                if (((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 46) % 2 != 0) &&  !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 46))) {
                    echo "<div class=\"two fields\">";
                }
                // line 47
                echo "            ";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'row');
                echo "
            ";
                // line 48
                if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 48) % 2 == 0)) {
                    echo "</div>";
                }
                // line 49
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "    ";
        }
        // line 51
        echo "</div>

<div class=\"ui styled fluid accordion\">
    ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 54, $this->source); })()), "translations", [], "any", false, false, false, 54));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["locale"] => $context["translationForm"]) {
            // line 55
            echo "        <div class=\"title";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 55)) {
                echo " active";
            }
            echo "\">
            <i class=\"dropdown icon\"></i>
            ";
            // line 57
            echo twig_call_macro($macros["flags"], "macro_fromLocaleCode", [$context["locale"]], 57, $context, $this->getSourceContext());
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getFilter('sylius_locale_name')->getCallable()($context["locale"]), "html", null, true);
            echo "
        </div>
        <div class=\"content";
            // line 59
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 59)) {
                echo " active";
            }
            echo "\">
            ";
            // line 60
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["translationForm"], "name", [], "any", false, false, false, 60), 'row');
            echo "
            ";
            // line 61
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["translationForm"], "description", [], "any", false, false, false, 61), 'row');
            echo "
            <div class=\"ui compact message\">
                <p>
                    <i class=\"icon info circle\"></i> ";
            // line 64
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.the_instructions_below_will_be_displayed_to_the_customer"), "html", null, true);
            echo ".
                </p>
            </div>
            ";
            // line 67
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["translationForm"], "instructions", [], "any", false, false, false, 67), 'row');
            echo "
        </div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['locale'], $context['translationForm'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/PaymentMethod/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 70,  241 => 67,  235 => 64,  229 => 61,  225 => 60,  219 => 59,  212 => 57,  204 => 55,  187 => 54,  182 => 51,  179 => 50,  165 => 49,  161 => 48,  156 => 47,  151 => 46,  133 => 45,  131 => 44,  127 => 43,  124 => 42,  118 => 38,  116 => 37,  109 => 32,  106 => 31,  98 => 26,  91 => 21,  89 => 20,  84 => 18,  77 => 14,  73 => 13,  68 => 11,  64 => 10,  58 => 7,  54 => 6,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/flags.html.twig' as flags %}

{{ form_errors(form) }}

<div class=\"ui segment\">
    <h4 class=\"ui dividing header\">{{ 'sylius.ui.details'|trans }}</h4>
    {{ form_errors(form) }}

    <div class=\"two fields\">
        {{ form_row(form.code) }}
        {{ form_row(form.position) }}
    </div>
    {{ form_row(form.enabled) }}
    {{ form_row(form.channels) }}
</div>

<div class=\"ui segment\">
    <h4 class=\"ui dividing header\">{{ 'sylius.ui.gateway_configuration'|trans }}</h4>

    {% if resource.gatewayConfig.factoryName == 'stripe_checkout' %}
        <div class=\"ui icon negative orange message sylius-flash-message\">
            <i class=\"close icon\"></i>
            <i class=\"warning icon\"></i>
            <div class=\"content\">
                <div class=\"header\">
                    {{ 'sylius.ui.gateway.no_sca_support_notice'|trans }}
                </div>
            </div>
        </div>
    {% endif %}
    {% if resource.gatewayConfig.factoryName == 'paypal_express_checkout' %}
        <div class=\"ui icon negative orange message sylius-flash-message\">
            <i class=\"close icon\"></i>
            <i class=\"warning icon\"></i>
            <div class=\"content\">
                <div class=\"header\">
                    {% autoescape false %}{{ 'sylius.ui.gateway.pay_pal_express_checkout_deprecation_notice'|trans }}{% endautoescape %}
                </div>
            </div>
        </div>
    {% endif %}

    {{ form_row(form.gatewayConfig.factoryName) }}
    {% if form.gatewayConfig.config is defined %}
        {% for field in form.gatewayConfig.config %}
            {% if loop.index is odd and not loop.last %}<div class=\"two fields\">{% endif %}
            {{ form_row(field) }}
            {% if loop.index is even %}</div>{% endif %}
        {% endfor %}
    {% endif %}
</div>

<div class=\"ui styled fluid accordion\">
    {% for locale, translationForm in form.translations %}
        <div class=\"title{% if loop.first %} active{% endif %}\">
            <i class=\"dropdown icon\"></i>
            {{ flags.fromLocaleCode(locale) }} {{ locale|sylius_locale_name }}
        </div>
        <div class=\"content{% if loop.first %} active{% endif %}\">
            {{ form_row(translationForm.name) }}
            {{ form_row(translationForm.description) }}
            <div class=\"ui compact message\">
                <p>
                    <i class=\"icon info circle\"></i> {{ 'sylius.ui.the_instructions_below_will_be_displayed_to_the_customer'|trans }}.
                </p>
            </div>
            {{ form_row(translationForm.instructions) }}
        </div>
    {% endfor %}
</div>
", "@SyliusAdmin/PaymentMethod/_form.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/PaymentMethod/_form.html.twig");
    }
}
