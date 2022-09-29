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

/* @ApiPlatform/SwaggerUi/index.html.twig */
class __TwigTemplate_9b5af501729c5ce6d46dcd3ebf90af3930f3aa9b882f226999e284547f084f6b extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheet' => [$this, 'block_stylesheet'],
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ApiPlatform/SwaggerUi/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ApiPlatform/SwaggerUi/index.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        if ((isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 5, $this->source); })())) {
            echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 5, $this->source); })()), "html", null, true);
            echo " - ";
        }
        echo "API Platform</title>

    ";
        // line 7
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 13
        echo "
    ";
        // line 14
        $context["oauth_data"] = ["oauth" => twig_array_merge(twig_get_attribute($this->env, $this->source, (isset($context["swagger_data"]) || array_key_exists("swagger_data", $context) ? $context["swagger_data"] : (function () { throw new RuntimeError('Variable "swagger_data" does not exist.', 14, $this->source); })()), "oauth", [], "any", false, false, false, 14), ["redirectUrl" => $this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/swagger-ui/oauth2-redirect.html", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 14, $this->source); })())))])];
        // line 15
        echo "    ";
        // line 16
        echo "    <script id=\"swagger-data\" type=\"application/json\">";
        echo json_encode(twig_array_merge((isset($context["swagger_data"]) || array_key_exists("swagger_data", $context) ? $context["swagger_data"] : (function () { throw new RuntimeError('Variable "swagger_data" does not exist.', 16, $this->source); })()), (isset($context["oauth_data"]) || array_key_exists("oauth_data", $context) ? $context["oauth_data"] : (function () { throw new RuntimeError('Variable "oauth_data" does not exist.', 16, $this->source); })())), 65);
        echo "</script>
</head>

<body>
<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"position:absolute;width:0;height:0\">
    <defs>
        <symbol viewBox=\"0 0 20 20\" id=\"unlocked\">
            <path d=\"M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V6h2v-.801C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"locked\">
            <path d=\"M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8zM12 8H8V5.199C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"close\">
            <path d=\"M14.348 14.849c-.469.469-1.229.469-1.697 0L10 11.819l-2.651 3.029c-.469.469-1.229.469-1.697 0-.469-.469-.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-.469-.469-.469-1.228 0-1.697.469-.469 1.228-.469 1.697 0L10 8.183l2.651-3.031c.469-.469 1.228-.469 1.697 0 .469.469.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c.469.469.469 1.229 0 1.698z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"large-arrow\">
            <path d=\"M13.25 10L6.109 2.58c-.268-.27-.268-.707 0-.979.268-.27.701-.27.969 0l7.83 7.908c.268.271.268.709 0 .979l-7.83 7.908c-.268.271-.701.27-.969 0-.268-.269-.268-.707 0-.979L13.25 10z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"large-arrow-down\">
            <path d=\"M17.418 6.109c.272-.268.709-.268.979 0s.271.701 0 .969l-7.908 7.83c-.27.268-.707.268-.979 0l-7.908-7.83c-.27-.268-.27-.701 0-.969.271-.268.709-.268.979 0L10 13.25l7.418-7.141z\"></path>
        </symbol>


        <symbol viewBox=\"0 0 24 24\" id=\"jump-to\">
            <path d=\"M19 7v4H5.83l3.58-3.59L8 6l-6 6 6 6 1.41-1.41L5.83 13H21V7z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 24 24\" id=\"expand\">
            <path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\"></path>
        </symbol>

    </defs>
</svg>
<header>
    <a id=\"logo\" href=\"https://api-platform.com\"><img src=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/logo-header.svg", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 54, $this->source); })())), "html", null, true);
        echo "\" alt=\"API Platform\"></a>
</header>

";
        // line 57
        if ((isset($context["showWebby"]) || array_key_exists("showWebby", $context) ? $context["showWebby"] : (function () { throw new RuntimeError('Variable "showWebby" does not exist.', 57, $this->source); })())) {
            // line 58
            echo "    <div class=\"web\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/web.png", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 58, $this->source); })())), "html", null, true);
            echo "\"></div>
    <div class=\"webby\"><img src=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/webby.png", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 59, $this->source); })())), "html", null, true);
            echo "\"></div>
";
        }
        // line 61
        echo "
<div id=\"swagger-ui\" class=\"api-platform\"></div>

