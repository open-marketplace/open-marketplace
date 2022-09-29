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

/* @SyliusShop/Product/Index/_sorting.html.twig */
class __TwigTemplate_0169af6801521fa046294c16c83138d6710f50f84334845985741340f96c760f extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Index/_sorting.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusShop/Product/Index/_sorting.html.twig"));

        // line 1
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["resources"]) || array_key_exists("resources", $context) ? $context["resources"] : (function () { throw new RuntimeError('Variable "resources" does not exist.', 1, $this->source); })()), "data", [], "any", false, false, false, 1), "nbResults", [], "any", false, false, false, 1) > 0)) {
            // line 2
            echo "
";
            // line 3
            $context["route"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 3, $this->source); })()), "request", [], "any", false, false, false, 3), "attributes", [], "any", false, false, false, 3), "get", [0 => "_route"], "method", false, false, false, 3);
            // line 4
            $context["route_parameters"] = twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "request", [], "any", false, false, false, 4), "attributes", [], "any", false, false, false, 4), "get", [0 => "_route_params"], "method", false, false, false, 4), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "request", [], "any", false, false, false, 4), "query", [], "any", false, false, false, 4), "all", [], "any", false, false, false, 4));
            // line 5
            echo "
";
            // line 6
            $context["criteria"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 6, $this->source); })()), "request", [], "any", false, false, false, 6), "query", [], "any", false, false, false, 6), "get", [0 => "criteria", 1 => []], "method", false, false, false, 6);
            // line 7
            echo "
