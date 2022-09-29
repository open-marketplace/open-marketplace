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

/* @SyliusShop/Product/Index/_main.html.twig */
class __TwigTemplate_f2e0b6f8036cffa83dcbc6a8c38a73a441d3b40cc24f16d4c16df4ddd1daa41a extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Index/_main.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Index/_main.html.twig"));

        // line 1
        $macros["messages"] = $this->macros["messages"] = $this->loadTemplate("@SyliusUi/Macro/messages.html.twig", "@SyliusShop/Product/Index/_main.html.twig", 1)->unwrap();
        // line 2
        $macros["pagination"] = $this->macros["pagination"] = $this->loadTemplate("@SyliusUi/Macro/pagination.html.twig", "@SyliusShop/Product/Index/_main.html.twig", 2)->unwrap();
        // line 3
        echo "
";
        // line 4
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.product.index.search", $context);
        echo "

<div class=\"ui clearing hidden divider\"></div>

";
        // line 8
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.product.index.before_list", ["products" => twig_get_attribute($this->env, $this->source, (isset($context["resources"]) || array_key_exists("resources", $context) ? $context["resources"] : (function () { throw new RuntimeError('Variable "resources" does not exist.', 8, $this->source); })()), "data", [], "any", false, false, false, 8)]);
        echo "

";
        // line 10
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["resources"]) || array_key_exists("resources", $context) ? $context["resources"] : (function () { throw new RuntimeError('Variable "resources" does not exist.', 10, $this->source); })()), "data", [], "any", false, false, false, 10)) > 0)) {
            // line 11
            echo "    <div class=\"ui three cards\" id=\"products\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("products");
            echo ">
        ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["resources"]) || array_key_exists("resources", $context) ? $context["resources"] : (function () { throw new RuntimeError('Variable "resources" does not exist.', 12, $this->source); })()), "data", [], "any", false, false, false, 12));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 13
                echo "            ";
                $this->loadTemplate("@SyliusShop/Product/_box.html.twig", "@SyliusShop/Product/Index/_main.html.twig", 13)->display($context);
                // line 14
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "    </div>
    <div class=\"ui hidden divider\"></div>

    ";
            // line 18
            echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.product.index.before_pagination", ["products" => twig_get_attribute($this->env, $this->source, (isset($context["resources"]) || array_key_exists("resources", $context) ? $context["resources"] : (function () { throw new RuntimeError('Variable "resources" does not exist.', 18, $this->source); })()), "data", [], "any", false, false, false, 18)]);
            echo "

    ";
            // line 20
            echo twig_call_macro($macros["pagination"], "macro_simple", [twig_get_attribute($this->env, $this->source, (isset($context["resources"]) || array_key_exists("resources", $context) ? $context["resources"] : (function () { throw new RuntimeError('Variable "resources" does not exist.', 20, $this->source); })()), "data", [], "any", false, false, false, 20)], 20, $context, $this->getSourceContext());
            echo "
";
        } else {
            // line 22
            echo "    ";
            echo twig_call_macro($macros["messages"], "macro_info", ["sylius.ui.no_results_to_display"], 22, $context, $this->getSourceContext());
            echo "
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Index/_main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 22,  113 => 20,  108 => 18,  103 => 15,  89 => 14,  86 => 13,  69 => 12,  64 => 11,  62 => 10,  57 => 8,  50 => 4,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/messages.html.twig' as messages %}
{% import '@SyliusUi/Macro/pagination.html.twig' as pagination %}

{{ sylius_template_event('sylius.shop.product.index.search', _context) }}

<div class=\"ui clearing hidden divider\"></div>

{{ sylius_template_event('sylius.shop.product.index.before_list', {'products': resources.data}) }}

{% if resources.data|length > 0 %}
    <div class=\"ui three cards\" id=\"products\" {{ sylius_test_html_attribute('products') }}>
        {% for product in resources.data %}
            {% include '@SyliusShop/Product/_box.html.twig' %}
        {% endfor %}
    </div>
    <div class=\"ui hidden divider\"></div>

    {{ sylius_template_event('sylius.shop.product.index.before_pagination', {'products': resources.data}) }}

    {{ pagination.simple(resources.data) }}
{% else %}
    {{ messages.info('sylius.ui.no_results_to_display') }}
{% endif %}
", "@SyliusShop/Product/Index/_main.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Index/_main.html.twig");
    }
}
