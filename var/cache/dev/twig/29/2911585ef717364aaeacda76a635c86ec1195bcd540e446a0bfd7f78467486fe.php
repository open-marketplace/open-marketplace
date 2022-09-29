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

/* @SyliusAdmin/Taxon/_treeWithoutButtons.html.twig */
class __TwigTemplate_7aa3fb648429a18a39f31e6be830652002065c8a520b89ce6d6720cfcaf058bd extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Taxon/_treeWithoutButtons.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Taxon/_treeWithoutButtons.html.twig"));

        // line 1
        $macros["tree"] = $this->macros["tree"] = $this;
        // line 2
        echo "
";
        // line 24
        echo "
<div class=\"ui vertical fluid labeled icon buttons\">
    <a href=\"";
        // line 26
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_product_index");
        echo "\" class=\"ui primary button\">
        <i class=\"search icon\"></i>
        ";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.browse_all_products"), "html", null, true);
        echo "
    </a>

    <a href=\"";
        // line 31
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_taxon_create");
        echo "\" class=\"ui button\">
        <i class=\"sitemap icon\"></i>
        ";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.manage_taxons"), "html", null, true);
        echo "
    </a>
</div>

<div class=\"ui segment sylius-tree hidden\" data-sylius-js-tree>
    <a href=\"#\" class=\"sylius-tree__toggle-all\" data-sylius-js-tree-trigger>
        <i class=\"icon\">&bull;</i>";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.toggle_all"), "html", null, true);
        echo "
    </a>
    ";
        // line 41
        echo twig_call_macro($macros["tree"], "macro_render", [(isset($context["taxons"]) || array_key_exists("taxons", $context) ? $context["taxons"] : (function () { throw new RuntimeError('Variable "taxons" does not exist.', 41, $this->source); })())], 41, $context, $this->getSourceContext());
        echo "
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function macro_render($__taxons__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "taxons" => $__taxons__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "render"));

            // line 4
            echo "    ";
            $macros["tree"] = $this;
            // line 5
            echo "
    <ul>
        ";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["taxons"]) || array_key_exists("taxons", $context) ? $context["taxons"] : (function () { throw new RuntimeError('Variable "taxons" does not exist.', 7, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["taxon"]) {
                // line 8
                echo "            <li data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 8), "html", null, true);
                echo "\" ";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["taxon"], "children", [], "any", false, false, false, 8))) {
                    echo "data-sylius-js-tree-parent=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 8), "html", null, true);
                    echo "\"";
                }
                echo ">
                <div class=\"sylius-tree__item\">
                    <div class=\"sylius-tree__icon\" ";
                // line 10
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["taxon"], "children", [], "any", false, false, false, 10))) {
                    echo "data-sylius-js-tree-trigger=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 10), "html", null, true);
                    echo "\"";
                }
                echo ">
                        <i class=\"";
                // line 11
                echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["taxon"], "children", [], "any", false, false, false, 11))) ? ("caret down") : ("angle left"));
                echo " icon\"></i>
                    </div>
                    <div class=\"sylius-tree__title\">
                        <a href=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_product_per_taxon_index", ["taxonId" => twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 14)]), "html", null, true);
                echo "\"";
                if ( !twig_get_attribute($this->env, $this->source, $context["taxon"], "enabled", [], "any", false, false, false, 14)) {
                    echo " class=\"text gray\"";
                }
                echo ">
                            ";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "name", [], "any", false, false, false, 15), "html", null, true);
                echo "
                        </a>
                    </div>
                </div>
                ";
                // line 19
                echo twig_call_macro($macros["tree"], "macro_render", [twig_get_attribute($this->env, $this->source, $context["taxon"], "children", [], "any", false, false, false, 19)], 19, $context, $this->getSourceContext());
                echo "
            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "    </ul>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Taxon/_treeWithoutButtons.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 22,  166 => 19,  159 => 15,  151 => 14,  145 => 11,  137 => 10,  125 => 8,  121 => 7,  117 => 5,  114 => 4,  95 => 3,  82 => 41,  77 => 39,  68 => 33,  63 => 31,  57 => 28,  52 => 26,  48 => 24,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import _self as tree %}

{% macro render(taxons) %}
    {% import _self as tree %}

    <ul>
        {% for taxon in taxons %}
            <li data-id=\"{{ taxon.id }}\" {% if taxon.children is not empty %}data-sylius-js-tree-parent=\"{{ taxon.id }}\"{% endif %}>
                <div class=\"sylius-tree__item\">
                    <div class=\"sylius-tree__icon\" {% if taxon.children is not empty %}data-sylius-js-tree-trigger=\"{{ taxon.id }}\"{% endif %}>
                        <i class=\"{{ taxon.children is not empty ? 'caret down' : 'angle left' }} icon\"></i>
                    </div>
                    <div class=\"sylius-tree__title\">
                        <a href=\"{{ path('sylius_admin_product_per_taxon_index', {'taxonId': taxon.id}) }}\"{% if not taxon.enabled %} class=\"text gray\"{% endif %}>
                            {{ taxon.name }}
                        </a>
                    </div>
                </div>
                {{ tree.render(taxon.children) }}
            </li>
        {% endfor %}
    </ul>
{% endmacro %}

<div class=\"ui vertical fluid labeled icon buttons\">
    <a href=\"{{ path('sylius_admin_product_index') }}\" class=\"ui primary button\">
        <i class=\"search icon\"></i>
        {{ 'sylius.ui.browse_all_products'|trans }}
    </a>

    <a href=\"{{ path('sylius_admin_taxon_create') }}\" class=\"ui button\">
        <i class=\"sitemap icon\"></i>
        {{ 'sylius.ui.manage_taxons'|trans }}
    </a>
</div>

<div class=\"ui segment sylius-tree hidden\" data-sylius-js-tree>
    <a href=\"#\" class=\"sylius-tree__toggle-all\" data-sylius-js-tree-trigger>
        <i class=\"icon\">&bull;</i>{{ 'sylius.ui.toggle_all'|trans }}
    </a>
    {{ tree.render(taxons) }}
</div>
", "@SyliusAdmin/Taxon/_treeWithoutButtons.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Taxon/_treeWithoutButtons.html.twig");
    }
}
