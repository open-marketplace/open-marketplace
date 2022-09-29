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

/* @SyliusAdmin/Product/Attribute/attributeValues.html.twig */
class __TwigTemplate_e8d1ede5700bc4cb979d0339f61344cbceaea5c8a4149753efa2e3492a56b5fc extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Attribute/attributeValues.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusAdmin/Product/Attribute/attributeValues.html.twig"));

        // line 1
        $macros["self"] = $this->macros["self"] = $this;
        // line 2
        $macros["flags"] = $this->macros["flags"] = $this->loadTemplate("@SyliusUi/Macro/flags.html.twig", "@SyliusAdmin/Product/Attribute/attributeValues.html.twig", 2)->unwrap();
        // line 3
        echo "
";
        // line 4
        $context["subject"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 4, $this->source); })()), "name", [], "any", false, false, false, 4), ["_attribute" => ""]);
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["forms"]) || array_key_exists("forms", $context) ? $context["forms"] : (function () { throw new RuntimeError('Variable "forms" does not exist.', 5, $this->source); })()));
        foreach ($context['_seq'] as $context["code"] => $context["localeCodes"]) {
            // line 6
            echo "    <div class=\"attributes-group\" data-attribute-code=\"";
            echo twig_escape_filter($this->env, $context["code"], "html", null, true);
            echo "\">
        <div class=\"attributes-header\">
            <strong>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_first($this->env, $context["localeCodes"]), "vars", [], "any", false, false, false, 8), "label", [], "any", false, false, false, 8), "html", null, true);
            echo "</strong>
            <div>
                <button class=\"ui basic red labeled icon button\" data-attribute=\"delete\">
                    <i class=\"remove icon\"></i>";
            // line 11
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.delete"), "html", null, true);
            echo "
                </button>
            </div>
        </div>
        <div class=\"attributes-list\">
            ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["localeCodes"]);
            foreach ($context['_seq'] as $context["localeCode"] => $context["form"]) {
                // line 17
                echo "                <div class=\"attribute\" data-id=\"";
                echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                echo "\">
                    ";
                // line 18
                $context["id"] = twig_lower_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["form"], "vars", [], "any", false, false, false, 18), "label", [], "any", false, false, false, 18), [" " => "_"]));
                // line 19
                echo "                    <div class=\"attribute-row\">
                        <div class=\"attribute-label ";
                // line 20
                if (( !$context["localeCode"] || ($context["localeCode"] == (isset($context["sylius_base_locale"]) || array_key_exists("sylius_base_locale", $context) ? $context["sylius_base_locale"] : (function () { throw new RuntimeError('Variable "sylius_base_locale" does not exist.', 20, $this->source); })())))) {
                    echo " required field ";
                }
                echo "\">
                            <label>
                                ";
                // line 22
                if ($context["localeCode"]) {
                    // line 23
                    echo "                                    ";
                    echo twig_call_macro($macros["flags"], "macro_fromLocaleCode", [$context["localeCode"]], 23, $context, $this->getSourceContext());
                    echo "
                                ";
                } else {
                    // line 25
                    echo "                                    <i class=\"globe icon\"></i>
                                ";
                }
                // line 27
                echo "                                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["form"], "vars", [], "any", false, false, false, 27), "label", [], "any", false, false, false, 27), "html", null, true);
                echo "
                            </label>
                        </div>
                        <div class=\"attribute-input\" data-test-product-attribute-value-in-locale=\"";
                // line 30
                echo twig_escape_filter($this->env, twig_sprintf("%s %s", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["form"], "vars", [], "any", false, false, false, 30), "label", [], "any", false, false, false, 30), $context["localeCode"]), "html", null, true);
                echo "\">
                            ";
                // line 31
                if (twig_in_filter("type_checkbox", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["form"], "vars", [], "any", false, false, false, 31), "cache_key", [], "any", false, false, false, 31))) {
                    // line 32
                    echo "                                <div class=\"ui toggle checkbox\">
                                    ";
                    // line 33
                    echo twig_call_macro($macros["self"], "macro_formField", [$context["form"], (isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 33, $this->source); })()), (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 33, $this->source); })()), "", (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 33, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 33, $this->source); })()), "applicationName", [], "any", false, false, false, 33)], 33, $context, $this->getSourceContext());
                    echo "
                                    <label></label>
                                </div>
                            ";
                } else {
                    // line 37
                    echo "                                ";
                    echo twig_call_macro($macros["self"], "macro_formField", [$context["form"], (isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 37, $this->source); })()), (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 37, $this->source); })()), "", (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 37, $this->source); })()), twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 37, $this->source); })()), "applicationName", [], "any", false, false, false, 37)], 37, $context, $this->getSourceContext());
                    echo "
                            ";
                }
                // line 39
                echo "                        </div>
                        <div class=\"attribute-action\">
                            ";
                // line 41
                if ($context["localeCode"]) {
                    // line 42
                    echo "                                <a href=\"#\" class=\"ui basic button\" data-attribute=\"copy\">";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.apply_to_all"), "html", null, true);
                    echo "</a>
                            ";
                }
                // line 44
                echo "                        </div>
                    </div>
                    <input type=\"hidden\"
                           name=\"";
                // line 47
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 47, $this->source); })()), "applicationName", [], "any", false, false, false, 47), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 47, $this->source); })()), "html", null, true);
                echo "[attributes][";
                echo twig_escape_filter($this->env, (isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 47, $this->source); })()), "html", null, true);
                echo "][attribute]\"
                           id=\"";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 48, $this->source); })()), "applicationName", [], "any", false, false, false, 48), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 48, $this->source); })()), "html", null, true);
                echo "_attributes_";
                echo twig_escape_filter($this->env, (isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 48, $this->source); })()), "html", null, true);
                echo "_attribute\"
                           value=\"";
                // line 49
                echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                echo "\"/>
                    <input type=\"hidden\"
                           name=\"";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 51, $this->source); })()), "applicationName", [], "any", false, false, false, 51), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 51, $this->source); })()), "html", null, true);
                echo "[attributes][";
                echo twig_escape_filter($this->env, (isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 51, $this->source); })()), "html", null, true);
                echo "][localeCode]\"
                           id=\"";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["metadata"]) || array_key_exists("metadata", $context) ? $context["metadata"] : (function () { throw new RuntimeError('Variable "metadata" does not exist.', 52, $this->source); })()), "applicationName", [], "any", false, false, false, 52), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 52, $this->source); })()), "html", null, true);
                echo "_attributes_";
                echo twig_escape_filter($this->env, (isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 52, $this->source); })()), "html", null, true);
                echo "_localeCode\"
                           value=\"";
                // line 53
                echo twig_escape_filter($this->env, $context["localeCode"], "html", null, true);
                echo "\"/>
                    ";
                // line 54
                $context["count"] = ((isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 54, $this->source); })()) + 1);
                // line 55
                echo "                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['localeCode'], $context['form'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "        </div>
    </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['code'], $context['localeCodes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 61
    public function macro_formField($__item__ = null, $__count__ = null, $__id__ = null, $__prefix__ = null, $__subject__ = null, $__applicationName__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "count" => $__count__,
            "id" => $__id__,
            "prefix" => $__prefix__,
            "subject" => $__subject__,
            "applicationName" => $__applicationName__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "formField"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "formField"));

            // line 62
            echo "    ";
            $macros["__internal_parse_24"] = $this;
            // line 63
            echo "    ";
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 63, $this->source); })()), "children", [], "any", false, false, false, 63)) > 0)) {
                // line 64
                echo "        ";
                $context["prefix"] = (((isset($context["prefix"]) || array_key_exists("prefix", $context) ? $context["prefix"] : (function () { throw new RuntimeError('Variable "prefix" does not exist.', 64, $this->source); })()) . "_") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 64, $this->source); })()), "vars", [], "any", false, false, false, 64), "name", [], "any", false, false, false, 64));
                // line 65
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 65, $this->source); })()), "children", [], "any", false, false, false, 65));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 66
                    echo "            ";
                    echo twig_call_macro($macros["__internal_parse_24"], "macro_formField", [$context["child"], (isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 66, $this->source); })()), (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 66, $this->source); })()), (isset($context["prefix"]) || array_key_exists("prefix", $context) ? $context["prefix"] : (function () { throw new RuntimeError('Variable "prefix" does not exist.', 66, $this->source); })()), (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 66, $this->source); })()), (isset($context["applicationName"]) || array_key_exists("applicationName", $context) ? $context["applicationName"] : (function () { throw new RuntimeError('Variable "applicationName" does not exist.', 66, $this->source); })())], 66, $context, $this->getSourceContext());
                    echo "
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 68
                echo "    ";
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 68, $this->source); })()), "vars", [], "any", false, false, false, 68), "name", [], "any", false, false, false, 68) != "_token")) {
                // line 69
                echo "        ";
                $context["namePrefix"] = twig_replace_filter((isset($context["prefix"]) || array_key_exists("prefix", $context) ? $context["prefix"] : (function () { throw new RuntimeError('Variable "prefix" does not exist.', 69, $this->source); })()), ["_" => "]["]);
                // line 70
                echo "        ";
                $context["dataName"] = (((((((((isset($context["applicationName"]) || array_key_exists("applicationName", $context) ? $context["applicationName"] : (function () { throw new RuntimeError('Variable "applicationName" does not exist.', 70, $this->source); })()) . "_") . (isset($context["subject"]) || array_key_exists("subject", $context) ? $context["subject"] : (function () { throw new RuntimeError('Variable "subject" does not exist.', 70, $this->source); })())) . "[attributes][") . (isset($context["count"]) || array_key_exists("count", $context) ? $context["count"] : (function () { throw new RuntimeError('Variable "count" does not exist.', 70, $this->source); })())) . (isset($context["namePrefix"]) || array_key_exists("namePrefix", $context) ? $context["namePrefix"] : (function () { throw new RuntimeError('Variable "namePrefix" does not exist.', 70, $this->source); })())) . "][") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 70, $this->source); })()), "vars", [], "any", false, false, false, 70), "name", [], "any", false, false, false, 70)) . "]");
                // line 71
                echo "        ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "vars", [], "any", false, true, false, 71), "multiple", [], "any", true, true, false, 71) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 71, $this->source); })()), "vars", [], "any", false, false, false, 71), "multiple", [], "any", false, false, false, 71))) {
                    // line 72
                    echo "            ";
                    $context["dataName"] = ((isset($context["dataName"]) || array_key_exists("dataName", $context) ? $context["dataName"] : (function () { throw new RuntimeError('Variable "dataName" does not exist.', 72, $this->source); })()) . "[]");
                    // line 73
                    echo "        ";
                }
                // line 74
                echo "
        ";
                // line 75
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 75, $this->source); })()), 'widget', ["id" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 75, $this->source); })()), "attr" => ["data-name" => (isset($context["dataName"]) || array_key_exists("dataName", $context) ? $context["dataName"] : (function () { throw new RuntimeError('Variable "dataName" does not exist.', 75, $this->source); })())]]);
                echo "
    ";
            }
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@SyliusAdmin/Product/Attribute/attributeValues.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  292 => 75,  289 => 74,  286 => 73,  283 => 72,  280 => 71,  277 => 70,  274 => 69,  271 => 68,  262 => 66,  257 => 65,  254 => 64,  251 => 63,  248 => 62,  224 => 61,  213 => 60,  205 => 57,  198 => 55,  196 => 54,  192 => 53,  184 => 52,  176 => 51,  171 => 49,  163 => 48,  155 => 47,  150 => 44,  144 => 42,  142 => 41,  138 => 39,  132 => 37,  125 => 33,  122 => 32,  120 => 31,  116 => 30,  109 => 27,  105 => 25,  99 => 23,  97 => 22,  90 => 20,  87 => 19,  85 => 18,  80 => 17,  76 => 16,  68 => 11,  62 => 8,  56 => 6,  52 => 5,  50 => 4,  47 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% import _self as self %}
{% import '@SyliusUi/Macro/flags.html.twig' as flags %}

