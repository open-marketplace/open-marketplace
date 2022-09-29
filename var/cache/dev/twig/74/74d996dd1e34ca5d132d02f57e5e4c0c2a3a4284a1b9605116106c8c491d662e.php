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

/* @SyliusAdmin/Dashboard/_menu.html.twig */
class __TwigTemplate_38fc49bfbbb937ea4625aabab36712221b6b1626f5963dc586254445fc866a88 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_menu.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_menu.html.twig"));

        // line 1
        echo "<div class=\"ui grid\">
    <div class=\"center aligned doubling four column row\">
        <div class=\"column\">
            <a href=\"";
        // line 4
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_product_index");
        echo "\" class=\"ui basic big fluid button\">
                <i class=\"cubes icon\"></i>
                ";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.products"), "html", null, true);
        echo "
            </a>
        </div>
        <div class=\"column\">
            <a href=\"";
        // line 10
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_order_index");
        echo "\" class=\"ui basic big fluid button\">
                <i class=\"shop icon\"></i>
                ";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.orders"), "html", null, true);
        echo "
            </a>
        </div>
        <div class=\"column\">
            <a href=\"";
        // line 16
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_customer_index");
        echo "\" class=\"ui basic big fluid button\">
                <i class=\"users icon\"></i>
                ";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.customers"), "html", null, true);
        echo "
            </a>
        </div>
        <div class=\"column\">
            <a href=\"";
        // line 22
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_promotion_index");
        echo "\" class=\"ui basic big fluid button\">
                <i class=\"ticket icon\"></i>
                ";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.promotions"), "html", null, true);
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
        return "@SyliusAdmin/Dashboard/_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 24,  84 => 22,  77 => 18,  72 => 16,  65 => 12,  60 => 10,  53 => 6,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui grid\">
    <div class=\"center aligned doubling four column row\">
        <div class=\"column\">
            <a href=\"{{ path('sylius_admin_product_index') }}\" class=\"ui basic big fluid button\">
                <i class=\"cubes icon\"></i>
                {{ 'sylius.ui.products'|trans }}
            </a>
        </div>
        <div class=\"column\">
            <a href=\"{{ path('sylius_admin_order_index') }}\" class=\"ui basic big fluid button\">
                <i class=\"shop icon\"></i>
                {{ 'sylius.ui.orders'|trans }}
            </a>
        </div>
        <div class=\"column\">
            <a href=\"{{ path('sylius_admin_customer_index') }}\" class=\"ui basic big fluid button\">
                <i class=\"users icon\"></i>
                {{ 'sylius.ui.customers'|trans }}
            </a>
        </div>
        <div class=\"column\">
            <a href=\"{{ path('sylius_admin_promotion_index') }}\" class=\"ui basic big fluid button\">
                <i class=\"ticket icon\"></i>
                {{ 'sylius.ui.promotions'|trans }}
            </a>
        </div>
    </div>
</div>
", "@SyliusAdmin/Dashboard/_menu.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Dashboard/_menu.html.twig");
    }
}
