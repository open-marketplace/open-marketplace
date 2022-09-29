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

/* @SonataBlock/Block/block_core_rss.html.twig */
class __TwigTemplate_43e5ff5523f15be879b8248fa4fde0f8ed236f4bb89ce77a7d8c11f22224ecd0 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'block' => [$this, 'block_block'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 11
        return $this->loadTemplate(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["sonata_block"]) || array_key_exists("sonata_block", $context) ? $context["sonata_block"] : (function () { throw new RuntimeError('Variable "sonata_block" does not exist.', 11, $this->source); })()), "templates", [], "any", false, false, false, 11), "block_base", [], "any", false, false, false, 11), "@SonataBlock/Block/block_core_rss.html.twig", 11);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SonataBlock/Block/block_core_rss.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SonataBlock/Block/block_core_rss.html.twig"));

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 13
    public function block_block($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "block"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "block"));

        // line 14
        echo "    <div class=\"panel panel-default ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["settings"]) || array_key_exists("settings", $context) ? $context["settings"] : (function () { throw new RuntimeError('Variable "settings" does not exist.', 14, $this->source); })()), "class", [], "any", false, false, false, 14), "html", null, true);
        echo "\">
        ";
        // line 15
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["settings"]) || array_key_exists("settings", $context) ? $context["settings"] : (function () { throw new RuntimeError('Variable "settings" does not exist.', 15, $this->source); })()), "title", [], "any", false, false, false, 15))) {
            // line 16
            echo "            <div class=\"panel-heading\">
                <h4 class=\"panel-title\">
                    ";
            // line 18
            if (twig_get_attribute($this->env, $this->source, (isset($context["settings"]) || array_key_exists("settings", $context) ? $context["settings"] : (function () { throw new RuntimeError('Variable "settings" does not exist.', 18, $this->source); })()), "icon", [], "any", false, false, false, 18)) {
                // line 19
                echo "                        <i class=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["settings"]) || array_key_exists("settings", $context) ? $context["settings"] : (function () { throw new RuntimeError('Variable "settings" does not exist.', 19, $this->source); })()), "icon", [], "any", false, false, false, 19), "html", null, true);
                echo "\" aria-hidden=\"true\"></i>
                    ";
            }
            // line 21
            echo "                    ";
            if (twig_get_attribute($this->env, $this->source, (isset($context["settings"]) || array_key_exists("settings", $context) ? $context["settings"] : (function () { throw new RuntimeError('Variable "settings" does not exist.', 21, $this->source); })()), "translation_domain", [], "any", false, false, false, 21)) {
                // line 22
                echo "                        ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["settings"]) || array_key_exists("settings", $context) ? $context["settings"] : (function () { throw new RuntimeError('Variable "settings" does not exist.', 22, $this->source); })()), "title", [], "any", false, false, false, 22), [], twig_get_attribute($this->env, $this->source, (isset($context["settings"]) || array_key_exists("settings", $context) ? $context["settings"] : (function () { throw new RuntimeError('Variable "settings" does not exist.', 22, $this->source); })()), "translation_domain", [], "any", false, false, false, 22)), "html", null, true);
                echo "
                    ";
            } else {
                // line 24
                echo "                        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["settings"]) || array_key_exists("settings", $context) ? $context["settings"] : (function () { throw new RuntimeError('Variable "settings" does not exist.', 24, $this->source); })()), "title", [], "any", false, false, false, 24), "html", null, true);
                echo "
                    ";
            }
            // line 26
            echo "                </h4>
            </div>
        ";
        }
        // line 29
        echo "
        <div class=\"panel-body\">
            <div class=\"media\">
                ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["feeds"]) || array_key_exists("feeds", $context) ? $context["feeds"] : (function () { throw new RuntimeError('Variable "feeds" does not exist.', 32, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["feed"]) {
            // line 33
            echo "                    <div class=\"media-body\">
                        <h5 class=\"media-heading\">
                            <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["feed"], "link", [], "any", false, false, false, 35), "html", null, true);
            echo "\" rel=\"nofollow\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["feed"], "title", [], "any", false, false, false, 35), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["feed"], "title", [], "any", false, false, false, 35), "html", null, true);
            echo "</a>
                        </h5>
                        ";
            // line 37
            echo twig_get_attribute($this->env, $this->source, $context["feed"], "description", [], "any", false, false, false, 37);
            echo "
                    </div>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 40
            echo "                    No feeds available.
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feed'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SonataBlock/Block/block_core_rss.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 42,  137 => 40,  129 => 37,  120 => 35,  116 => 33,  111 => 32,  106 => 29,  101 => 26,  95 => 24,  89 => 22,  86 => 21,  80 => 19,  78 => 18,  74 => 16,  72 => 15,  67 => 14,  57 => 13,  35 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("{#

This file is part of the Sonata package.

(c) Thomas Rabaix <thomas.rabaix@sonata-project.org>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

#}
{% extends sonata_block.templates.block_base %}

{% block block %}
    <div class=\"panel panel-default {{ settings.class }}\">
        {% if settings.title is not empty %}
            <div class=\"panel-heading\">
                <h4 class=\"panel-title\">
                    {% if settings.icon %}
                        <i class=\"{{ settings.icon }}\" aria-hidden=\"true\"></i>
                    {% endif %}
                    {% if settings.translation_domain %}
                        {{ settings.title|trans({}, settings.translation_domain) }}
                    {% else %}
                        {{ settings.title }}
                    {% endif %}
                </h4>
            </div>
        {% endif %}

        <div class=\"panel-body\">
            <div class=\"media\">
                {% for feed in feeds %}
                    <div class=\"media-body\">
                        <h5 class=\"media-heading\">
                            <a href=\"{{ feed.link }}\" rel=\"nofollow\" title=\"{{ feed.title }}\">{{ feed.title }}</a>
                        </h5>
                        {{ feed.description|raw }}
                    </div>
                {% else %}
                    No feeds available.
                {% endfor %}
            </div>
        </div>
    </div>
{% endblock %}
", "@SonataBlock/Block/block_core_rss.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sonata-project/block-bundle/src/Resources/views/Block/block_core_rss.html.twig");
    }
}
