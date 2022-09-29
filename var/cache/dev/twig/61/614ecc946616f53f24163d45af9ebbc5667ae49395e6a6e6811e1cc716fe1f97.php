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

/* @SyliusShop/Checkout/Address/_addressBookSelect.html.twig */
class __TwigTemplate_0917fb5b259a569eec53bd346de1eaa673760eb1e7c1554cf4aca014a48607b5 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/Address/_addressBookSelect.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Checkout/Address/_addressBookSelect.html.twig"));

        // line 1
        if ((( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1, $this->source); })()), "user", [], "any", false, false, false, 1)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1, $this->source); })()), "user", [], "any", false, false, false, 1), "customer", [], "any", false, false, false, 1))) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1, $this->source); })()), "user", [], "any", false, false, false, 1), "customer", [], "any", false, false, false, 1), "addresses", [], "any", false, false, false, 1)) > 0))) {
            // line 2
            echo "    <div class=\"ui fluid floating dropdown labeled search icon button address-book-select\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("address-book");
            echo ">
        <i class=\"book icon\"></i>
        <span class=\"text\">";
            // line 4
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.select_address_from_book"), "html", null, true);
            echo "</span>
        <div class=\"menu\">
            ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 6, $this->source); })()), "user", [], "any", false, false, false, 6), "customer", [], "any", false, false, false, 6), "addresses", [], "any", false, false, false, 6));
            foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
                // line 7
                echo "                <div class=\"item\" ";
                echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("address-book-item");
                echo "
                     data-id=\"";
                // line 8
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "id", [], "any", false, false, false, 8), "html", null, true);
                echo "\"
                     data-first-name=\"";
                // line 9
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "firstName", [], "any", false, false, false, 9), "html", null, true);
                echo "\"
                     data-last-name=\"";
                // line 10
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "lastName", [], "any", false, false, false, 10), "html", null, true);
                echo "\"
                     data-company=\"";
                // line 11
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "company", [], "any", false, false, false, 11), "html", null, true);
                echo "\"
                     data-street=\"";
                // line 12
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "street", [], "any", false, false, false, 12), "html", null, true);
                echo "\"
                     data-country-code=\"";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "countryCode", [], "any", false, false, false, 13), "html", null, true);
                echo "\"
                     data-province-code=\"";
                // line 14
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "provinceCode", [], "any", false, false, false, 14), "html", null, true);
                echo "\"
                     data-province-name=\"";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "provinceName", [], "any", false, false, false, 15), "html", null, true);
                echo "\"
                     data-city=\"";
                // line 16
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "city", [], "any", false, false, false, 16), "html", null, true);
                echo "\"
                     data-postcode=\"";
                // line 17
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "postcode", [], "any", false, false, false, 17), "html", null, true);
                echo "\"
                     data-phone-number=\"";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "phoneNumber", [], "any", false, false, false, 18), "html", null, true);
                echo "\"
                >
                    <strong>";
                // line 20
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "firstName", [], "any", false, false, false, 20), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "lastName", [], "any", false, false, false, 20), "html", null, true);
                echo "</strong>, ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "street", [], "any", false, false, false, 20), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "city", [], "any", false, false, false, 20), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["address"], "postcode", [], "any", false, false, false, 20), "html", null, true);
                echo ", ";
                echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\AddressingBundle\Twig\CountryNameExtension']->translateCountryIsoCode(twig_get_attribute($this->env, $this->source, $context["address"], "countryCode", [], "any", false, false, false, 20)), "html", null, true);
                echo "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "        </div>
    </div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Checkout/Address/_addressBookSelect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 23,  110 => 20,  105 => 18,  101 => 17,  97 => 16,  93 => 15,  89 => 14,  85 => 13,  81 => 12,  77 => 11,  73 => 10,  69 => 9,  65 => 8,  60 => 7,  56 => 6,  51 => 4,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if app.user is not empty and app.user.customer is not empty and app.user.customer.addresses|length > 0 %}
    <div class=\"ui fluid floating dropdown labeled search icon button address-book-select\" {{ sylius_test_html_attribute('address-book') }}>
        <i class=\"book icon\"></i>
        <span class=\"text\">{{ 'sylius.ui.select_address_from_book'|trans }}</span>
        <div class=\"menu\">
            {% for address in app.user.customer.addresses %}
                <div class=\"item\" {{ sylius_test_html_attribute('address-book-item') }}
                     data-id=\"{{ address.id }}\"
                     data-first-name=\"{{ address.firstName }}\"
                     data-last-name=\"{{ address.lastName }}\"
                     data-company=\"{{ address.company }}\"
                     data-street=\"{{ address.street }}\"
                     data-country-code=\"{{ address.countryCode }}\"
                     data-province-code=\"{{ address.provinceCode }}\"
                     data-province-name=\"{{ address.provinceName }}\"
                     data-city=\"{{ address.city }}\"
                     data-postcode=\"{{ address.postcode }}\"
                     data-phone-number=\"{{ address.phoneNumber }}\"
                >
                    <strong>{{ address.firstName }} {{ address.lastName }}</strong>, {{ address.street }}, {{ address.city }} {{ address.postcode }}, {{ address.countryCode|sylius_country_name }}
                </div>
            {% endfor %}
        </div>
    </div>
{% endif %}
", "@SyliusShop/Checkout/Address/_addressBookSelect.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Checkout/Address/_addressBookSelect.html.twig");
    }
}
