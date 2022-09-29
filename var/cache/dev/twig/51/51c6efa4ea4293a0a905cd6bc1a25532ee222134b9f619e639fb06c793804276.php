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

/* @SyliusUi/Modal/_confirmation.html.twig */
class __TwigTemplate_726c0d358c0d6259b8e30800dc1fda97d61fc1f03eeb6a275ca6482854caf562 extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Modal/_confirmation.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Modal/_confirmation.html.twig"));

        // line 1
        echo "<div class=\"ui small basic modal\" id=\"confirmation-modal\">
    <div class=\"ui icon header\">
        <i class=\"warning sign icon\"></i>
        ";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.confirm_your_action"), "html", null, true);
        echo "
    </div>
    <div class=\"content\">
        <p>";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.are_your_sure_you_want_to_perform_this_action"), "html", null, true);
        echo "</p>
    </div>
    <div class=\"actions\">
        <div class=\"ui red basic cancel inverted button\">
            <i class=\"remove icon\"></i>
            ";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.no_label"), "html", null, true);
        echo "
        </div>
        <div class=\"ui green ok inverted button\" id=\"confirmation-button\">
            <i class=\"checkmark icon\"></i>
            ";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.yes_label"), "html", null, true);
        echo "
        </div>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusUi/Modal/_confirmation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 16,  62 => 12,  54 => 7,  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui small basic modal\" id=\"confirmation-modal\">
    <div class=\"ui icon header\">
        <i class=\"warning sign icon\"></i>
        {{ 'sylius.ui.confirm_your_action'|trans }}
    </div>
    <div class=\"content\">
        <p>{{ 'sylius.ui.are_your_sure_you_want_to_perform_this_action'|trans }}</p>
    </div>
    <div class=\"actions\">
        <div class=\"ui red basic cancel inverted button\">
            <i class=\"remove icon\"></i>
            {{ 'sylius.ui.no_label'|trans }}
        </div>
        <div class=\"ui green ok inverted button\" id=\"confirmation-button\">
            <i class=\"checkmark icon\"></i>
            {{ 'sylius.ui.yes_label'|trans }}
        </div>
    </div>
</div>
", "@SyliusUi/Modal/_confirmation.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Modal/_confirmation.html.twig");
    }
}
