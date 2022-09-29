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

/* @SyliusAdmin/Order/Update/_content.html.twig */
class __TwigTemplate_0a3ced532d4e78a988f06948b8b1fc7958b47590c2bc8bb2c77bd867cd21985c extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Update/_content.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Order/Update/_content.html.twig"));

        // line 1
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 1, $this->source); })()), [0 => "@SyliusAdmin/Form/theme.html.twig"], true);
        // line 2
        echo "
";
        // line 3
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 3, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_order_update", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3)]), "attr" => ["class" => "ui loadable form", "novalidate" => "novalidate"]]);
        echo "
<div class=\"ui segment\">
    <input type=\"hidden\" name=\"_method\" value=\"PUT\" />

    <div class=\"ui segment\">
        <h4 class=\"ui dividing header\">";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.shipping_address"), "html", null, true);
        echo "</h4>
        ";
        // line 9
        $this->loadTemplate("@SyliusAdmin/Common/Form/_address.html.twig", "@SyliusAdmin/Order/Update/_content.html.twig", 9)->display(twig_array_merge($context, ["form" => twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 9, $this->source); })()), "shippingAddress", [], "any", false, false, false, 9)]));
        // line 10
        echo "    </div>

    <div class=\"ui segment\">
        <h4 class=\"ui dividing header\">";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.billing_address"), "html", null, true);
        echo "</h4>
        ";
        // line 14
        $this->loadTemplate("@SyliusAdmin/Common/Form/_address.html.twig", "@SyliusAdmin/Order/Update/_content.html.twig", 14)->display(twig_array_merge($context, ["form" => twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 14, $this->source); })()), "billingAddress", [], "any", false, false, false, 14)]));
        // line 15
        echo "    </div>

    ";
        // line 17
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.order.update.form", ["resource" => (isset($context["resource"]) || array_key_exists("resource", $context) ? $context["resource"] : (function () { throw new RuntimeError('Variable "resource" does not exist.', 17, $this->source); })())]);
        echo "

    ";
        // line 19
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 19, $this->source); })()), "_token", [], "any", false, false, false, 19), 'row');
        echo "
    ";
        // line 20
        $this->loadTemplate("@SyliusUi/Form/Buttons/_update.html.twig", "@SyliusAdmin/Order/Update/_content.html.twig", 20)->display(twig_array_merge($context, ["paths" => ["cancel" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_admin_order_index")]]));
        // line 21
        echo "</div>
";
        // line 22
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 22, $this->source); })()), 'form_end', ["render_rest" => false]);
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Order/Update/_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 22,  88 => 21,  86 => 20,  82 => 19,  77 => 17,  73 => 15,  71 => 14,  67 => 13,  62 => 10,  60 => 9,  56 => 8,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% form_theme form '@SyliusAdmin/Form/theme.html.twig' %}

{{ form_start(form, {'action': path('sylius_admin_order_update', {'id': order.id}), 'attr': {'class': 'ui loadable form', 'novalidate': 'novalidate'}}) }}
<div class=\"ui segment\">
    <input type=\"hidden\" name=\"_method\" value=\"PUT\" />

    <div class=\"ui segment\">
        <h4 class=\"ui dividing header\">{{ 'sylius.ui.shipping_address'|trans }}</h4>
        {% include '@SyliusAdmin/Common/Form/_address.html.twig' with {'form': form.shippingAddress} %}
    </div>

    <div class=\"ui segment\">
        <h4 class=\"ui dividing header\">{{ 'sylius.ui.billing_address'|trans }}</h4>
        {% include '@SyliusAdmin/Common/Form/_address.html.twig' with {'form': form.billingAddress} %}
    </div>

    {{ sylius_template_event('sylius.admin.order.update.form', {'resource': resource}) }}

    {{ form_row(form._token) }}
    {% include '@SyliusUi/Form/Buttons/_update.html.twig' with {'paths': {'cancel': path('sylius_admin_order_index')}} %}
</div>
{{ form_end(form, {'render_rest': false}) }}
", "@SyliusAdmin/Order/Update/_content.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Order/Update/_content.html.twig");
    }
}
