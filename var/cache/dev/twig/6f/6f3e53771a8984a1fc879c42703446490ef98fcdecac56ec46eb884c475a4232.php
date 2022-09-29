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

/* @SyliusAdmin/Taxon/_treeWithButtons.html.twig */
class __TwigTemplate_3cb5b1eb2543bf736c9762635999a842daed09dee423e3af0656ab54107c376c extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Taxon/_treeWithButtons.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Taxon/_treeWithButtons.html.twig"));

        // line 1
        $macros["buttons"] = $this->macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusAdmin/Taxon/_treeWithButtons.html.twig", 1)->unwrap();
        // line 2
        $macros["tree"] = $this->macros["tree"] = $this;
        // line 3
        echo "
";
        // line 56
        echo "
<div class=\"ui segment sylius-tree hidden\" data-sylius-js-tree>
    <a href=\"";
        // line 58
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_taxon_create");
        echo "\" class=\"ui fluid labeled icon primary button\">
        <i class=\"plus icon\"></i>
        ";
        // line 60
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.create"), "html", null, true);
        echo "
    </a>

    <div class=\"ui hidden divider small\"></div>

    <a href=\"#\" class=\"sylius-tree__toggle-all\" data-sylius-js-tree-trigger>
        <i class=\"icon\">&bull;</i>";
        // line 66
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.toggle_all"), "html", null, true);
        echo "
    </a>
    ";
        // line 68
        echo twig_call_macro($macros["tree"], "macro_render", [(isset($context["taxons"]) || array_key_exists("taxons", $context) ? $context["taxons"] : (function () { throw new RuntimeError('Variable "taxons" does not exist.', 68, $this->source); })())], 68, $context, $this->getSourceContext());
        echo "
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 4
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

            // line 5
            echo "    ";
            $macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusAdmin/Taxon/_treeWithButtons.html.twig", 5)->unwrap();
            // line 6
            echo "    ";
            $macros["tree"] = $this;
            // line 7
            echo "
    <ul>
        ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_array_filter($this->env, (isset($context["taxons"]) || array_key_exists("taxons", $context) ? $context["taxons"] : (function () { throw new RuntimeError('Variable "taxons" does not exist.', 9, $this->source); })()), function ($__taxon__) use ($context, $macros) { $context["taxon"] = $__taxon__; return  !(null === twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 9)); }));
            foreach ($context['_seq'] as $context["_key"] => $context["taxon"]) {
                // line 10
                echo "            <li data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 10), "html", null, true);
                echo "\" ";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["taxon"], "children", [], "any", false, false, false, 10))) {
                    echo "data-sylius-js-tree-parent=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 10), "html", null, true);
                    echo "\"";
                }
                echo ">
                <div class=\"sylius-tree__item\">
                    <div class=\"sylius-tree__icon\" ";
                // line 12
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["taxon"], "children", [], "any", false, false, false, 12))) {
                    echo "data-sylius-js-tree-trigger=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 12), "html", null, true);
                    echo "\"";
                }
                echo ">
                        <i class=\"";
                // line 13
                echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["taxon"], "children", [], "any", false, false, false, 13))) ? ("caret down") : ("angle left"));
                echo " icon\"></i>
                    </div>
                    <div class=\"sylius-tree__title\">
                        <a href=\"";
                // line 16
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_product_per_taxon_index", ["taxonId" => twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 16)]), "html", null, true);
                echo "\"";
                if ( !twig_get_attribute($this->env, $this->source, $context["taxon"], "enabled", [], "any", false, false, false, 16)) {
                    echo " class=\"text gray\"";
                }
                echo ">
                            ";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "name", [], "any", false, false, false, 17), "html", null, true);
                echo "
                        </a>
                    </div>
                    <div class=\"sylius-tree__action\">
                        <form action=\"";
                // line 21
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_taxon_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 21)]), "html", null, true);
                echo "\" method=\"post\">
                            <div class=\"ui tiny basic icon top right pointing dropdown button sylius-tree__action__trigger\">
                            <i class=\"ellipsis horizontal icon\"></i>
                                <div class=\"menu\">
                                    <a class=\"item\" href=\"";
                // line 25
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_taxon_create_for_parent", ["id" => twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 25)]), "html", null, true);
                echo "\">
                                        <i class=\"plus icon blue\"></i>";
                // line 26
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.create"), "html", null, true);
                echo "
                                    </a>
                                    <a class=\"item\" href=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_taxon_update", ["id" => twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 28)]), "html", null, true);
                echo "\">
                                        <i class=\"pencil icon grey\"></i>";
                // line 29
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.edit"), "html", null, true);
                echo "
                                    </a>
                                    <button class=\"item\" type=\"submit\" style=\"width: 100%;\" data-requires-confirmation>
                                        <i class=\"icon trash red\"></i>";
                // line 32
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.delete"), "html", null, true);
                echo "
                                    </button>

                                    <div class=\"divider\"></div>

                                    <div class=\"item sylius-taxon-move-up\" data-url=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_ajax_taxon_move", ["id" => twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 37)]), "html", null, true);
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 37), "html", null, true);
                echo "\" data-position=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "position", [], "any", false, false, false, 37), "html", null, true);
                echo "\">
                                        <i class=\"arrow up icon grey\"></i>";
                // line 38
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.move_up"), "html", null, true);
                echo "
                                    </div>
                                    <div class=\"item sylius-taxon-move-down\" data-url=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_ajax_taxon_move", ["id" => twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 40)]), "html", null, true);
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 40), "html", null, true);
                echo "\" data-position=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["taxon"], "position", [], "any", false, false, false, 40), "html", null, true);
                echo "\">
                                        <i class=\"arrow down icon grey\"></i>";
                // line 41
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.move_down"), "html", null, true);
                echo "
                                    </div>

                                    <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                                    <input type=\"hidden\" name=\"_csrf_token\" value=\"";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(twig_get_attribute($this->env, $this->source, $context["taxon"], "id", [], "any", false, false, false, 45)), "html", null, true);
                echo "\" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                ";
                // line 51
                echo twig_call_macro($macros["tree"], "macro_render", [twig_get_attribute($this->env, $this->source, $context["taxon"], "children", [], "any", false, false, false, 51)], 51, $context, $this->getSourceContext());
                echo "
            </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
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
        return "@SyliusAdmin/Taxon/_treeWithButtons.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 54,  231 => 51,  222 => 45,  215 => 41,  207 => 40,  202 => 38,  194 => 37,  186 => 32,  180 => 29,  176 => 28,  171 => 26,  167 => 25,  160 => 21,  153 => 17,  145 => 16,  139 => 13,  131 => 12,  119 => 10,  115 => 9,  111 => 7,  108 => 6,  105 => 5,  86 => 4,  73 => 68,  68 => 66,  59 => 60,  54 => 58,  50 => 56,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}
{% import _self as tree %}

