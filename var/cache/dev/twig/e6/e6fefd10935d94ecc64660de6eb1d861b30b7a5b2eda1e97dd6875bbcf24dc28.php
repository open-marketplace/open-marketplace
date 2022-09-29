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

/* @SyliusShop/Product/Show/_variantsPricing.html.twig */
class __TwigTemplate_5f851abd41a3c925a27baa6d71192dd85bb20c736c819d5eee94a71194017bbe extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_variantsPricing.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_variantsPricing.html.twig"));

        // line 1
        $macros["money"] = $this->macros["money"] = $this->loadTemplate("@SyliusShop/Common/Macro/money.html.twig", "@SyliusShop/Product/Show/_variantsPricing.html.twig", 1)->unwrap();
        // line 2
        echo "
<div id=\"sylius-variants-pricing\" data-unavailable-text=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.unavailable"), "html", null, true);
        echo "\">
";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pricing"]) || array_key_exists("pricing", $context) ? $context["pricing"] : (function () { throw new RuntimeError('Variable "pricing" does not exist.', 4, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["price"]) {
            // line 5
            echo "    ";
            $context["catalog_promotions"] = [];
            // line 6
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, $context["price"], "applied_promotions", [], "any", true, true, false, 6)) {
                // line 7
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["price"], "applied_promotions", [], "any", false, false, false, 7));
                foreach ($context['_seq'] as $context["_key"] => $context["promotion"]) {
                    // line 8
                    echo "            ";
                    $context["catalog_promotions"] = twig_array_merge((isset($context["catalog_promotions"]) || array_key_exists("catalog_promotions", $context) ? $context["catalog_promotions"] : (function () { throw new RuntimeError('Variable "catalog_promotions" does not exist.', 8, $this->source); })()), [0 => ["label" => twig_get_attribute($this->env, $this->source, $context["promotion"], "name", [], "any", false, false, false, 8), "description" => twig_get_attribute($this->env, $this->source, $context["promotion"], "description", [], "any", false, false, false, 8)]]);
                    // line 9
                    echo "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['promotion'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 10
                echo "    ";
            }
            // line 11
            echo "    <div ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["price"]);
            foreach ($context['_seq'] as $context["option"] => $context["value"]) {
                echo "data-";
                echo twig_escape_filter($this->env, $context["option"], "html", null, true);
                echo "=\"";
                if ((($context["option"] == "value") || ($context["option"] == "original-price"))) {
                    echo twig_call_macro($macros["money"], "macro_convertAndFormat", [$context["value"]], 11, $context, $this->getSourceContext());
                } elseif (($context["option"] == "applied_promotions")) {
                    echo twig_escape_filter($this->env, json_encode((isset($context["catalog_promotions"]) || array_key_exists("catalog_promotions", $context) ? $context["catalog_promotions"] : (function () { throw new RuntimeError('Variable "catalog_promotions" does not exist.', 11, $this->source); })())), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_replace_filter($context["value"], ["\"" => "'"]), "html", null, true);
                }
                echo "\" ";
                echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("variant-price");
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['option'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "></div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['price'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Show/_variantsPricing.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 13,  79 => 11,  76 => 10,  70 => 9,  67 => 8,  62 => 7,  59 => 6,  56 => 5,  52 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import \"@SyliusShop/Common/Macro/money.html.twig\" as money %}

<div id=\"sylius-variants-pricing\" data-unavailable-text=\"{{ 'sylius.ui.unavailable'|trans }}\">
{% for price in pricing %}
    {% set catalog_promotions = [] %}
    {% if price.applied_promotions is defined %}
        {% for promotion in price.applied_promotions %}
            {% set catalog_promotions = catalog_promotions|merge([{'label': promotion.name, 'description': promotion.description}]) %}
        {% endfor %}
    {% endif %}
    <div {% for option, value in price %}data-{{ option }}=\"{% if option == 'value' or option == 'original-price' %}{{ money.convertAndFormat(value) }}{% elseif option == 'applied_promotions' %}{{ catalog_promotions|json_encode }}{% else %}{{ value|replace({'\\\"': '\\''}) }}{% endif %}\" {{ sylius_test_html_attribute('variant-price') }}{% endfor %}></div>
{% endfor %}
</div>
", "@SyliusShop/Product/Show/_variantsPricing.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Show/_variantsPricing.html.twig");
    }
}
