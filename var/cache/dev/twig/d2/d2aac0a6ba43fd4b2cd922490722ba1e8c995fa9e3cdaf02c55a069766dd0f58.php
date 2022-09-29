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

/* @SyliusShop/ProductReview/_form.html.twig */
class __TwigTemplate_34103970a2e48bdf7518572e886a2c8e28af1b3aa7b97cbbb9d3520cdcc4a5a7 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/ProductReview/_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/ProductReview/_form.html.twig"));

        // line 1
        echo "<div class=\"field\">
    <div class=\"ui huge star rating\" data-rating=\"0\" data-max-rating=\"5\"></div>
    <br/>
    ";
        // line 4
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 4, $this->source); })()), "rating", [], "any", false, false, false, 4), 'errors');
        echo "
    ";
        // line 5
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "rating", [], "any", false, false, false, 5), 'widget', $this->env->getFilter('sylius_merge_recursive')->getCallable()($this->env->getFunction('sylius_test_form_attribute')->getCallable()("rating"), ["attr" => ["style" => "display: none"]]));
        echo "
</div>
<div class=\"field\">
    ";
        // line 8
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 8, $this->source); })()), "title", [], "any", false, false, false, 8), 'widget', $this->env->getFilter('sylius_merge_recursive')->getCallable()($this->env->getFunction('sylius_test_form_attribute')->getCallable()("title"), ["attr" => ["placeholder" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.title")]]));
        echo "
    ";
        // line 9
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "title", [], "any", false, false, false, 9), 'errors');
        echo "
</div>
<div class=\"field\">
    ";
        // line 12
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 12, $this->source); })()), "comment", [], "any", false, false, false, 12), 'widget', $this->env->getFilter('sylius_merge_recursive')->getCallable()($this->env->getFunction('sylius_test_form_attribute')->getCallable()("comment"), ["attr" => ["placeholder" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.write_your_own_review")]]));
        echo "
    ";
        // line 13
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 13, $this->source); })()), "comment", [], "any", false, false, false, 13), 'errors');
        echo "
</div>
";
        // line 15
        if ( !$this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 16
            echo "    <div class=\"field\">
        ";
            // line 17
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), "author", [], "any", false, false, false, 17), "email", [], "any", false, false, false, 17), 'widget', $this->env->getFilter('sylius_merge_recursive')->getCallable()($this->env->getFunction('sylius_test_form_attribute')->getCallable()("author-email"), ["attr" => ["placeholder" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.email")]]));
            echo "
        ";
            // line 18
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 18, $this->source); })()), "author", [], "any", false, false, false, 18), "email", [], "any", false, false, false, 18), 'errors');
            echo "
    </div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/ProductReview/_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 18,  82 => 17,  79 => 16,  77 => 15,  72 => 13,  68 => 12,  62 => 9,  58 => 8,  52 => 5,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"field\">
    <div class=\"ui huge star rating\" data-rating=\"0\" data-max-rating=\"5\"></div>
    <br/>
    {{ form_errors(form.rating) }}
    {{ form_widget(form.rating, sylius_test_form_attribute('rating')|sylius_merge_recursive( {'attr': {'style': 'display: none'}})) }}
</div>
<div class=\"field\">
    {{ form_widget(form.title, sylius_test_form_attribute('title')|sylius_merge_recursive( {'attr': {'placeholder': 'sylius.ui.title'|trans}})) }}
    {{ form_errors(form.title) }}
</div>
<div class=\"field\">
    {{ form_widget(form.comment, sylius_test_form_attribute('comment')|sylius_merge_recursive( {'attr': {'placeholder': 'sylius.ui.write_your_own_review'|trans}})) }}
    {{ form_errors(form.comment) }}
</div>
{% if not is_granted(\"IS_AUTHENTICATED_FULLY\") %}
    <div class=\"field\">
        {{ form_widget(form.author.email, sylius_test_form_attribute('author-email')|sylius_merge_recursive( {'attr': {'placeholder': 'sylius.ui.email'|trans}})) }}
        {{ form_errors(form.author.email) }}
    </div>
{% endif %}
", "@SyliusShop/ProductReview/_form.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/ProductReview/_form.html.twig");
    }
}