";
            // line 8
            $context["default_path"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 8, $this->source); })()), twig_array_merge((isset($context["route_parameters"]) || array_key_exists("route_parameters", $context) ? $context["route_parameters"] : (function () { throw new RuntimeError('Variable "route_parameters" does not exist.', 8, $this->source); })()), ["sorting" => null, "criteria" => (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 8, $this->source); })())]));
            // line 9
            $context["from_a_to_z_path"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 9, $this->source); })()), twig_array_merge((isset($context["route_parameters"]) || array_key_exists("route_parameters", $context) ? $context["route_parameters"] : (function () { throw new RuntimeError('Variable "route_parameters" does not exist.', 9, $this->source); })()), ["sorting" => ["name" => "asc"], "criteria" => (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 9, $this->source); })())]));
            // line 10
            $context["from_z_to_a_path"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 10, $this->source); })()), twig_array_merge((isset($context["route_parameters"]) || array_key_exists("route_parameters", $context) ? $context["route_parameters"] : (function () { throw new RuntimeError('Variable "route_parameters" does not exist.', 10, $this->source); })()), ["sorting" => ["name" => "desc"], "criteria" => (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 10, $this->source); })())]));
            // line 11
            $context["oldest_first_path"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 11, $this->source); })()), twig_array_merge((isset($context["route_parameters"]) || array_key_exists("route_parameters", $context) ? $context["route_parameters"] : (function () { throw new RuntimeError('Variable "route_parameters" does not exist.', 11, $this->source); })()), ["sorting" => ["createdAt" => "asc"], "criteria" => (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 11, $this->source); })())]));
            // line 12
            $context["newest_first_path"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 12, $this->source); })()), twig_array_merge((isset($context["route_parameters"]) || array_key_exists("route_parameters", $context) ? $context["route_parameters"] : (function () { throw new RuntimeError('Variable "route_parameters" does not exist.', 12, $this->source); })()), ["sorting" => ["createdAt" => "desc"], "criteria" => (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 12, $this->source); })())]));
            // line 13
            $context["cheapest_first_path"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 13, $this->source); })()), twig_array_merge((isset($context["route_parameters"]) || array_key_exists("route_parameters", $context) ? $context["route_parameters"] : (function () { throw new RuntimeError('Variable "route_parameters" does not exist.', 13, $this->source); })()), ["sorting" => ["price" => "asc"], "criteria" => (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 13, $this->source); })())]));
            // line 14
            $context["most_expensive_first_path"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath((isset($context["route"]) || array_key_exists("route", $context) ? $context["route"] : (function () { throw new RuntimeError('Variable "route" does not exist.', 14, $this->source); })()), twig_array_merge((isset($context["route_parameters"]) || array_key_exists("route_parameters", $context) ? $context["route_parameters"] : (function () { throw new RuntimeError('Variable "route_parameters" does not exist.', 14, $this->source); })()), ["sorting" => ["price" => "desc"], "criteria" => (isset($context["criteria"]) || array_key_exists("criteria", $context) ? $context["criteria"] : (function () { throw new RuntimeError('Variable "criteria" does not exist.', 14, $this->source); })())]));
            // line 15
            echo "
";
            // line 16
            if (twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 16, $this->source); })()), "request", [], "any", false, false, false, 16), "query", [], "any", false, false, false, 16), "get", [0 => "sorting"], "method", false, false, false, 16))) {
                // line 17
                echo "    ";
                $context["current_sorting_label"] = twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.by_position"));
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 18
($context["app"] ?? null), "request", [], "any", false, true, false, 18), "query", [], "any", false, true, false, 18), "get", [0 => "sorting"], "method", false, true, false, 18), "name", [], "any", true, true, false, 18) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "request", [], "any", false, false, false, 18), "query", [], "any", false, false, false, 18), "get", [0 => "sorting"], "method", false, false, false, 18), "name", [], "any", false, false, false, 18) == "asc"))) {
                // line 19
                echo "    ";
                $context["current_sorting_label"] = twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.from_a_to_z"));
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 20
($context["app"] ?? null), "request", [], "any", false, true, false, 20), "query", [], "any", false, true, false, 20), "get", [0 => "sorting"], "method", false, true, false, 20), "name", [], "any", true, true, false, 20) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 20, $this->source); })()), "request", [], "any", false, false, false, 20), "query", [], "any", false, false, false, 20), "get", [0 => "sorting"], "method", false, false, false, 20), "name", [], "any", false, false, false, 20) == "desc"))) {
                // line 21
                echo "    ";
                $context["current_sorting_label"] = twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.from_z_to_a"));
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 22
($context["app"] ?? null), "request", [], "any", false, true, false, 22), "query", [], "any", false, true, false, 22), "get", [0 => "sorting"], "method", false, true, false, 22), "createdAt", [], "any", true, true, false, 22) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 22, $this->source); })()), "request", [], "any", false, false, false, 22), "query", [], "any", false, false, false, 22), "get", [0 => "sorting"], "method", false, false, false, 22), "createdAt", [], "any", false, false, false, 22) == "desc"))) {
                // line 23
                echo "    ";
                $context["current_sorting_label"] = twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.newest_first"));
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 24
($context["app"] ?? null), "request", [], "any", false, true, false, 24), "query", [], "any", false, true, false, 24), "get", [0 => "sorting"], "method", false, true, false, 24), "createdAt", [], "any", true, true, false, 24) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "request", [], "any", false, false, false, 24), "query", [], "any", false, false, false, 24), "get", [0 => "sorting"], "method", false, false, false, 24), "createdAt", [], "any", false, false, false, 24) == "asc"))) {
                // line 25
                echo "    ";
                $context["current_sorting_label"] = twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.oldest_first"));
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 26
($context["app"] ?? null), "request", [], "any", false, true, false, 26), "query", [], "any", false, true, false, 26), "get", [0 => "sorting"], "method", false, true, false, 26), "price", [], "any", true, true, false, 26) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "request", [], "any", false, false, false, 26), "query", [], "any", false, false, false, 26), "get", [0 => "sorting"], "method", false, false, false, 26), "price", [], "any", false, false, false, 26) == "asc"))) {
                // line 27
                echo "    ";
                $context["current_sorting_label"] = twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.cheapest_first"));
            } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 28
($context["app"] ?? null), "request", [], "any", false, true, false, 28), "query", [], "any", false, true, false, 28), "get", [0 => "sorting"], "method", false, true, false, 28), "price", [], "any", true, true, false, 28) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "request", [], "any", false, false, false, 28), "query", [], "any", false, false, false, 28), "get", [0 => "sorting"], "method", false, false, false, 28), "price", [], "any", false, false, false, 28) == "desc"))) {
                // line 29
                echo "    ";
                $context["current_sorting_label"] = twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.most_expensive_first"));
            }
            // line 31
            echo "
