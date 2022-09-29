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

/* @SyliusUi/Macro/table.html.twig */
class __TwigTemplate_c39eadcf2c17b463dee6d7d7a8795c9859146a86e3daf9e4eb86e57b9011760d extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Macro/table.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Macro/table.html.twig"));

        // line 23
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function macro_headers($__grid__ = null, $__definition__ = null, $__requestAttributes__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "grid" => $__grid__,
            "definition" => $__definition__,
            "requestAttributes" => $__requestAttributes__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "headers"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "headers"));

            // line 2
            echo "    ";
            $macros["sorting"] = $this->loadTemplate("@SyliusUi/Macro/sorting.html.twig", "@SyliusUi/Macro/table.html.twig", 2)->unwrap();
            // line 3
            echo "
    ";
            // line 4
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "actionGroups", [], "any", false, true, false, 4), "bulk", [], "any", true, true, false, 4) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 4, $this->source); })()), "getEnabledActions", [0 => "bulk"], "method", false, false, false, 4)) > 0))) {
                // line 5
                echo "        <th class=\"center aligned\">
            <input data-js-bulk-checkboxes=\".bulk-select-checkbox\" data-js-bulk-buttons=\".sylius-grid-nav__bulk\" type=\"checkbox\">
        </th>
    ";
            }
            // line 9
            echo "
    ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->extensions['Sylius\Bundle\UiBundle\Twig\SortByExtension']->sortBy(twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 10, $this->source); })()), "fields", [], "any", false, false, false, 10), "position"));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 11
                echo "        ";
                if (twig_get_attribute($this->env, $this->source, $context["field"], "enabled", [], "any", false, false, false, 11)) {
                    // line 12
                    echo "            ";
                    if (twig_get_attribute($this->env, $this->source, $context["field"], "isSortable", [], "any", false, false, false, 12)) {
                        // line 13
                        echo "                ";
                        echo twig_call_macro($macros["sorting"], "macro_tableHeader", [(isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 13, $this->source); })()), $context["field"], (isset($context["requestAttributes"]) || array_key_exists("requestAttributes", $context) ? $context["requestAttributes"] : (function () { throw new RuntimeError('Variable "requestAttributes" does not exist.', 13, $this->source); })())], 13, $context, $this->getSourceContext());
                        echo "
            ";
                    } else {
                        // line 15
                        echo "                <th class=\"sylius-table-column-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "name", [], "any", false, false, false, 15), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 15)), "html", null, true);
                        echo "</th>
            ";
                    }
                    // line 17
                    echo "        ";
                }
                // line 18
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "actionGroups", [], "any", false, true, false, 19), "item", [], "any", true, true, false, 19) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 19, $this->source); })()), "getEnabledActions", [0 => "item"], "method", false, false, false, 19)) > 0))) {
                // line 20
                echo "        <th class=\"sylius-table-column-actions\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.actions"), "html", null, true);
                echo "</th>
    ";
            }
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 24
    public function macro_row($__grid__ = null, $__definition__ = null, $__row__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "grid" => $__grid__,
            "definition" => $__definition__,
            "row" => $__row__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "row"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "row"));

            // line 25
            echo "    <tr class=\"item\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("row");
            echo ">
    ";
            // line 26
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "actionGroups", [], "any", false, true, false, 26), "bulk", [], "any", true, true, false, 26) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 26, $this->source); })()), "getEnabledActions", [0 => "bulk"], "method", false, false, false, 26)) > 0))) {
                // line 27
                echo "        <td class=\"center aligned\"><input class=\"bulk-select-checkbox\" type=\"checkbox\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new RuntimeError('Variable "row" does not exist.', 27, $this->source); })()), "id", [], "any", false, false, false, 27), "html", null, true);
                echo "\" /></td>
    ";
            }
            // line 29
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->extensions['Sylius\Bundle\UiBundle\Twig\SortByExtension']->sortBy(twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 29, $this->source); })()), "enabledFields", [], "any", false, false, false, 29), "position"));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 30
                echo "        <td>";
                echo $this->env->getFunction('sylius_grid_render_field')->getCallable()((isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 30, $this->source); })()), $context["field"], (isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new RuntimeError('Variable "row" does not exist.', 30, $this->source); })()));
                echo "</td>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "actionGroups", [], "any", false, true, false, 32), "item", [], "any", true, true, false, 32) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 32, $this->source); })()), "getEnabledActions", [0 => "item"], "method", false, false, false, 32)) > 0))) {
                // line 33
                echo "        <td ";
                echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("actions");
                echo ">
            <div class=\"ui buttons\">
                ";
                // line 35
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->extensions['Sylius\Bundle\UiBundle\Twig\SortByExtension']->sortBy(twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 35, $this->source); })()), "getEnabledActions", [0 => "item"], "method", false, false, false, 35), "position"));
                foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                    // line 36
                    echo "                    ";
                    echo $this->env->getFunction('sylius_grid_render_action')->getCallable()((isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 36, $this->source); })()), $context["action"], (isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new RuntimeError('Variable "row" does not exist.', 36, $this->source); })()));
                    echo "
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "            </div>
            ";
                // line 39
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "actionGroups", [], "any", false, true, false, 39), "subitem", [], "any", true, true, false, 39) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 39, $this->source); })()), "getEnabledActions", [0 => "subitem"], "method", false, false, false, 39)) > 0))) {
                    // line 40
                    echo "            <div class=\"ui divider\"></div>
            <div class=\"ui buttons\">
                ";
                    // line 42
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->extensions['Sylius\Bundle\UiBundle\Twig\SortByExtension']->sortBy(twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 42, $this->source); })()), "getEnabledActions", [0 => "subitem"], "method", false, false, false, 42), "position"));
                    foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                        // line 43
                        echo "                    ";
                        echo $this->env->getFunction('sylius_grid_render_action')->getCallable()((isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 43, $this->source); })()), $context["action"], (isset($context["row"]) || array_key_exists("row", $context) ? $context["row"] : (function () { throw new RuntimeError('Variable "row" does not exist.', 43, $this->source); })()));
                        echo "
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 45
                    echo "            </div>
            ";
                }
                // line 47
                echo "        </td>
    ";
            }
            // line 49
            echo "    </tr>
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
        return "@SyliusUi/Macro/table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 49,  243 => 47,  239 => 45,  230 => 43,  226 => 42,  222 => 40,  220 => 39,  217 => 38,  208 => 36,  204 => 35,  198 => 33,  195 => 32,  186 => 30,  181 => 29,  175 => 27,  173 => 26,  168 => 25,  147 => 24,  128 => 20,  125 => 19,  119 => 18,  116 => 17,  108 => 15,  102 => 13,  99 => 12,  96 => 11,  92 => 10,  89 => 9,  83 => 5,  81 => 4,  78 => 3,  75 => 2,  54 => 1,  43 => 23,);
    }

    public function getSourceContext()
    {
        return new Source("{% macro headers(grid, definition, requestAttributes) %}
    {% import '@SyliusUi/Macro/sorting.html.twig' as sorting %}

    {% if definition.actionGroups.bulk is defined and definition.getEnabledActions('bulk')|length > 0 %}
        <th class=\"center aligned\">
            <input data-js-bulk-checkboxes=\".bulk-select-checkbox\" data-js-bulk-buttons=\".sylius-grid-nav__bulk\" type=\"checkbox\">
        </th>
    {% endif %}

    {% for field in definition.fields|sort_by('position') %}
        {% if field.enabled %}
            {% if field.isSortable %}
                {{ sorting.tableHeader(grid, field, requestAttributes) }}
            {% else %}
                <th class=\"sylius-table-column-{{ field.name }}\">{{ field.label|trans }}</th>
            {% endif %}
        {% endif %}
    {% endfor %}
    {% if definition.actionGroups.item is defined and definition.getEnabledActions('item')|length > 0 %}
        <th class=\"sylius-table-column-actions\">{{ 'sylius.ui.actions'|trans }}</th>
    {% endif %}
{% endmacro %}

{% macro row(grid, definition, row) %}
    <tr class=\"item\" {{ sylius_test_html_attribute('row') }}>
    {% if definition.actionGroups.bulk is defined and definition.getEnabledActions('bulk')|length > 0 %}
        <td class=\"center aligned\"><input class=\"bulk-select-checkbox\" type=\"checkbox\" value=\"{{ row.id }}\" /></td>
    {% endif %}
    {% for field in definition.enabledFields|sort_by('position') %}
        <td>{{ sylius_grid_render_field(grid, field, row) }}</td>
    {% endfor %}
    {% if definition.actionGroups.item is defined and definition.getEnabledActions('item')|length > 0 %}
        <td {{ sylius_test_html_attribute('actions') }}>
            <div class=\"ui buttons\">
                {% for action in definition.getEnabledActions('item')|sort_by('position') %}
                    {{ sylius_grid_render_action(grid, action, row) }}
                {% endfor %}
            </div>
            {% if definition.actionGroups.subitem is defined and definition.getEnabledActions('subitem')|length > 0 %}
            <div class=\"ui divider\"></div>
            <div class=\"ui buttons\">
                {% for action in definition.getEnabledActions('subitem')|sort_by('position') %}
                    {{ sylius_grid_render_action(grid, action, row) }}
                {% endfor %}
            </div>
            {% endif %}
        </td>
    {% endif %}
    </tr>
{% endmacro %}
", "@SyliusUi/Macro/table.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Macro/table.html.twig");
    }
}
