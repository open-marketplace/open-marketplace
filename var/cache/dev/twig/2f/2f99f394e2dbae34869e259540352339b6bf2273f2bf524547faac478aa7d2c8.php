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

/* @SyliusShop/Product/Show/_images.html.twig */
class __TwigTemplate_5af801655aa5f38591066845a9ca62a3fda01402ae47704e4d0ae1db675ddc2d extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_images.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Show/_images.html.twig"));

        // line 1
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 1, $this->source); })()), "imagesByType", [0 => "main"], "method", false, false, false, 1))) {
            // line 2
            echo "    ";
            $context["source_path"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 2, $this->source); })()), "imagesByType", [0 => "main"], "method", false, false, false, 2), "first", [], "any", false, false, false, 2), "path", [], "any", false, false, false, 2);
            // line 3
            echo "    ";
            $context["original_path"] = $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter((isset($context["source_path"]) || array_key_exists("source_path", $context) ? $context["source_path"] : (function () { throw new RuntimeError('Variable "source_path" does not exist.', 3, $this->source); })()), "sylius_shop_product_original");
            // line 4
            echo "    ";
            $context["path"] = $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter((isset($context["source_path"]) || array_key_exists("source_path", $context) ? $context["source_path"] : (function () { throw new RuntimeError('Variable "source_path" does not exist.', 4, $this->source); })()), ((array_key_exists("filter", $context)) ? (_twig_default_filter((isset($context["filter"]) || array_key_exists("filter", $context) ? $context["filter"] : (function () { throw new RuntimeError('Variable "filter" does not exist.', 4, $this->source); })()), "sylius_shop_product_large_thumbnail")) : ("sylius_shop_product_large_thumbnail")));
        } elseif (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 5
(isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "images", [], "any", false, false, false, 5), "first", [], "any", false, false, false, 5)) {
            // line 6
            echo "    ";
            $context["source_path"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 6, $this->source); })()), "images", [], "any", false, false, false, 6), "first", [], "any", false, false, false, 6), "path", [], "any", false, false, false, 6);
            // line 7
            echo "    ";
            $context["original_path"] = $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter((isset($context["source_path"]) || array_key_exists("source_path", $context) ? $context["source_path"] : (function () { throw new RuntimeError('Variable "source_path" does not exist.', 7, $this->source); })()), "sylius_shop_product_original");
            // line 8
            echo "    ";
            $context["path"] = $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter((isset($context["source_path"]) || array_key_exists("source_path", $context) ? $context["source_path"] : (function () { throw new RuntimeError('Variable "source_path" does not exist.', 8, $this->source); })()), ((array_key_exists("filter", $context)) ? (_twig_default_filter((isset($context["filter"]) || array_key_exists("filter", $context) ? $context["filter"] : (function () { throw new RuntimeError('Variable "filter" does not exist.', 8, $this->source); })()), "sylius_shop_product_large_thumbnail")) : ("sylius_shop_product_large_thumbnail")));
        } else {
            // line 10
            echo "    ";
            $context["original_path"] = $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/shop/img/400x300.png");
            // line 11
            echo "    ";
            $context["path"] = (isset($context["original_path"]) || array_key_exists("original_path", $context) ? $context["original_path"] : (function () { throw new RuntimeError('Variable "original_path" does not exist.', 11, $this->source); })());
        }
        // line 13
        echo "
<div data-product-image=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 14, $this->source); })()), "html", null, true);
        echo "\" data-product-link=\"";
        echo twig_escape_filter($this->env, (isset($context["original_path"]) || array_key_exists("original_path", $context) ? $context["original_path"] : (function () { throw new RuntimeError('Variable "original_path" does not exist.', 14, $this->source); })()), "html", null, true);
        echo "\"></div>
<a href=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["original_path"]) || array_key_exists("original_path", $context) ? $context["original_path"] : (function () { throw new RuntimeError('Variable "original_path" does not exist.', 15, $this->source); })()), "html", null, true);
        echo "\" class=\"ui fluid image\" data-lightbox=\"sylius-product-image\">
    <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 16, $this->source); })()), "html", null, true);
        echo "\" id=\"main-image\" alt=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 16, $this->source); })()), "name", [], "any", false, false, false, 16), "html", null, true);
        echo "\" ";
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("main-image");
        echo " />
