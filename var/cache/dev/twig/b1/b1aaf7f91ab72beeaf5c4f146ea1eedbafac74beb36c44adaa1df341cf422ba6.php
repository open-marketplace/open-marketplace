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

/* @SyliusAdmin/Product/Show/_variantsContent.html.twig */
class __TwigTemplate_fbf8811e867ada1737b00e8a49155edc428d1961ecb4205ab929e3b5e81b827c extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_variantsContent.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_variantsContent.html.twig"));

        // line 1
        echo "<div class=\"ui attached spaceless segment\">
    <table class=\"ui very basic table\" style=\"padding-top: 20px\">
        <thead>
        <tr>
            <th></th>
            <th>";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.name"), "html", null, true);
        echo "</th>
            <th>";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.options"), "html", null, true);
        echo "</th>
            <th>";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.tracked"), "html", null, true);
        echo "</th>
            <th>";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_required"), "html", null, true);
        echo "</th>
            <th>";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.tax_category"), "html", null, true);
        echo "</th>
            <th>";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.current_stock"), "html", null, true);
        echo "</th>
            <th style=\"padding-right: 15px;\">";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.actions"), "html", null, true);
        echo "</th>
        </tr>
        </thead>
        <tbody class=\"variants-accordion\">
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 16, $this->source); })()), "variants", [], "any", false, false, false, 16));
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
        foreach ($context['_seq'] as $context["_key"] => $context["variant"]) {
            // line 17
            echo "            ";
            $this->loadTemplate("@SyliusAdmin/Product/Show/_variantItem.html.twig", "@SyliusAdmin/Product/Show/_variantsContent.html.twig", 17)->display($context);
            // line 18
            echo "            ";
            $this->loadTemplate("@SyliusAdmin/Product/Show/_variantContent.html.twig", "@SyliusAdmin/Product/Show/_variantsContent.html.twig", 18)->display($context);
            // line 19
            echo "        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['variant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "        </tbody>
    </table>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_variantsContent.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 20,  104 => 19,  101 => 18,  98 => 17,  81 => 16,  74 => 12,  70 => 11,  66 => 10,  62 => 9,  58 => 8,  54 => 7,  50 => 6,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui attached spaceless segment\">
    <table class=\"ui very basic table\" style=\"padding-top: 20px\">
        <thead>
        <tr>
            <th></th>
            <th>{{ 'sylius.ui.name'|trans }}</th>
            <th>{{ 'sylius.ui.options'|trans }}</th>
            <th>{{ 'sylius.ui.tracked'|trans }}</th>
            <th>{{ 'sylius.ui.shipping_required'|trans }}</th>
            <th>{{ 'sylius.ui.tax_category'|trans }}</th>
            <th>{{ 'sylius.ui.current_stock'|trans }}</th>
            <th style=\"padding-right: 15px;\">{{ 'sylius.ui.actions'|trans }}</th>
        </tr>
        </thead>
        <tbody class=\"variants-accordion\">
        {% for variant in product.variants %}
            {% include '@SyliusAdmin/Product/Show/_variantItem.html.twig' %}
            {% include '@SyliusAdmin/Product/Show/_variantContent.html.twig' %}
        {% endfor %}
        </tbody>
    </table>
</div>
", "@SyliusAdmin/Product/Show/_variantsContent.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_variantsContent.html.twig");
    }
}
