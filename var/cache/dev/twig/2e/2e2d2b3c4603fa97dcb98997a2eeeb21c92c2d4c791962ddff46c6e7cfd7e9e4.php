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

/* @SyliusAdmin/ProductVariant/Create/_breadcrumb.html.twig */
class __TwigTemplate_552065c384c6ad310210fda8e5e83f85a26e850bfc0e1f1928b7d81188cf66a5 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ProductVariant/Create/_breadcrumb.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ProductVariant/Create/_breadcrumb.html.twig"));

        // line 1
        $macros["breadcrumb"] = $this->macros["breadcrumb"] = $this->loadTemplate("@SyliusAdmin/Macro/breadcrumb.html.twig", "@SyliusAdmin/ProductVariant/Create/_breadcrumb.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        $context["breadcrumbs"] = [0 => ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.administration"), "url" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_dashboard")], 1 => ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.products"), "url" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_product_index")], 2 => ["label" => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 6
($context["resource"] ?? null), "product", [], "any", false, true, false, 6), "name", [], "any", true, true, false, 6)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["resource"] ?? null), "product", [], "any", false, true, false, 6), "name", [], "any", false, false, false, 6), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 6, $this->source); })()), "product", [], "any", false, false, false, 6), "code", [], "any", false, false, false, 6))) : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 6, $this->source); })()), "product", [], "any", false, false, false, 6), "code", [], "any", false, false, false, 6))), "url" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_product_update", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 6, $this->source); })()), "product", [], "any", false, false, false, 6), "id", [], "any", false, false, false, 6)])], 3 => ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.variants"), "url" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source,         // line 7
(isset($context["configuration"]) || array_key_exists("configuration", $context) ? $context["configuration"] : (function () { throw new RuntimeError('Variable "configuration" does not exist.', 7, $this->source); })()), "getRouteName", [0 => "index"], "method", false, false, false, 7), ["productId" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 7, $this->source); })()), "product", [], "any", false, false, false, 7), "id", [], "any", false, false, false, 7)])], 4 => ["label" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.new")]];
        // line 11
        echo "
";
        // line 12
        echo twig_call_macro($macros["breadcrumb"], "macro_crumble", [(isset($context["breadcrumbs"]) || array_key_exists("breadcrumbs", $context) ? $context["breadcrumbs"] : (function () { throw new RuntimeError('Variable "breadcrumbs" does not exist.', 12, $this->source); })())], 12, $context, $this->getSourceContext());
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/ProductVariant/Create/_breadcrumb.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 12,  52 => 11,  50 => 7,  49 => 6,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusAdmin/Macro/breadcrumb.html.twig' as breadcrumb %}

{% set breadcrumbs = [
        { label: 'sylius.ui.administration'|trans, url: path('sylius_admin_dashboard') },
        { label: 'sylius.ui.products'|trans, url: path('sylius_admin_product_index') },
        { label: resource.product.name|default(resource.product.code), url: path('sylius_admin_product_update', {'id': resource.product.id}) },
        { label: 'sylius.ui.variants'|trans, url: path(configuration.getRouteName('index'), {'productId': resource.product.id}) },
        { label: 'sylius.ui.new'|trans }
    ]
%}

{{ breadcrumb.crumble(breadcrumbs) }}
", "@SyliusAdmin/ProductVariant/Create/_breadcrumb.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/ProductVariant/Create/_breadcrumb.html.twig");
    }
}
