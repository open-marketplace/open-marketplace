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

/* @SyliusAdmin/Customer/Show/_header.html.twig */
class __TwigTemplate_960d7ae61693c483993f41d40eb07c5717954153a9c46105557f0a836eecff0c extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Customer/Show/_header.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Customer/Show/_header.html.twig"));

        // line 1
        echo "<div class=\"ten wide column\">
    <h1 class=\"ui header\">
        <i class=\"circular user icon\"></i>
        <div class=\"content\">
            ";
        // line 5
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "fullName", [], "any", true, true, false, 5)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["customer"] ?? null), "fullName", [], "any", false, false, false, 5), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.guest_customer"))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.guest_customer"))), "html", null, true);
        echo "
            <div class=\"sub header\">
                <div class=\"ui horizontal divided list\">
                    <div class=\"item\">
                        ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 9, $this->source); })()), "email", [], "any", false, false, false, 9), "html", null, true);
        echo "
                    </div>
                    ";
        // line 11
        if ((null === twig_get_attribute($this->env, $this->source, (isset($context["customer"]) || array_key_exists("customer", $context) ? $context["customer"] : (function () { throw new RuntimeError('Variable "customer" does not exist.', 11, $this->source); })()), "user", [], "any", false, false, false, 11))) {
            // line 12
            echo "                        <div class=\"item\">
                            <span class=\"ui label\">
                                <i class=\"icon spy\"></i> ";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.guest"), "html", null, true);
            echo "
                            </span>
                        </div>
                    ";
        }
        // line 18
        echo "                </div>
            </div>
        </div>
    </h1>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Customer/Show/_header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 18,  67 => 14,  63 => 12,  61 => 11,  56 => 9,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ten wide column\">
    <h1 class=\"ui header\">
        <i class=\"circular user icon\"></i>
        <div class=\"content\">
            {{ customer.fullName|default('sylius.ui.guest_customer'|trans) }}
            <div class=\"sub header\">
                <div class=\"ui horizontal divided list\">
                    <div class=\"item\">
                        {{ customer.email }}
                    </div>
                    {% if customer.user is null %}
                        <div class=\"item\">
                            <span class=\"ui label\">
                                <i class=\"icon spy\"></i> {{ 'sylius.ui.guest'|trans }}
                            </span>
                        </div>
                    {% endif %}
                </div>
            </div>
        </div>
    </h1>
</div>
", "@SyliusAdmin/Customer/Show/_header.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Customer/Show/_header.html.twig");
    }
}
