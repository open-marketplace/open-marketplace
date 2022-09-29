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

/* @SyliusUi/Grid/Action/links.html.twig */
class __TwigTemplate_b281ada124118141dcb53c713a3df6817dc145cdde63db3c3708f662a0224ade extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Grid/Action/links.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Grid/Action/links.html.twig"));

        // line 1
        $context["visible"] = ((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "visible", [], "any", true, true, false, 1)) ? (twig_get_attribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 1, $this->source); })()), "visible", [], "any", false, false, false, 1)) : (true));
        // line 2
        echo "
";
        // line 3
        if ((isset($context["visible"]) || array_key_exists("visible", $context) ? $context["visible"] : (function () { throw new RuntimeError('Variable "visible" does not exist.', 3, $this->source); })())) {
            // line 4
            echo "    <div class=\"ui";
            if (twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "icon", [], "any", true, true, false, 4)) {
                echo " labeled icon";
            }
            echo " floating dropdown ";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "class", [], "any", true, true, false, 4)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "class", [], "any", false, false, false, 4), "")) : ("")), "html", null, true);
            echo " link button\">
        ";
            // line 5
            if (twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "icon", [], "any", true, true, false, 5)) {
                echo "<i class=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 5, $this->source); })()), "icon", [], "any", false, false, false, 5), "html", null, true);
                echo " icon\"></i>";
            }
            // line 6
            echo "        <span class=\"text\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 6, $this->source); })()), "label", [], "any", false, false, false, 6)), "html", null, true);
            echo "</span>
        <div class=\"menu\">
            ";
            // line 8
            if (twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "header", [], "any", true, true, false, 8)) {
                // line 9
                echo "            <div class=\"header\">
                ";
                // line 10
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "header", [], "any", false, true, false, 10), "icon", [], "any", true, true, false, 10)) {
                    echo "<i class=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 10, $this->source); })()), "header", [], "any", false, false, false, 10), "icon", [], "any", false, false, false, 10), "html", null, true);
                    echo " icon\"></i>";
                }
                // line 11
                echo "                ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 11, $this->source); })()), "header", [], "any", false, false, false, 11), "label", [], "any", false, false, false, 11)), "html", null, true);
                echo "
            </div>
            <div class=\"divider\"></div>
            ";
            }
            // line 15
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 15, $this->source); })()), "links", [], "any", false, false, false, 15));
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
            foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
                // line 16
                echo "                ";
                $context["is_link_visible"] = ((twig_get_attribute($this->env, $this->source, $context["link"], "visible", [], "any", true, true, false, 16)) ? (twig_get_attribute($this->env, $this->source, $context["link"], "visible", [], "any", false, false, false, 16)) : (true));
                // line 17
                echo "
                ";
                // line 18
                if ((isset($context["is_link_visible"]) || array_key_exists("is_link_visible", $context) ? $context["is_link_visible"] : (function () { throw new RuntimeError('Variable "is_link_visible" does not exist.', 18, $this->source); })())) {
                    // line 19
                    echo "                    ";
                    $this->loadTemplate("@SyliusUi/Grid/Action/_link.html.twig", "@SyliusUi/Grid/Action/links.html.twig", 19)->display($context);
                    // line 20
                    echo "                ";
                }
                // line 21
                echo "            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "        </div>
    </div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusUi/Grid/Action/links.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 22,  122 => 21,  119 => 20,  116 => 19,  114 => 18,  111 => 17,  108 => 16,  90 => 15,  82 => 11,  76 => 10,  73 => 9,  71 => 8,  65 => 6,  59 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set visible = options.visible is defined ? options.visible : true %}

{% if visible %}
    <div class=\"ui{% if options.icon is defined %} labeled icon{% endif %} floating dropdown {{ options.class|default('') }} link button\">
        {% if options.icon is defined %}<i class=\"{{ options.icon }} icon\"></i>{% endif %}
        <span class=\"text\">{{ action.label|trans }}</span>
        <div class=\"menu\">
            {% if options.header is defined %}
            <div class=\"header\">
                {% if options.header.icon is defined %}<i class=\"{{ options.header.icon }} icon\"></i>{% endif %}
                {{ options.header.label|trans }}
            </div>
            <div class=\"divider\"></div>
            {% endif %}
            {% for link in options.links %}
                {% set is_link_visible = link.visible is defined ? link.visible : true %}

                {% if is_link_visible %}
                    {% include '@SyliusUi/Grid/Action/_link.html.twig' %}
                {% endif %}
            {% endfor %}
        </div>
    </div>
{% endif %}
", "@SyliusUi/Grid/Action/links.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Grid/Action/links.html.twig");
    }
}
