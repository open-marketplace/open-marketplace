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

/* @SyliusUi/DataCollector/templateBlock.html.twig */
class __TwigTemplate_80304c592b7d5ef78aea1254c58e16f94f6bbca4cdcd405ecd664ceb65e2c28c extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'toolbar' => [$this, 'block_toolbar'],
            'menu' => [$this, 'block_menu'],
            'panel' => [$this, 'block_panel'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/DataCollector/templateBlock.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/DataCollector/templateBlock.html.twig"));

        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@SyliusUi/DataCollector/templateBlock.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    <div class=\"sf-toolbar-block\">
        <a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_profiler", ["token" => (isset($context["token"]) || array_key_exists("token", $context) ? $context["token"] : (function () { throw new RuntimeError('Variable "token" does not exist.', 5, $this->source); })()), "panel" => (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 5, $this->source); })())]), "html", null, true);
        echo "\">
            <div class=\"sf-toolbar-icon\">
                ";
        // line 7
        echo twig_include($this->env, $context, "@SyliusUi/DataCollector/icon.svg");
        echo "
                <span class=\"sf-toolbar-value\">";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 8, $this->source); })()), "numberOfRenderedEvents", [], "any", false, false, false, 8), "html", null, true);
        echo "</span>
            </div>
        </a>

        <div class=\"sf-toolbar-info\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Rendered events</b>
                <span class=\"sf-toolbar-status\">";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 15, $this->source); })()), "numberOfRenderedEvents", [], "any", false, false, false, 15), "html", null, true);
        echo "</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Rendered blocks</b>
                <span class=\"sf-toolbar-status\">";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 19, $this->source); })()), "numberOfRenderedBlocks", [], "any", false, false, false, 19), "html", null, true);
        echo "</span>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 25
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 26
        echo "    <span class=\"label\">
        <span class=\"icon\">
            ";
        // line 28
        echo twig_include($this->env, $context, "@SyliusUi/DataCollector/icon.svg");
        echo "
        </span>
        <strong>Template events</strong>
        <span class=\"count\">
            <span>";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 32, $this->source); })()), "numberOfRenderedEvents", [], "any", false, false, false, 32), "html", null, true);
        echo "</span>
        </span>
    </span>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 37
    public function block_panel($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 38
        echo "    <h2>Template events metrics</h2>

    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">";
        // line 42
        echo twig_escape_filter($this->env, twig_sprintf("%.0f", (twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 42, $this->source); })()), "totalDuration", [], "any", false, false, false, 42) * 1000)), "html", null, true);
        echo " <span class=\"unit\">ms</span></span>
            <span class=\"label\">Total execution time</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 47
        echo twig_escape_filter($this->env, twig_sprintf("%.0f", twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 47, $this->source); })()), "numberOfRenderedEvents", [], "any", false, false, false, 47)), "html", null, true);
        echo "</span>
            <span class=\"label\">Rendered events</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">";
        // line 52
        echo twig_escape_filter($this->env, twig_sprintf("%.0f", twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 52, $this->source); })()), "numberOfRenderedBlocks", [], "any", false, false, false, 52)), "html", null, true);
        echo "</span>
            <span class=\"label\">Rendered blocks</span>
        </div>
    </div>

    <h2>Rendered template events</h2>

    ";
        // line 59
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 59, $this->source); })()), "renderedEvents", [], "any", false, false, false, 59)) > 0)) {
            // line 60
            echo "        <table>
            <tr>
                <th>Event</th>
                <th>Duration</th>
                <th>Blocks</th>
            </tr>

            ";
            // line 67
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 67, $this->source); })()), "renderedEvents", [], "any", false, false, false, 67));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 68
                echo "                <tr>
                    <td>
                        ";
                // line 70
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["event"], "names", [], "any", false, false, false, 70));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["name"]) {
                    // line 71
                    echo "                            ";
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 71)) {
                        echo "<strong>";
                    }
                    // line 72
                    echo "                            ";
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    if ( !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 72)) {
                        echo ", ";
                    }
                    // line 73
                    echo "                            ";
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 73)) {
                        echo "</strong>";
                    }
                    // line 74
                    echo "                        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 75
                echo "                    </td>
                    <td>";
                // line 76
                echo twig_escape_filter($this->env, twig_sprintf("%.0f", (twig_get_attribute($this->env, $this->source, $context["event"], "time", [], "any", false, false, false, 76) * 1000)), "html", null, true);
                echo "ms</td>
                    <td>
                        ";
                // line 78
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "blocks", [], "any", false, false, false, 78)) > 0)) {
                    // line 79
                    echo "                            <table>
                                <tr>
                                    ";
                    // line 81
                    if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "names", [], "any", false, false, false, 81)) > 1)) {
                        echo "<th>Origin event</th>";
                    }
                    // line 82
                    echo "                                    <th>Name</th>
                                    <th>Template</th>
                                    <th>Duration</th>
                                    <th>Priority</th>
                                </tr>
                                ";
                    // line 87
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["event"], "blocks", [], "any", false, false, false, 87));
                    foreach ($context['_seq'] as $context["_key"] => $context["block"]) {
                        // line 88
                        echo "                                    <tr>
                                        ";
                        // line 89
                        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["event"], "names", [], "any", false, false, false, 89)) > 1)) {
                            echo "<td>";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "definition", [], "any", false, false, false, 89), "eventName", [], "any", false, false, false, 89), "html", null, true);
                            echo "</td>";
                        }
                        // line 90
                        echo "                                        <td>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "definition", [], "any", false, false, false, 90), "name", [], "any", false, false, false, 90), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 91
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "definition", [], "any", false, false, false, 91), "template", [], "any", false, false, false, 91), "html", null, true);
                        echo "</td>
                                        <td>";
                        // line 92
                        echo twig_escape_filter($this->env, twig_sprintf("%.0f", (twig_get_attribute($this->env, $this->source, $context["block"], "time", [], "any", false, false, false, 92) * 1000)), "html", null, true);
                        echo "ms</td>
                                        <td>";
                        // line 93
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["block"], "definition", [], "any", false, false, false, 93), "priority", [], "any", false, false, false, 93), "html", null, true);
                        echo "</td>
                                    </tr>
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['block'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 96
                    echo "                            </table>
                        ";
                } else {
                    // line 98
                    echo "                            <i>no blocks rendered</i>
                        ";
                }
                // line 100
                echo "                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['event'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            echo "        </table>
    ";
        } else {
            // line 105
            echo "        <div class=\"empty\">
            No template events have been rendered.
        </div>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusUi/DataCollector/templateBlock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  337 => 105,  333 => 103,  325 => 100,  321 => 98,  317 => 96,  308 => 93,  304 => 92,  300 => 91,  295 => 90,  289 => 89,  286 => 88,  282 => 87,  275 => 82,  271 => 81,  267 => 79,  265 => 78,  260 => 76,  257 => 75,  243 => 74,  238 => 73,  232 => 72,  227 => 71,  210 => 70,  206 => 68,  202 => 67,  193 => 60,  191 => 59,  181 => 52,  173 => 47,  165 => 42,  159 => 38,  149 => 37,  135 => 32,  128 => 28,  124 => 26,  114 => 25,  99 => 19,  92 => 15,  82 => 8,  78 => 7,  73 => 5,  70 => 4,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    <div class=\"sf-toolbar-block\">
        <a href=\"{{ path('_profiler', { 'token': token, 'panel': name }) }}\">
            <div class=\"sf-toolbar-icon\">
                {{ include('@SyliusUi/DataCollector/icon.svg') }}
                <span class=\"sf-toolbar-value\">{{ collector.numberOfRenderedEvents }}</span>
            </div>
        </a>

        <div class=\"sf-toolbar-info\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Rendered events</b>
                <span class=\"sf-toolbar-status\">{{ collector.numberOfRenderedEvents }}</span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Rendered blocks</b>
                <span class=\"sf-toolbar-status\">{{ collector.numberOfRenderedBlocks }}</span>
            </div>
        </div>
    </div>
{% endblock %}

{% block menu %}
    <span class=\"label\">
        <span class=\"icon\">
            {{ include('@SyliusUi/DataCollector/icon.svg') }}
        </span>
        <strong>Template events</strong>
        <span class=\"count\">
            <span>{{ collector.numberOfRenderedEvents }}</span>
        </span>
    </span>
{% endblock %}

{% block panel %}
    <h2>Template events metrics</h2>

    <div class=\"metrics\">
        <div class=\"metric\">
            <span class=\"value\">{{ '%.0f'|format(collector.totalDuration * 1000) }} <span class=\"unit\">ms</span></span>
            <span class=\"label\">Total execution time</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">{{ '%.0f'|format(collector.numberOfRenderedEvents) }}</span>
            <span class=\"label\">Rendered events</span>
        </div>

        <div class=\"metric\">
            <span class=\"value\">{{ '%.0f'|format(collector.numberOfRenderedBlocks) }}</span>
            <span class=\"label\">Rendered blocks</span>
        </div>
    </div>

    <h2>Rendered template events</h2>

    {% if collector.renderedEvents|length > 0 %}
        <table>
            <tr>
                <th>Event</th>
                <th>Duration</th>
                <th>Blocks</th>
            </tr>

            {% for event in collector.renderedEvents %}
                <tr>
                    <td>
                        {% for name in event.names %}
                            {% if loop.first %}<strong>{% endif %}
                            {{ name }}{% if not loop.last %}, {% endif %}
                            {% if loop.first %}</strong>{% endif %}
                        {% endfor %}
                    </td>
                    <td>{{ '%.0f'|format(event.time * 1000) }}ms</td>
                    <td>
                        {% if event.blocks|length > 0 %}
                            <table>
                                <tr>
                                    {% if event.names|length > 1 %}<th>Origin event</th>{% endif %}
                                    <th>Name</th>
                                    <th>Template</th>
                                    <th>Duration</th>
                                    <th>Priority</th>
                                </tr>
                                {% for block in event.blocks %}
                                    <tr>
                                        {% if event.names|length > 1 %}<td>{{ block.definition.eventName }}</td>{% endif %}
                                        <td>{{ block.definition.name }}</td>
                                        <td>{{ block.definition.template }}</td>
                                        <td>{{ '%.0f'|format(block.time * 1000) }}ms</td>
                                        <td>{{ block.definition.priority }}</td>
                                    </tr>
                                {% endfor %}
                            </table>
                        {% else %}
                            <i>no blocks rendered</i>
                        {% endif %}
                    </td>
                </tr>
            {% endfor %}
        </table>
    {% else %}
        <div class=\"empty\">
            No template events have been rendered.
        </div>
    {% endif %}
{% endblock %}
", "@SyliusUi/DataCollector/templateBlock.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/DataCollector/templateBlock.html.twig");
    }
}
