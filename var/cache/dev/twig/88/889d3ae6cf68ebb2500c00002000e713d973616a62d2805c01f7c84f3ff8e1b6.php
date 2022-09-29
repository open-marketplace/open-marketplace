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

/* @SyliusAdmin/Product/Show/_header.html.twig */
class __TwigTemplate_b2fe8c8c202a1fa0225954db1c0d1debd524138cbdb7e06e0aa1d5e1e5d27f6b extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_header.html.twig"));

        // line 1
        echo "<div id=\"header\" class=\"ui stackable two column grid\">
    <div class=\"column\">
        <h1 class=\"ui header\">
            <i class=\"circular cube icon\"></i>
            <div class=\"content\">
                <span>";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 6, $this->source); })()), "name", [], "any", false, false, false, 6), "html", null, true);
        echo "</span>
                <div class=\"sub header\">";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.show_product"), "html", null, true);
        echo "</div>
            </div>
        </h1>
        ";
        // line 10
        $this->loadTemplate("@SyliusAdmin/Product/Show/_breadcrumb.html.twig", "@SyliusAdmin/Product/Show/_header.html.twig", 10)->display($context);
        // line 11
        echo "    </div>
    <div class=\"middle aligned column\">
        <div class=\"ui right floated buttons\">
            ";
        // line 14
        $this->loadTemplate("@SyliusAdmin/Product/_showInShopButton.html.twig", "@SyliusAdmin/Product/Show/_header.html.twig", 14)->display($context);
        // line 15
        echo "            <a id=\"edit-product\" class=\"ui labeled icon button\" href= ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_product_update", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15)]), "html", null, true);
        echo ">
                <i class=\"edit icon\"></i>
                ";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.edit"), "html", null, true);
        echo "
            </a>
        </div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 17,  69 => 15,  67 => 14,  62 => 11,  60 => 10,  54 => 7,  50 => 6,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"header\" class=\"ui stackable two column grid\">
    <div class=\"column\">
        <h1 class=\"ui header\">
            <i class=\"circular cube icon\"></i>
            <div class=\"content\">
                <span>{{ product.name }}</span>
                <div class=\"sub header\">{{ 'sylius.ui.show_product'|trans }}</div>
            </div>
        </h1>
        {% include \"@SyliusAdmin/Product/Show/_breadcrumb.html.twig\" %}
    </div>
    <div class=\"middle aligned column\">
        <div class=\"ui right floated buttons\">
            {% include '@SyliusAdmin/Product/_showInShopButton.html.twig' %}
            <a id=\"edit-product\" class=\"ui labeled icon button\" href= {{path('sylius_admin_product_update', {'id':product.id}) }}>
                <i class=\"edit icon\"></i>
                {{ 'sylius.ui.edit'|trans }}
            </a>
        </div>
    </div>
</div>
", "@SyliusAdmin/Product/Show/_header.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_header.html.twig");
    }
}