{% set subject = metadata.name|replace({'_attribute': ''}) %}
{% for code, localeCodes in forms %}
    <div class=\"attributes-group\" data-attribute-code=\"{{ code }}\">
        <div class=\"attributes-header\">
            <strong>{{ (localeCodes|first).vars.label }}</strong>
            <div>
                <button class=\"ui basic red labeled icon button\" data-attribute=\"delete\">
                    <i class=\"remove icon\"></i>{{ 'sylius.ui.delete'|trans }}
                </button>
            </div>
        </div>
        <div class=\"attributes-list\">
            {% for localeCode, form in localeCodes %}
                <div class=\"attribute\" data-id=\"{{ code }}\">
                    {% set id = form.vars.label|replace({' ': '_'})|lower %}
                    <div class=\"attribute-row\">
                        <div class=\"attribute-label {% if not localeCode or localeCode == sylius_base_locale %} required field {% endif %}\">
                            <label>
                                {% if localeCode %}
                                    {{ flags.fromLocaleCode(localeCode) }}
                                {% else %}
                                    <i class=\"globe icon\"></i>
                                {% endif %}
                                {{ form.vars.label }}
                            </label>
                        </div>
                        <div class=\"attribute-input\" data-test-product-attribute-value-in-locale=\"{{ \"%s %s\"|format(form.vars.label, localeCode) }}\">
                            {% if 'type_checkbox' in form.vars.cache_key %}
                                <div class=\"ui toggle checkbox\">
                                    {{ self.formField(form, count, id, '', subject, metadata.applicationName) }}
                                    <label></label>
                                </div>
                            {% else %}
                                {{ self.formField(form, count, id, '', subject, metadata.applicationName) }}
                            {% endif %}
                        </div>
                        <div class=\"attribute-action\">
                            {% if localeCode %}
                                <a href=\"#\" class=\"ui basic button\" data-attribute=\"copy\">{{ 'sylius.ui.apply_to_all'|trans }}</a>
                            {% endif %}
                        </div>
                    </div>
                    <input type=\"hidden\"
                           name=\"{{ metadata.applicationName }}_{{ subject }}[attributes][{{ count }}][attribute]\"
                           id=\"{{ metadata.applicationName }}_{{ subject }}_attributes_{{ count }}_attribute\"
                           value=\"{{ code }}\"/>
                    <input type=\"hidden\"
                           name=\"{{ metadata.applicationName }}_{{ subject }}[attributes][{{ count }}][localeCode]\"
                           id=\"{{ metadata.applicationName }}_{{ subject }}_attributes_{{ count }}_localeCode\"
                           value=\"{{ localeCode }}\"/>
                    {% set count = count + 1 %}
                </div>
            {% endfor %}
        </div>
    </div>
{% endfor %}

{% macro formField(item, count, id, prefix, subject, applicationName) %}
    {% from _self import formField %}
    {% if item.children|length > 0 %}
        {% set prefix = prefix~'_'~item.vars.name %}
        {% for child in item.children %}
            {{ formField(child, count, id, prefix, subject, applicationName) }}
        {% endfor %}
    {% elseif item.vars.name != '_token' %}
        {% set namePrefix = prefix|replace({'_': ']['}) %}
        {% set dataName = applicationName~'_'~subject~'[attributes]['~count~namePrefix~']['~item.vars.name~']' %}
        {% if item.vars.multiple is defined and item.vars.multiple %}
            {% set dataName = dataName~'[]' %}
        {% endif %}

        {{ form_widget(item, {'id': id, 'attr': {'data-name': dataName }}) }}
    {% endif %}
{% endmacro %}
", "@SyliusAdmin/Product/Attribute/attributeValues.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/AdminBundle/Resources/views/Product/Attribute/attributeValues.html.twig");
    }
}
