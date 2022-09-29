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

/* @SyliusAdmin/Product/Show/_simpleProduct.html.twig */
class __TwigTemplate_c8ff1efed1b3586414b9800dd0c2347359d74b50ac723413979c7a6e58800a34 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_simpleProduct.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_simpleProduct.html.twig"));

        // line 1
        $this->loadTemplate("@SyliusAdmin/Product/Show/_header.html.twig", "@SyliusAdmin/Product/Show/_simpleProduct.html.twig", 1)->display($context);
        // line 2
        echo "
<div class=\"ui grid\">
    <div class=\"sixteen wide mobile ten wide computer column\">
        ";
        // line 5
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.simple_product.show.details", $context);
        echo "
        <div class=\"ui hidden divider\"></div>
        ";
        // line 7
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.simple_product.show.taxonomy", $context);
        echo "
    </div>
    <div class=\"sixteen wide mobile six wide computer column\">
        ";
        // line 10
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.simple_product.show.pricing", $context);
        echo "
        <div class=\"ui hidden divider\"></div>
        ";
        // line 12
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.simple_product.show.shipping", $context);
        echo "
    </div>
</div>
<div class=\"ui hidden divider\"></div>
";
        // line 16
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.simple_product.show.media", $context);
        echo "

<div class=\"ui hidden divider\"></div>
";
        // line 19
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.simple_product.show.more_details", $context);
        echo "

<div class=\"ui hidden divider\"></div>
<div class=\"ui grid\">
    <div class=\"sixteen wide mobile ten wide computer column\">
        ";
        // line 24
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.simple_product.show.attributes", $context);
        echo "
    </div>
    <div class=\"sixteen wide mobile six wide computer column\">
        ";
        // line 27
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.simple_product.show.associations", $context);
        echo "
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_simpleProduct.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 27,  87 => 24,  79 => 19,  73 => 16,  66 => 12,  61 => 10,  55 => 7,  50 => 5,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% include '@SyliusAdmin/Product/Show/_header.html.twig' %}

<div class=\"ui grid\">
    <div class=\"sixteen wide mobile ten wide computer column\">
        {{ sylius_template_event('sylius.admin.simple_product.show.details', _context) }}
        <div class=\"ui hidden divider\"></div>
        {{ sylius_template_event('sylius.admin.simple_product.show.taxonomy', _context) }}
    </div>
    <div class=\"sixteen wide mobile six wide computer column\">
        {{ sylius_template_event('sylius.admin.simple_product.show.pricing', _context) }}
        <div class=\"ui hidden divider\"></div>
        {{ sylius_template_event('sylius.admin.simple_product.show.shipping', _context) }}
    </div>
</div>
<div class=\"ui hidden divider\"></div>
{{ sylius_template_event('sylius.admin.simple_product.show.media', _context) }}

<div class=\"ui hidden divider\"></div>
{{ sylius_template_event('sylius.admin.simple_product.show.more_details', _context) }}

<div class=\"ui hidden divider\"></div>
<div class=\"ui grid\">
    <div class=\"sixteen wide mobile ten wide computer column\">
        {{ sylius_template_event('sylius.admin.simple_product.show.attributes', _context) }}
    </div>
    <div class=\"sixteen wide mobile six wide computer column\">
        {{ sylius_template_event('sylius.admin.simple_product.show.associations', _context) }}
    </div>
</div>
", "@SyliusAdmin/Product/Show/_simpleProduct.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_simpleProduct.html.twig");
    }
}