<div class=\"ui right floated small header\">
    <div class=\"content\">
        ";
            // line 34
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.sort"), "html", null, true);
            echo "
        <div class=\"ui inline dropdown\">
            <div class=\"text\">";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["current_sorting_label"]) || array_key_exists("current_sorting_label", $context) ? $context["current_sorting_label"] : (function () { throw new RuntimeError('Variable "current_sorting_label" does not exist.', 36, $this->source); })()), "html", null, true);
            echo "</div>
            <i class=\"dropdown icon\"></i>
            <div class=\"menu\">
                <a class=\"item\" href=\"";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["default_path"]) || array_key_exists("default_path", $context) ? $context["default_path"] : (function () { throw new RuntimeError('Variable "default_path" does not exist.', 39, $this->source); })()), "html", null, true);
            echo "\" data-text=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.by_position")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.by_position"), "html", null, true);
            echo "</a>
                <a class=\"item\" href=\"";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["from_a_to_z_path"]) || array_key_exists("from_a_to_z_path", $context) ? $context["from_a_to_z_path"] : (function () { throw new RuntimeError('Variable "from_a_to_z_path" does not exist.', 40, $this->source); })()), "html", null, true);
            echo "\" data-text=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.from_a_to_z")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.from_a_to_z"), "html", null, true);
            echo "</a>
                <a class=\"item\" href=\"";
            // line 41
            echo twig_escape_filter($this->env, (isset($context["from_z_to_a_path"]) || array_key_exists("from_z_to_a_path", $context) ? $context["from_z_to_a_path"] : (function () { throw new RuntimeError('Variable "from_z_to_a_path" does not exist.', 41, $this->source); })()), "html", null, true);
            echo "\" data-text=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.from_z_to_a")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.from_z_to_a"), "html", null, true);
            echo "</a>
                <a class=\"item\" href=\"";
            // line 42
            echo twig_escape_filter($this->env, (isset($context["newest_first_path"]) || array_key_exists("newest_first_path", $context) ? $context["newest_first_path"] : (function () { throw new RuntimeError('Variable "newest_first_path" does not exist.', 42, $this->source); })()), "html", null, true);
            echo "\" data-text=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.newest_first")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.newest_first"), "html", null, true);
            echo "</a>
                <a class=\"item\" href=\"";
            // line 43
            echo twig_escape_filter($this->env, (isset($context["oldest_first_path"]) || array_key_exists("oldest_first_path", $context) ? $context["oldest_first_path"] : (function () { throw new RuntimeError('Variable "oldest_first_path" does not exist.', 43, $this->source); })()), "html", null, true);
            echo "\" data-text=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.oldest_first")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.oldest_first"), "html", null, true);
            echo "</a>
                <a class=\"item\" href=\"";
            // line 44
            echo twig_escape_filter($this->env, (isset($context["cheapest_first_path"]) || array_key_exists("cheapest_first_path", $context) ? $context["cheapest_first_path"] : (function () { throw new RuntimeError('Variable "cheapest_first_path" does not exist.', 44, $this->source); })()), "html", null, true);
            echo "\" data-text=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.cheapest_first")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.cheapest_first"), "html", null, true);
            echo "</a>
                <a class=\"item\" href=\"";
            // line 45
            echo twig_escape_filter($this->env, (isset($context["most_expensive_first_path"]) || array_key_exists("most_expensive_first_path", $context) ? $context["most_expensive_first_path"] : (function () { throw new RuntimeError('Variable "most_expensive_first_path" does not exist.', 45, $this->source); })()), "html", null, true);
            echo "\" data-text=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.most_expensive_first")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.most_expensive_first"), "html", null, true);
            echo "</a>
            </div>
        </div>
    </div>
</div>
";
        }
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusShop/Product/Index/_sorting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 45,  169 => 44,  161 => 43,  153 => 42,  145 => 41,  137 => 40,  129 => 39,  123 => 36,  118 => 34,  113 => 31,  109 => 29,  107 => 28,  104 => 27,  102 => 26,  99 => 25,  97 => 24,  94 => 23,  92 => 22,  89 => 21,  87 => 20,  84 => 19,  82 => 18,  79 => 17,  77 => 16,  74 => 15,  72 => 14,  70 => 13,  68 => 12,  66 => 11,  64 => 10,  62 => 9,  60 => 8,  57 => 7,  55 => 6,  52 => 5,  50 => 4,  48 => 3,  45 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if resources.data.nbResults > 0 %}

{% set route = app.request.attributes.get('_route') %}
{% set route_parameters = app.request.attributes.get('_route_params')|merge(app.request.query.all) %}

{% set criteria = app.request.query.get('criteria', {}) %}

