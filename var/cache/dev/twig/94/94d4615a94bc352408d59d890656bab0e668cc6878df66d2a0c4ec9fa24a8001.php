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

/* @ApiPlatform/Graphiql/index.html.twig */
class __TwigTemplate_2a8c458a085e0bf58c01149e77fb652b328383a7440073b3a321cca8a89ece0e extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ApiPlatform/Graphiql/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@ApiPlatform/Graphiql/index.html.twig"));

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

    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/graphiql/graphiql.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 7, $this->source); })())), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/graphiql-style.css", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 8, $this->source); })())), "html", null, true);
        echo "\">

    ";
        // line 11
        echo "    <script id=\"graphiql-data\" type=\"application/json\">";
        echo json_encode((isset($context["graphiql_data"]) || array_key_exists("graphiql_data", $context) ? $context["graphiql_data"] : (function () { throw new RuntimeError('Variable "graphiql_data" does not exist.', 11, $this->source); })()), 65);
        echo "</script>
</head>

<body>
<div id=\"graphiql\">Loading...</div>

<script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/react/react.production.min.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 17, $this->source); })())), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/react/react-dom.production.min.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 18, $this->source); })())), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/graphiql/graphiql.min.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 19, $this->source); })())), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/apiplatform/init-graphiql.js", (isset($context["assetPackage"]) || array_key_exists("assetPackage", $context) ? $context["assetPackage"] : (function () { throw new RuntimeError('Variable "assetPackage" does not exist.', 20, $this->source); })())), "html", null, true);
        echo "\"></script>

</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@ApiPlatform/Graphiql/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 20,  84 => 19,  80 => 18,  76 => 17,  66 => 11,  61 => 8,  57 => 7,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>{% if title %}{{ title }} - {% endif %}API Platform</title>

    <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/graphiql/graphiql.css', assetPackage) }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/apiplatform/graphiql-style.css', assetPackage) }}\">

    {# json_encode(65) is for JSON_UNESCAPED_SLASHES|JSON_HEX_TAG to avoid JS XSS #}
    <script id=\"graphiql-data\" type=\"application/json\">{{ graphiql_data|json_encode(65)|raw }}</script>
</head>

<body>
<div id=\"graphiql\">Loading...</div>

<script src=\"{{ asset('bundles/apiplatform/react/react.production.min.js', assetPackage) }}\"></script>
<script src=\"{{ asset('bundles/apiplatform/react/react-dom.production.min.js', assetPackage) }}\"></script>
<script src=\"{{ asset('bundles/apiplatform/graphiql/graphiql.min.js', assetPackage) }}\"></script>
<script src=\"{{ asset('bundles/apiplatform/init-graphiql.js', assetPackage) }}\"></script>

</body>
</html>
", "@ApiPlatform/Graphiql/index.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/api-platform/core/src/Bridge/Symfony/Bundle/Resources/views/Graphiql/index.html.twig");
    }
}
