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

/* @SyliusAdmin/Product/_channel_pricing.html.twig */
class __TwigTemplate_e74877637cb0f15d1f154cc4f6803c15f25b0cfdb22985369bcd05d6517c766a extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/_channel_pricing.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/_channel_pricing.html.twig"));

        // line 1
        echo "<div id=\"sylius_product_variant_channelPricings\">
    ";
        // line 2
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["variantForm"]) || array_key_exists("variantForm", $context) ? $context["variantForm"] : (function () { throw new RuntimeError('Variable "variantForm" does not exist.', 2, $this->source); })()), "channelPricings", [], "any", false, false, false, 2), 'errors');
        echo "
    <div class=\"ui top attached tabular menu\">
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["variantForm"]) || array_key_exists("variantForm", $context) ? $context["variantForm"] : (function () { throw new RuntimeError('Variable "variantForm" does not exist.', 4, $this->source); })()), "channelPricings", [], "any", false, false, false, 4));
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
        foreach ($context['_seq'] as $context["channelCode"] => $context["channelPricing"]) {
            // line 5
            echo "            ";
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 5) == 0)) {
                // line 6
                echo "                <a class=\"item active\" data-tab=\"";
                echo twig_escape_filter($this->env, $context["channelCode"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["channelPricing"], "vars", [], "any", false, false, false, 6), "label", [], "any", false, false, false, 6), "html", null, true);
                echo "</a>
            ";
            } else {
                // line 8
                echo "                <a class=\"item\" data-tab=\"";
                echo twig_escape_filter($this->env, $context["channelCode"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["channelPricing"], "vars", [], "any", false, false, false, 8), "label", [], "any", false, false, false, 8), "html", null, true);
                echo "</a>
            ";
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
        unset($context['_seq'], $context['_iterated'], $context['channelCode'], $context['channelPricing'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "    </div>
    ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["variantForm"]) || array_key_exists("variantForm", $context) ? $context["variantForm"] : (function () { throw new RuntimeError('Variable "variantForm" does not exist.', 12, $this->source); })()), "channelPricings", [], "any", false, false, false, 12));
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
        foreach ($context['_seq'] as $context["channelCode"] => $context["channelPricing"]) {
            // line 13
            echo "        ";
            if ((twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 13) == 0)) {
                // line 14
                echo "            <div class=\"ui bottom attached active tab segment\" data-tab=\"";
                echo twig_escape_filter($this->env, $context["channelCode"], "html", null, true);
                echo "\">
        ";
            } else {
                // line 16
                echo "            <div class=\"ui bottom attached tab segment\" data-tab=\"";
                echo twig_escape_filter($this->env, $context["channelCode"], "html", null, true);
                echo "\">
        ";
            }
            // line 18
            echo "
        ";
            // line 19
            if (!twig_in_filter($context["channelCode"], twig_array_map($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 19, $this->source); })()), "channels", [], "any", false, false, false, 19), function ($__channel__) use ($context, $macros) { $context["channel"] = $__channel__; return twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 19, $this->source); })()), "code", [], "any", false, false, false, 19); }))) {
                // line 20
                echo "        <div class=\"ui info message\">
            ";
                // line 21
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.product.product_not_active_in_channel"), "html", null, true);
                echo "
        </div>
        ";
            }
            // line 24
            echo "            ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["channelPricing"], 'row', ["label" => false]);
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
        unset($context['_seq'], $context['_iterated'], $context['channelCode'], $context['channelPricing'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/_channel_pricing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 27,  150 => 24,  144 => 21,  141 => 20,  139 => 19,  136 => 18,  130 => 16,  124 => 14,  121 => 13,  104 => 12,  101 => 11,  87 => 10,  79 => 8,  71 => 6,  68 => 5,  51 => 4,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"sylius_product_variant_channelPricings\">
    {{ form_errors(variantForm.channelPricings) }}
    <div class=\"ui top attached tabular menu\">
        {% for channelCode, channelPricing in variantForm.channelPricings %}
            {% if loop.index0 == 0 %}
                <a class=\"item active\" data-tab=\"{{ channelCode }}\">{{ channelPricing.vars.label }}</a>
            {% else %}
                <a class=\"item\" data-tab=\"{{ channelCode }}\">{{ channelPricing.vars.label }}</a>
            {% endif %}
        {% endfor %}
    </div>
    {% for channelCode, channelPricing in variantForm.channelPricings %}
        {% if loop.index0 == 0 %}
            <div class=\"ui bottom attached active tab segment\" data-tab=\"{{ channelCode }}\">
        {% else %}
            <div class=\"ui bottom attached tab segment\" data-tab=\"{{ channelCode }}\">
        {% endif %}

        {% if channelCode not in product.channels|map(channel => channel.code) %}
        <div class=\"ui info message\">
            {{ 'sylius.ui.product.product_not_active_in_channel'|trans }}
        </div>
        {% endif %}
            {{ form_row(channelPricing, {'label': false}) }}
        </div>
    {% endfor %}
</div>
", "@SyliusAdmin/Product/_channel_pricing.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/_channel_pricing.html.twig");
    }
}
