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

/* @SyliusAdmin/Product/Show/_media.html.twig */
class __TwigTemplate_6e42e5dea8ebc69127c0862eba1440e3a080a917c0b8d05ee985982dc689df13 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_media.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Show/_media.html.twig"));

        // line 1
        echo "<div id=\"media\" class=\"ui styled fluid accordion\">
    <div class=\"title\">
        <i class=\"dropdown icon\"></i>
        ";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.media"), "html", null, true);
        echo "
    </div>
    <div class=\"content\">
        ";
        // line 7
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 7, $this->source); })()), "images", [], "any", false, false, false, 7)) >= 1)) {
            // line 8
            echo "            <div class=\"ui small images\">
                ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 9, $this->source); })()), "images", [], "any", false, false, false, 9));
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
                // line 10
                echo "                    ";
                $context["path"] = (( !(null === twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 10))) ? ($this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 10), "sylius_admin_product_small_thumbnail")) : ($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/admin/img/200x200.png")));
                // line 11
                echo "                    <div class=\"ui image\">
                        ";
                // line 12
                if ((twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 12, $this->source); })()), "isConfigurable", [], "method", false, false, false, 12) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 12, $this->source); })()), "variants", [], "any", false, false, false, 12)) > 0))) {
                    // line 13
                    echo "                            ";
                    $this->loadTemplate("@SyliusAdmin/Product/Show/_imageVariants.html.twig", "@SyliusAdmin/Product/Show/_media.html.twig", 13)->display($context);
                    // line 14
                    echo "                        ";
                }
                // line 15
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 15), "sylius_admin_product_original"), "html", null, true);
                echo "\" data-lightbox=\"sylius-product-image\">
                            <img src=\"";
                // line 16
                echo twig_escape_filter($this->env, (isset($context["path"]) || array_key_exists("path", $context) ? $context["path"] : (function () { throw new RuntimeError('Variable "path" does not exist.', 16, $this->source); })()), "html", null, true);
                echo "\" data-large-thumbnail=\"";
                echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, $context["image"], "path", [], "any", false, false, false, 16), "sylius_admin_product_large_thumbnail"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 16, $this->source); })()), "name", [], "any", false, false, false, 16), "html", null, true);
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
            // line 20
            echo "            </div>
        ";
        }
        // line 22
        echo "    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Show/_media.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 22,  117 => 20,  95 => 16,  90 => 15,  87 => 14,  84 => 13,  82 => 12,  79 => 11,  76 => 10,  59 => 9,  56 => 8,  54 => 7,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"media\" class=\"ui styled fluid accordion\">
    <div class=\"title\">
        <i class=\"dropdown icon\"></i>
        {{ 'sylius.ui.media'|trans }}
    </div>
    <div class=\"content\">
        {% if product.images|length >= 1 %}
            <div class=\"ui small images\">
                {% for image in product.images %}
                    {% set path = image.path is not null ? image.path|imagine_filter('sylius_admin_product_small_thumbnail') : asset('assets/admin/img/200x200.png') %}
                    <div class=\"ui image\">
                        {% if product.isConfigurable() and product.variants|length > 0 %}
                            {% include '@SyliusAdmin/Product/Show/_imageVariants.html.twig' %}
                        {% endif %}
                        <a href=\"{{ image.path|imagine_filter('sylius_admin_product_original') }}\" data-lightbox=\"sylius-product-image\">
                            <img src=\"{{ path }}\" data-large-thumbnail=\"{{ image.path|imagine_filter('sylius_admin_product_large_thumbnail') }}\" alt=\"{{ product.name }}\" />
                        </a>
                    </div>
                {% endfor %}
            </div>
        {% endif %}
    </div>
</div>
", "@SyliusAdmin/Product/Show/_media.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Show/_media.html.twig");
    }
}
