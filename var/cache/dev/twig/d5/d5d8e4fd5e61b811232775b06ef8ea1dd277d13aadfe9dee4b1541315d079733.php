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

/* @SyliusAdmin/Dashboard/_header.html.twig */
class __TwigTemplate_48700b53fbf528938e3c5abf7e6674f3914baa4a5e457fc8e4267a6bbbbc0ed5 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Dashboard/_header.html.twig"));

        // line 1
        $macros["headers"] = $this->macros["headers"] = $this->loadTemplate("@SyliusUi/Macro/headers.html.twig", "@SyliusAdmin/Dashboard/_header.html.twig", 1)->unwrap();
        // line 2
        echo "
<div class=\"ui stackable grid\">
    <div class=\"twelve wide column\">
        ";
        // line 5
        echo twig_call_macro($macros["headers"], "macro_default", [$this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.dashboard"), "home", $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.overview_of_your_store")], 5, $context, $this->getSourceContext());
        echo "
        ";
        // line 6
        echo $this->extensions['Sylius\Bundle\UiBundle\Twig\TemplateEventExtension']->render("sylius.admin.dashboard.header.content", ["channel" => (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 6, $this->source); })())]);
        echo "
    </div>
    <div class=\"four wide middle aligned column\">
        ";
        // line 9
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_admin_partial_channel_index", ["template" => "@SyliusAdmin/Dashboard/_channelSwitch.html.twig", "channel" => twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 9, $this->source); })()), "code", [], "any", false, false, false, 9)]));
        echo "
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Dashboard/_header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 9,  54 => 6,  50 => 5,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import '@SyliusUi/Macro/headers.html.twig' as headers %}

<div class=\"ui stackable grid\">
    <div class=\"twelve wide column\">
        {{ headers.default('sylius.ui.dashboard'|trans, 'home', 'sylius.ui.overview_of_your_store'|trans) }}
        {{ sylius_template_event('sylius.admin.dashboard.header.content', {'channel': channel }) }}
    </div>
    <div class=\"four wide middle aligned column\">
        {{ render(url('sylius_admin_partial_channel_index', {'template': '@SyliusAdmin/Dashboard/_channelSwitch.html.twig', 'channel': channel.code})) }}
    </div>
</div>
", "@SyliusAdmin/Dashboard/_header.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Dashboard/_header.html.twig");
    }
}
