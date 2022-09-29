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

/* @SyliusResource/Twig/paginate.html.twig */
class __TwigTemplate_eb6dc90dce87044de954d8e15ed1812d221d263b4fb3e85fc6617879a0a7f504 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusResource/Twig/paginate.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusResource/Twig/paginate.html.twig"));

        // line 1
        echo "<a href=\"#\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">
    ";
        // line 2
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["paginator"]) || array_key_exists("paginator", $context) ? $context["paginator"] : (function () { throw new RuntimeError('Variable "paginator" does not exist.', 2, $this->source); })()), "maxPerPage", [], "any", false, false, false, 2), "html", null, true);
        echo "&nbsp;
    <i class=\"icon-angle-down\"></i>
</a>

<ul class=\"dropdown-menu pull-left\" role=\"menu\">
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["limits"]) || array_key_exists("limits", $context) ? $context["limits"] : (function () { throw new RuntimeError('Variable "limits" does not exist.', 7, $this->source); })()));
        foreach ($context['_seq'] as $context["limit"] => $context["url"]) {
            // line 8
            echo "    <li>
        <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $context["url"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["limit"], "html", null, true);
            echo "</a>
    </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['limit'], $context['url'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "</ul>
/ ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["paginator"]) || array_key_exists("paginator", $context) ? $context["paginator"] : (function () { throw new RuntimeError('Variable "paginator" does not exist.', 13, $this->source); })()), "nbResults", [], "any", false, false, false, 13), "html", null, true);
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusResource/Twig/paginate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 13,  72 => 12,  61 => 9,  58 => 8,  54 => 7,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<a href=\"#\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\">
    {{ paginator.maxPerPage }}&nbsp;
    <i class=\"icon-angle-down\"></i>
</a>

<ul class=\"dropdown-menu pull-left\" role=\"menu\">
    {% for limit, url in limits %}
    <li>
        <a href=\"{{ url }}\">{{ limit }}</a>
    </li>
    {% endfor %}
</ul>
/ {{ paginator.nbResults }}
", "@SyliusResource/Twig/paginate.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/resource-bundle/src/Bundle/Resources/views/Twig/paginate.html.twig");
    }
}
