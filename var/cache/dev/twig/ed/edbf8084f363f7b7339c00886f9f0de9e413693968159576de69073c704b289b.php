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

/* @SyliusAdmin/ProductVariant/Index/ProductHeader/_content.html.twig */
class __TwigTemplate_6174f76eca7a4aa3a3768eb523fe535ac7fc3a79ad1f0d5d600c77388c6501e5 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ProductVariant/Index/ProductHeader/_content.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/ProductVariant/Index/ProductHeader/_content.html.twig"));

        // line 1
        $macros["headers"] = $this->macros["headers"] = $this->loadTemplate("@SyliusUi/Macro/headers.html.twig", "@SyliusAdmin/ProductVariant/Index/ProductHeader/_content.html.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        echo twig_call_macro($macros["headers"], "macro_default", [twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 3, $this->source); })()), "name", [], "any", false, false, false, 3), ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "icon", [], "any", true, true, false, 3)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "icon", [], "any", false, false, false, 3), "cubes")) : ("cubes")), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "subheader", [], "any", true, true, false, 3)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["configuration"] ?? null), "vars", [], "any", false, true, false, 3), "subheader", [], "any", false, false, false, 3), "sylius.ui.manage_variants")) : ("sylius.ui.manage_variants")))], 3, $context, $this->getSourceContext());
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/ProductVariant/Index/ProductHeader/_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/headers.html.twig' as headers %}

{{ headers.default(product.name, configuration.vars.icon|default('cubes'), configuration.vars.subheader|default('sylius.ui.manage_variants')|trans) }}
", "@SyliusAdmin/ProductVariant/Index/ProductHeader/_content.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/ProductVariant/Index/ProductHeader/_content.html.twig");
    }
}
