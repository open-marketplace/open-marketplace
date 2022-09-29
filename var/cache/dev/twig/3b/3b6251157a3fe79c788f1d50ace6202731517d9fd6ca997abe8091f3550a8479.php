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

/* @SyliusUi/Grid/Filter/_content.html.twig */
class __TwigTemplate_56724414756c01af499e786062bfccfa29addc41bcc75ee60f0ffa049c87b301 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Grid/Filter/_content.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Grid/Filter/_content.html.twig"));

        // line 1
        $macros["buttons"] = $this->macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusUi/Grid/Filter/_content.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 3, $this->source); })()), "enabledFilters", [], "any", false, false, false, 3)) > 0)) {
            // line 4
            echo "    <div class=\"ui hidden divider\"></div>
    <div class=\"ui styled fluid accordion\">
        <div class=\"title ";
            // line 6
            if ( !(null === (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 6, $this->source); })()))) {
                echo "active";
            }
            echo "\">
            <i class=\"dropdown icon\"></i>
            <i class=\"filter icon\"></i>
            ";
            // line 9
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.filters"), "html", null, true);
            echo "
        </div>
        <div class=\"content ";
            // line 11
            if ( !(null === (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 11, $this->source); })()))) {
                echo "active";
            }
            echo "\">
            <form method=\"get\" action=\"";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 12, $this->source); })()), "html", null, true);
            echo "\" class=\"ui loadable form\" novalidate>
                <div class=\"sylius-filters\">
                    ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->extensions['Sylius\Bundle\UiBundle\Twig\SortByExtension']->sortBy(twig_array_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["definition"]) || array_key_exists("definition", $context) ? $context["definition"] : (function () { throw new RuntimeError('Variable "definition" does not exist.', 14, $this->source); })()), "enabledFilters", [], "any", false, false, false, 14), function ($__filter__) use ($context, $macros) { $context["filter"] = $__filter__; return twig_get_attribute($this->env, $this->source, $context["filter"], "enabled", [], "any", false, false, false, 14); }), "position"));
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                // line 15
                echo "                        <div class=\"sylius-filters__field\">
                            ";
                // line 16
                echo $this->env->getFunction('sylius_grid_render_filter')->getCallable()((isset($context["grid"]) || array_key_exists("grid", $context) ? $context["grid"] : (function () { throw new RuntimeError('Variable "grid" does not exist.', 16, $this->source); })()), $context["filter"]);
                echo "
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "                </div>
                ";
            // line 20
            echo twig_call_macro($macros["buttons"], "macro_filter", [], 20, $context, $this->getSourceContext());
            echo "
                ";
            // line 21
            echo twig_call_macro($macros["buttons"], "macro_resetFilters", [(isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 21, $this->source); })())], 21, $context, $this->getSourceContext());
            echo "
            </form>
        </div>
    </div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusUi/Grid/Filter/_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 21,  97 => 20,  94 => 19,  85 => 16,  82 => 15,  78 => 14,  73 => 12,  67 => 11,  62 => 9,  54 => 6,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}

{% if definition.enabledFilters|length > 0 %}
    <div class=\"ui hidden divider\"></div>
    <div class=\"ui styled fluid accordion\">
        <div class=\"title {% if criteria is not null %}active{% endif %}\">
            <i class=\"dropdown icon\"></i>
            <i class=\"filter icon\"></i>
            {{ 'sylius.ui.filters'|trans }}
        </div>
        <div class=\"content {% if criteria is not null %}active{% endif %}\">
            <form method=\"get\" action=\"{{ path }}\" class=\"ui loadable form\" novalidate>
                <div class=\"sylius-filters\">
                    {% for filter in definition.enabledFilters|filter(filter => filter.enabled)|sort_by('position') %}
                        <div class=\"sylius-filters__field\">
                            {{ sylius_grid_render_filter(grid, filter) }}
                        </div>
                    {% endfor %}
                </div>
                {{ buttons.filter() }}
                {{ buttons.resetFilters(path) }}
            </form>
        </div>
    </div>
{% endif %}
", "@SyliusUi/Grid/Filter/_content.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Grid/Filter/_content.html.twig");
    }
}
