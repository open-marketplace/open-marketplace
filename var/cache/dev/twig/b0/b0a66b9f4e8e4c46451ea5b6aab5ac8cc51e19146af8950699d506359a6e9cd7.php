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

/* @SyliusShop/Layout/Footer/Grid/_plus.html.twig */
class __TwigTemplate_6cbd1c568fe7303ef4757ca2e2ee77fc48d34ab617e77a17e7d8103dd9436a9f extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Layout/Footer/Grid/_plus.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Layout/Footer/Grid/_plus.html.twig"));

        // line 1
        echo "<div class=\"four wide column\">
    <a href=\"https://sylius.com/plus\" target=\"_blank\" style=\"display: inline-block; text-align: center;\">
        <h4 class=\"ui inverted header\" style=\"color: #808080;\">
            Need even more features?
            <div class=\"sub header\" style=\"padding: 5px 0;\">Check Sylius Plus out!</div>
        </h4>
        <img class=\"ui fluid image\" style=\"max-width: 170px;\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/shop/img/sylius-plus-banner.png"), "html", null, true);
        echo "\" alt=\"Sylius Plus\">
    </a>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Layout/Footer/Grid/_plus.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 7,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"four wide column\">
    <a href=\"https://sylius.com/plus\" target=\"_blank\" style=\"display: inline-block; text-align: center;\">
        <h4 class=\"ui inverted header\" style=\"color: #808080;\">
            Need even more features?
            <div class=\"sub header\" style=\"padding: 5px 0;\">Check Sylius Plus out!</div>
        </h4>
        <img class=\"ui fluid image\" style=\"max-width: 170px;\" src=\"{{ asset('assets/shop/img/sylius-plus-banner.png') }}\" alt=\"Sylius Plus\">
    </a>
</div>
", "@SyliusShop/Layout/Footer/Grid/_plus.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Layout/Footer/Grid/_plus.html.twig");
    }
}
