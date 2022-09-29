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

/* @SyliusAdmin/PromotionCoupon/Generate/_formWidget.html.twig */
class __TwigTemplate_ff0bd34e8496198f2d2df7fba9fea3a6c81425ffa9411798da5ebc460c705153 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/PromotionCoupon/Generate/_formWidget.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/PromotionCoupon/Generate/_formWidget.html.twig"));

        // line 1
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), [0 => "@SyliusAdmin/Form/theme.html.twig"], true);
        // line 2
        echo "
";
        // line 3
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_promotion_coupon_generate", ["promotionId" => twig_get_attribute($this->env, $this->source, (isset($context["promotion"]) || array_key_exists("promotion", $context) ? $context["promotion"] : (function () { throw new RuntimeError('Variable "promotion" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3)]), "attr" => ["class" => "ui loadable form", "novalidate" => "novalidate"]]);
        echo "
<div class=\"ui segment\">
    ";
        // line 5
        $this->loadTemplate("@SyliusAdmin/PromotionCoupon/Generate/_form.html.twig", "@SyliusAdmin/PromotionCoupon/Generate/_formWidget.html.twig", 5)->display($context);
        // line 6
        echo "    <div class=\"ui basic segment\">
        <div class=\"ui buttons\">
            <button class=\"ui labeled icon primary button\" type=\"submit\"><i class=\"random icon\"></i>";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.generate"), "html", null, true);
        echo "</button>
            ";
        // line 9
        $this->loadTemplate("@SyliusUi/Form/Buttons/_cancel.html.twig", "@SyliusAdmin/PromotionCoupon/Generate/_formWidget.html.twig", 9)->display(twig_array_merge($context, ["path" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, (isset($context["configuration"]) || array_key_exists("configuration", $context) ? $context["configuration"] : (function () { throw new RuntimeError('Variable "configuration" does not exist.', 9, $this->source); })()), "getRouteName", [0 => "index"], "method", false, false, false, 9), ["promotionId" => twig_get_attribute($this->env, $this->source, (isset($context["promotion"]) || array_key_exists("promotion", $context) ? $context["promotion"] : (function () { throw new RuntimeError('Variable "promotion" does not exist.', 9, $this->source); })()), "id", [], "any", false, false, false, 9)])]));
        // line 10
        echo "        </div>
    </div>

    ";
        // line 13
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.promotion_coupon.generate.form", ["resource" => (isset($context["promotion"]) || array_key_exists("promotion", $context) ? $context["promotion"] : (function () { throw new RuntimeError('Variable "promotion" does not exist.', 13, $this->source); })())]);
        echo "
</div>
";
        // line 15
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "_token", [], "any", false, false, false, 15), 'row');
        echo "
";
        // line 16
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 16, $this->source); })()), 'form_end', ["render_rest" => false]);
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/PromotionCoupon/Generate/_formWidget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 16,  75 => 15,  70 => 13,  65 => 10,  63 => 9,  59 => 8,  55 => 6,  53 => 5,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% form_theme form '@SyliusAdmin/Form/theme.html.twig' %}

{{ form_start(form, {'action': path('sylius_admin_promotion_coupon_generate', {'promotionId': promotion.id}), 'attr': {'class': 'ui loadable form', 'novalidate': 'novalidate'}}) }}
<div class=\"ui segment\">
    {% include '@SyliusAdmin/PromotionCoupon/Generate/_form.html.twig' %}
    <div class=\"ui basic segment\">
        <div class=\"ui buttons\">
            <button class=\"ui labeled icon primary button\" type=\"submit\"><i class=\"random icon\"></i>{{- 'sylius.ui.generate'|trans -}}</button>
            {% include '@SyliusUi/Form/Buttons/_cancel.html.twig' with {'path': path(configuration.getRouteName('index'), {'promotionId': promotion.id})} %}
        </div>
    </div>

    {{ sylius_template_event('sylius.admin.promotion_coupon.generate.form', {'resource': promotion}) }}
</div>
{{ form_row(form._token) }}
{{ form_end(form, {'render_rest': false}) }}
", "@SyliusAdmin/PromotionCoupon/Generate/_formWidget.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/PromotionCoupon/Generate/_formWidget.html.twig");
    }
}
