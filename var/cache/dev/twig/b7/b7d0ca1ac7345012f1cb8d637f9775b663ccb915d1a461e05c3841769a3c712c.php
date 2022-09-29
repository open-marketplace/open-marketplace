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

/* @SyliusAdmin/Product/Tab/_taxonomy.html.twig */
class __TwigTemplate_8fbf0da045ff39c62ab0d627a92f565067b17aa49b64289a5ece605e991f60d0 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Tab/_taxonomy.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Tab/_taxonomy.html.twig"));

        // line 1
        echo "<div class=\"ui tab\" data-tab=\"taxonomy\">
    <h3 class=\"ui top attached header\">";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.taxonomy"), "html", null, true);
        echo "</h3>

    <div class=\"ui attached segment\">
        ";
        // line 5
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "mainTaxon", [], "any", false, false, false, 5), 'row');
        echo "

        <h4>";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.product_taxon"), "html", null, true);
        echo "</h4>
        <div id=\"sylius-product-taxonomy-tree\"
             data-tree-root-nodes-url=\"";
        // line 9
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_ajax_taxon_root_nodes");
        echo "\"
             data-tree-leafs-url=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_ajax_taxon_leafs");
        echo "\"
        >
            ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "productTaxons", [], "any", false, false, false, 12), 'widget');
        echo "
            <div class=\"ui inverted dimmer\">
                <div class=\"ui loader\"></div>
            </div>
        </div>

        ";
        // line 18
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render([0 => (("sylius.admin.product." . (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 18, $this->source); })())) . ".tab_taxonomy"), 1 => "sylius.admin.product.tab_taxonomy"], ["form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })())]);
        echo "
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Tab/_taxonomy.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 18,  71 => 12,  66 => 10,  62 => 9,  57 => 7,  52 => 5,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui tab\" data-tab=\"taxonomy\">
    <h3 class=\"ui top attached header\">{{ 'sylius.ui.taxonomy'|trans }}</h3>

    <div class=\"ui attached segment\">
        {{ form_row(form.mainTaxon) }}

        <h4>{{ 'sylius.ui.product_taxon'|trans }}</h4>
        <div id=\"sylius-product-taxonomy-tree\"
             data-tree-root-nodes-url=\"{{ path('sylius_admin_ajax_taxon_root_nodes') }}\"
             data-tree-leafs-url=\"{{ path('sylius_admin_ajax_taxon_leafs') }}\"
        >
            {{ form_widget(form.productTaxons) }}
            <div class=\"ui inverted dimmer\">
                <div class=\"ui loader\"></div>
            </div>
        </div>

        {{ sylius_template_event(['sylius.admin.product.' ~ action ~ '.tab_taxonomy', 'sylius.admin.product.tab_taxonomy'], {'form': form}) }}
    </div>
</div>
", "@SyliusAdmin/Product/Tab/_taxonomy.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Tab/_taxonomy.html.twig");
    }
}
