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

/* @SyliusUi/Macro/breadcrumb.html.twig */
class __TwigTemplate_bdd18a2074e17388092003835cdcd8c4a7f1f0fbe0c499aaa57e7e7121f9888e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Macro/breadcrumb.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Macro/breadcrumb.html.twig"));

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function macro_crumble($__crumbs__ = [], $__root_path__ = null, $__root_label__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "crumbs" => $__crumbs__,
            "root_path" => $__root_path__,
            "root_label" => $__root_label__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "crumble"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "crumble"));

            // line 2
            echo "    <div class=\"ui breadcrumb\">
        ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["crumbs"]) || array_key_exists("crumbs", $context) ? $context["crumbs"] : (function () { throw new RuntimeError('Variable "crumbs" does not exist.', 3, $this->source); })()));
            $context['_iterated'] = false;
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
            foreach ($context['_seq'] as $context["_key"] => $context["crumb"]) {
                // line 4
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 4)) {
                    // line 5
                    echo "                <div class=\"active section\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["crumb"], "label", [], "any", false, false, false, 5), "html", null, true);
                    echo "</div>
            ";
                } elseif (twig_get_attribute($this->env, $this->source,                 // line 6
$context["crumb"], "url", [], "any", true, true, false, 6)) {
                    // line 7
                    echo "                <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["crumb"], "url", [], "any", false, false, false, 7), "html", null, true);
                    echo "\" class=\"section\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["crumb"], "label", [], "any", false, false, false, 7), "html", null, true);
                    echo "</a>
                <i class=\"right chevron icon divider\"></i>
            ";
                } else {
                    // line 10
                    echo "                <div class=\"section\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["crumb"], "label", [], "any", false, false, false, 10), "html", null, true);
                    echo "</div>
                <i class=\"right chevron icon divider\"></i>
            ";
                }
                // line 13
                echo "        ";
                $context['_iterated'] = true;
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            if (!$context['_iterated']) {
                // line 14
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, ((array_key_exists("root_url", $context)) ? (_twig_default_filter((isset($context["root_url"]) || array_key_exists("root_url", $context) ? $context["root_url"] : (function () { throw new RuntimeError('Variable "root_url" does not exist.', 14, $this->source); })()), "/")) : ("/")), "html", null, true);
                echo "\" class=\"section\">";
                echo twig_escape_filter($this->env, ((array_key_exists("root_label", $context)) ? (_twig_default_filter((isset($context["root_label"]) || array_key_exists("root_label", $context) ? $context["root_label"] : (function () { throw new RuntimeError('Variable "root_label" does not exist.', 14, $this->source); })()), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.root"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.root"))), "html", null, true);
                echo "</a>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['crumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "    </div>
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
        return "@SyliusUi/Macro/breadcrumb.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 16,  132 => 14,  119 => 13,  112 => 10,  103 => 7,  101 => 6,  96 => 5,  93 => 4,  75 => 3,  72 => 2,  51 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% macro crumble(crumbs = {}, root_path, root_label) %}
    <div class=\"ui breadcrumb\">
        {% for crumb in crumbs %}
            {% if loop.last %}
                <div class=\"active section\">{{ crumb.label }}</div>
            {% elseif crumb.url is defined %}
                <a href=\"{{ crumb.url }}\" class=\"section\">{{ crumb.label }}</a>
                <i class=\"right chevron icon divider\"></i>
            {% else %}
                <div class=\"section\">{{ crumb.label }}</div>
                <i class=\"right chevron icon divider\"></i>
            {% endif %}
        {% else %}
            <a href=\"{{ root_url|default('/') }}\" class=\"section\">{{ root_label|default('sylius.ui.root'|trans) }}</a>
        {% endfor %}
    </div>
{% endmacro %}
", "@SyliusUi/Macro/breadcrumb.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Macro/breadcrumb.html.twig");
    }
}
