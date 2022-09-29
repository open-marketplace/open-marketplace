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

/* @SyliusShop/Menu/_currencySwitch.html.twig */
class __TwigTemplate_edadd4fdbe95953204c0e4c354670eb1babb550dfbe84e5d8f657bdf86033a64 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Menu/_currencySwitch.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Menu/_currencySwitch.html.twig"));

        // line 1
        if ((twig_length_filter($this->env, (isset($context["currencies"]) || array_key_exists("currencies", $context) ? $context["currencies"] : (function () { throw new RuntimeError('Variable "currencies" does not exist.', 1, $this->source); })())) > 1)) {
            // line 2
            echo "    <div class=\"ui pointing dropdown link item\" id=\"sylius-currency-selector\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("currency-selector");
            echo ">
        <span class=\"text sylius-active-currency\" ";
            // line 3
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("active-currency");
            echo ">";
            echo twig_escape_filter($this->env, (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 3, $this->source); })()), "html", null, true);
            echo "</span>
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\">
            ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["currencies"]) || array_key_exists("currencies", $context) ? $context["currencies"] : (function () { throw new RuntimeError('Variable "currencies" does not exist.', 6, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
                // line 7
                echo "                ";
                if ( !($context["code"] === (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 7, $this->source); })()))) {
                    // line 8
                    echo "                <a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_switch_currency", ["code" => $context["code"]]), "html", null, true);
                    echo "\" class=\"item sylius-available-currency\" ";
                    echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("available-currency");
                    echo ">
                    ";
                    // line 9
                    echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                    echo "
                </a>
                ";
                }
                // line 12
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "        </div>
    </div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Menu/_currencySwitch.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 13,  78 => 12,  72 => 9,  65 => 8,  62 => 7,  58 => 6,  50 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if currencies|length > 1 %}
    <div class=\"ui pointing dropdown link item\" id=\"sylius-currency-selector\" {{ sylius_test_html_attribute('currency-selector') }}>
        <span class=\"text sylius-active-currency\" {{ sylius_test_html_attribute('active-currency') }}>{{ active }}</span>
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\">
            {% for code in currencies %}
                {% if code is not same as(active) %}
                <a href=\"{{ path('sylius_shop_switch_currency', {'code': code}) }}\" class=\"item sylius-available-currency\" {{ sylius_test_html_attribute('available-currency') }}>
                    {{ code }}
                </a>
                {% endif %}
            {% endfor %}
        </div>
    </div>
{% endif %}
", "@SyliusShop/Menu/_currencySwitch.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Menu/_currencySwitch.html.twig");
    }
}
