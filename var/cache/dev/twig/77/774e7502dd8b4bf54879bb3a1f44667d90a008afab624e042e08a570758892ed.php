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

/* @SyliusAdmin/Order/Show/_summary.html.twig */
class __TwigTemplate_e612f0438391a8c5b27abeddaeee469a3f93228f392491df04fec4436824cf66 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/_summary.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Show/_summary.html.twig"));

        // line 1
        echo "<table class=\"ui celled compact small table order-summary-table\">
    <thead>
    <tr>
        <th class=\"five wide sylius-table-column-item\">";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.order_item_product"), "html", null, true);
        echo "</th>
        <th class=\"center aligned sylius-table-column-unit_price\">";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.unit_price"), "html", null, true);
        echo "</th>
        <th class=\"center aligned sylius-table-column-unit_discount\">";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.unit_discount"), "html", null, true);
        echo "</th>
        <th class=\"center aligned sylius-table-column-unit_order_discount\">";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.distributed_order_discount"), "html", null, true);
        echo "</th>
        <th class=\"center aligned sylius-table-column-discounted_unit_price\">";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.discounted_unit_price"), "html", null, true);
        echo "</th>
        <th class=\"center aligned sylius-table-column-quantity\">";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.quantity"), "html", null, true);
        echo "</th>
        <th class=\"center aligned sylius-table-column-subtotal\">";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.subtotal"), "html", null, true);
        echo "</th>
        <th class=\"center aligned sylius-table-column-tax\">";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.tax"), "html", null, true);
        echo "</th>
        <th class=\"center aligned sylius-table-column-total\">";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.total"), "html", null, true);
        echo "</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 16, $this->source); })()), "items", [], "any", false, false, false, 16));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 17
            echo "        ";
            $this->loadTemplate("@SyliusAdmin/Order/Show/Summary/_item.html.twig", "@SyliusAdmin/Order/Show/_summary.html.twig", 17)->display($context);
            // line 18
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "    </tbody>
    <tfoot>
    ";
        // line 21
        $this->loadTemplate("@SyliusAdmin/Order/Show/Summary/_totals.html.twig", "@SyliusAdmin/Order/Show/_summary.html.twig", 21)->display($context);
        // line 22
        echo "    </tfoot>
</table>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Show/_summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 22,  125 => 21,  121 => 19,  107 => 18,  104 => 17,  87 => 16,  80 => 12,  76 => 11,  72 => 10,  68 => 9,  64 => 8,  60 => 7,  56 => 6,  52 => 5,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<table class=\"ui celled compact small table order-summary-table\">
    <thead>
    <tr>
        <th class=\"five wide sylius-table-column-item\">{{ 'sylius.ui.order_item_product'|trans }}</th>
        <th class=\"center aligned sylius-table-column-unit_price\">{{ 'sylius.ui.unit_price'|trans }}</th>
        <th class=\"center aligned sylius-table-column-unit_discount\">{{ 'sylius.ui.unit_discount'|trans }}</th>
        <th class=\"center aligned sylius-table-column-unit_order_discount\">{{ 'sylius.ui.distributed_order_discount'|trans }}</th>
        <th class=\"center aligned sylius-table-column-discounted_unit_price\">{{ 'sylius.ui.discounted_unit_price'|trans }}</th>
        <th class=\"center aligned sylius-table-column-quantity\">{{ 'sylius.ui.quantity'|trans }}</th>
        <th class=\"center aligned sylius-table-column-subtotal\">{{ 'sylius.ui.subtotal'|trans }}</th>
        <th class=\"center aligned sylius-table-column-tax\">{{ 'sylius.ui.tax'|trans }}</th>
        <th class=\"center aligned sylius-table-column-total\">{{ 'sylius.ui.total'|trans }}</th>
    </tr>
    </thead>
    <tbody>
    {% for item in order.items %}
        {% include '@SyliusAdmin/Order/Show/Summary/_item.html.twig' %}
    {% endfor %}
    </tbody>
    <tfoot>
    {% include '@SyliusAdmin/Order/Show/Summary/_totals.html.twig' %}
    </tfoot>
</table>
", "@SyliusAdmin/Order/Show/_summary.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Show/_summary.html.twig");
    }
}
