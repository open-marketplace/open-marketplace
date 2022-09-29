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

/* @SyliusCore/Collector/sylius.html.twig */
class __TwigTemplate_38105a940d15539a1ea9cefd7381e030982dc33ccc04991eccce6829596a44bc extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'toolbar' => [$this, 'block_toolbar'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusCore/Collector/sylius.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusCore/Collector/sylius.html.twig"));

        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@SyliusCore/Collector/sylius.html.twig", 1);
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
        echo "    ";
        ob_start();
        // line 5
        echo "        <img width=\"20\" height=\"30\" alt=\"Sylius\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAcCAYAAAB/E6/TAAAFS0lEQVRIx61WaUxcVRRmGEqtCyaaGBP/maYxsdX0B5RSQKBlhmFtC7QspbRoAdHQ2EhqK8u0oGUX2afDOkOHZXDCvradYbZSmFJAxEawGqppqv5qMBFm3lzPue8NDiCGgi85efe9e3K/833n3HOvg8MzPmf6JDxBe64TjtsWJnZF6GqUEfpaI52sjeM5/B/PMa2U79mdz8fxcWWRe+BQ2axQU0mE6goSZai/hP+DR6qdtgxw/t43vJDhcrpAo+n2zsD2/PxDN8SMqzyDCPtL/hCNVC2LAPDD8RY/9Im/I+NvCShAU0klSZho8RT2FM+6yTKImzxj2aMpi4Qri/wSTM1RgZoqEjJS/ZN4uu8V9E0aa9m8jMl3m6mz5IF2R6SupjBQU8kI1OXkUGv2X66N6SRAmddp8001KfeGjkgWwnU1w/i9u0vsuGmgpDEWqGB22AWifeR/u5wAu+Ujw6XEU3FlMVJV8jbOh9+sdsZ31y/TO0/q6/rijI1imkeddPMSgiQ0N6eMjRcw6WBLAniHqqtN1EH+AY08xtDAd+vP5XEBJuXMDLyL44v3OzcnYfI4q3Xx97deAmkeonQAZsbkRxvqL9NK07CVlgx52d+f6wggfMXPppefuRiAFZUgxthwnmNlFoCMQZoqBqL3xbnTdpUWt9WqS4Xyxrd0Tv9imPb6j8gqAMHgHaaVzGdO99BKSzG1rcikXJjY2uaFjUijBLlSAlhWFsoMxpH6WiXO7ekU87fdFS5NddEIVY8mXwBWcygdADEIFqCuJLHGxtRtdwbbYytXYJWIi3OsrCChFQCWoTMc2FZnsD0ZUz2U1ciTueeB1QOuApEVgwzh30zlD1oX9Em73/HfOYLqcQQZNowIujWdA59zIs0KK1qJQjZfDTjvPlS4eo3Y7gp+REfJunaxp1vMg/J1+tjUtmoubZLdgKO/P3wO9tWMHSsChWFBSePvyBPRBxiuz9c+xed8rmfFgMYi+zn3gXz+SUM93yYdRM3n2L+/hhXmi0C+FiFf79Dza1TOBnq6tyowuqv8Tduin052uEEk2ImnovX1n6TdU71Bo9PV8PYqP+NBaTudG1NQoPmnv+0I1Uqm7FkhKObrmE460fvrzC70uzwNAUZ1lUW/15y95K3IHhUq8wpPKUv2xxoamgWaCgLnDBOslSxCR1aeMcpEdbM6Z1tAInWFM1th8rN2FUjW5KsSfbyGi1kJ4SC7eECeScCYg01ZjJfi6lOv9i8Zn+4C8+Ghr1F7a6C2moTppPMnDPXilLHW3TZAQggfFFjLiuYLjhUC0sVQx9fLkqkMgrZchRsLtkQPtka0dPy2Hmy+YvZSXWN8+4qI4GYZCYI9c9xQOxg/foMuEm+UHeW6BWPHypavJxcmVG85JA7W0ASXmgZcfFtyphDEXZ5p4RhSY4HTEZyBb7NHa7bVuzOP+A+WkCB11ePYUdlXR/XSx1y3sNqB0YPyhL5OS1lFdpZSVmf7JPtQNlwYmdiDrQG2ArAFzV0hJp7tXxC/3iIi1KwA2OSzYlXCWZawUsLCNvYKFd5REuXRJMY7gWUjoFUmy2QA0IyMDwPDAO5WZCsIYFOzbi9BpE5cceRyC5k3BQaXFFTBU5ljA6KS4WUla7L71X/vMeIQusH8W6/1AytcaHPMKLsMcgRYwV3PKsKOrm8QUpW4trXqieutokBpasVrPs05866ydIyWcYVF0Nw2MgDCm5FHW7YFL5XQEwtwHb9bpRsfG2GqIhoBbGYfqEQrbGYCm9oKRnDsrbi6yrz+MQZuRyR4qOzb2j+/o13ho7vsneNvcYu7Y+75gz8AAAAASUVORK5CYII=\" />
        <span class=\"sf-toolbar-value\">";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 6, $this->source); })()), "version", [], "any", false, false, false, 6), "html", null, true);
        echo "</span>
    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 8
        echo "    ";
        ob_start();
        // line 9
        echo "        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Sylius</b>
                <span><a href=\"https://sylius.com\">";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 12, $this->source); })()), "version", [], "any", false, false, false, 12), "html", null, true);
        echo "</a></span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Extensions</b>
                ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 16, $this->source); })()), "extensions", [], "any", false, false, false, 16));
        foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
            // line 17
            echo "                    <span class=\"sf-toolbar-status sf-toolbar-status-";
            echo ((twig_get_attribute($this->env, $this->source, $context["extension"], "enabled", [], "any", false, false, false, 17)) ? ("green") : ("red"));
            echo "\">
                        ";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["extension"], "name", [], "any", false, false, false, 18), "html", null, true);
            echo "
                    </span>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "            </div>
        </div>
        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Currency</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-green\">
                    <abbr title=\"Current ";
        // line 27
        if ((twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 27, $this->source); })()), "currencyCode", [], "any", false, false, false, 27) == twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 27, $this->source); })()), "defaultCurrencyCode", [], "any", false, false, false, 27))) {
            echo "and default ";
        }
        echo "currency\">
                        ";
        // line 28
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "currencyCode", [], "any", true, true, false, 28)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "currencyCode", [], "any", false, false, false, 28), "Undefined")) : ("Undefined")), "html", null, true);
        echo "
                    </abbr>
                </span>
                ";
        // line 31
        if ((twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 31, $this->source); })()), "currencyCode", [], "any", false, false, false, 31) != twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 31, $this->source); })()), "defaultCurrencyCode", [], "any", false, false, false, 31))) {
            // line 32
            echo "                    <span class=\"sf-toolbar-status\">
                        <abbr title=\"Default locale\">
                            ";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 34, $this->source); })()), "defaultCurrencyCode", [], "any", false, false, false, 34), "html", null, true);
            echo "
                        </abbr>
                    </span>
                ";
        }
        // line 38
        echo "            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Locale</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-green\">
                    <abbr title=\"Current ";
        // line 42
        if ((twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 42, $this->source); })()), "localeCode", [], "any", false, false, false, 42) == twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 42, $this->source); })()), "defaultLocaleCode", [], "any", false, false, false, 42))) {
            echo "and default ";
        }
        echo "locale\">
                        ";
        // line 43
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "localeCode", [], "any", true, true, false, 43)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "localeCode", [], "any", false, false, false, 43), "Undefined")) : ("Undefined")), "html", null, true);
        echo "
                    </abbr>
                </span>
                ";
        // line 46
        if ((twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 46, $this->source); })()), "localeCode", [], "any", false, false, false, 46) != twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 46, $this->source); })()), "defaultLocaleCode", [], "any", false, false, false, 46))) {
            // line 47
            echo "                    <span class=\"sf-toolbar-status\">
                        <abbr title=\"Default locale\">
                            ";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 49, $this->source); })()), "defaultLocaleCode", [], "any", false, false, false, 49), "html", null, true);
            echo "
                        </abbr>
                    </span>
                ";
        }
        // line 53
        echo "            </div>
        </div>
        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Resources</b>
                <span><a href=\"https://docs.sylius.com/en/latest/\" rel=\"help\">Sylius Documentation</a></span>
            </div>
        </div>
    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 62
        echo "
    ";
        // line 63
        $this->loadTemplate("@WebProfiler/Profiler/toolbar_item.html.twig", "@SyliusCore/Collector/sylius.html.twig", 63)->display(twig_array_merge($context, ["link" => false, "additional_classes" => "sf-toolbar-block-right"]));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusCore/Collector/sylius.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 63,  187 => 62,  176 => 53,  169 => 49,  165 => 47,  163 => 46,  157 => 43,  151 => 42,  145 => 38,  138 => 34,  134 => 32,  132 => 31,  126 => 28,  120 => 27,  112 => 21,  103 => 18,  98 => 17,  94 => 16,  87 => 12,  82 => 9,  79 => 8,  74 => 6,  71 => 5,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% set icon %}
        <img width=\"20\" height=\"30\" alt=\"Sylius\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAcCAYAAAB/E6/TAAAFS0lEQVRIx61WaUxcVRRmGEqtCyaaGBP/maYxsdX0B5RSQKBlhmFtC7QspbRoAdHQ2EhqK8u0oGUX2afDOkOHZXDCvradYbZSmFJAxEawGqppqv5qMBFm3lzPue8NDiCGgi85efe9e3K/833n3HOvg8MzPmf6JDxBe64TjtsWJnZF6GqUEfpaI52sjeM5/B/PMa2U79mdz8fxcWWRe+BQ2axQU0mE6goSZai/hP+DR6qdtgxw/t43vJDhcrpAo+n2zsD2/PxDN8SMqzyDCPtL/hCNVC2LAPDD8RY/9Im/I+NvCShAU0klSZho8RT2FM+6yTKImzxj2aMpi4Qri/wSTM1RgZoqEjJS/ZN4uu8V9E0aa9m8jMl3m6mz5IF2R6SupjBQU8kI1OXkUGv2X66N6SRAmddp8001KfeGjkgWwnU1w/i9u0vsuGmgpDEWqGB22AWifeR/u5wAu+Ujw6XEU3FlMVJV8jbOh9+sdsZ31y/TO0/q6/rijI1imkeddPMSgiQ0N6eMjRcw6WBLAniHqqtN1EH+AY08xtDAd+vP5XEBJuXMDLyL44v3OzcnYfI4q3Xx97deAmkeonQAZsbkRxvqL9NK07CVlgx52d+f6wggfMXPppefuRiAFZUgxthwnmNlFoCMQZoqBqL3xbnTdpUWt9WqS4Xyxrd0Tv9imPb6j8gqAMHgHaaVzGdO99BKSzG1rcikXJjY2uaFjUijBLlSAlhWFsoMxpH6WiXO7ekU87fdFS5NddEIVY8mXwBWcygdADEIFqCuJLHGxtRtdwbbYytXYJWIi3OsrCChFQCWoTMc2FZnsD0ZUz2U1ciTueeB1QOuApEVgwzh30zlD1oX9Em73/HfOYLqcQQZNowIujWdA59zIs0KK1qJQjZfDTjvPlS4eo3Y7gp+REfJunaxp1vMg/J1+tjUtmoubZLdgKO/P3wO9tWMHSsChWFBSePvyBPRBxiuz9c+xed8rmfFgMYi+zn3gXz+SUM93yYdRM3n2L+/hhXmi0C+FiFf79Dza1TOBnq6tyowuqv8Tduin052uEEk2ImnovX1n6TdU71Bo9PV8PYqP+NBaTudG1NQoPmnv+0I1Uqm7FkhKObrmE460fvrzC70uzwNAUZ1lUW/15y95K3IHhUq8wpPKUv2xxoamgWaCgLnDBOslSxCR1aeMcpEdbM6Z1tAInWFM1th8rN2FUjW5KsSfbyGi1kJ4SC7eECeScCYg01ZjJfi6lOv9i8Zn+4C8+Ghr1F7a6C2moTppPMnDPXilLHW3TZAQggfFFjLiuYLjhUC0sVQx9fLkqkMgrZchRsLtkQPtka0dPy2Hmy+YvZSXWN8+4qI4GYZCYI9c9xQOxg/foMuEm+UHeW6BWPHypavJxcmVG85JA7W0ASXmgZcfFtyphDEXZ5p4RhSY4HTEZyBb7NHa7bVuzOP+A+WkCB11ePYUdlXR/XSx1y3sNqB0YPyhL5OS1lFdpZSVmf7JPtQNlwYmdiDrQG2ArAFzV0hJp7tXxC/3iIi1KwA2OSzYlXCWZawUsLCNvYKFd5REuXRJMY7gWUjoFUmy2QA0IyMDwPDAO5WZCsIYFOzbi9BpE5cceRyC5k3BQaXFFTBU5ljA6KS4WUla7L71X/vMeIQusH8W6/1AytcaHPMKLsMcgRYwV3PKsKOrm8QUpW4trXqieutokBpasVrPs05866ydIyWcYVF0Nw2MgDCm5FHW7YFL5XQEwtwHb9bpRsfG2GqIhoBbGYfqEQrbGYCm9oKRnDsrbi6yrz+MQZuRyR4qOzb2j+/o13ho7vsneNvcYu7Y+75gz8AAAAASUVORK5CYII=\" />
        <span class=\"sf-toolbar-value\">{{ collector.version }}</span>
    {% endset %}
    {% set text %}
        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Sylius</b>
                <span><a href=\"https://sylius.com\">{{ collector.version }}</a></span>
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Extensions</b>
                {% for extension in collector.extensions %}
                    <span class=\"sf-toolbar-status sf-toolbar-status-{{ extension.enabled ? 'green' : 'red' }}\">
                        {{ extension.name }}
                    </span>
                {% endfor %}
            </div>
        </div>
        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Currency</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-green\">
                    <abbr title=\"Current {% if collector.currencyCode == collector.defaultCurrencyCode %}and default {% endif %}currency\">
                        {{ collector.currencyCode|default('Undefined') }}
                    </abbr>
                </span>
                {% if collector.currencyCode != collector.defaultCurrencyCode %}
                    <span class=\"sf-toolbar-status\">
                        <abbr title=\"Default locale\">
                            {{ collector.defaultCurrencyCode }}
                        </abbr>
                    </span>
                {% endif %}
            </div>
            <div class=\"sf-toolbar-info-piece\">
                <b>Locale</b>
                <span class=\"sf-toolbar-status sf-toolbar-status-green\">
                    <abbr title=\"Current {% if collector.localeCode == collector.defaultLocaleCode %}and default {% endif %}locale\">
                        {{ collector.localeCode|default('Undefined') }}
                    </abbr>
                </span>
                {% if collector.localeCode != collector.defaultLocaleCode %}
                    <span class=\"sf-toolbar-status\">
                        <abbr title=\"Default locale\">
                            {{ collector.defaultLocaleCode }}
                        </abbr>
                    </span>
                {% endif %}
            </div>
        </div>
        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>Resources</b>
                <span><a href=\"https://docs.sylius.com/en/latest/\" rel=\"help\">Sylius Documentation</a></span>
            </div>
        </div>
    {% endset %}

    {% include '@WebProfiler/Profiler/toolbar_item.html.twig' with {'link': false, additional_classes: 'sf-toolbar-block-right'} %}
{% endblock %}
", "@SyliusCore/Collector/sylius.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/CoreBundle/Resources/views/Collector/sylius.html.twig");
    }
}
