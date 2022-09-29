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

/* @SyliusAdmin/ProductVariant/Tab/_channelPricings.html.twig */
class __TwigTemplate_8783701e515315b2894d124972aa10c34fe8789bd38e4c3bafd964007fcb631e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ProductVariant/Tab/_channelPricings.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ProductVariant/Tab/_channelPricings.html.twig"));

        // line 1
        echo "<div class=\"ui tab\" data-tab=\"channel_pricings\">
    <h3 class=\"ui dividing header\">";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.channel_pricings"), "html", null, true);
        echo "</h3>
    <div class=\"ui info message\">
        ";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.price_details"), "html", null, true);
        echo "
        <br/>
        ";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.original_price_details"), "html", null, true);
        echo "
        <br/>
        ";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.minimum_price_details"), "html", null, true);
        echo "
    </div>
    <div id=\"sylius_product_variant_channelPricings\">
        ";
        // line 11
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 11, $this->source); })()), "channelPricings", [], "any", false, false, false, 11), 'errors');
        echo "
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "channelPricings", [], "any", false, false, false, 12));
        foreach ($context['_seq'] as $context["channelCode"] => $context["channelPricing"]) {
            // line 13
            echo "            <div class=\"ui segment\">
                <div>
                    <strong>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["channelPricing"], "vars", [], "any", false, false, false, 15), "label", [], "any", false, false, false, 15), "html", null, true);
            echo "</strong>
                </div>
                ";
            // line 17
            if (!twig_in_filter($context["channelCode"], twig_array_map($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product_variant"]) || array_key_exists("product_variant", $context) ? $context["product_variant"] : (function () { throw new RuntimeError('Variable "product_variant" does not exist.', 17, $this->source); })()), "product", [], "any", false, false, false, 17), "channels", [], "any", false, false, false, 17), function ($__channel__) use ($context, $macros) { $context["channel"] = $__channel__; return twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 17, $this->source); })()), "code", [], "any", false, false, false, 17); }))) {
                // line 18
                echo "                    <div class=\"ui info message\">
                        ";
                // line 19
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.product.product_not_active_in_channel"), "html", null, true);
                echo "
                    </div>
                ";
            }
            // line 22
            echo "                ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["channelPricing"], "price", [], "any", false, false, false, 22), 'row');
            echo "
                ";
            // line 23
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["channelPricing"], "originalPrice", [], "any", false, false, false, 23), 'row');
            echo "
                ";
            // line 24
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, $context["channelPricing"], "minimumPrice", [], "any", false, false, false, 24), 'row');
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['channelCode'], $context['channelPricing'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "    </div>

    ";
        // line 29
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render([0 => (("sylius.admin.product_variant." . (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 29, $this->source); })())) . ".tab_channel_pricings"), 1 => "sylius.admin.product_variant.channelPricings"], ["form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })())]);
        echo "
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/ProductVariant/Tab/_channelPricings.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 29,  113 => 27,  104 => 24,  100 => 23,  95 => 22,  89 => 19,  86 => 18,  84 => 17,  79 => 15,  75 => 13,  71 => 12,  67 => 11,  61 => 8,  56 => 6,  51 => 4,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui tab\" data-tab=\"channel_pricings\">
    <h3 class=\"ui dividing header\">{{ 'sylius.ui.channel_pricings'|trans }}</h3>
    <div class=\"ui info message\">
        {{ 'sylius.ui.price_details'|trans }}
        <br/>
        {{ 'sylius.ui.original_price_details'|trans }}
        <br/>
        {{ 'sylius.ui.minimum_price_details'|trans }}
    </div>
    <div id=\"sylius_product_variant_channelPricings\">
        {{ form_errors(form.channelPricings) }}
        {% for channelCode, channelPricing in form.channelPricings %}
            <div class=\"ui segment\">
                <div>
                    <strong>{{ channelPricing.vars.label }}</strong>
                </div>
                {% if channelCode not in product_variant.product.channels|map(channel => channel.code) %}
                    <div class=\"ui info message\">
                        {{ 'sylius.ui.product.product_not_active_in_channel'|trans }}
                    </div>
                {% endif %}
                {{ form_row(channelPricing.price) }}
                {{ form_row(channelPricing.originalPrice) }}
                {{ form_row(channelPricing.minimumPrice) }}
            </div>
        {% endfor %}
    </div>

    {{ sylius_template_event(['sylius.admin.product_variant.' ~ action ~ '.tab_channel_pricings', 'sylius.admin.product_variant.channelPricings'], {'form': form}) }}
</div>
", "@SyliusAdmin/ProductVariant/Tab/_channelPricings.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/ProductVariant/Tab/_channelPricings.html.twig");
    }
}
