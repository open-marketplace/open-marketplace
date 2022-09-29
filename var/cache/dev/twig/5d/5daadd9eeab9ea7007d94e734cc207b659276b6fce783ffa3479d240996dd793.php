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

/* @SyliusAdmin/Product/_showInShopButton.html.twig */
class __TwigTemplate_3235ee46fd6bb76f2da570807d5601df7d44231021caed81c36323da6ef42999 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/_showInShopButton.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/_showInShopButton.html.twig"));

        // line 1
        $context["enabledChannels"] = twig_array_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 1, $this->source); })()), "channels", [], "any", false, false, false, 1), function ($__channel__) use ($context, $macros) { $context["channel"] = $__channel__; return (twig_get_attribute($this->env, $this->source, (isset($context["channel"]) || array_key_exists("channel", $context) ? $context["channel"] : (function () { throw new RuntimeError('Variable "channel" does not exist.', 1, $this->source); })()), "enabled", [], "any", false, false, false, 1) == true); });
        // line 2
        echo "
";
        // line 3
        if ($this->extensions['Sylius\Bundle\CoreBundle\Twig\BundleLoadedCheckerExtension']->isBundleLoaded("SyliusShopBundle")) {
            // line 4
            echo "    ";
            if (( !twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 4, $this->source); })()), "enabled", [], "any", false, false, false, 4) || (twig_length_filter($this->env, (isset($context["enabledChannels"]) || array_key_exists("enabledChannels", $context) ? $context["enabledChannels"] : (function () { throw new RuntimeError('Variable "enabledChannels" does not exist.', 4, $this->source); })())) < 1))) {
                // line 5
                echo "        <a class=\"ui labeled icon button disabled\" href=\"#\">
            <i class=\"angle right icon\"></i>
            ";
                // line 7
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.show_product_in_shop_page"), "html", null, true);
                echo "
        </a>
    ";
            } elseif ((twig_length_filter($this->env,             // line 9
(isset($context["enabledChannels"]) || array_key_exists("enabledChannels", $context) ? $context["enabledChannels"] : (function () { throw new RuntimeError('Variable "enabledChannels" does not exist.', 9, $this->source); })())) > 1)) {
                // line 10
                echo "        <div class=\"ui floating dropdown labeled icon button\">
            <i class=\"share alternate icon\"></i>
            <span class=\"text\">
                ";
                // line 13
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.show_product_in_shop_page"), "html", null, true);
                echo "
            </span>
            <div class=\"menu\">
                <div class=\"scrolling menu\">
                    ";
                // line 17
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["enabledChannels"]) || array_key_exists("enabledChannels", $context) ? $context["enabledChannels"] : (function () { throw new RuntimeError('Variable "enabledChannels" does not exist.', 17, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
                    // line 18
                    echo "                        ";
                    $context["url"] = (( !(null === twig_get_attribute($this->env, $this->source, $context["channel"], "hostname", [], "any", false, false, false, 18))) ? ((("http://" . twig_get_attribute($this->env, $this->source, $context["channel"], "hostname", [], "any", false, false, false, 18)) . $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_product_show", ["slug" => twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 18, $this->source); })()), "slug", [], "any", false, false, false, 18), "_locale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["channel"], "defaultLocale", [], "any", false, false, false, 18), "code", [], "any", false, false, false, 18)]))) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_shop_product_show", ["slug" => twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 18, $this->source); })()), "slug", [], "any", false, false, false, 18), "_locale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["channel"], "defaultLocale", [], "any", false, false, false, 18), "code", [], "any", false, false, false, 18)])));
                    // line 19
                    echo "                        <a href=\"";
                    echo (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 19, $this->source); })());
                    echo "\" class=\"item\" target=\"_blank\">
                            <i class=\"angle right icon\"></i>
                            ";
                    // line 21
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.show_in"), "html", null, true);
                    echo "
                            ";
                    // line 22
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["channel"], "name", [], "any", false, false, false, 22), "html", null, true);
                    echo " (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["channel"], "code", [], "any", false, false, false, 22), "html", null, true);
                    echo ")
                        </a>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "                </div>
            </div>
        </div>
    ";
            } else {
                // line 29
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["enabledChannels"]) || array_key_exists("enabledChannels", $context) ? $context["enabledChannels"] : (function () { throw new RuntimeError('Variable "enabledChannels" does not exist.', 29, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
                    // line 30
                    echo "            ";
                    $context["url"] = (( !(null === twig_get_attribute($this->env, $this->source, $context["channel"], "hostname", [], "any", false, false, false, 30))) ? ((("http://" . twig_get_attribute($this->env, $this->source, $context["channel"], "hostname", [], "any", false, false, false, 30)) . $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("sylius_shop_product_show", ["slug" => twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 30, $this->source); })()), "slug", [], "any", false, false, false, 30), "_locale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["channel"], "defaultLocale", [], "any", false, false, false, 30), "code", [], "any", false, false, false, 30)]))) : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl("sylius_shop_product_show", ["slug" => twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 30, $this->source); })()), "slug", [], "any", false, false, false, 30), "_locale" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["channel"], "defaultLocale", [], "any", false, false, false, 30), "code", [], "any", false, false, false, 30)])));
                    // line 31
                    echo "            <a class=\"ui labeled icon button\" href=\"";
                    echo (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 31, $this->source); })());
                    echo "\" target=\"_blank\">
                <i class=\"angle right icon\"></i>
                ";
                    // line 33
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.show_product_in_shop_page"), "html", null, true);
                    echo "
            </a>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "    ";
            }
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/_showInShopButton.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 36,  124 => 33,  118 => 31,  115 => 30,  110 => 29,  104 => 25,  93 => 22,  89 => 21,  83 => 19,  80 => 18,  76 => 17,  69 => 13,  64 => 10,  62 => 9,  57 => 7,  53 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set enabledChannels = product.channels|filter(channel => channel.enabled == true) %}

