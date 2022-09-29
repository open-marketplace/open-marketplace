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

/* @SyliusCore/Collector/cart.html.twig */
class __TwigTemplate_4eb7c68c88112204a83c879b49555d5f403a1bb9e8ce883c66dc1be0ff10ec87 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'toolbar' => [$this, 'block_toolbar'],
            'menu' => [$this, 'block_menu'],
            'panel' => [$this, 'block_panel'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusCore/Collector/cart.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusCore/Collector/cart.html.twig"));

        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@SyliusCore/Collector/cart.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 4, $this->source); })()), "hasCart", [], "any", false, false, false, 4)) {
            // line 5
            echo "        ";
            $macros["money"] = $this->loadTemplate("@SyliusCore/Common/Macro/money.html.twig", "@SyliusCore/Collector/cart.html.twig", 5)->unwrap();
            // line 6
            echo "
        ";
            // line 7
            ob_start();
            // line 8
            echo "            ";
            echo twig_include($this->env, $context, "@SyliusCore/Collector/Icon/cart.svg");
            echo "
            <span class=\"sf-toolbar-value\">";
            // line 9
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "quantity", [], "any", true, true, false, 9)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "quantity", [], "any", false, false, false, 9), 0)) : (0)), "html", null, true);
            echo "</span>
        ";
            $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 11
            echo "
        ";
            // line 12
            ob_start();
            // line 13
            echo "            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>ID</b>
                    <span>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16), "html", null, true);
            echo "</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Subtotal</b>
                    <span>";
            // line 20
            echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 20, $this->source); })()), "subtotal", [], "any", false, false, false, 20), twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 20, $this->source); })()), "currency", [], "any", false, false, false, 20)], 20, $context, $this->getSourceContext());
            echo "</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Total</b>
                    <span>";
            // line 24
            echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 24, $this->source); })()), "total", [], "any", false, false, false, 24), twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 24, $this->source); })()), "currency", [], "any", false, false, false, 24)], 24, $context, $this->getSourceContext());
            echo "</span>
                </div>
            </div>
            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <span><a href=\"";
            // line 29
            echo twig_escape_filter($this->env, ((isset($context["profiler_url"]) || array_key_exists("profiler_url", $context) ? $context["profiler_url"] : (function () { throw new RuntimeError('Variable "profiler_url" does not exist.', 29, $this->source); })()) . "?panel=sylius_cart"), "html", null, true);
            echo "\" rel=\"help\">View details</a></span>
                </div>
            </div>
        ";
            $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 33
            echo "
        ";
            // line 34
            $this->loadTemplate("@WebProfiler/Profiler/toolbar_item.html.twig", "@SyliusCore/Collector/cart.html.twig", 34)->display(twig_array_merge($context, ["link" => (isset($context["profiler_url"]) || array_key_exists("profiler_url", $context) ? $context["profiler_url"] : (function () { throw new RuntimeError('Variable "profiler_url" does not exist.', 34, $this->source); })())]));
            // line 35
            echo "    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 38
    public function block_menu($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "menu"));

        // line 39
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 39, $this->source); })()), "hasCart", [], "any", false, false, false, 39)) {
            // line 40
            echo "        <span class=\"label ";
            if ((((twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "quantity", [], "any", true, true, false, 40)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "quantity", [], "any", false, false, false, 40), 0)) : (0)) == 0)) {
                echo "disabled";
            }
            echo "\">
            <span class=\"icon\">";
            // line 41
            echo twig_include($this->env, $context, "@SyliusCore/Collector/Icon/cart.svg");
            echo "</span>
            <strong>Cart</strong>
            <span class=\"count\">
                <span>";
            // line 44
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "quantity", [], "any", true, true, false, 44)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["collector"] ?? null), "quantity", [], "any", false, false, false, 44), 0)) : (0)), "html", null, true);
            echo "</span>
            </span>
        </span>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 50
    public function block_panel($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "panel"));

        // line 51
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 51, $this->source); })()), "hasCart", [], "any", false, false, false, 51)) {
            // line 52
            echo "        ";
            $macros["money"] = $this->loadTemplate("@SyliusCore/Common/Macro/money.html.twig", "@SyliusCore/Collector/cart.html.twig", 52)->unwrap();
            // line 53
            echo "
        <h2>Cart</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Currency</th>
                <th>Locale</th>
                <th>Subtotal</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 64, $this->source); })()), "id", [], "any", false, false, false, 64), "html", null, true);
            echo "</td>
                <td>";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 65, $this->source); })()), "currency", [], "any", false, false, false, 65), "html", null, true);
            echo "</td>
                <td>";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 66, $this->source); })()), "locale", [], "any", false, false, false, 66), "html", null, true);
            echo "</td>
                <td>";
            // line 67
            echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 67, $this->source); })()), "subtotal", [], "any", false, false, false, 67), twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 67, $this->source); })()), "currency", [], "any", false, false, false, 67)], 67, $context, $this->getSourceContext());
            echo "</td>
                <td>";
            // line 68
            echo twig_call_macro($macros["money"], "macro_format", [twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 68, $this->source); })()), "total", [], "any", false, false, false, 68), twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 68, $this->source); })()), "currency", [], "any", false, false, false, 68)], 68, $context, $this->getSourceContext());
            echo "</td>
            </tr>
        </table>

        <h2>States</h2>
        <table>
            <tr>
                <th>Main</th>
                <th>Checkout</th>
                <th>Shipping</th>
                <th>Payment</th>
            </tr>
            <tr>
                <td>";
            // line 81
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 81, $this->source); })()), "states", [], "any", false, false, false, 81), "main", [], "any", false, false, false, 81), "html", null, true);
            echo "</td>
                <td>";
            // line 82
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 82, $this->source); })()), "states", [], "any", false, false, false, 82), "checkout", [], "any", false, false, false, 82), "html", null, true);
            echo "</td>
                <td>";
            // line 83
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 83, $this->source); })()), "states", [], "any", false, false, false, 83), "shipping", [], "any", false, false, false, 83), "html", null, true);
            echo "</td>
                <td>";
            // line 84
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 84, $this->source); })()), "states", [], "any", false, false, false, 84), "payment", [], "any", false, false, false, 84), "html", null, true);
            echo "</td>
            </tr>
        </table>

        ";
            // line 88
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 88, $this->source); })()), "items", [], "any", false, false, false, 88)) > 0)) {
                // line 89
                echo "            <h2>Items</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Product (Code, ID)</th>
                    <th>Variant (Code, ID)</th>
                    <th>Quantity</th>
                </tr>
                ";
                // line 97
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["collector"]) || array_key_exists("collector", $context) ? $context["collector"] : (function () { throw new RuntimeError('Variable "collector" does not exist.', 97, $this->source); })()), "items", [], "any", false, false, false, 97));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 98
                    echo "                <tr>
                    <td>";
                    // line 99
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 99), "html", null, true);
                    echo "</td>
                    <td>";
                    // line 100
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "productName", [], "any", false, false, false, 100), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "productCode", [], "any", false, false, false, 100), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "productId", [], "any", false, false, false, 100), "html", null, true);
                    echo ")</td>
                    <td>";
                    // line 101
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "variantName", [], "any", false, false, false, 101), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "variantCode", [], "any", false, false, false, 101), "html", null, true);
                    echo ", ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "variantId", [], "any", false, false, false, 101), "html", null, true);
                    echo ")</td>
                    <td>";
                    // line 102
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 102), "html", null, true);
                    echo "</td>
                </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 105
                echo "            </table>
        ";
            }
            // line 107
            echo "    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusCore/Collector/cart.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  319 => 107,  315 => 105,  306 => 102,  298 => 101,  290 => 100,  286 => 99,  283 => 98,  279 => 97,  269 => 89,  267 => 88,  260 => 84,  256 => 83,  252 => 82,  248 => 81,  232 => 68,  228 => 67,  224 => 66,  220 => 65,  216 => 64,  203 => 53,  200 => 52,  197 => 51,  187 => 50,  172 => 44,  166 => 41,  159 => 40,  156 => 39,  146 => 38,  135 => 35,  133 => 34,  130 => 33,  123 => 29,  115 => 24,  108 => 20,  101 => 16,  96 => 13,  94 => 12,  91 => 11,  86 => 9,  81 => 8,  79 => 7,  76 => 6,  73 => 5,  70 => 4,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}
    {% if collector.hasCart %}
        {% import \"@SyliusCore/Common/Macro/money.html.twig\" as money %}

        {% set icon %}
            {{ include('@SyliusCore/Collector/Icon/cart.svg') }}
            <span class=\"sf-toolbar-value\">{{ collector.quantity|default(0) }}</span>
        {% endset %}

        {% set text %}
            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>ID</b>
                    <span>{{ collector.id }}</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Subtotal</b>
                    <span>{{ money.format(collector.subtotal, collector.currency) }}</span>
                </div>
                <div class=\"sf-toolbar-info-piece\">
                    <b>Total</b>
                    <span>{{ money.format(collector.total, collector.currency) }}</span>
                </div>
            </div>
            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <span><a href=\"{{ profiler_url ~ '?panel=sylius_cart' }}\" rel=\"help\">View details</a></span>
                </div>
            </div>
        {% endset %}

        {% include '@WebProfiler/Profiler/toolbar_item.html.twig' with {'link': profiler_url} %}
    {% endif %}
{% endblock %}

{% block menu %}
    {% if collector.hasCart %}
        <span class=\"label {% if collector.quantity|default(0) == 0 %}disabled{% endif %}\">
            <span class=\"icon\">{{ include('@SyliusCore/Collector/Icon/cart.svg') }}</span>
            <strong>Cart</strong>
            <span class=\"count\">
                <span>{{ collector.quantity|default(0) }}</span>
            </span>
        </span>
    {% endif %}
{% endblock %}

{% block panel %}
    {% if collector.hasCart %}
        {% import \"@SyliusCore/Common/Macro/money.html.twig\" as money %}

        <h2>Cart</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Currency</th>
                <th>Locale</th>
                <th>Subtotal</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>{{ collector.id }}</td>
                <td>{{ collector.currency }}</td>
                <td>{{ collector.locale }}</td>
                <td>{{ money.format(collector.subtotal, collector.currency) }}</td>
                <td>{{ money.format(collector.total, collector.currency) }}</td>
            </tr>
        </table>

        <h2>States</h2>
        <table>
            <tr>
                <th>Main</th>
                <th>Checkout</th>
                <th>Shipping</th>
                <th>Payment</th>
            </tr>
            <tr>
                <td>{{ collector.states.main }}</td>
                <td>{{ collector.states.checkout }}</td>
                <td>{{ collector.states.shipping }}</td>
                <td>{{ collector.states.payment }}</td>
            </tr>
        </table>

        {% if collector.items|length > 0 %}
            <h2>Items</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Product (Code, ID)</th>
                    <th>Variant (Code, ID)</th>
                    <th>Quantity</th>
                </tr>
                {% for item in collector.items %}
                <tr>
                    <td>{{ item.id }}</td>
                    <td>{{ item.productName }} ({{ item.productCode }}, {{ item.productId }})</td>
                    <td>{{ item.variantName }} ({{ item.variantCode }}, {{ item.variantId }})</td>
                    <td>{{ item.quantity }}</td>
                </tr>
                {% endfor %}
            </table>
        {% endif %}
    {% endif %}
{% endblock %}
", "@SyliusCore/Collector/cart.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/CoreBundle/Resources/views/Collector/cart.html.twig");
    }
}