<div class=\"swagger-ui\" id=\"formats\">
    <div class=\"information-container wrapper\">
        <div class=\"info\">
            Available formats:
            ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_array_keys_filter((isset($context["formats"]) || array_key_exists("formats", $context) ? $context["formats"] : (function () { throw new RuntimeError('Variable "formats" does not exist.', 68, $this->source); })())));
        foreach ($context['_seq'] as $context["_key"] => $context["format"]) {
            // line 69
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "request", [], "any", false, false, false, 69), "attributes", [], "any", false, false, false, 69), "get", [0 => "_route"], "method", false, false, false, 69), twig_array_merge(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 69, $this->source); })()), "request", [], "any", false, false, false, 69), "attributes", [], "any", false, false, false, 69), "get", [0 => "_route_params"], "method", false, false, false, 69), ["_format" => $context["format"]])), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["format"], "html", null, true);
            echo "</a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['format'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "            <br>
            Other API docs:
            ";
        // line 73
        $context["active_ui"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 73, $this->source); })()), "request", [], "any", false, false, false, 73), "get", [0 => "ui", 1 => "swagger_ui"], "method", false, false, false, 73);
        // line 74
        echo "            ";
        if (((isset($context["swaggerUiEnabled"]) || array_key_exists("swaggerUiEnabled", $context) ? $context["swaggerUiEnabled"] : (function () { throw new RuntimeError('Variable "swaggerUiEnabled" does not exist.', 74, $this->source); })()) && ((isset($context["active_ui"]) || array_key_exists("active_ui", $context) ? $context["active_ui"] : (function () { throw new RuntimeError('Variable "active_ui" does not exist.', 74, $this->source); })()) != "swagger_ui"))) {
            echo "<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_doc");
            echo "\">Swagger UI</a>";
        }
        // line 75
        echo "            ";
        if (((isset($context["reDocEnabled"]) || array_key_exists("reDocEnabled", $context) ? $context["reDocEnabled"] : (function () { throw new RuntimeError('Variable "reDocEnabled" does not exist.', 75, $this->source); })()) && ((isset($context["active_ui"]) || array_key_exists("active_ui", $context) ? $context["active_ui"] : (function () { throw new RuntimeError('Variable "active_ui" does not exist.', 75, $this->source); })()) != "re_doc"))) {
            echo "<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_doc", ["ui" => "re_doc"]);
            echo "\">ReDoc</a>";
        }
        // line 76
        echo "            ";
        // line 77
        echo "            ";
        if ( !(isset($context["graphqlEnabled"]) || array_key_exists("graphqlEnabled", $context) ? $context["graphqlEnabled"] : (function () { throw new RuntimeError('Variable "graphqlEnabled" does not exist.', 77, $this->source); })())) {
            echo "<a href=\"javascript:alert('GraphQL support is not enabled, see https://api-platform.com/docs/core/graphql/')\">GraphiQL</a>";
        }
        // line 78
        echo "            ";
        if ((isset($context["graphiQlEnabled"]) || array_key_exists("graphiQlEnabled", $context) ? $context["graphiQlEnabled"] : (function () { throw new RuntimeError('Variable "graphiQlEnabled" does not exist.', 78, $this->source); })())) {
            echo "<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_graphql_graphiql");
            echo "\">GraphiQL</a>";
        }
        // line 79
        echo "            ";
        if ((isset($context["graphQlPlaygroundEnabled"]) || array_key_exists("graphQlPlaygroundEnabled", $context) ? $context["graphQlPlaygroundEnabled"] : (function () { throw new RuntimeError('Variable "graphQlPlaygroundEnabled" does not exist.', 79, $this->source); })())) {
            echo "<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("api_graphql_graphql_playground");
            echo "\">GraphQL Playground</a>";
        }
        // line 80
        echo "        </div>
    </div>
</div>

";
        // line 84
        $this->displayBlock('javascript', $context, $blocks);
        // line 94
        echo "
