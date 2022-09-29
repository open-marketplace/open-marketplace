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

/* @SyliusAdmin/Product/Show/_moreDetails.html.twig */
class __TwigTemplate_ec4dd0bfef3e757d325fe9c0c6d1783384911bf6f87d56031e4d870fb7a95726 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_moreDetails.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_moreDetails.html.twig"));

        // line 1
        echo "<div id=\"more-details\" class=\"ui styled fluid accordion\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 2, $this->source); })()), "translations", [], "any", false, false, false, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["translation"]) {
            // line 3
            echo "        <div class=\"title\">
            <i class=\"dropdown icon\"></i>
            <i class=\"";
            // line 5
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_slice($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "locale", [], "any", false, false, false, 5),  -2)), "html", null, true);
            echo " flag\"></i>
            ";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getFilter('sylius_locale_name')->getCallable()(twig_get_attribute($this->env, $this->source, $context["translation"], "locale", [], "any", false, false, false, 6)), "html", null, true);
            echo "
        </div>
        <div class=\"ui content\">
            <table class=\"ui very basic celled table\">
                <tbody>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">";
            // line 12
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.name"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "name", [], "any", false, false, false, 13), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">";
            // line 16
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.slug"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "slug", [], "any", false, false, false, 17), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">";
            // line 20
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.description"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 21
            echo twig_nl2br(twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "description", [], "any", false, false, false, 21), "html", null, true));
            echo "</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.meta_keywords"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "metaKeywords", [], "any", false, false, false, 25), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.meta_description"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "metaDescription", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">";
            // line 32
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.short_description"), "html", null, true);
            echo "</strong></td>
                    <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["translation"], "shortDescription", [], "any", false, false, false, 33), "html", null, true);
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
        // line 39
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_moreDetails.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 39,  121 => 33,  117 => 32,  111 => 29,  107 => 28,  101 => 25,  97 => 24,  91 => 21,  87 => 20,  81 => 17,  77 => 16,  71 => 13,  67 => 12,  58 => 6,  54 => 5,  50 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"more-details\" class=\"ui styled fluid accordion\">
    {% for translation in product.translations %}
        <div class=\"title\">
            <i class=\"dropdown icon\"></i>
            <i class=\"{{ translation.locale|slice(-2)|lower }} flag\"></i>
            {{ translation.locale|sylius_locale_name }}
        </div>
        <div class=\"ui content\">
            <table class=\"ui very basic celled table\">
                <tbody>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">{{ 'sylius.ui.name'|trans }}</strong></td>
                    <td>{{ translation.name }}</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">{{ 'sylius.ui.slug'|trans }}</strong></td>
                    <td>{{ translation.slug }}</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">{{ 'sylius.ui.description'|trans }}</strong></td>
                    <td>{{ translation.description|nl2br }}</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">{{ 'sylius.ui.meta_keywords'|trans }}</strong></td>
                    <td>{{ translation.metaKeywords }}</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">{{ 'sylius.ui.meta_description'|trans }}</strong></td>
                    <td>{{ translation.metaDescription }}</td>
                </tr>
                <tr>
                    <td class=\"three wide\"><strong class=\"gray text\">{{ 'sylius.ui.short_description'|trans }}</strong></td>
                    <td>{{ translation.shortDescription }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    {% endfor %}
</div>
", "@SyliusAdmin/Product/Show/_moreDetails.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_moreDetails.html.twig");
    }
}
