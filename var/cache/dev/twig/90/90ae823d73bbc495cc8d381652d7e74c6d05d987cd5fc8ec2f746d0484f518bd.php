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

/* @SyliusAdmin/Product/Show/_variantContentShipping.html.twig */
class __TwigTemplate_a1b38d8e882a98b53b66164172d39e60b99e8e2f2aa112387e810e86ec0e5143 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_variantContentShipping.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_variantContentShipping.html.twig"));

        // line 1
        echo "<div class=\"column\">
    <div class=\"ui segment\">
        <div class=\"ui small header\">
            ";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping"), "html", null, true);
        echo "
        </div>
        ";
        // line 6
        if ((((((twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 6, $this->source); })()), "shippingCategory", [], "any", false, false, false, 6) === null) && (twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 6, $this->source); })()), "width", [], "any", false, false, false, 6) === null)) && (twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 6, $this->source); })()), "height", [], "any", false, false, false, 6) === null)) && (twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 6, $this->source); })()), "depth", [], "any", false, false, false, 6) === null)) && (twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 6, $this->source); })()), "weight", [], "any", false, false, false, 6) === null))) {
            // line 7
            echo "            <div class=\"ui teal message\">
                <p>";
            // line 8
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.no_shipping_data"), "html", null, true);
            echo "</p>
            </div>
        ";
        } else {
            // line 11
            echo "            <table class=\"ui very basic celled table\">
                <tbody>
                <tr>
                    <td class=\"five wide gray text\"><strong>";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_category"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 15, $this->source); })()), "shippingCategory", [], "any", false, false, false, 15), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"five wide gray text\"><strong>";
            // line 18
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.width"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 19, $this->source); })()), "width", [], "any", false, false, false, 19), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"five wide gray text\"><strong>";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.height"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 23, $this->source); })()), "height", [], "any", false, false, false, 23), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"five wide gray text\"><strong>";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.depth"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 27, $this->source); })()), "depth", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"five wide gray text\"><strong>";
            // line 30
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.weight"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 31, $this->source); })()), "weight", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                </tr>
                </tbody>
            </table>
        ";
        }
        // line 36
        echo "    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_variantContentShipping.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 36,  113 => 31,  109 => 30,  103 => 27,  99 => 26,  93 => 23,  89 => 22,  83 => 19,  79 => 18,  73 => 15,  69 => 14,  64 => 11,  58 => 8,  55 => 7,  53 => 6,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"column\">
    <div class=\"ui segment\">
        <div class=\"ui small header\">
            {{ 'sylius.ui.shipping'|trans }}
        </div>
        {% if variant.shippingCategory is same as(null) and variant.width is same as(null) and variant.height is same as(null) and variant.depth is same as(null) and variant.weight is same as(null) %}
            <div class=\"ui teal message\">
                <p>{{ 'sylius.ui.no_shipping_data'|trans }}</p>
            </div>
        {% else %}
            <table class=\"ui very basic celled table\">
                <tbody>
                <tr>
                    <td class=\"five wide gray text\"><strong>{{ 'sylius.ui.shipping_category'|trans }}</strong></td>
                    <td>{{ variant.shippingCategory }}</td>
                </tr>
                <tr>
                    <td class=\"five wide gray text\"><strong>{{ 'sylius.ui.width'|trans }}</strong></td>
                    <td>{{ variant.width }}</td>
                </tr>
                <tr>
                    <td class=\"five wide gray text\"><strong>{{ 'sylius.ui.height'|trans }}</strong></td>
                    <td>{{ variant.height }}</td>
                </tr>
                <tr>
                    <td class=\"five wide gray text\"><strong>{{ 'sylius.ui.depth'|trans }}</strong></td>
                    <td>{{ variant.depth }}</td>
                </tr>
                <tr>
                    <td class=\"five wide gray text\"><strong>{{ 'sylius.ui.weight'|trans }}</strong></td>
                    <td>{{ variant.weight }}</td>
                </tr>
                </tbody>
            </table>
        {% endif %}
    </div>
</div>
", "@SyliusAdmin/Product/Show/_variantContentShipping.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_variantContentShipping.html.twig");
    }
}