</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 7
    public function block_stylesheet($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheet"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheet"));

        // line 8
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/fonts/open-sans/400.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 8, $this->source); })())), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/fonts/open-sans/700.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 9, $this->source); })())), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/swagger-ui/swagger-ui.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 10, $this->source); })())), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/style.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 11, $this->source); })())), "html", null, true);
        echo "\">
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 84
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        // line 85
        echo "    ";
        if ((((isset($context["reDocEnabled"]) || array_key_exists("reDocEnabled", $context) ? $context["reDocEnabled"] : (function () { throw new RuntimeError('Variable "reDocEnabled" does not exist.', 85, $this->source); })()) &&  !(isset($context["swaggerUiEnabled"]) || array_key_exists("swaggerUiEnabled", $context) ? $context["swaggerUiEnabled"] : (function () { throw new RuntimeError('Variable "swaggerUiEnabled" does not exist.', 85, $this->source); })())) || ((isset($context["reDocEnabled"]) || array_key_exists("reDocEnabled", $context) ? $context["reDocEnabled"] : (function () { throw new RuntimeError('Variable "reDocEnabled" does not exist.', 85, $this->source); })()) && ("re_doc" == (isset($context["active_ui"]) || array_key_exists("active_ui", $context) ? $context["active_ui"] : (function () { throw new RuntimeError('Variable "active_ui" does not exist.', 85, $this->source); })()))))) {
            // line 86
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/redoc/redoc.standalone.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 86, $this->source); })())), "html", null, true);
            echo "\"></script>
        <script src=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/init-redoc-ui.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 87, $this->source); })())), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // line 89
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/swagger-ui/swagger-ui-bundle.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 89, $this->source); })())), "html", null, true);
            echo "\"></script>
        <script src=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/swagger-ui/swagger-ui-standalone-preset.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 90, $this->source); })())), "html", null, true);
            echo "\"></script>
        <script src=\"";
            // line 91
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/init-swagger-ui.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 91, $this->source); })())), "html", null, true);
            echo "\"></script>
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@ApiPlatform/SwaggerUi/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  281 => 91,  277 => 90,  272 => 89,  267 => 87,  262 => 86,  259 => 85,  249 => 84,  237 => 11,  233 => 10,  229 => 9,  224 => 8,  214 => 7,  201 => 94,  199 => 84,  193 => 80,  186 => 79,  179 => 78,  174 => 77,  172 => 76,  165 => 75,  158 => 74,  156 => 73,  152 => 71,  141 => 69,  137 => 68,  128 => 61,  123 => 59,  118 => 58,  116 => 57,  110 => 54,  68 => 16,  66 => 15,  64 => 14,  61 => 13,  59 => 7,  51 => 5,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>{% if title %}{{ title }} - {% endif %}API Platform</title>

    {% block stylesheet %}
        <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/fonts/open-sans/400.css', assetPackage) }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/fonts/open-sans/700.css', assetPackage) }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/swagger-ui/swagger-ui.css', assetPackage) }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/style.css', assetPackage) }}\">
    {% endblock %}

    {% set oauth_data = {'oauth': swagger_data.oauth|merge({'redirectUrl' : absolute_url(asset('bundles/apiplatform/swagger-ui/oauth2-redirect.html', assetPackage)) })} %}
    {# json_encode(65) is for JSON_UNESCAPED_SLASHES|JSON_HEX_TAG to avoid JS XSS #}
    <script id=\"swagger-data\" type=\"application/json\">{{ swagger_data|merge(oauth_data)|json_encode(65)|raw }}</script>
</head>

<body>
<svg xmlns=\"http://www.w3.org/2000/svg\" style=\"position:absolute;width:0;height:0\">
    <defs>
        <symbol viewBox=\"0 0 20 20\" id=\"unlocked\">
            <path d=\"M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V6h2v-.801C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"locked\">
            <path d=\"M15.8 8H14V5.6C14 2.703 12.665 1 10 1 7.334 1 6 2.703 6 5.6V8H4c-.553 0-1 .646-1 1.199V17c0 .549.428 1.139.951 1.307l1.197.387C5.672 18.861 6.55 19 7.1 19h5.8c.549 0 1.428-.139 1.951-.307l1.196-.387c.524-.167.953-.757.953-1.306V9.199C17 8.646 16.352 8 15.8 8zM12 8H8V5.199C8 3.754 8.797 3 10 3c1.203 0 2 .754 2 2.199V8z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"close\">
            <path d=\"M14.348 14.849c-.469.469-1.229.469-1.697 0L10 11.819l-2.651 3.029c-.469.469-1.229.469-1.697 0-.469-.469-.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-.469-.469-.469-1.228 0-1.697.469-.469 1.228-.469 1.697 0L10 8.183l2.651-3.031c.469-.469 1.228-.469 1.697 0 .469.469.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c.469.469.469 1.229 0 1.698z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"large-arrow\">
            <path d=\"M13.25 10L6.109 2.58c-.268-.27-.268-.707 0-.979.268-.27.701-.27.969 0l7.83 7.908c.268.271.268.709 0 .979l-7.83 7.908c-.268.271-.701.27-.969 0-.268-.269-.268-.707 0-.979L13.25 10z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 20 20\" id=\"large-arrow-down\">
            <path d=\"M17.418 6.109c.272-.268.709-.268.979 0s.271.701 0 .969l-7.908 7.83c-.27.268-.707.268-.979 0l-7.908-7.83c-.27-.268-.27-.701 0-.969.271-.268.709-.268.979 0L10 13.25l7.418-7.141z\"></path>
        </symbol>


        <symbol viewBox=\"0 0 24 24\" id=\"jump-to\">
            <path d=\"M19 7v4H5.83l3.58-3.59L8 6l-6 6 6 6 1.41-1.41L5.83 13H21V7z\"></path>
        </symbol>

        <symbol viewBox=\"0 0 24 24\" id=\"expand\">
            <path d=\"M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z\"></path>
        </symbol>

    </defs>
</svg>
<header>
    <a id=\"logo\" href=\"https://api-platform.com\"><img src=\"{{ asset('bundles/apiplatform/logo-header.svg', assetPackage) }}\" alt=\"API Platform\"></a>
</header>

{% if showWebby %}
    <div class=\"web\"><img src=\"{{ asset('bundles/apiplatform/web.png', assetPackage) }}\"></div>
    <div class=\"webby\"><img src=\"{{ asset('bundles/apiplatform/webby.png', assetPackage) }}\"></div>
{% endif %}

<div id=\"swagger-ui\" class=\"api-platform\"></div>

<div class=\"swagger-ui\" id=\"formats\">
    <div class=\"information-container wrapper\">
        <div class=\"info\">
            Available formats:
            {% for format in formats|keys %}
                <a href=\"{{ path(app.request.attributes.get('_route'), app.request.attributes.get('_route_params')|merge({'_format': format})) }}\">{{ format }}</a>
            {% endfor %}
            <br>
            Other API docs:
            {% set active_ui = app.request.get('ui', 'swagger_ui') %}
            {% if swaggerUiEnabled and active_ui != 'swagger_ui' %}<a href=\"{{ path('api_doc') }}\">Swagger UI</a>{% endif %}
            {% if reDocEnabled and active_ui != 're_doc' %}<a href=\"{{ path('api_doc', {'ui': 're_doc'}) }}\">ReDoc</a>{% endif %}
            {# FIXME: Typo in graphql => graphQl in SwaggerUiAction #}
            {% if not graphqlEnabled %}<a href=\"javascript:alert('GraphQL support is not enabled, see https://api-platform.com/docs/core/graphql/')\">GraphiQL</a>{% endif %}
            {% if graphiQlEnabled %}<a href=\"{{ path('api_graphql_graphiql') }}\">GraphiQL</a>{% endif %}
            {% if graphQlPlaygroundEnabled %}<a href=\"{{ path('api_graphql_graphql_playground') }}\">GraphQL Playground</a>{% endif %}
        </div>
    </div>
</div>

{% block javascript %}
    {% if (reDocEnabled and not swaggerUiEnabled) or (reDocEnabled and 're_doc' == active_ui) %}
        <script src=\"{{ asset('bundles/apiplatform/redoc/redoc.standalone.js', assetPackage) }}\"></script>
        <script src=\"{{ asset('bundles/apiplatform/init-redoc-ui.js', assetPackage) }}\"></script>
    {% else %}
        <script src=\"{{ asset('bundles/apiplatform/swagger-ui/swagger-ui-bundle.js', assetPackage) }}\"></script>
        <script src=\"{{ asset('bundles/apiplatform/swagger-ui/swagger-ui-standalone-preset.js', assetPackage) }}\"></script>
        <script src=\"{{ asset('bundles/apiplatform/init-swagger-ui.js', assetPackage) }}\"></script>
    {% endif %}
{% endblock %}

</body>
</html>
", "@ApiPlatform/SwaggerUi/index.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/api-platform/core/src/Bridge/Symfony/Bundle/Resources/views/SwaggerUi/index.html.twig");
    }
}
