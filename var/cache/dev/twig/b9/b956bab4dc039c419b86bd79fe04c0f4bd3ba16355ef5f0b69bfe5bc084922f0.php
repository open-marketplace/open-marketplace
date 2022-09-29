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

/* @SyliusAdmin/CatalogPromotion/Show/_translations.html.twig */
class __TwigTemplate_66222fbc5c480a673df4254d04769fe7a179e9bb130f36cbb0cb175a8f084bec extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/Show/_translations.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/Show/_translations.html.twig"));

        // line 1
        echo "<div class=\"ui hidden divider\"></div>

<div class=\"ui styled fluid accordion\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 4, $this->source); })()), "translations", [], "any", false, false, false, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["translation"]) {
            // line 5
            echo "        <div class=\"title\">
            <i class=\"dropdown icon\"></i>
            <i class=\"";
            // line 7
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "locale", [], "any", false, false, false, 7),  -2)), "html", null, true);
            echo " flag\"></i>
            ";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getFilter('sylius_locale_name')->getCallable()(twig_get_attribute($this->env, $this->source, $context["translation"], "locale", [], "any", false, false, false, 8)), "html", null, true);
            echo "
        </div>
        <div class=\"ui content\">
            <table class=\"ui very basic celled table\">
                <tbody>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.label"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "label", [], "any", false, false, false, 15), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">";
            // line 18
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.description"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 19
            echo twig_nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "description", [], "any", false, false, false, 19), "html", null, true));
            echo "</td>
                </tr>
                </tbody>
            </table>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translation'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/CatalogPromotion/Show/_translations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 25,  83 => 19,  79 => 18,  73 => 15,  69 => 14,  60 => 8,  56 => 7,  52 => 5,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui hidden divider\"></div>

<div class=\"ui styled fluid accordion\">
    {% for translation in catalog_promotion.translations %}
        <div class=\"title\">
            <i class=\"dropdown icon\"></i>
            <i class=\"{{ translation.locale|slice(-2)|lower }} flag\"></i>
            {{ translation.locale|sylius_locale_name }}
        </div>
        <div class=\"ui content\">
            <table class=\"ui very basic celled table\">
                <tbody>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">{{ 'sylius.ui.label'|trans }}</strong></td>
                    <td>{{ translation.label }}</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">{{ 'sylius.ui.description'|trans }}</strong></td>
                    <td>{{ translation.description|nl2br }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    {% endfor %}
</div>
", "@SyliusAdmin/CatalogPromotion/Show/_translations.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/CatalogPromotion/Show/_translations.html.twig");
    }
}
