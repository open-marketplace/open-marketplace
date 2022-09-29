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

/* @SyliusShop/Homepage/_newsletter.html.twig */
class __TwigTemplate_c38fbc6c70cefe155f934faf452fcfd0b87c1a30807e2629405e2a7c50470324 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Homepage/_newsletter.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Homepage/_newsletter.html.twig"));

        // line 1
        echo "<div class=\"ui very padded secondary segment newsletter\">
    <div class=\"ui bottom aligned grid\">
        <div class=\"doubling two column row\">
            <div class=\"column\">
                <h2 class=\"ui huge header\">
                    ";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.homepage.newsletter"), "html", null, true);
        echo "
                </h2>
                <p>
                    ";
        // line 9
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.homepage.newsletter_description");
        echo "
                </p>
            </div>
            <div class=\"column\">
                <form class=\"ui form\">
                    <div class=\"newsletter-input\">
                        <input type=\"text\" placeholder=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.email"), "html", null, true);
        echo "\">
                    </div>
                    <div class=\"newsletter-button\">
                        <button class=\"ui button\">";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.homepage.subscribe"), "html", null, true);
        echo "
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class=\"ui hidden divider\"></div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Homepage/_newsletter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 18,  65 => 15,  56 => 9,  50 => 6,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui very padded secondary segment newsletter\">
    <div class=\"ui bottom aligned grid\">
        <div class=\"doubling two column row\">
            <div class=\"column\">
                <h2 class=\"ui huge header\">
                    {{ 'sylius.homepage.newsletter'|trans }}
                </h2>
                <p>
                    {{ 'sylius.homepage.newsletter_description'|trans|raw }}
                </p>
            </div>
            <div class=\"column\">
                <form class=\"ui form\">
                    <div class=\"newsletter-input\">
                        <input type=\"text\" placeholder=\"{{ 'sylius.ui.email'|trans }}\">
                    </div>
                    <div class=\"newsletter-button\">
                        <button class=\"ui button\">{{ 'sylius.homepage.subscribe'|trans }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class=\"ui hidden divider\"></div>
", "@SyliusShop/Homepage/_newsletter.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Homepage/_newsletter.html.twig");
    }
}
