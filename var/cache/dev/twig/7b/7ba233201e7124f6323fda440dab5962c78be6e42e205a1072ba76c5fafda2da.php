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

/* @SyliusAdmin/Product/Show/_shipping.html.twig */
class __TwigTemplate_85d71daa269d1c405fbcb41cb2d58410d527e7bc4c7ec104b62ee3d475c2c347 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_shipping.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_shipping.html.twig"));

        // line 1
        echo "<div id=\"shipping\">
    <h4 class=\"ui top attached large header\">";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping"), "html", null, true);
        echo "</h4>
    <div class=\"ui attached segment\">
        <table class=\"ui very basic celled table\">
            <tbody>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_category"), "html", null, true);
        echo "</strong></td>
                <td>";
        // line 8
        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 8, $this->source); })()), "variants", [], "any", false, false, false, 8), "first", [], "any", false, false, false, 8), "shippingCategory", [], "any", false, false, false, 8))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 8, $this->source); })()), "variants", [], "any", false, false, false, 8), "first", [], "any", false, false, false, 8), "shippingCategory", [], "any", false, false, false, 8), "html", null, true))) : (print ("-")));
        echo "</td>
            </tr>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.width"), "html", null, true);
        echo "</strong></td>
                <td>";
        // line 12
        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 12, $this->source); })()), "variants", [], "any", false, false, false, 12), "first", [], "any", false, false, false, 12), "width", [], "any", false, false, false, 12))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 12, $this->source); })()), "variants", [], "any", false, false, false, 12), "first", [], "any", false, false, false, 12), "width", [], "any", false, false, false, 12), "html", null, true))) : (print ("-")));
        echo "</td>
            </tr>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.height"), "html", null, true);
        echo "</strong></td>
                <td>";
        // line 16
        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 16, $this->source); })()), "variants", [], "any", false, false, false, 16), "first", [], "any", false, false, false, 16), "height", [], "any", false, false, false, 16))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 16, $this->source); })()), "variants", [], "any", false, false, false, 16), "first", [], "any", false, false, false, 16), "height", [], "any", false, false, false, 16), "html", null, true))) : (print ("-")));
        echo "</td>
            </tr>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.depth"), "html", null, true);
        echo "</strong></td>
                <td>";
        // line 20
        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 20, $this->source); })()), "variants", [], "any", false, false, false, 20), "first", [], "any", false, false, false, 20), "depth", [], "any", false, false, false, 20))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 20, $this->source); })()), "variants", [], "any", false, false, false, 20), "first", [], "any", false, false, false, 20), "depth", [], "any", false, false, false, 20), "html", null, true))) : (print ("-")));
        echo "</td>
            </tr>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.weight"), "html", null, true);
        echo "</strong></td>
                <td>";
        // line 24
        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 24, $this->source); })()), "variants", [], "any", false, false, false, 24), "first", [], "any", false, false, false, 24), "weight", [], "any", false, false, false, 24))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 24, $this->source); })()), "variants", [], "any", false, false, false, 24), "first", [], "any", false, false, false, 24), "weight", [], "any", false, false, false, 24), "html", null, true))) : (print ("-")));
        echo "</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_shipping.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 24,  94 => 23,  88 => 20,  84 => 19,  78 => 16,  74 => 15,  68 => 12,  64 => 11,  58 => 8,  54 => 7,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"shipping\">
    <h4 class=\"ui top attached large header\">{{ 'sylius.ui.shipping'|trans }}</h4>
    <div class=\"ui attached segment\">
        <table class=\"ui very basic celled table\">
            <tbody>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">{{ 'sylius.ui.shipping_category'|trans }}</strong></td>
                <td>{{ product.variants.first.shippingCategory is not empty ? product.variants.first.shippingCategory : '-' }}</td>
            </tr>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">{{ 'sylius.ui.width'|trans }}</strong></td>
                <td>{{ product.variants.first.width is not empty ? product.variants.first.width : '-' }}</td>
            </tr>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">{{ 'sylius.ui.height'|trans }}</strong></td>
                <td>{{ product.variants.first.height is not empty ? product.variants.first.height : '-' }}</td>
            </tr>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">{{ 'sylius.ui.depth'|trans }}</strong></td>
                <td>{{ product.variants.first.depth is not empty ? product.variants.first.depth : '-' }}</td>
            </tr>
            <tr>
                <td class=\"seven wide\"><strong class=\"gray text\">{{ 'sylius.ui.weight'|trans }}</strong></td>
                <td>{{ product.variants.first.weight is not empty ? product.variants.first.weight : '-' }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
", "@SyliusAdmin/Product/Show/_shipping.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_shipping.html.twig");
    }
}
