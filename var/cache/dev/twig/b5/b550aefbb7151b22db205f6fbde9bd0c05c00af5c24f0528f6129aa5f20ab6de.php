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

/* @SyliusAttribute/Types/select.html.twig */
class __TwigTemplate_3392705301a7fbe36825a48c336668d253ab905ee9e6c7349c9ab3d28b7d9c73 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAttribute/Types/select.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAttribute/Types/select.html.twig"));

        // line 1
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["attribute"]) || array_key_exists("attribute", $context) ? $context["attribute"] : (function () { throw new RuntimeError('Variable "attribute" does not exist.', 1, $this->source); })()), "value", [], "any", false, false, false, 1))) {
            // line 2
            echo "    ";
            $context["values"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["attribute"]) || array_key_exists("attribute", $context) ? $context["attribute"] : (function () { throw new RuntimeError('Variable "attribute" does not exist.', 2, $this->source); })()), "attribute", [], "any", false, false, false, 2), "configuration", [], "any", false, false, false, 2), "choices", [], "any", false, false, false, 2);
            // line 3
            echo "    ";
            if (twig_test_iterable(twig_get_attribute($this->env, $this->source, (isset($context["attribute"]) || array_key_exists("attribute", $context) ? $context["attribute"] : (function () { throw new RuntimeError('Variable "attribute" does not exist.', 3, $this->source); })()), "value", [], "any", false, false, false, 3))) {
                // line 4
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["attribute"]) || array_key_exists("attribute", $context) ? $context["attribute"] : (function () { throw new RuntimeError('Variable "attribute" does not exist.', 4, $this->source); })()), "value", [], "any", false, false, false, 4));
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
                foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                    // line 5
                    echo "            ";
                    if ((twig_in_filter((isset($context["locale"]) || array_key_exists("locale", $context) ? $context["locale"] : (function () { throw new RuntimeError('Variable "locale" does not exist.', 5, $this->source); })()), twig_get_array_keys_filter(twig_get_attribute($this->env, $this->source, (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 5, $this->source); })()), $context["value"], [], "array", false, false, false, 5))) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 5, $this->source); })()), $context["value"], [], "array", false, false, false, 5), (isset($context["locale"]) || array_key_exists("locale", $context) ? $context["locale"] : (function () { throw new RuntimeError('Variable "locale" does not exist.', 5, $this->source); })()), [], "array", false, false, false, 5)))) {
                        // line 6
                        echo "                ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 6, $this->source); })()), $context["value"], [], "array", false, false, false, 6), (isset($context["locale"]) || array_key_exists("locale", $context) ? $context["locale"] : (function () { throw new RuntimeError('Variable "locale" does not exist.', 6, $this->source); })()), [], "array", false, false, false, 6), "html", null, true);
                        if ((twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 6) == false)) {
                            echo ", ";
                        }
                        // line 7
                        echo "            ";
                    } else {
                        // line 8
                        echo "                ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 8, $this->source); })()), $context["value"], [], "array", false, false, false, 8), (isset($context["fallbackLocale"]) || array_key_exists("fallbackLocale", $context) ? $context["fallbackLocale"] : (function () { throw new RuntimeError('Variable "fallbackLocale" does not exist.', 8, $this->source); })()), [], "array", false, false, false, 8), "html", null, true);
                        if ((twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 8) == false)) {
                            echo ", ";
                        }
                        // line 9
                        echo "            ";
                    }
                    // line 10
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 11
                echo "    ";
            } else {
                // line 12
                echo "        ";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 12, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["attribute"]) || array_key_exists("attribute", $context) ? $context["attribute"] : (function () { throw new RuntimeError('Variable "attribute" does not exist.', 12, $this->source); })()), "value", [], "any", false, false, false, 12), [], "array", false, false, false, 12), (isset($context["locale"]) || array_key_exists("locale", $context) ? $context["locale"] : (function () { throw new RuntimeError('Variable "locale" does not exist.', 12, $this->source); })()), [], "array", false, false, false, 12))) {
                    // line 13
                    echo "            ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 13, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["attribute"]) || array_key_exists("attribute", $context) ? $context["attribute"] : (function () { throw new RuntimeError('Variable "attribute" does not exist.', 13, $this->source); })()), "value", [], "any", false, false, false, 13), [], "array", false, false, false, 13), (isset($context["locale"]) || array_key_exists("locale", $context) ? $context["locale"] : (function () { throw new RuntimeError('Variable "locale" does not exist.', 13, $this->source); })()), [], "array", false, false, false, 13), "html", null, true);
                    echo "
        ";
                } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 14
(isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 14, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["attribute"]) || array_key_exists("attribute", $context) ? $context["attribute"] : (function () { throw new RuntimeError('Variable "attribute" does not exist.', 14, $this->source); })()), "value", [], "any", false, false, false, 14), [], "array", false, false, false, 14), (isset($context["fallbackLocale"]) || array_key_exists("fallbackLocale", $context) ? $context["fallbackLocale"] : (function () { throw new RuntimeError('Variable "fallbackLocale" does not exist.', 14, $this->source); })()), [], "array", false, false, false, 14))) {
                    // line 15
                    echo "            ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["values"]) || array_key_exists("values", $context) ? $context["values"] : (function () { throw new RuntimeError('Variable "values" does not exist.', 15, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["attribute"]) || array_key_exists("attribute", $context) ? $context["attribute"] : (function () { throw new RuntimeError('Variable "attribute" does not exist.', 15, $this->source); })()), "value", [], "any", false, false, false, 15), [], "array", false, false, false, 15), (isset($context["fallbackLocale"]) || array_key_exists("fallbackLocale", $context) ? $context["fallbackLocale"] : (function () { throw new RuntimeError('Variable "fallbackLocale" does not exist.', 15, $this->source); })()), [], "array", false, false, false, 15), "html", null, true);
                    echo "
        ";
                }
                // line 17
                echo "    ";
            }
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAttribute/Types/select.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 17,  117 => 15,  115 => 14,  110 => 13,  107 => 12,  104 => 11,  90 => 10,  87 => 9,  81 => 8,  78 => 7,  72 => 6,  69 => 5,  51 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if attribute.value is not null %}
    {% set values = attribute.attribute.configuration.choices %}
    {% if attribute.value is iterable %}
        {% for value in attribute.value %}
            {% if locale in values[value]|keys and values[value][locale] is not empty %}
                {{ values[value][locale] }}{% if loop.last == false %}, {% endif %}
            {% else %}
                {{ values[value][fallbackLocale] }}{% if loop.last == false %}, {% endif %}
            {% endif %}
        {% endfor %}
    {% else %}
        {% if values[attribute.value][locale] is not empty %}
            {{ values[attribute.value][locale] }}
        {% elseif values[attribute.value][fallbackLocale] is not empty %}
            {{ values[attribute.value][fallbackLocale] }}
        {% endif %}
    {% endif %}
{% endif %}
", "@SyliusAttribute/Types/select.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AttributeBundle/Resources/views/Types/select.html.twig");
    }
}
