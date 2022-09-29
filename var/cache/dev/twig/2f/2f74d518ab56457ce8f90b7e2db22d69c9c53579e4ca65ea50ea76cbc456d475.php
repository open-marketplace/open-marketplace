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

/* @SyliusUi/Grid/Body/_navigation.html.twig */
class __TwigTemplate_1ac07d6c6f8ab53960ba253d9d7c86556a47588fba200863a77648b15d09ccea extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Grid/Body/_navigation.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Grid/Body/_navigation.html.twig"));

        // line 1
        $macros["pagination"] = $this->macros["pagination"] = $this->loadTemplate("@SyliusUi/Macro/pagination.html.twig", "@SyliusUi/Grid/Body/_navigation.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"sylius-grid-nav\">
    ";
        // line 4
        if ((((twig_length_filter($this->env, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 4, $this->source); })())) > 0) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["definition"] ?? null), "actionGroups", [], "any", false, true, false, 4), "bulk", [], "any", true, true, false, 4)) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 4, $this->source); })()), "getEnabledActions", [0 => "bulk"], "method", false, false, false, 4)) > 0))) {
            // line 5
            echo "        <div class=\"sylius-grid-nav__bulk\">
            ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 6, $this->source); })()), "getEnabledActions", [0 => "bulk"], "method", false, false, false, 6));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 7
                echo "                ";
                echo $this->env->getFunction('sylius_grid_render_bulk_action')->getCallable()((isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 7, $this->source); })()), $context["action"], null);
                echo "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo "        </div>
    ";
        }
        // line 11
        echo "    <div class=\"sylius-grid-nav__pagination\">
        ";
        // line 12
        echo twig_call_macro($macros["pagination"], "macro_simple", [(isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 12, $this->source); })())], 12, $context, $this->getSourceContext());
        echo "
    </div>
    ";
        // line 14
        if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 14, $this->source); })()), "limits", [], "any", false, false, false, 14)) > 1) && (twig_length_filter($this->env, (isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 14, $this->source); })())) > min(twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 14, $this->source); })()), "limits", [], "any", false, false, false, 14))))) {
            // line 15
            echo "        <div class=\"sylius-grid-nav__perpage\">
            <div class=\"ui fluid one menu sylius-paginate\">
                ";
            // line 17
            echo twig_call_macro($macros["pagination"], "macro_perPage", [(isset($context["data"]) || array_key_exists("data", $context) ? $context["data"] : (function () { throw new RuntimeError('Variable "data" does not exist.', 17, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 17, $this->source); })()), "limits", [], "any", false, false, false, 17)], 17, $context, $this->getSourceContext());
            echo "
            </div>
        </div>
    ";
        }
        // line 21
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusUi/Grid/Body/_navigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 21,  85 => 17,  81 => 15,  79 => 14,  74 => 12,  71 => 11,  67 => 9,  58 => 7,  54 => 6,  51 => 5,  49 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/pagination.html.twig' as pagination %}

<div class=\"sylius-grid-nav\">
    {% if data|length > 0 and definition.actionGroups.bulk is defined and definition.getEnabledActions('bulk')|length > 0 %}
        <div class=\"sylius-grid-nav__bulk\">
            {% for action in definition.getEnabledActions('bulk') %}
                {{ sylius_grid_render_bulk_action(grid, action, null) }}
            {% endfor %}
        </div>
    {% endif %}
    <div class=\"sylius-grid-nav__pagination\">
        {{ pagination.simple(data) }}
    </div>
    {% if definition.limits|length > 1 and data|length > min(definition.limits) %}
        <div class=\"sylius-grid-nav__perpage\">
            <div class=\"ui fluid one menu sylius-paginate\">
                {{ pagination.perPage(data, definition.limits) }}
            </div>
        </div>
    {% endif %}
</div>
", "@SyliusUi/Grid/Body/_navigation.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Grid/Body/_navigation.html.twig");
    }
}
