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

/* @SyliusCore/Email/Blocks/OrderConfirmation/_content.html.twig */
class __TwigTemplate_1fd40e7a544c97ee089463f9e17fdf23c049a0ed7c23ecf8f4628c5e6c148151 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusCore/Email/Blocks/OrderConfirmation/_content.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusCore/Email/Blocks/OrderConfirmation/_content.html.twig"));

        // line 1
        echo "<div style=\"text-align: center; margin-bottom: 30px;\">
    ";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.email.order_confirmation.your_order_number", [], null, (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 2, $this->source); })())), "html", null, true);
        echo "
    <div style=\"margin: 10px 0;\">
      <span style=\"border: 1px solid #eee; padding: 10px; color: #1abb9c; font-size: 28px;\">
        ";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 5, $this->source); })()), "number", [], "any", false, false, false, 5), "html", null, true);
        echo "
      </span>
    </div>
    ";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.email.order_confirmation.has_been_successfully_placed", [], null, (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 8, $this->source); })())), "html", null, true);
        echo "
</div>

";
        // line 11
        if ($this->extensions['Sylius\Bundle\CoreBundle\Twig\BundleLoadedCheckerExtension']->isBundleLoaded("SyliusShopBundle")) {
            // line 12
            echo "    ";
            $context["url"] = (( !(null === twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 12, $this->source); })()), "hostname", [], "any", false, false, false, 12))) ? ((("http://" . twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 12, $this->source); })()), "hostname", [], "any", false, false, false, 12)) . $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_order_show", ["tokenValue" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 12, $this->source); })()), "tokenValue", [], "any", false, false, false, 12), "_locale" => (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 12, $this->source); })())]))) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_shop_order_show", ["tokenValue" => twig_get_attribute($this->env, $this->source, (isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 12, $this->source); })()), "tokenValue", [], "any", false, false, false, 12), "_locale" => (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 12, $this->source); })())])));
            // line 13
            echo "
    <div style=\"text-align: center; margin-bottom: 30px;\">
        <a href=\"";
            // line 15
            echo (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 15, $this->source); })());
            echo "\" style=\"display: inline-block; text-align: center; background: #1abb9c; padding: 18px 28px; color: #fff; text-decoration: none; border-radius: 3px;\">
            ";
            // line 16
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.email.order_confirmation.view_order_or_change_payment_method", [], null, (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 16, $this->source); })())), "html", null, true);
            echo "
        </a>
    </div>
";
        }
        // line 20
        echo "
<div style=\"text-align: center;\">
    ";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.email.order_confirmation.thank_you", [], null, (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 22, $this->source); })())), "html", null, true);
        echo "
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusCore/Email/Blocks/OrderConfirmation/_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 22,  84 => 20,  77 => 16,  73 => 15,  69 => 13,  66 => 12,  64 => 11,  58 => 8,  52 => 5,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div style=\"text-align: center; margin-bottom: 30px;\">
    {{ 'sylius.email.order_confirmation.your_order_number'|trans({}, null, localeCode) }}
    <div style=\"margin: 10px 0;\">
      <span style=\"border: 1px solid #eee; padding: 10px; color: #1abb9c; font-size: 28px;\">
        {{ order.number }}
      </span>
    </div>
    {{ 'sylius.email.order_confirmation.has_been_successfully_placed'|trans({}, null, localeCode) }}
</div>

{% if sylius_bundle_loaded_checker('SyliusShopBundle') %}
    {% set url = channel.hostname is not null ? 'http://' ~ channel.hostname ~ path('sylius_shop_order_show', {'tokenValue': order.tokenValue, '_locale': localeCode}) : url('sylius_shop_order_show', {'tokenValue': order.tokenValue, '_locale': localeCode}) %}

    <div style=\"text-align: center; margin-bottom: 30px;\">
        <a href=\"{{ url|raw }}\" style=\"display: inline-block; text-align: center; background: #1abb9c; padding: 18px 28px; color: #fff; text-decoration: none; border-radius: 3px;\">
            {{ 'sylius.email.order_confirmation.view_order_or_change_payment_method'|trans({}, null, localeCode) }}
        </a>
    </div>
{% endif %}

<div style=\"text-align: center;\">
    {{ 'sylius.email.order_confirmation.thank_you'|trans({}, null, localeCode) }}
</div>
", "@SyliusCore/Email/Blocks/OrderConfirmation/_content.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/CoreBundle/Resources/views/Email/Blocks/OrderConfirmation/_content.html.twig");
    }
}
