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

/* @SyliusShop/Product/Show/_catalogPromotionLabels.html.twig */
class __TwigTemplate_3e1aaff76b7746d771d8da30fcdc80e11aba6dcffe7b4cb0fd3f3b37fc45c3f9 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_catalogPromotionLabels.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_catalogPromotionLabels.html.twig"));

        // line 1
        echo "<div id=\"appliedPromotions\" data-applied-promotions-locale=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["sylius"]) || array_key_exists("sylius", $context) ? $context["sylius"] : (function () { throw new RuntimeError('Variable "sylius" does not exist.', 1, $this->source); })()), "localeCode", [], "any", false, false, false, 1), "html", null, true);
        echo "\">
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["appliedPromotions"]) || array_key_exists("appliedPromotions", $context) ? $context["appliedPromotions"] : (function () { throw new RuntimeError('Variable "appliedPromotions" does not exist.', 2, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["appliedPromotion"]) {
            // line 3
            echo "        <div class=\"ui blue label promotion_label\" style=\"margin: 0.5rem 0;\">
            <div class=\"row ui small sylius_catalog_promotion\">
                ";
            // line 5
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["appliedPromotion"], "label", [], "any", false, false, false, 5), "html", null, true);
            if ((twig_get_attribute($this->env, $this->source, $context["appliedPromotion"], "description", [], "any", false, false, false, 5) && (isset($context["withDescription"]) || array_key_exists("withDescription", $context) ? $context["withDescription"] : (function () { throw new RuntimeError('Variable "withDescription" does not exist.', 5, $this->source); })()))) {
                echo " - ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["appliedPromotion"], "description", [], "any", false, false, false, 5), "html", null, true);
            }
            // line 6
            echo "            </div>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['appliedPromotion'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Show/_catalogPromotionLabels.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 9,  62 => 6,  56 => 5,  52 => 3,  48 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"appliedPromotions\" data-applied-promotions-locale=\"{{ sylius.localeCode }}\">
    {% for appliedPromotion in appliedPromotions %}
        <div class=\"ui blue label promotion_label\" style=\"margin: 0.5rem 0;\">
            <div class=\"row ui small sylius_catalog_promotion\">
                {{ appliedPromotion.label }}{% if appliedPromotion.description and withDescription %} - {{ appliedPromotion.description }}{% endif %}
            </div>
        </div>
    {% endfor %}
</div>
", "@SyliusShop/Product/Show/_catalogPromotionLabels.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Show/_catalogPromotionLabels.html.twig");
    }
}
