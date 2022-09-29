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

/* @SyliusAdmin/Product/Show/_attributes.html.twig */
class __TwigTemplate_1663207ba750ac31d52e004999fc3239e0c8f989accf23749fb1dc1fa0eae405 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_attributes.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_attributes.html.twig"));

        // line 1
        $macros["flags"] = $this->macros["flags"] = $this->loadTemplate("@SyliusUi/Macro/flags.html.twig", "@SyliusAdmin/Product/Show/_attributes.html.twig", 1)->unwrap();
        // line 2
        echo "
<div id=\"attributes\">
    <h4 class=\"ui top attached large header\">";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.attributes"), "html", null, true);
        echo "</h4>
    <div class=\"ui attached segment\">
        <div class=\"ui top attached tabular menu\">
            ";
        // line 7
        $context["setLocales"] = [];
        // line 8
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 8, $this->source); })()), "attributes", [], "any", false, false, false, 8));
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
        foreach ($context['_seq'] as $context["_key"] => $context["attributeValue"]) {
            // line 9
            echo "                ";
            if (!twig_in_filter(twig_get_attribute($this->env, $this->source, $context["attributeValue"], "localeCode", [], "any", false, false, false, 9), (isset($context["setLocales"]) || array_key_exists("setLocales", $context) ? $context["setLocales"] : (function () { throw new RuntimeError('Variable "setLocales" does not exist.', 9, $this->source); })()))) {
                // line 10
                echo "                    ";
                $context["localeCode"] = twig_get_attribute($this->env, $this->source, $context["attributeValue"], "localeCode", [], "any", false, false, false, 10);
                // line 11
                echo "                    ";
                if ( !(null === twig_get_attribute($this->env, $this->source, $context["attributeValue"], "localeCode", [], "any", false, false, false, 11))) {
                    // line 12
                    echo "                        <a class=\"item";
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 12)) {
                        echo " active ";
                    }
                    echo "\" ";
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 12)) {
                        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("active");
                    }
                    echo " data-tab=\"";
                    echo twig_escape_filter($this->env, $this->env->getFilter('sylius_locale_name')->getCallable()((isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 12, $this->source); })())), "html", null, true);
                    echo "\" ";
                    echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("tab", $this->env->getFilter('sylius_locale_name')->getCallable()((isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 12, $this->source); })())));
                    echo ">";
                    echo twig_call_macro($macros["flags"], "macro_fromLocaleCode", [(isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 12, $this->source); })())], 12, $context, $this->getSourceContext());
                    echo " ";
                    echo twig_escape_filter($this->env, $this->env->getFilter('sylius_locale_name')->getCallable()((isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 12, $this->source); })())), "html", null, true);
                    echo "</a>
                    ";
                } else {
                    // line 14
                    echo "                        <a class=\"item";
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 14)) {
                        echo " active ";
                    }
                    echo "\" ";
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 14)) {
                        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("active");
                    }
                    echo " data-tab=\"";
                    echo "non-translatable";
                    echo "\" ";
                    echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("tab", "non-translatable");
                    echo "><i class=\"globe icon\"></i></a>
                    ";
                }
                // line 16
                echo "                    ";
                $context["setLocales"] = twig_array_merge((isset($context["setLocales"]) || array_key_exists("setLocales", $context) ? $context["setLocales"] : (function () { throw new RuntimeError('Variable "setLocales" does not exist.', 16, $this->source); })()), [0 => (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 16, $this->source); })())]);
                // line 17
                echo "                ";
            }
            // line 18
            echo "            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributeValue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "        </div>
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["setLocales"]) || array_key_exists("setLocales", $context) ? $context["setLocales"] : (function () { throw new RuntimeError('Variable "setLocales" does not exist.', 20, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["locale"]) {
            // line 21
            echo "            ";
            $context["data_tab"] = (( !(null === $context["locale"])) ? ($this->env->getFilter('sylius_locale_name')->getCallable()($context["locale"])) : ("non-translatable"));
            // line 22
            echo "            <div class=\"ui bottom attached tab segment";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 22)) {
                echo " active";
            }
            echo "\" data-tab=\"";
            echo twig_escape_filter($this->env, (isset($context["data_tab"]) || array_key_exists("data_tab", $context) ? $context["data_tab"] : (function () { throw new RuntimeError('Variable "data_tab" does not exist.', 22, $this->source); })()), "html", null, true);
            echo "\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("tab", (isset($context["data_tab"]) || array_key_exists("data_tab", $context) ? $context["data_tab"] : (function () { throw new RuntimeError('Variable "data_tab" does not exist.', 22, $this->source); })()));
            echo ">
                <table class=\"ui very basic celled table\">
                    <tbody>
                    ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_array_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 25, $this->source); })()), "attributes", [], "any", false, false, false, 25), function ($__attributeValue__) use ($context, $macros) { $context["attributeValue"] = $__attributeValue__; return (twig_get_attribute($this->env, $this->source, $context["attributeValue"], "localeCode", [], "any", false, false, false, 25) == $context["locale"]); }));
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
            foreach ($context['_seq'] as $context["_key"] => $context["attributeValue"]) {
                // line 26
                echo "                        <tr>
                            <td class=\"five wide\">
                                <strong class=\"gray text\">";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["attributeValue"], "name", [], "any", false, false, false, 28), "html", null, true);
                echo "</strong>
                            </td>
                            <td>
                                ";
                // line 31
                $this->loadTemplate([0 => (("@SyliusAdmin/Product/Show/Types/" . twig_get_attribute($this->env, $this->source,                 // line 32
$context["attributeValue"], "type", [], "any", false, false, false, 32)) . ".html.twig"), 1 => (("@SyliusAttribute/Types/" . twig_get_attribute($this->env, $this->source,                 // line 33
$context["attributeValue"], "type", [], "any", false, false, false, 33)) . ".html.twig"), 2 => "@SyliusAdmin/Product/Show/Types/default.html.twig"], "@SyliusAdmin/Product/Show/_attributes.html.twig", 31)->display(twig_array_merge($context, ["attribute" =>                 // line 36
$context["attributeValue"], "locale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 37
(isset($context["configuration"]) || array_key_exists("configuration", $context) ? $context["configuration"] : (function () { throw new RuntimeError('Variable "configuration" does not exist.', 37, $this->source); })()), "request", [], "any", false, false, false, 37), "locale", [], "any", false, false, false, 37), "fallbackLocale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 38
(isset($context["configuration"]) || array_key_exists("configuration", $context) ? $context["configuration"] : (function () { throw new RuntimeError('Variable "configuration" does not exist.', 38, $this->source); })()), "request", [], "any", false, false, false, 38), "defaultLocale", [], "any", false, false, false, 38)]));
                // line 40
                echo "                            </td>
                        </tr>
                    ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributeValue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "                    </tbody>
                </table>
            </div>
        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['locale'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_attributes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 47,  226 => 43,  210 => 40,  208 => 38,  207 => 37,  206 => 36,  205 => 33,  204 => 32,  203 => 31,  197 => 28,  193 => 26,  176 => 25,  163 => 22,  160 => 21,  143 => 20,  140 => 19,  126 => 18,  123 => 17,  120 => 16,  104 => 14,  84 => 12,  81 => 11,  78 => 10,  75 => 9,  57 => 8,  55 => 7,  49 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/flags.html.twig' as flags %}

<div id=\"attributes\">
    <h4 class=\"ui top attached large header\">{{ 'sylius.ui.attributes'|trans }}</h4>
    <div class=\"ui attached segment\">
        <div class=\"ui top attached tabular menu\">
            {% set setLocales = [] %}
            {% for attributeValue in product.attributes %}
                {% if attributeValue.localeCode not in setLocales %}
                    {% set localeCode = attributeValue.localeCode %}
                    {% if attributeValue.localeCode is not null  %}
                        <a class=\"item{% if loop.first %} active {% endif %}\" {% if loop.first %}{{ sylius_test_html_attribute('active') }}{% endif %} data-tab=\"{{ localeCode|sylius_locale_name }}\" {{ sylius_test_html_attribute('tab', localeCode|sylius_locale_name) }}>{{ flags.fromLocaleCode(localeCode)}} {{ localeCode|sylius_locale_name }}</a>
                    {% else %}
                        <a class=\"item{% if loop.first %} active {% endif %}\" {% if loop.first %}{{ sylius_test_html_attribute('active') }}{% endif %} data-tab=\"{{ 'non-translatable' }}\" {{ sylius_test_html_attribute('tab', 'non-translatable') }}><i class=\"globe icon\"></i></a>
                    {% endif %}
                    {%  set setLocales = setLocales|merge([localeCode]) %}
                {% endif %}
            {% endfor %}
        </div>
        {% for locale in setLocales %}
            {% set data_tab = (locale is not null ? locale|sylius_locale_name : 'non-translatable') %}
            <div class=\"ui bottom attached tab segment{% if loop.first %} active{% endif %}\" data-tab=\"{{ data_tab }}\" {{ sylius_test_html_attribute('tab', data_tab) }}>
                <table class=\"ui very basic celled table\">
                    <tbody>
                    {% for attributeValue in product.attributes|filter(attributeValue => attributeValue.localeCode == locale) %}
                        <tr>
                            <td class=\"five wide\">
                                <strong class=\"gray text\">{{ attributeValue.name }}</strong>
                            </td>
                            <td>
                                {% include [
                                    '@SyliusAdmin/Product/Show/Types/'~attributeValue.type~'.html.twig',
                                    '@SyliusAttribute/Types/'~attributeValue.type~'.html.twig',
                                    '@SyliusAdmin/Product/Show/Types/default.html.twig'
                                ] with {
                                    'attribute': attributeValue,
                                    'locale': configuration.request.locale,
                                    'fallbackLocale': configuration.request.defaultLocale
                                } %}
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        {% endfor %}
    </div>
</div>
", "@SyliusAdmin/Product/Show/_attributes.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_attributes.html.twig");
    }
}