{% macro render(taxons) %}
    {% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}
    {% import _self as tree %}

    <ul>
        {% for taxon in taxons|filter(taxon => taxon.id is not null) %}
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
                    <div class=\"sylius-tree__action\">
                        <form action=\"{{ path('sylius_admin_taxon_delete', { 'id': taxon.id }) }}\" method=\"post\">
                            <div class=\"ui tiny basic icon top right pointing dropdown button sylius-tree__action__trigger\">
                            <i class=\"ellipsis horizontal icon\"></i>
                                <div class=\"menu\">
                                    <a class=\"item\" href=\"{{ path('sylius_admin_taxon_create_for_parent', { 'id': taxon.id }) }}\">
                                        <i class=\"plus icon blue\"></i>{{ 'sylius.ui.create'|trans }}
                                    </a>
                                    <a class=\"item\" href=\"{{ path('sylius_admin_taxon_update', { 'id': taxon.id }) }}\">
                                        <i class=\"pencil icon grey\"></i>{{ 'sylius.ui.edit'|trans }}
                                    </a>
                                    <button class=\"item\" type=\"submit\" style=\"width: 100%;\" data-requires-confirmation>
                                        <i class=\"icon trash red\"></i>{{ 'sylius.ui.delete'|trans }}
                                    </button>

                                    <div class=\"divider\"></div>

                                    <div class=\"item sylius-taxon-move-up\" data-url=\"{{ path('sylius_admin_ajax_taxon_move', { id: taxon.id }) }}\" data-id=\"{{ taxon.id }}\" data-position=\"{{ taxon.position }}\">
                                        <i class=\"arrow up icon grey\"></i>{{ 'sylius.ui.move_up'|trans }}
                                    </div>
                                    <div class=\"item sylius-taxon-move-down\" data-url=\"{{ path('sylius_admin_ajax_taxon_move', { id: taxon.id }) }}\" data-id=\"{{ taxon.id }}\" data-position=\"{{ taxon.position }}\">
                                        <i class=\"arrow down icon grey\"></i>{{ 'sylius.ui.move_down'|trans }}
                                    </div>

                                    <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                                    <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token(taxon.id) }}\" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{ tree.render(taxon.children) }}
            </li>
        {% endfor %}
    </ul>
{% endmacro %}

<div class=\"ui segment sylius-tree hidden\" data-sylius-js-tree>
    <a href=\"{{ path('sylius_admin_taxon_create') }}\" class=\"ui fluid labeled icon primary button\">
        <i class=\"plus icon\"></i>
        {{ 'sylius.ui.create'|trans }}
    </a>

    <div class=\"ui hidden divider small\"></div>

    <a href=\"#\" class=\"sylius-tree__toggle-all\" data-sylius-js-tree-trigger>
        <i class=\"icon\">&bull;</i>{{ 'sylius.ui.toggle_all'|trans }}
    </a>
    {{ tree.render(taxons) }}
</div>
", "@SyliusAdmin/Taxon/_treeWithButtons.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Taxon/_treeWithButtons.html.twig");
    }
}
