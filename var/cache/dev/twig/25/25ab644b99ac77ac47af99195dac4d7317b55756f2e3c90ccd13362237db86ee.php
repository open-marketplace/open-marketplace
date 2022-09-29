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

/* @SyliusShop/Checkout/SelectShipping/_shipment.html.twig */
class __TwigTemplate_c0f61d0364acaba71d2f1e8893eff6de63f6ab3611c2335954c32bc1a9070bb3 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/SelectShipping/_shipment.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/SelectShipping/_shipment.html.twig"));

        // line 1
        echo "<div class=\"ui segment\">
    <div class=\"ui dividing header\">";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipment"), "html", null, true);
        echo " #";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["loop"]) || array_key_exists("loop", $context) ? $context["loop"] : (function () { throw new RuntimeError('Variable "loop" does not exist.', 2, $this->source); })()), "index", [], "any", false, false, false, 2), "html", null, true);
        echo "</div>
    <div class=\"ui fluid stackable items\" ";
        // line 3
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("shipments");
        echo ">
        ";
        // line 4
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "method", [], "any", false, false, false, 4), 'errors');
        echo "

        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), "method", [], "any", false, false, false, 6));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["key"] => $context["choice_form"]) {
            // line 7
            echo "            ";
            $context["fee"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 7, $this->source); })()), "method", [], "any", false, false, false, 7), "vars", [], "any", false, false, false, 7), "shipping_costs", [], "any", false, false, false, 7), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["choice_form"], "vars", [], "any", false, false, false, 7), "value", [], "any", false, false, false, 7), [], "array", false, false, false, 7);
            // line 8
            echo "            ";
            $context["method"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "method", [], "any", false, false, false, 8), "vars", [], "any", false, false, false, 8), "choices", [], "any", false, false, false, 8), $context["key"], [], "array", false, false, false, 8), "data", [], "any", false, false, false, 8);
            // line 9
            echo "            ";
            $this->loadTemplate("@SyliusShop/Checkout/SelectShipping/_choice.html.twig", "@SyliusShop/Checkout/SelectShipping/_shipment.html.twig", 9)->display(twig_array_merge($context, ["form" => $context["choice_form"], "method" => (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 9, $this->source); })()), "fee" => (isset($context["fee"]) || array_key_exists("fee", $context) ? $context["fee"] : (function () { throw new RuntimeError('Variable "fee" does not exist.', 9, $this->source); })())]));
            // line 10
            echo "        ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 11
            echo "            ";
            $this->loadTemplate("@SyliusShop/Checkout/SelectShipping/_unavailable.html.twig", "@SyliusShop/Checkout/SelectShipping/_shipment.html.twig", 11)->display($context);
            // line 12
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['choice_form'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Checkout/SelectShipping/_shipment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 13,  104 => 12,  101 => 11,  88 => 10,  85 => 9,  82 => 8,  79 => 7,  61 => 6,  56 => 4,  52 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui segment\">
    <div class=\"ui dividing header\">{{ 'sylius.ui.shipment'|trans }} #{{ loop.index }}</div>
    <div class=\"ui fluid stackable items\" {{ sylius_test_html_attribute('shipments') }}>
        {{ form_errors(form.method) }}

        {% for key, choice_form in form.method %}
            {% set fee = form.method.vars.shipping_costs[choice_form.vars.value] %}
            {% set method = form.method.vars.choices[key].data %}
            {% include '@SyliusShop/Checkout/SelectShipping/_choice.html.twig' with {'form': choice_form, 'method': method, 'fee': fee} %}
        {% else %}
            {% include '@SyliusShop/Checkout/SelectShipping/_unavailable.html.twig' %}
        {% endfor %}
    </div>
</div>
", "@SyliusShop/Checkout/SelectShipping/_shipment.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Checkout/SelectShipping/_shipment.html.twig");
    }
}
