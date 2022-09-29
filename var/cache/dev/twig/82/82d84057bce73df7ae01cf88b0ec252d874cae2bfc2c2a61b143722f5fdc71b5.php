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

/* @SyliusCore/Email/layout.html.twig */
class __TwigTemplate_6aafd83c39a58b1cd3a42196614c05b2297f8b9c6b1fc0e63fa427c33b6fc98e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusCore/Email/layout.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusCore/Email/layout.html.twig"));

        // line 1
        $this->displayBlock('body', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 2
        echo "    ";
        // line 3
        echo "        ";
        $context["logo"] = (( !(null === twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 3, $this->source); })()), "hostname", [], "any", false, false, false, 3))) ? ((("http://" . twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 3, $this->source); })()), "hostname", [], "any", false, false, false, 3)) . $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/shop/img/logo.png"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/shop/img/logo.png"))));
        // line 4
        echo "
        <div style=\"font-family: sans-serif; background: #eee; padding-top: 30px; padding-bottom: 30px; font-size: 16px; color: #333; line-height: 1.5\">
            <div style=\"max-width: 600px; margin: 20px auto;\">
                <div style=\"margin-bottom: 30px; text-align: center;\">
                    ";
        // line 8
        if ($this->extensions['Sylius\Bundle\CoreBundle\Twig\BundleLoadedCheckerExtension']->isBundleLoaded("SyliusShopBundle")) {
            // line 9
            echo "                        ";
            $context["url"] = (( !(null === twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 9, $this->source); })()), "hostname", [], "any", false, false, false, 9))) ? ((("http://" . twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 9, $this->source); })()), "hostname", [], "any", false, false, false, 9)) . $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_homepage", ["_locale" => (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 9, $this->source); })())]))) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_shop_homepage", ["_locale" => (isset($context["localeCode"]) || array_key_exists("localeCode", $context) ? $context["localeCode"] : (function () { throw new RuntimeError('Variable "localeCode" does not exist.', 9, $this->source); })())])));
            // line 10
            echo "                        <a href=\"";
            echo (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 10, $this->source); })());
            echo "\">
                            <img src=\"";
            // line 11
            echo (isset($context["logo"]) || array_key_exists("logo", $context) ? $context["logo"] : (function () { throw new RuntimeError('Variable "logo" does not exist.', 11, $this->source); })());
            echo "\" alt=\"Sylius\" style=\"width: 170px\">
                        </a>
                    ";
        } else {
            // line 14
            echo "                        <img src=\"";
            echo (isset($context["logo"]) || array_key_exists("logo", $context) ? $context["logo"] : (function () { throw new RuntimeError('Variable "logo" does not exist.', 14, $this->source); })());
            echo "\" alt=\"Sylius\" style=\"width: 170px\">
                    ";
        }
        // line 16
        echo "                </div>

                <div style=\"background: #fff; padding: 40px 30px;\">
                    ";
        // line 19
        $this->displayBlock('content', $context, $blocks);
        // line 20
        echo "                </div>

                <div style=\"text-align: center; padding: 20px 0;\">
                    <a href=\"https://sylius.com\" target=\"_blank\" style=\"color: #1abb9c; text-decoration: none;\">sylius.com</a>
                </div>
            </div>
        </div>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 19
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusCore/Email/layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  121 => 19,  104 => 20,  102 => 19,  97 => 16,  91 => 14,  85 => 11,  80 => 10,  77 => 9,  75 => 8,  69 => 4,  66 => 3,  64 => 2,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block body %}
    {% autoescape false %}
        {% set logo = channel.hostname is not null ? 'http://' ~ channel.hostname ~ asset('assets/shop/img/logo.png') : absolute_url(asset('assets/shop/img/logo.png')) %}

        <div style=\"font-family: sans-serif; background: #eee; padding-top: 30px; padding-bottom: 30px; font-size: 16px; color: #333; line-height: 1.5\">
            <div style=\"max-width: 600px; margin: 20px auto;\">
                <div style=\"margin-bottom: 30px; text-align: center;\">
                    {% if sylius_bundle_loaded_checker('SyliusShopBundle') %}
                        {% set url = channel.hostname is not null ? 'http://' ~ channel.hostname ~ path('sylius_shop_homepage', {'_locale': localeCode}) : url('sylius_shop_homepage', {'_locale': localeCode}) %}
                        <a href=\"{{ url|raw }}\">
                            <img src=\"{{ logo }}\" alt=\"Sylius\" style=\"width: 170px\">
                        </a>
                    {% else %}
                        <img src=\"{{ logo }}\" alt=\"Sylius\" style=\"width: 170px\">
                    {% endif %}
                </div>

                <div style=\"background: #fff; padding: 40px 30px;\">
                    {% block content %}{% endblock %}
                </div>

                <div style=\"text-align: center; padding: 20px 0;\">
                    <a href=\"https://sylius.com\" target=\"_blank\" style=\"color: #1abb9c; text-decoration: none;\">sylius.com</a>
                </div>
            </div>
        </div>
    {% endautoescape %}
{% endblock %}
", "@SyliusCore/Email/layout.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/CoreBundle/Resources/views/Email/layout.html.twig");
    }
}
