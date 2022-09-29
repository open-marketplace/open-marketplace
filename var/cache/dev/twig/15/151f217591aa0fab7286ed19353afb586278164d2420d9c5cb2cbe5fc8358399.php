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

/* @SyliusUi/Macro/sorting.html.twig */
class __TwigTemplate_d0c553af64a2d301dbe8471bf57f479d1b22f4b01f07d03dae23e40a38364f5d extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Macro/sorting.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Macro/sorting.html.twig"));

        // line 15
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function macro_tableHeader($__grid__ = null, $__field__ = null, $__attributes__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "grid" => $__grid__,
            "field" => $__field__,
            "attributes" => $__attributes__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "tableHeader"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "tableHeader"));

            // line 2
            echo "    ";
            $macros["__internal_parse_0"] = $this;
            // line 3
            echo "    ";
            $context["order"] = twig_get_attribute($this->env, $this->source, (isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 3, $this->source); })()), "getSortingOrder", [0 => twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 3, $this->source); })()), "name", [], "any", false, false, false, 3)], "method", false, false, false, 3);
            // line 4
            echo "
    ";
            // line 5
            if (twig_get_attribute($this->env, $this->source, (isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 5, $this->source); })()), "isSortedBy", [0 => twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5)], "method", false, false, false, 5)) {
                // line 6
                echo "        <th class=\"sortable sorted ";
                echo ((((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 6, $this->source); })()) == "desc")) ? ("descending") : ("ascending"));
                echo " sylius-table-column-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 6, $this->source); })()), "name", [], "any", false, false, false, 6), "html", null, true);
                echo "\">
            <a href=\"";
                // line 7
                echo twig_call_macro($macros["__internal_parse_0"], "macro_link", [twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 7, $this->source); })()), "name", [], "any", false, false, false, 7), (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 7, $this->source); })()), ((((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 7, $this->source); })()) == "desc")) ? ("asc") : ("desc")), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 7, $this->source); })()), "parameters", [], "any", false, false, false, 7), "all", [], "any", false, false, false, 7)], 7, $context, $this->getSourceContext());
                echo "\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 7, $this->source); })()), "label", [], "any", false, false, false, 7)), "html", null, true);
                echo "</a>
        </th>
    ";
            } else {
                // line 10
                echo "        <th class=\"sortable sylius-table-column-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 10, $this->source); })()), "name", [], "any", false, false, false, 10), "html", null, true);
                echo "\">
            <a href=\"";
                // line 11
                echo twig_call_macro($macros["__internal_parse_0"], "macro_link", [twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 11, $this->source); })()), "name", [], "any", false, false, false, 11), (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 11, $this->source); })()), (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 11, $this->source); })()), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 11, $this->source); })()), "parameters", [], "any", false, false, false, 11), "all", [], "any", false, false, false, 11)], 11, $context, $this->getSourceContext());
                echo "\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 11, $this->source); })()), "label", [], "any", false, false, false, 11)), "html", null, true);
                echo "<i class=\"sort icon\"></i></a>
        </th>
    ";
            }
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 16
    public function macro_link($__fieldName__ = null, $__attributes__ = null, $__order__ = null, $__parameters__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "fieldName" => $__fieldName__,
            "attributes" => $__attributes__,
            "order" => $__order__,
            "parameters" => $__parameters__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "link"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "link"));

            // line 17
            echo "    ";
            $context["params"] = twig_array_merge(twig_get_attribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 17, $this->source); })()), "get", [0 => "_route_params"], "method", false, false, false, 17), (isset($context["parameters"]) || array_key_exists("parameters", $context) ? $context["parameters"] : (function () { throw new RuntimeError('Variable "parameters" does not exist.', 17, $this->source); })()));
            // line 18
            echo "    ";
            $context["sorting"] = ["sorting" => [(isset($context["fieldName"]) || array_key_exists("fieldName", $context) ? $context["fieldName"] : (function () { throw new RuntimeError('Variable "fieldName" does not exist.', 18, $this->source); })()) => (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 18, $this->source); })())]];
            // line 19
            echo "
    ";
            // line 20
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 20, $this->source); })()), "get", [0 => "_route"], "method", false, false, false, 20), twig_array_merge(twig_array_merge((isset($context["params"]) || array_key_exists("params", $context) ? $context["params"] : (function () { throw new RuntimeError('Variable "params" does not exist.', 20, $this->source); })()), (isset($context["sorting"]) || array_key_exists("sorting", $context) ? $context["sorting"] : (function () { throw new RuntimeError('Variable "sorting" does not exist.', 20, $this->source); })())), ["page" => 1])), "html", null, true);
            echo "
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
        return "@SyliusUi/Macro/sorting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 20,  155 => 19,  152 => 18,  149 => 17,  127 => 16,  106 => 11,  101 => 10,  93 => 7,  86 => 6,  84 => 5,  81 => 4,  78 => 3,  75 => 2,  54 => 1,  43 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("{% macro tableHeader(grid, field, attributes) %}
    {% from _self import link %}
    {% set order = grid.getSortingOrder(field.name) %}

    {% if grid.isSortedBy(field.name) %}
        <th class=\"sortable sorted {{ order == 'desc' ? 'descending' : 'ascending' }} sylius-table-column-{{ field.name }}\">
            <a href=\"{{ link(field.name, attributes, (order == 'desc' ? 'asc' : 'desc'), grid.parameters.all) }}\">{{ field.label|trans }}</a>
        </th>
    {% else %}
        <th class=\"sortable sylius-table-column-{{ field.name }}\">
            <a href=\"{{ link(field.name, attributes, order, grid.parameters.all) }}\">{{ field.label|trans }}<i class=\"sort icon\"></i></a>
        </th>
    {% endif %}
{% endmacro %}

{% macro link(fieldName, attributes, order, parameters) %}
    {% set params = attributes.get('_route_params')|merge(parameters) %}
    {% set sorting = {'sorting': {(fieldName): (order)}} %}

    {{ path(attributes.get('_route'), params|merge(sorting)|merge({'page': 1})) }}
{% endmacro %}
", "@SyliusUi/Macro/sorting.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Macro/sorting.html.twig");
    }
}
