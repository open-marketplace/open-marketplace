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

/* @SyliusAdmin/Product/Show/_associations.html.twig */
class __TwigTemplate_0328611c893b9b55b62ebfd04044cb94a0943d069ec5ff1560380b9a0c7f6825 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_associations.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_associations.html.twig"));

        // line 1
        echo "<div id=\"associations\">
    <h4 class=\"ui top attached large header\">";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.associations"), "html", null, true);
        echo "</h4>
    <div class=\"ui attached segment\">
        ";
        // line 4
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 4, $this->source); })()), "associations", [], "any", false, false, false, 4))) {
            // line 5
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "associations", [], "any", false, false, false, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["association"]) {
                // line 6
                echo "                <strong class=\"gray text\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["association"], "type", [], "any", false, false, false, 6), "name", [], "any", false, false, false, 6), "html", null, true);
                echo ":</strong>
                <ul class=\"ui bulleted list\">
                    ";
                // line 8
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["association"], "associatedProducts", [], "any", false, false, false, 8));
                foreach ($context['_seq'] as $context["_key"] => $context["associatedProduct"]) {
                    // line 9
                    echo "                        <li>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["associatedProduct"], "name", [], "any", false, false, false, 9), "html", null, true);
                    echo "</li>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['associatedProduct'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 11
                echo "                </ul>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['association'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "        ";
        } else {
            // line 14
            echo "            <span class=\"ui teal label\"><i class=\"remove icon\"></i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.no_associations_to_display"), "html", null, true);
            echo "</span>
        ";
        }
        // line 16
        echo "    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_associations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 16,  87 => 14,  84 => 13,  77 => 11,  68 => 9,  64 => 8,  58 => 6,  53 => 5,  51 => 4,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"associations\">
    <h4 class=\"ui top attached large header\">{{ 'sylius.ui.associations'|trans }}</h4>
    <div class=\"ui attached segment\">
        {% if product.associations is not empty %}
            {% for association in product.associations %}
                <strong class=\"gray text\">{{ association.type.name }}:</strong>
                <ul class=\"ui bulleted list\">
                    {% for associatedProduct in association.associatedProducts %}
                        <li>{{ associatedProduct.name }}</li>
                    {% endfor %}
                </ul>
            {% endfor %}
        {% else %}
            <span class=\"ui teal label\"><i class=\"remove icon\"></i>{{ 'sylius.ui.no_associations_to_display'|trans }}</span>
        {% endif %}
    </div>
</div>
", "@SyliusAdmin/Product/Show/_associations.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_associations.html.twig");
    }
}
