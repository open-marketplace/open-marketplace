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

/* @SyliusAdmin/Product/Show/VariantItem/_item.html.twig */
class __TwigTemplate_3bdbf3e456b219c02965f3a6be69ac1aa4c7b9f7eaf2a4d578d42495046fadbe extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/VariantItem/_item.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/VariantItem/_item.html.twig"));

        // line 1
        echo "<td>
    <div class=\"ui items\">
        <div class=\"item\">
            <div class=\"ui tiny image\">
                ";
        // line 5
        if (twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 5, $this->source); })()), "hasImages", [], "any", false, false, false, 5)) {
            // line 6
            echo "                    ";
            $this->loadTemplate("@SyliusAdmin/Product/_mainImage.html.twig", "@SyliusAdmin/Product/Show/VariantItem/_item.html.twig", 6)->display(twig_array_merge($context, ["product" => (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 6, $this->source); })()), "filter" => "sylius_admin_product_large_thumbnail"]));
            // line 7
            echo "                ";
        } else {
            // line 8
            echo "                    ";
            $this->loadTemplate("@SyliusAdmin/Product/_mainImage.html.twig", "@SyliusAdmin/Product/Show/VariantItem/_item.html.twig", 8)->display(twig_array_merge($context, ["product" => (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 8, $this->source); })()), "filter" => "sylius_admin_product_large_thumbnail"]));
            // line 9
            echo "                ";
        }
        // line 10
        echo "            </div>
            <div class=\"middle aligned content\">
                <div><strong class=\"variant-name\">";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 12, $this->source); })()), "name", [], "any", false, false, false, 12), "html", null, true);
        echo "</strong></div>
                <small class=\"gray text variant-code\">";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["variant"]) || array_key_exists("variant", $context) ? $context["variant"] : (function () { throw new RuntimeError('Variable "variant" does not exist.', 13, $this->source); })()), "code", [], "any", false, false, false, 13), "html", null, true);
        echo "</small>
            </div>
        </div>
    </div>
</td>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/VariantItem/_item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 13,  67 => 12,  63 => 10,  60 => 9,  57 => 8,  54 => 7,  51 => 6,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<td>
    <div class=\"ui items\">
        <div class=\"item\">
            <div class=\"ui tiny image\">
                {% if variant.hasImages %}
                    {% include '@SyliusAdmin/Product/_mainImage.html.twig' with {'product': variant, 'filter': 'sylius_admin_product_large_thumbnail'} %}
                {% else %}
                    {% include '@SyliusAdmin/Product/_mainImage.html.twig' with {'product': product, 'filter': 'sylius_admin_product_large_thumbnail'} %}
                {% endif %}
            </div>
            <div class=\"middle aligned content\">
                <div><strong class=\"variant-name\">{{ variant.name }}</strong></div>
                <small class=\"gray text variant-code\">{{ variant.code }}</small>
            </div>
        </div>
    </div>
</td>
", "@SyliusAdmin/Product/Show/VariantItem/_item.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/VariantItem/_item.html.twig");
    }
}
