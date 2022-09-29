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

/* @SyliusAdmin/CatalogPromotion/Show/Scope/for_taxons.html.twig */
class __TwigTemplate_ace667d4ec8353853aa66a3aed6ceab7bbd60f0e04fa0265357eb48862e1b052 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/Show/Scope/for_taxons.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/Show/Scope/for_taxons.html.twig"));

        // line 1
        echo "<table class=\"ui very basic celled table\">
    <tbody>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.type"), "html", null, true);
        echo "</strong></td>
        <td>";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.for_taxons"), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.taxons"), "html", null, true);
        echo "</strong></td>
        <td ";
        // line 9
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("scope-taxons");
        echo ">
            <ul class=\"ui bulleted list\">
                ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["scope"]) || array_key_exists("scope", $context) ? $context["scope"] : (function () { throw new RuntimeError('Variable "scope" does not exist.', 11, $this->source); })()), "configuration", [], "any", false, false, false, 11), "taxons", [], "any", false, false, false, 11));
        foreach ($context['_seq'] as $context["_key"] => $context["taxon"]) {
            // line 12
            echo "                    <li>";
            echo twig_escape_filter($this->env, $context["taxon"], "html", null, true);
            echo "</li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['taxon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "            </ul>
        </td>
    </tr>
    </tbody>
</table>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/CatalogPromotion/Show/Scope/for_taxons.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 14,  71 => 12,  67 => 11,  62 => 9,  58 => 8,  52 => 5,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<table class=\"ui very basic celled table\">
    <tbody>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.type'|trans }}</strong></td>
        <td>{{ 'sylius.ui.for_taxons'|trans }}</td>
    </tr>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.taxons'|trans }}</strong></td>
        <td {{ sylius_test_html_attribute('scope-taxons') }}>
            <ul class=\"ui bulleted list\">
                {% for taxon in scope.configuration.taxons %}
                    <li>{{ taxon }}</li>
                {% endfor %}
            </ul>
        </td>
    </tr>
    </tbody>
</table>
", "@SyliusAdmin/CatalogPromotion/Show/Scope/for_taxons.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/CatalogPromotion/Show/Scope/for_taxons.html.twig");
    }
}
