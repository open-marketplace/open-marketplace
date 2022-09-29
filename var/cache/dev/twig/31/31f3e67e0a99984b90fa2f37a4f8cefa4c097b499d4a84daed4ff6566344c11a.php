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

/* @SyliusAdmin/Layout/_channelLinks.html.twig */
class __TwigTemplate_e53ace1ea88136469bb626ddfb53a37421d7619c2a1b73d55f0410effe98c44e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Layout/_channelLinks.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Layout/_channelLinks.html.twig"));

        // line 1
        if ((twig_length_filter($this->env, (isset($context["channels"]) || array_key_exists("channels", $context) ? $context["channels"] : (function () { throw new RuntimeError('Variable "channels" does not exist.', 1, $this->source); })())) > 1)) {
            // line 2
            echo "    <div class=\"ui simple dropdown item\">
        <span>
            ";
            // line 4
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.view_your_store"), "html", null, true);
            echo "
        </span>
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\">
            ";
            // line 8
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_array_filter($this->env, (isset($context["channels"]) || array_key_exists("channels", $context) ? $context["channels"] : (function () { throw new RuntimeError('Variable "channels" does not exist.', 8, $this->source); })()), function ($__channel__) use ($context, $macros) { $context["channel"] = $__channel__; return  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["channel"], "hostname", [], "any", false, false, false, 8)); }));
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
            foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
                // line 9
                echo "            <a href=\"http://";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["channel"], "hostname", [], "any", false, false, false, 9), "html", null, true);
                echo "\" target=\"_blank\" class=\"item\">
                ";
                // line 10
                $this->loadTemplate("@SyliusAdmin/Common/_channel.html.twig", "@SyliusAdmin/Layout/_channelLinks.html.twig", 10)->display($context);
                // line 11
                echo "            </a>
            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "        </div>
    </div>
";
        } elseif ((twig_length_filter($this->env,         // line 15
(isset($context["channels"]) || array_key_exists("channels", $context) ? $context["channels"] : (function () { throw new RuntimeError('Variable "channels" does not exist.', 15, $this->source); })())) == 1)) {
            // line 16
            echo "    ";
            $context["channel"] = twig_first($this->env, (isset($context["channels"]) || array_key_exists("channels", $context) ? $context["channels"] : (function () { throw new RuntimeError('Variable "channels" does not exist.', 16, $this->source); })()));
            // line 17
            echo "
    ";
            // line 18
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 18, $this->source); })()), "hostname", [], "any", false, false, false, 18))) {
                // line 19
                echo "    <a href=\"http://";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 19, $this->source); })()), "hostname", [], "any", false, false, false, 19), "html", null, true);
                echo "\" target=\"_blank\" class=\"item\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.view_your_store"), "html", null, true);
                echo "</a>
    ";
            }
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Layout/_channelLinks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 19,  107 => 18,  104 => 17,  101 => 16,  99 => 15,  95 => 13,  80 => 11,  78 => 10,  73 => 9,  56 => 8,  49 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if channels|length > 1 %}
    <div class=\"ui simple dropdown item\">
        <span>
            {{ 'sylius.ui.view_your_store'|trans }}
        </span>
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\">
            {% for channel in channels|filter(channel => channel.hostname is not empty) %}
            <a href=\"http://{{ channel.hostname }}\" target=\"_blank\" class=\"item\">
                {% include '@SyliusAdmin/Common/_channel.html.twig' %}
            </a>
            {% endfor %}
        </div>
    </div>
{% elseif channels|length == 1 %}
    {% set channel = channels|first %}

    {% if channel.hostname is not empty %}
    <a href=\"http://{{ channel.hostname }}\" target=\"_blank\" class=\"item\">{{ 'sylius.ui.view_your_store'|trans }}</a>
    {% endif %}
{% endif %}
", "@SyliusAdmin/Layout/_channelLinks.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Layout/_channelLinks.html.twig");
    }
}
