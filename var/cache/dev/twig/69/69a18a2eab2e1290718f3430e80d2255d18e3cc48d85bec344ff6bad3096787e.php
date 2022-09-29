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

/* @SyliusShop/Product/Index/_search.html.twig */
class __TwigTemplate_aa2b003246e3295def3bfc6ca430734c61ddeb101af74530e59fbbef6759f419 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Index/_search.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Index/_search.html.twig"));

        // line 1
        echo "<div class=\"ui segment\">
    <form method=\"get\" action=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_product_index", ["slug" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 2, $this->source); })()), "request", [], "any", false, false, false, 2), "attributes", [], "any", false, false, false, 2), "get", [0 => "slug"], "method", false, false, false, 2)]), "html", null, true);
        echo "\" class=\"ui loadable form\">
        <div class=\"ui stackable grid\" id=\"searchbar\">
            <div class=\"column\" id=\"searchbarTextField\">
                ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 5, $this->source); })()), "definition", [], "any", false, false, false, 5), "enabledFilters", [], "any", false, false, false, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
            // line 6
            echo "                    ";
            echo $this->env->getFunction('sylius_grid_render_filter')->getCallable()((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 6, $this->source); })()), $context["filter"]);
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "            </div>
            <div class=\"right aligned column\" id=\"searchbarButtons\">
                <div class=\"ui buttons\">
                    <button type=\"submit\" class=\"ui primary icon labeled button\" ";
        // line 11
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("search");
        echo "><i class=\"search icon\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.search"), "html", null, true);
        echo "</button>
                    <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_product_index", ["slug" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "request", [], "any", false, false, false, 12), "attributes", [], "any", false, false, false, 12), "get", [0 => "slug"], "method", false, false, false, 12)]), "html", null, true);
        echo "\" class=\"ui negative icon labeled button\" ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("clear");
        echo ">
                        <i class=\"cancel icon\"></i> ";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.clear"), "html", null, true);
        echo "
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Index/_search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 13,  76 => 12,  70 => 11,  65 => 8,  56 => 6,  52 => 5,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui segment\">
    <form method=\"get\" action=\"{{ path('sylius_shop_product_index', {'slug': app.request.attributes.get('slug')}) }}\" class=\"ui loadable form\">
        <div class=\"ui stackable grid\" id=\"searchbar\">
            <div class=\"column\" id=\"searchbarTextField\">
                {% for filter in products.definition.enabledFilters %}
                    {{ sylius_grid_render_filter(products, filter) }}
                {% endfor %}
            </div>
            <div class=\"right aligned column\" id=\"searchbarButtons\">
                <div class=\"ui buttons\">
                    <button type=\"submit\" class=\"ui primary icon labeled button\" {{ sylius_test_html_attribute('search') }}><i class=\"search icon\"></i> {{ 'sylius.ui.search'|trans }}</button>
                    <a href=\"{{ path('sylius_shop_product_index', {'slug': app.request.attributes.get('slug')}) }}\" class=\"ui negative icon labeled button\" {{ sylius_test_html_attribute('clear') }}>
                        <i class=\"cancel icon\"></i> {{ 'sylius.ui.clear'|trans }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
", "@SyliusShop/Product/Index/_search.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Index/_search.html.twig");
    }
}
