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

/* @SyliusShop/Product/Show/_priceWidget.html.twig */
class __TwigTemplate_33ee06c8052edb11dc44fe6fc1c4a880acc39445e38bf6eb31989efde0c333d7 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_priceWidget.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_priceWidget.html.twig"));

        // line 1
        echo "<div class=\"ui stackable grid\" ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("product-price-content");
        echo ">
    <div class=\"seven wide column\">
        ";
        // line 3
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 3, $this->source); })()), "enabledVariants", [], "any", false, false, false, 3), "empty", [], "method", false, false, false, 3)) {
            // line 4
            echo "            ";
            $this->loadTemplate("@SyliusShop/Product/Show/_price.html.twig", "@SyliusShop/Product/Show/_priceWidget.html.twig", 4)->display($context);
            // line 5
            echo "        ";
        }
        // line 6
        echo "    </div>
    <div class=\"nine wide right aligned column\">
        <span class=\"ui sub header\">";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 8, $this->source); })()), "code", [], "any", false, false, false, 8), "html", null, true);
        echo "</span>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Show/_priceWidget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 8,  57 => 6,  54 => 5,  51 => 4,  49 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui stackable grid\" {{ sylius_test_html_attribute('product-price-content') }}>
    <div class=\"seven wide column\">
        {% if not product.enabledVariants.empty() %}
            {% include '@SyliusShop/Product/Show/_price.html.twig' %}
        {% endif %}
    </div>
    <div class=\"nine wide right aligned column\">
        <span class=\"ui sub header\">{{ product.code }}</span>
    </div>
</div>
", "@SyliusShop/Product/Show/_priceWidget.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Show/_priceWidget.html.twig");
    }
}
