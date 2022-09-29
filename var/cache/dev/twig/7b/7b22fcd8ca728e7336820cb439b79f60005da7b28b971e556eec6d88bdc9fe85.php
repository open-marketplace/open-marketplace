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

/* @SyliusShop/Cart/Summary/_items.html.twig */
class __TwigTemplate_93865bb0bc719c3d30993631f6d5b5189254a9e1e2e05e1066ff97f22e013ca2 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Summary/_items.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Cart/Summary/_items.html.twig"));

        // line 1
        echo "<div class=\"ui segment\">
    ";
        // line 2
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_cart_save"), "attr" => ["class" => "ui loadable form", "novalidate" => "novalidate", "id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 2, $this->source); })()), "vars", [], "any", false, false, false, 2), "id", [], "any", false, false, false, 2)]]);
        echo "
    ";
        // line 3
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), 'errors');
        echo "
    <input type=\"hidden\" name=\"_method\" value=\"PATCH\"/>
    ";
        // line 5
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "_token", [], "any", false, false, false, 5), 'row');
        echo "
    ";
        // line 6
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), 'form_end', ["render_rest" => false]);
        echo "

    ";
        // line 8
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.cart.summary.items", ["cart" => (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 8, $this->source); })()), "form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })())]);
        echo "

    <table id=\"sylius-cart-items\" ";
        // line 10
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("cart-items");
        echo " class=\"ui very basic celled table\">
        <thead>
        <tr>
            <th>";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.item"), "html", null, true);
        echo "</th>
            <th>";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.unit_price"), "html", null, true);
        echo "</th>
            <th>";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.qty"), "html", null, true);
        echo "</th>
            <th></th>
            <th class=\"right aligned\">";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.total"), "html", null, true);
        echo "</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 21, $this->source); })()), "items", [], "any", false, false, false, 21));
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
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 22
            echo "            ";
            $this->loadTemplate("@SyliusShop/Cart/Summary/_item.html.twig", "@SyliusShop/Cart/Summary/_items.html.twig", 22)->display(twig_array_merge($context, ["item" => $context["item"], "form" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 22, $this->source); })()), "items", [], "any", false, false, false, 22), $context["key"], [], "array", false, false, false, 22), "main_form" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 22, $this->source); })()), "vars", [], "any", false, false, false, 22), "id", [], "any", false, false, false, 22), "loop_index" => twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 22)]));
            // line 23
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
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "        </tbody>
    </table>
    ";
        // line 26
        if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "promotionCoupon", [], "any", true, true, false, 26)) {
            // line 27
            echo "        <div class=\"ui hidden divider\"></div>

        ";
            // line 29
            echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.cart.coupon", ["cart" => (isset($context["cart"]) || array_key_exists("cart", $context) ? $context["cart"] : (function () { throw new RuntimeError('Variable "cart" does not exist.', 29, $this->source); })()), "form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "main_form" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })()), "vars", [], "any", false, false, false, 29), "id", [], "any", false, false, false, 29)]);
            echo "

    ";
        }
        // line 32
        echo "    <div class=\"ui hidden divider\"></div>
    ";
        // line 33
        $this->loadTemplate("@SyliusShop/Cart/Summary/_update.html.twig", "@SyliusShop/Cart/Summary/_items.html.twig", 33)->display(twig_array_merge($context, ["main_form" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "vars", [], "any", false, false, false, 33), "id", [], "any", false, false, false, 33)]));
        // line 34
        echo "</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Cart/Summary/_items.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 34,  148 => 33,  145 => 32,  139 => 29,  135 => 27,  133 => 26,  129 => 24,  115 => 23,  112 => 22,  95 => 21,  88 => 17,  83 => 15,  79 => 14,  75 => 13,  69 => 10,  64 => 8,  59 => 6,  55 => 5,  50 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui segment\">
    {{ form_start(form, {'action': path('sylius_shop_cart_save'), 'attr': {'class': 'ui loadable form', 'novalidate': 'novalidate', 'id': form.vars.id}}) }}
    {{ form_errors(form) }}
    <input type=\"hidden\" name=\"_method\" value=\"PATCH\"/>
    {{ form_row(form._token) }}
    {{ form_end(form, {'render_rest': false}) }}

    {{ sylius_template_event('sylius.shop.cart.summary.items', {'cart': cart, 'form': form}) }}

    <table id=\"sylius-cart-items\" {{ sylius_test_html_attribute('cart-items') }} class=\"ui very basic celled table\">
        <thead>
        <tr>
            <th>{{ 'sylius.ui.item'|trans }}</th>
            <th>{{ 'sylius.ui.unit_price'|trans }}</th>
            <th>{{ 'sylius.ui.qty'|trans }}</th>
            <th></th>
            <th class=\"right aligned\">{{ 'sylius.ui.total'|trans }}</th>
        </tr>
        </thead>
        <tbody>
        {% for key, item in cart.items %}
            {% include '@SyliusShop/Cart/Summary/_item.html.twig' with {'item': item, 'form': form.items[key], 'main_form': form.vars.id, 'loop_index': loop.index} %}
        {% endfor %}
        </tbody>
    </table>
    {% if form.promotionCoupon is defined %}
        <div class=\"ui hidden divider\"></div>

        {{ sylius_template_event('sylius.shop.cart.coupon', {'cart': cart, 'form': form, 'main_form': form.vars.id}) }}

    {% endif %}
    <div class=\"ui hidden divider\"></div>
    {% include '@SyliusShop/Cart/Summary/_update.html.twig' with {'main_form': form.vars.id} %}
</div>
", "@SyliusShop/Cart/Summary/_items.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Cart/Summary/_items.html.twig");
    }
}