{% set default_path = path(route, route_parameters|merge({'sorting': null, 'criteria': criteria})) %}
{% set from_a_to_z_path = path(route, route_parameters|merge({'sorting': {'name': 'asc'}, 'criteria': criteria})) %}
{% set from_z_to_a_path = path(route, route_parameters|merge({'sorting': {'name': 'desc'}, 'criteria': criteria})) %}
{% set oldest_first_path = path(route, route_parameters|merge({'sorting': {'createdAt': 'asc'}, 'criteria': criteria})) %}
{% set newest_first_path = path(route, route_parameters|merge({'sorting': {'createdAt': 'desc'}, 'criteria': criteria})) %}
{% set cheapest_first_path = path(route, route_parameters|merge({'sorting': {'price': 'asc'}, 'criteria': criteria})) %}
{% set most_expensive_first_path = path(route, route_parameters|merge({'sorting': {'price': 'desc'}, 'criteria': criteria})) %}

{% if app.request.query.get('sorting') is empty %}
    {% set current_sorting_label = 'sylius.ui.by_position'|trans|lower %}
{% elseif app.request.query.get('sorting').name is defined and app.request.query.get('sorting').name == 'asc'%}
    {% set current_sorting_label = 'sylius.ui.from_a_to_z'|trans|lower %}
{% elseif app.request.query.get('sorting').name is defined and app.request.query.get('sorting').name == 'desc'%}
    {% set current_sorting_label = 'sylius.ui.from_z_to_a'|trans|lower %}
{% elseif app.request.query.get('sorting').createdAt is defined and app.request.query.get('sorting').createdAt == 'desc'%}
    {% set current_sorting_label = 'sylius.ui.newest_first'|trans|lower %}
{% elseif app.request.query.get('sorting').createdAt is defined and app.request.query.get('sorting').createdAt == 'asc'%}
    {% set current_sorting_label = 'sylius.ui.oldest_first'|trans|lower %}
{% elseif app.request.query.get('sorting').price is defined and app.request.query.get('sorting').price == 'asc'%}
    {% set current_sorting_label = 'sylius.ui.cheapest_first'|trans|lower %}
{% elseif app.request.query.get('sorting').price is defined and app.request.query.get('sorting').price == 'desc' %}
    {% set current_sorting_label = 'sylius.ui.most_expensive_first'|trans|lower %}
{% endif %}

<div class=\"ui right floated small header\">
    <div class=\"content\">
        {{ 'sylius.ui.sort'|trans }}
        <div class=\"ui inline dropdown\">
            <div class=\"text\">{{ current_sorting_label }}</div>
            <i class=\"dropdown icon\"></i>
            <div class=\"menu\">
                <a class=\"item\" href=\"{{ default_path }}\" data-text=\"{{ 'sylius.ui.by_position'|trans|lower }}\">{{ 'sylius.ui.by_position'|trans }}</a>
                <a class=\"item\" href=\"{{ from_a_to_z_path }}\" data-text=\"{{ 'sylius.ui.from_a_to_z'|trans|lower }}\">{{ 'sylius.ui.from_a_to_z'|trans }}</a>
                <a class=\"item\" href=\"{{ from_z_to_a_path }}\" data-text=\"{{ 'sylius.ui.from_z_to_a'|trans|lower }}\">{{ 'sylius.ui.from_z_to_a'|trans }}</a>
                <a class=\"item\" href=\"{{ newest_first_path }}\" data-text=\"{{ 'sylius.ui.newest_first'|trans|lower }}\">{{ 'sylius.ui.newest_first'|trans }}</a>
                <a class=\"item\" href=\"{{ oldest_first_path }}\" data-text=\"{{ 'sylius.ui.oldest_first'|trans|lower }}\">{{ 'sylius.ui.oldest_first'|trans }}</a>
                <a class=\"item\" href=\"{{ cheapest_first_path }}\" data-text=\"{{ 'sylius.ui.cheapest_first'|trans|lower }}\">{{ 'sylius.ui.cheapest_first'|trans }}</a>
                <a class=\"item\" href=\"{{ most_expensive_first_path }}\" data-text=\"{{ 'sylius.ui.most_expensive_first'|trans|lower }}\">{{ 'sylius.ui.most_expensive_first'|trans }}</a>
            </div>
        </div>
    </div>
</div>
{% endif %}
", "@SyliusShop/Product/Index/_sorting.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/ShopBundle/Resources/views/Product/Index/_sorting.html.twig");
    }
}
