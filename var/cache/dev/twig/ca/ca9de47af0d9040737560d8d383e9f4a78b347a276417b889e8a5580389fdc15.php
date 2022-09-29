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

/* @SyliusAdmin/Product/Tab/_associations.html.twig */
class __TwigTemplate_9ba9f44ed645bb4ab013c75ef4c00eb2576dbf7b6830055f179d0e8a9e80aa01 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Tab/_associations.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Tab/_associations.html.twig"));

        // line 1
        echo "<div class=\"ui tab\" data-tab=\"associations\">
    <h3 class=\"ui top attached header\">";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.associations"), "html", null, true);
        echo "</h3>

    <div class=\"ui attached segment\">
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "associations", [], "any", false, false, false, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["associationForm"]) {
            // line 6
            echo "            <div class=\"field\">";
            // line 7
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["associationForm"], 'label');
            // line 8
            echo "<div class=\"product-select ui fluid multiple search selection dropdown\" data-url=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_ajax_product_index", ["limit" => 20]);
            echo "\">
                    ";
            // line 9
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["associationForm"], 'widget', ["attr" => ["class" => "autocomplete"]]);
            echo "
                    <i class=\"dropdown icon\"></i>
                    <div class=\"default text\">";
            // line 11
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.select_products"), "html", null, true);
            echo "</div>
                    <div class=\"menu\">
                        ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 13, $this->source); })()), "associations", [], "any", false, false, false, 13));
            foreach ($context['_seq'] as $context["_key"] => $context["association"]) {
                // line 14
                echo "                            ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["association"], "type", [], "any", false, false, false, 14), "code", [], "any", false, false, false, 14) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["associationForm"], "vars", [], "any", false, false, false, 14), "name", [], "any", false, false, false, 14))) {
                    // line 15
                    echo "                                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["association"], "associatedProducts", [], "any", false, false, false, 15));
                    foreach ($context['_seq'] as $context["_key"] => $context["associatedProduct"]) {
                        // line 16
                        echo "                                    <div class=\"item\" data-value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["associatedProduct"], "code", [], "any", false, false, false, 16), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["associatedProduct"], "name", [], "any", true, true, false, 16)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, $context["associatedProduct"], "name", [], "any", false, false, false, 16), twig_get_attribute($this->env, $this->source, $context["associatedProduct"], "code", [], "any", false, false, false, 16))) : (twig_get_attribute($this->env, $this->source, $context["associatedProduct"], "code", [], "any", false, false, false, 16))), "html", null, true);
                        echo "</div>
                                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['associatedProduct'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 18
                    echo "                            ";
                }
                // line 19
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['association'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "                    </div>
                </div>
                ";
            // line 22
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["associationForm"], 'errors');
            echo "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['associationForm'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "
        ";
        // line 26
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render([0 => (("sylius.admin.product." . (isset($context["action"]) || array_key_exists("action", $context) ? $context["action"] : (function () { throw new RuntimeError('Variable "action" does not exist.', 26, $this->source); })())) . ".tab_associations"), 1 => "sylius.admin.product.tab_associations"], ["form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 26, $this->source); })())]);
        echo "
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Tab/_associations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 26,  120 => 25,  111 => 22,  107 => 20,  101 => 19,  98 => 18,  87 => 16,  82 => 15,  79 => 14,  75 => 13,  70 => 11,  65 => 9,  60 => 8,  58 => 7,  56 => 6,  52 => 5,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui tab\" data-tab=\"associations\">
    <h3 class=\"ui top attached header\">{{ 'sylius.ui.associations'|trans }}</h3>

    <div class=\"ui attached segment\">
        {% for associationForm in form.associations %}
            <div class=\"field\">
                {{- form_label(associationForm) -}}
                <div class=\"product-select ui fluid multiple search selection dropdown\" data-url=\"{{ path('sylius_admin_ajax_product_index', {'limit': 20}) }}\">
                    {{ form_widget(associationForm, {'attr': {'class': 'autocomplete'}}) }}
                    <i class=\"dropdown icon\"></i>
                    <div class=\"default text\">{{'sylius.ui.select_products'|trans}}</div>
                    <div class=\"menu\">
                        {% for association in product.associations %}
                            {% if association.type.code == associationForm.vars.name %}
                                {% for associatedProduct in association.associatedProducts %}
                                    <div class=\"item\" data-value=\"{{ associatedProduct.code }}\">{{ associatedProduct.name|default(associatedProduct.code) }}</div>
                                {% endfor %}
                            {% endif %}
                        {% endfor %}
                    </div>
                </div>
                {{ form_errors(associationForm) }}
            </div>
        {% endfor %}

        {{ sylius_template_event(['sylius.admin.product.' ~ action ~ '.tab_associations', 'sylius.admin.product.tab_associations'], {'form': form}) }}
    </div>
</div>
", "@SyliusAdmin/Product/Tab/_associations.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Tab/_associations.html.twig");
    }
}
