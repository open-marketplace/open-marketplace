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

/* @SyliusAdmin/Product/Show/_detailsTable.html.twig */
class __TwigTemplate_1008e79e26092a75f395c813827398898a033392349ab530abc12f001fb3684e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_detailsTable.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_detailsTable.html.twig"));

        // line 1
        echo "<table class=\"ui very basic celled table\">
    <tbody>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.code"), "html", null, true);
        echo "</strong></td>
        <td>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "code", [], "any", false, false, false, 5), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.channels"), "html", null, true);
        echo "</strong></td>
        <td>
            ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 10, $this->source); })()), "channels", [], "any", false, false, false, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
            // line 11
            echo "                <div>
                    <span class=\"ui large empty horizontal circular label\" style=\"background-color: ";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["channel"], "color", [], "any", false, false, false, 12), "html", null, true);
            echo "\"></span>
                    <span class=\"channel-name\">";
            // line 13
            echo twig_escape_filter($this->env, $context["channel"], "html", null, true);
            echo "</span>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "        </td>
    </tr>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.current_stock"), "html", null, true);
        echo "</strong></td>
        <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 20, $this->source); })()), "variants", [], "any", false, false, false, 20), "first", [], "any", false, false, false, 20), "onHand", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
    </tr>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.tax_category"), "html", null, true);
        echo "</strong></td>
        <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 24, $this->source); })()), "variants", [], "any", false, false, false, 24), "first", [], "any", false, false, false, 24), "taxCategory", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
    </tr>
    </tbody>
</table>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_detailsTable.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 24,  98 => 23,  92 => 20,  88 => 19,  83 => 16,  74 => 13,  70 => 12,  67 => 11,  63 => 10,  58 => 8,  52 => 5,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<table class=\"ui very basic celled table\">
    <tbody>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.code'|trans }}</strong></td>
        <td>{{ product.code }}</td>
    </tr>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.channels'|trans }}</strong></td>
        <td>
            {% for channel in product.channels %}
                <div>
                    <span class=\"ui large empty horizontal circular label\" style=\"background-color: {{ channel.color }}\"></span>
                    <span class=\"channel-name\">{{ channel }}</span>
                </div>
            {% endfor %}
        </td>
    </tr>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.current_stock'|trans }}</strong></td>
        <td>{{ product.variants.first.onHand }}</td>
    </tr>
    <tr>
        <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.tax_category'|trans }}</strong></td>
        <td>{{ product.variants.first.taxCategory }}</td>
    </tr>
    </tbody>
</table>
", "@SyliusAdmin/Product/Show/_detailsTable.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_detailsTable.html.twig");
    }
}
