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

/* @SyliusAdmin/Product/_position.html.twig */
class __TwigTemplate_d95d74137e24cebc762a8fe443d6bedf5758ee74bea676d6854027d6c416b759 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/_position.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/_position.html.twig"));

        // line 1
        if ((isset($context["taxonId"]) || array_key_exists("taxonId", $context) ? $context["taxonId"] : (function () { throw new RuntimeError('Variable "taxonId" does not exist.', 1, $this->source); })())) {
            // line 2
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 2, $this->source); })()), "productTaxons", [], "any", false, false, false, 2));
            foreach ($context['_seq'] as $context["_key"] => $context["productTaxon"]) {
                // line 3
                echo "        ";
                if (((isset($context["taxonId"]) || array_key_exists("taxonId", $context) ? $context["taxonId"] : (function () { throw new RuntimeError('Variable "taxonId" does not exist.', 3, $this->source); })()) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["productTaxon"], "taxon", [], "any", false, false, false, 3), "id", [], "any", false, false, false, 3))) {
                    // line 4
                    echo "            <div style=\"width: 100%; text-align: center;\">
                <div class=\"ui input position\" style=\"width: 50px;\">
                    <input type=\"text\" value=\"";
                    // line 6
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["productTaxon"], "position", [], "any", false, false, false, 6), "html", null, true);
                    echo "\" name=\"productTaxons[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["productTaxon"], "id", [], "any", false, false, false, 6), "html", null, true);
                    echo "]\" form=\"sylius-update-product-taxons\" class=\"sylius-product-taxon-position\" style=\"text-align: center;\" />
                </div>
            </div>
        ";
                }
                // line 10
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['productTaxon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/_position.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 10,  57 => 6,  53 => 4,  50 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if taxonId %}
    {% for productTaxon in product.productTaxons%}
        {% if taxonId == productTaxon.taxon.id %}
            <div style=\"width: 100%; text-align: center;\">
                <div class=\"ui input position\" style=\"width: 50px;\">
                    <input type=\"text\" value=\"{{ productTaxon.position }}\" name=\"productTaxons[{{ productTaxon.id }}]\" form=\"sylius-update-product-taxons\" class=\"sylius-product-taxon-position\" style=\"text-align: center;\" />
                </div>
            </div>
        {% endif %}
    {% endfor %}
{% endif %}
", "@SyliusAdmin/Product/_position.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/_position.html.twig");
    }
}
