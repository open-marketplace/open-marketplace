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

/* @SyliusShop/ProductReview/create.html.twig */
class __TwigTemplate_2684b5e35dfb5a1d0e3018fbb507a18c2cfd6610b2f0419cd90ebd9919fae3e7 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@SyliusShop/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/ProductReview/create.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/ProductReview/create.html.twig"));

        // line 3
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), [0 => "@SyliusShop/Form/theme.html.twig"], true);
        // line 7
        $context["product"] = twig_get_attribute($this->env, $this->source, (isset($context["product_review"]) || array_key_exists("product_review", $context) ? $context["product_review"] : (function () { throw new RuntimeError('Variable "product_review" does not exist.', 7, $this->source); })()), "reviewSubject", [], "any", false, false, false, 7);
        // line 1
        $this->parent = $this->loadTemplate("@SyliusShop/layout.html.twig", "@SyliusShop/ProductReview/create.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.write_your_own_review"), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 10
        echo "    <div class=\"ui hidden divider\"></div>
    <div class=\"ui stackable grid\" id=\"reviews\">
        <div class=\"four wide column\">
            ";
        // line 13
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.product_review.create.product_box", $context);
        echo "
        </div>
        <div class=\"twelve wide column\">
            <div class=\"ui segment\">
                <div class=\"ui dividing header\">
                    ";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.write_your_own_review"), "html", null, true);
        echo "
                    <div class=\"sub header\">
                        ";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.you_are_reviewing"), "html", null, true);
        echo " <strong>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 20, $this->source); })()), "name", [], "any", false, false, false, 20), "html", null, true);
        echo "</strong>.
                    </div>
                </div>

                ";
        // line 24
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.product_review.create.before_form", ["product_review" => (isset($context["product_review"]) || array_key_exists("product_review", $context) ? $context["product_review"] : (function () { throw new RuntimeError('Variable "product_review" does not exist.', 24, $this->source); })())]);
        echo "

                ";
        // line 26
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 26, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_product_review_create", ["slug" => twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 26, $this->source); })()), "slug", [], "any", false, false, false, 26), "_locale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 26, $this->source); })()), "translation", [], "any", false, false, false, 26), "locale", [], "any", false, false, false, 26)]), "attr" => ["class" => "ui loadable reply form", "novalidate" => "novalidate"]]);
        echo "
                    ";
        // line 27
        $this->loadTemplate("@SyliusShop/ProductReview/_form.html.twig", "@SyliusShop/ProductReview/create.html.twig", 27)->display($context);
        // line 28
        echo "
                    ";
        // line 29
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.shop.product_review.create.form", ["product_review" => (isset($context["product_review"]) || array_key_exists("product_review", $context) ? $context["product_review"] : (function () { throw new RuntimeError('Variable "product_review" does not exist.', 29, $this->source); })()), "form" => (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 29, $this->source); })())]);
        echo "

                    ";
        // line 31
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 31, $this->source); })()), "_token", [], "any", false, false, false, 31), 'row');
        echo "
                    <button type=\"submit\" class=\"ui blue labeled large icon submit button\" ";
        // line 32
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("add");
        echo ">
                        <i class=\"icon check\"></i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.add"), "html", null, true);
        echo "
                    </button>
                ";
        // line 35
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), 'form_end', ["render_rest" => false]);
        echo "
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/ProductReview/create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 35,  149 => 33,  145 => 32,  141 => 31,  136 => 29,  133 => 28,  131 => 27,  127 => 26,  122 => 24,  113 => 20,  108 => 18,  100 => 13,  95 => 10,  85 => 9,  64 => 5,  53 => 1,  51 => 7,  49 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@SyliusShop/layout.html.twig' %}

{% form_theme form '@SyliusShop/Form/theme.html.twig' %}

{% block title %}{{ 'sylius.ui.write_your_own_review'|trans }} | {{ parent() }}{% endblock %}

{% set product = product_review.reviewSubject %}

{% block content %}
    <div class=\"ui hidden divider\"></div>
    <div class=\"ui stackable grid\" id=\"reviews\">
        <div class=\"four wide column\">
            {{ sylius_template_event('sylius.shop.product_review.create.product_box', _context) }}
        </div>
        <div class=\"twelve wide column\">
            <div class=\"ui segment\">
                <div class=\"ui dividing header\">
                    {{ 'sylius.ui.write_your_own_review'|trans }}
                    <div class=\"sub header\">
                        {{ 'sylius.ui.you_are_reviewing'|trans }} <strong>{{ product.name }}</strong>.
                    </div>
                </div>

                {{ sylius_template_event('sylius.shop.product_review.create.before_form', {'product_review': product_review}) }}

                {{ form_start(form, {'action': path('sylius_shop_product_review_create', {'slug': product.slug, '_locale': product.translation.locale}), 'attr': {'class': 'ui loadable reply form', 'novalidate': 'novalidate'}}) }}
                    {% include '@SyliusShop/ProductReview/_form.html.twig' %}

                    {{ sylius_template_event('sylius.shop.product_review.create.form', {'product_review': product_review, 'form': form}) }}

                    {{ form_row(form._token) }}
                    <button type=\"submit\" class=\"ui blue labeled large icon submit button\" {{ sylius_test_html_attribute('add') }}>
                        <i class=\"icon check\"></i> {{ 'sylius.ui.add'|trans }}
                    </button>
                {{ form_end(form, {'render_rest': false}) }}
            </div>
        </div>
    </div>
{% endblock %}
", "@SyliusShop/ProductReview/create.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/ProductReview/create.html.twig");
    }
}