</a>
";
        // line 18
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 18, $this->source); })()), "images", [], "any", false, false, false, 18)) > 1)) {
            // line 19
            echo "<div class=\"ui divider\"></div>

";
            // line 21
            echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.product.show.before_thumbnails", ["product" => (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 21, $this->source); })())]);
            echo "

<div class=\"ui small images\">
    ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 24, $this->source); })()), "images", [], "any", false, false, false, 24));
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
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 25
                echo "    ";
                $context["path"] = (( !(null === twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 25))) ? ($this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 25), "sylius_shop_product_small_thumbnail")) : ($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/shop/img/200x200.png")));
                // line 26
                echo "    <div class=\"ui image\">
    ";
                // line 27
                if ((twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 27, $this->source); })()), "isConfigurable", [], "method", false, false, false, 27) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 27, $this->source); })()), "enabledVariants", [], "any", false, false, false, 27)) > 0))) {
                    // line 28
                    echo "        ";
                    $this->loadTemplate("@SyliusShop/Product/Show/_imageVariants.html.twig", "@SyliusShop/Product/Show/_images.html.twig", 28)->display($context);
                    // line 29
                    echo "    ";
                }
                // line 30
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 30), "sylius_shop_product_original"), "html", null, true);
                echo "\" data-lightbox=\"sylius-product-image\">
            <img src=\"";
                // line 31
                echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 31, $this->source); })()), "html", null, true);
                echo "\" data-large-thumbnail=\"";
                echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 31), "sylius_shop_product_large_thumbnail"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 31, $this->source); })()), "name", [], "any", false, false, false, 31), "html", null, true);
                echo "\" />
        </a>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "</div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Show/_images.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 35,  143 => 31,  138 => 30,  135 => 29,  132 => 28,  130 => 27,  127 => 26,  124 => 25,  107 => 24,  101 => 21,  97 => 19,  95 => 18,  86 => 16,  82 => 15,  76 => 14,  73 => 13,  69 => 11,  66 => 10,  62 => 8,  59 => 7,  56 => 6,  54 => 5,  51 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if product.imagesByType('main') is not empty %}
    {% set source_path = product.imagesByType('main').first.path %}
    {% set original_path = source_path|imagine_filter('sylius_shop_product_original') %}
    {% set path = source_path|imagine_filter(filter|default('sylius_shop_product_large_thumbnail')) %}
{% elseif product.images.first %}
    {% set source_path = product.images.first.path %}
    {% set original_path = source_path|imagine_filter('sylius_shop_product_original') %}
    {% set path = source_path|imagine_filter(filter|default('sylius_shop_product_large_thumbnail')) %}
{% else %}
    {% set original_path = asset('assets/shop/img/400x300.png') %}
    {% set path = original_path %}
{% endif %}

<div data-product-image=\"{{ path }}\" data-product-link=\"{{ original_path }}\"></div>
<a href=\"{{ original_path }}\" class=\"ui fluid image\" data-lightbox=\"sylius-product-image\">
    <img src=\"{{ path }}\" id=\"main-image\" alt=\"{{ product.name }}\" {{ sylius_test_html_attribute('main-image') }} />
</a>
{% if product.images|length > 1 %}
<div class=\"ui divider\"></div>

{{ sylius_template_event('sylius.shop.product.show.before_thumbnails', {'product': product}) }}

<div class=\"ui small images\">
    {% for image in product.images %}
    {% set path = image.path is not null ? image.path|imagine_filter('sylius_shop_product_small_thumbnail') : asset('assets/shop/img/200x200.png') %}
    <div class=\"ui image\">
    {% if product.isConfigurable() and product.enabledVariants|length > 0 %}
        {% include '@SyliusShop/Product/Show/_imageVariants.html.twig' %}
    {% endif %}
        <a href=\"{{ image.path|imagine_filter('sylius_shop_product_original') }}\" data-lightbox=\"sylius-product-image\">
            <img src=\"{{ path }}\" data-large-thumbnail=\"{{ image.path|imagine_filter('sylius_shop_product_large_thumbnail') }}\" alt=\"{{ product.name }}\" />
        </a>
    </div>
    {% endfor %}
</div>
{% endif %}
", "@SyliusShop/Product/Show/_images.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Show/_images.html.twig");
    }
}