{% if sylius_bundle_loaded_checker('SyliusShopBundle') %}
    {% if not product.enabled or enabledChannels|length < 1 %}
        <a class=\"ui labeled icon button disabled\" href=\"#\">
            <i class=\"angle right icon\"></i>
            {{ 'sylius.ui.show_product_in_shop_page'|trans }}
        </a>
    {% elseif enabledChannels|length > 1 %}
        <div class=\"ui floating dropdown labeled icon button\">
            <i class=\"share alternate icon\"></i>
            <span class=\"text\">
                {{ 'sylius.ui.show_product_in_shop_page'|trans }}
            </span>
            <div class=\"menu\">
                <div class=\"scrolling menu\">
                    {% for channel in enabledChannels %}
                        {% set url = channel.hostname is not null ? 'http://' ~ channel.hostname ~ path('sylius_shop_product_show', {'slug': product.slug, '_locale': channel.defaultLocale.code}) : url('sylius_shop_product_show', {'slug': product.slug, '_locale': channel.defaultLocale.code}) %}
                        <a href=\"{{ url|raw }}\" class=\"item\" target=\"_blank\">
                            <i class=\"angle right icon\"></i>
                            {{ 'sylius.ui.show_in'|trans }}
                            {{ channel.name }} ({{ channel.code }})
                        </a>
                    {% endfor %}
                </div>
            </div>
        </div>
    {% else %}
        {% for channel in enabledChannels %}
            {% set url = channel.hostname is not null ? 'http://' ~ channel.hostname ~ path('sylius_shop_product_show', {'slug': product.slug, '_locale': channel.defaultLocale.code}) : url('sylius_shop_product_show', {'slug': product.slug, '_locale': channel.defaultLocale.code}) %}
            <a class=\"ui labeled icon button\" href=\"{{ url|raw }}\" target=\"_blank\">
                <i class=\"angle right icon\"></i>
                {{ 'sylius.ui.show_product_in_shop_page'|trans }}
            </a>
        {% endfor %}
    {% endif %}
{% endif %}
", "@SyliusAdmin/Product/_showInShopButton.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/_showInShopButton.html.twig");
    }
}
