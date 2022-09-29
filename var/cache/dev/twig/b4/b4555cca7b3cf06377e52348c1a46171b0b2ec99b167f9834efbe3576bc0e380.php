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

/* @SyliusAdmin/CatalogPromotion/Show/_details.html.twig */
class __TwigTemplate_b5411949a45a0d1fb717c6cff434b31fe8a151736b21ec92ea815ae41bf25cdd extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/Show/_details.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/CatalogPromotion/Show/_details.html.twig"));

        // line 1
        echo "<div class=\"ui attached segment\">
    <div>
        ";
        // line 3
        if (twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 3, $this->source); })()), "enabled", [], "any", false, false, false, 3)) {
            // line 4
            echo "        <span class=\"ui teal label\"><i class=\"checkmark icon\"></i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.enabled"), "html", null, true);
            echo "</span>
        ";
        } else {
            // line 6
            echo "        <span class=\"ui red label\"><i class=\"remove icon\"></i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.disabled"), "html", null, true);
            echo "</span>
        ";
        }
        // line 8
        echo "
        ";
        // line 9
        if (twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 9, $this->source); })()), "exclusive", [], "any", false, false, false, 9)) {
            // line 10
            echo "        <span class=\"ui teal label\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("is-exclusive");
            echo "><i class=\"checkmark icon\"></i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.exclusive"), "html", null, true);
            echo "</span>
        ";
        }
        // line 12
        echo "
        ";
        // line 13
        $this->loadTemplate("@SyliusAdmin/Common/Label/catalogPromotionState.html.twig", "@SyliusAdmin/CatalogPromotion/Show/_details.html.twig", 13)->display(twig_array_merge($context, ["data" => twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 13, $this->source); })()), "state", [], "any", false, false, false, 13)]));
        // line 14
        echo "
        <table class=\"ui very basic celled table\">
            <tbody>
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.code"), "html", null, true);
        echo "</strong></td>
                <td>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 19, $this->source); })()), "code", [], "any", false, false, false, 19), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.name"), "html", null, true);
        echo "</strong></td>
                <td ";
        // line 23
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("name");
        echo ">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 23, $this->source); })()), "name", [], "any", false, false, false, 23), "html", null, true);
        echo "</td>
            </tr>

            ";
        // line 26
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 26, $this->source); })()), "startDate", [], "any", false, false, false, 26))) {
            // line 27
            echo "            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.start_date"), "html", null, true);
            echo "</strong></td>
                <td ";
            // line 29
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("start-date");
            echo ">";
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDateTime($this->env, twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 29, $this->source); })()), "startDate", [], "any", false, false, false, 29), "medium", "medium", "YYYY-MM-dd HH:mm:ss"), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        // line 32
        echo "
            ";
        // line 33
        if ( !(null === twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 33, $this->source); })()), "endDate", [], "any", false, false, false, 33))) {
            // line 34
            echo "            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.end_date"), "html", null, true);
            echo "</strong></td>
                <td ";
            // line 36
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("end-date");
            echo ">";
            echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatDateTime($this->env, twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 36, $this->source); })()), "endDate", [], "any", false, false, false, 36), "medium", "medium", "YYYY-MM-dd HH:mm:ss"), "html", null, true);
            echo "</td>
            </tr>
            ";
        }
        // line 39
        echo "            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.priority"), "html", null, true);
        echo "</strong></td>
                <td ";
        // line 41
        echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("priority");
        echo ">";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 41, $this->source); })()), "priority", [], "any", false, false, false, 41), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.channels"), "html", null, true);
        echo "</strong></td>
                <td>
                    ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["catalog_promotion"]) || array_key_exists("catalog_promotion", $context) ? $context["catalog_promotion"] : (function () { throw new RuntimeError('Variable "catalog_promotion" does not exist.', 46, $this->source); })()), "channels", [], "any", false, false, false, 46));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
            // line 47
            echo "                        ";
            $this->loadTemplate("@SyliusAdmin/Common/_channel.html.twig", "@SyliusAdmin/CatalogPromotion/Show/_details.html.twig", 47)->display(twig_array_merge($context, ["channel" => $context["channel"]]));
            // line 48
            echo "                        <br />
                    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/CatalogPromotion/Show/_details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  199 => 50,  184 => 48,  181 => 47,  164 => 46,  159 => 44,  151 => 41,  147 => 40,  144 => 39,  136 => 36,  132 => 35,  129 => 34,  127 => 33,  124 => 32,  116 => 29,  112 => 28,  109 => 27,  107 => 26,  99 => 23,  95 => 22,  89 => 19,  85 => 18,  79 => 14,  77 => 13,  74 => 12,  66 => 10,  64 => 9,  61 => 8,  55 => 6,  49 => 4,  47 => 3,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"ui attached segment\">
    <div>
        {% if catalog_promotion.enabled %}
        <span class=\"ui teal label\"><i class=\"checkmark icon\"></i>{{ 'sylius.ui.enabled'|trans }}</span>
        {% else %}
        <span class=\"ui red label\"><i class=\"remove icon\"></i>{{ 'sylius.ui.disabled'|trans }}</span>
        {% endif %}

        {% if catalog_promotion.exclusive %}
        <span class=\"ui teal label\" {{ sylius_test_html_attribute('is-exclusive') }}><i class=\"checkmark icon\"></i>{{ 'sylius.ui.exclusive'|trans }}</span>
        {% endif %}

        {% include '@SyliusAdmin/Common/Label/catalogPromotionState.html.twig' with {'data': catalog_promotion.state} %}

        <table class=\"ui very basic celled table\">
            <tbody>
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.code'|trans }}</strong></td>
                <td>{{ catalog_promotion.code }}</td>
            </tr>
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.name'|trans }}</strong></td>
                <td {{ sylius_test_html_attribute('name') }}>{{ catalog_promotion.name }}</td>
            </tr>

            {% if catalog_promotion.startDate is not null %}
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.start_date'|trans }}</strong></td>
                <td {{ sylius_test_html_attribute('start-date') }}>{{ catalog_promotion.startDate|format_datetime(pattern='YYYY-MM-dd HH:mm:ss') }}</td>
            </tr>
            {% endif %}

            {% if catalog_promotion.endDate is not null %}
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.end_date'|trans }}</strong></td>
                <td {{ sylius_test_html_attribute('end-date') }}>{{ catalog_promotion.endDate|format_datetime(pattern='YYYY-MM-dd HH:mm:ss') }}</td>
            </tr>
            {% endif %}
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.priority'|trans }}</strong></td>
                <td {{ sylius_test_html_attribute('priority') }}>{{ catalog_promotion.priority }}</td>
            </tr>
            <tr>
                <td class=\"five wide\"><strong class=\"gray text\">{{ 'sylius.ui.channels'|trans }}</strong></td>
                <td>
                    {% for channel in catalog_promotion.channels %}
                        {% include '@SyliusAdmin/Common/_channel.html.twig' with {'channel': channel} %}
                        <br />
                    {% endfor %}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
", "@SyliusAdmin/CatalogPromotion/Show/_details.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/CatalogPromotion/Show/_details.html.twig");
    }
}
