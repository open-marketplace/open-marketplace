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

/* @SyliusShop/Product/Show/_breadcrumb.html.twig */
class __TwigTemplate_bdaa78e6dee9b84a7577fd4bee85fa5a726bffbe7ea0e316a66efc606de3da7c extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_breadcrumb.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_breadcrumb.html.twig"));

        // line 1
        echo "<div class=\"ui breadcrumb\">
    <a href=\"";
        // line 2
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_homepage");
        echo "\" class=\"section\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.home"), "html", null, true);
        echo "</a>
    <div class=\"divider\"> / </div>
    ";
        // line 4
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 4, $this->source); })()), "mainTaxon", [], "any", false, false, false, 4))) {
            // line 5
            echo "        ";
            $context["taxon"] = twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "mainTaxon", [], "any", false, false, false, 5);
            // line 6
            echo "        ";
            $context["ancestors"] = twig_reverse_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["taxon"]) || array_key_exists("taxon", $context) ? $context["taxon"] : (function () { throw new RuntimeError('Variable "taxon" does not exist.', 6, $this->source); })()), "ancestors", [], "any", false, false, false, 6));
            // line 7
            echo "
        ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["ancestors"]) || array_key_exists("ancestors", $context) ? $context["ancestors"] : (function () { throw new RuntimeError('Variable "ancestors" does not exist.', 8, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["ancestor"]) {
                // line 9
                echo "            ";
                if ((twig_get_attribute($this->env, $this->source, $context["ancestor"], "isRoot", [], "method", false, false, false, 9) ||  !twig_get_attribute($this->env, $this->source, $context["ancestor"], "enabled", [], "any", false, false, false, 9))) {
                    // line 10
                    echo "                <div class=\"section\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ancestor"], "name", [], "any", false, false, false, 10), "html", null, true);
                    echo "</div>
            ";
                } else {
                    // line 12
                    echo "                <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_product_index", ["slug" => twig_get_attribute($this->env, $this->source, $context["ancestor"], "slug", [], "any", false, false, false, 12), "_locale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["ancestor"], "translation", [], "any", false, false, false, 12), "locale", [], "any", false, false, false, 12)]), "html", null, true);
                    echo "\" class=\"section\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ancestor"], "name", [], "any", false, false, false, 12), "html", null, true);
                    echo "</a>
            ";
                }
                // line 14
                echo "            <div class=\"divider\"> / </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ancestor'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "
        ";
            // line 17
            if (twig_get_attribute($this->env, $this->source, (isset($context["taxon"]) || array_key_exists("taxon", $context) ? $context["taxon"] : (function () { throw new RuntimeError('Variable "taxon" does not exist.', 17, $this->source); })()), "enabled", [], "any", false, false, false, 17)) {
                // line 18
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_product_index", ["slug" => twig_get_attribute($this->env, $this->source, (isset($context["taxon"]) || array_key_exists("taxon", $context) ? $context["taxon"] : (function () { throw new RuntimeError('Variable "taxon" does not exist.', 18, $this->source); })()), "slug", [], "any", false, false, false, 18), "_locale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["taxon"]) || array_key_exists("taxon", $context) ? $context["taxon"] : (function () { throw new RuntimeError('Variable "taxon" does not exist.', 18, $this->source); })()), "translation", [], "any", false, false, false, 18), "locale", [], "any", false, false, false, 18)]), "html", null, true);
                echo "\" class=\"section\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["taxon"]) || array_key_exists("taxon", $context) ? $context["taxon"] : (function () { throw new RuntimeError('Variable "taxon" does not exist.', 18, $this->source); })()), "name", [], "any", false, false, false, 18), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 20
                echo "            <div class=\"section\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["taxon"]) || array_key_exists("taxon", $context) ? $context["taxon"] : (function () { throw new RuntimeError('Variable "taxon" does not exist.', 20, $this->source); })()), "name", [], "any", false, false, false, 20), "html", null, true);
                echo "</div>
        ";
            }
            // line 22
            echo "        <div class=\"divider\"> / </div>
    ";
        }
        // line 24
        echo "    <div class=\"active section\">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 24, $this->source); })()), "name", [], "any", false, false, false, 24), "html", null, true);
        echo "</div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Show/_breadcrumb.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 24,  111 => 22,  105 => 20,  97 => 18,  95 => 17,  92 => 16,  85 => 14,  77 => 12,  71 => 10,  68 => 9,  64 => 8,  61 => 7,  58 => 6,  55 => 5,  53 => 4,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui breadcrumb\">
    <a href=\"{{ path('sylius_shop_homepage') }}\" class=\"section\">{{ 'sylius.ui.home'|trans }}</a>
    <div class=\"divider\"> / </div>
    {% if product.mainTaxon is not null %}
        {% set taxon = product.mainTaxon %}
        {% set ancestors = taxon.ancestors|reverse %}

        {% for ancestor in ancestors %}
            {% if ancestor.isRoot()  or not ancestor.enabled %}
                <div class=\"section\">{{ ancestor.name }}</div>
            {% else %}
                <a href=\"{{ path('sylius_shop_product_index', {'slug': ancestor.slug, '_locale': ancestor.translation.locale}) }}\" class=\"section\">{{ ancestor.name }}</a>
            {% endif %}
            <div class=\"divider\"> / </div>
        {% endfor %}

        {% if taxon.enabled %}
            <a href=\"{{ path('sylius_shop_product_index', {'slug': taxon.slug, '_locale': taxon.translation.locale}) }}\" class=\"section\">{{ taxon.name }}</a>
        {% else %}
            <div class=\"section\">{{ taxon.name }}</div>
        {% endif %}
        <div class=\"divider\"> / </div>
    {% endif %}
    <div class=\"active section\">{{ product.name }}</div>
</div>
", "@SyliusShop/Product/Show/_breadcrumb.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Show/_breadcrumb.html.twig");
    }
}
