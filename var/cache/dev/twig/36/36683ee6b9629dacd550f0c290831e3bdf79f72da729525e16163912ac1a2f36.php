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

/* @SyliusUi/Macro/buttons.html.twig */
class __TwigTemplate_2e54566a72fe79d9745d4622d64f6449311dd30e5fcfa3ef638170192090827b extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Macro/buttons.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Macro/buttons.html.twig"));

        // line 11
        echo "
";
        // line 21
        echo "
";
        // line 31
        echo "
";
        // line 41
        echo "
";
        // line 47
        echo "
";
        // line 53
        echo "
";
        // line 63
        echo "
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 1
    public function macro_default($__url__ = null, $__message__ = null, $__id__ = null, $__icon__ = null, $__class__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "url" => $__url__,
            "message" => $__message__,
            "id" => $__id__,
            "icon" => $__icon__,
            "class" => $__class__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "default"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "default"));

            // line 2
            echo "    <a class=\"ui ";
            if ( !twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 2, $this->source); })()))) {
                echo "labeled ";
            }
            if ( !twig_test_empty((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 2, $this->source); })()))) {
                echo "icon ";
            }
            echo "button ";
            if ( !twig_test_empty((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 2, $this->source); })()))) {
                echo " ";
                echo twig_escape_filter($this->env, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 2, $this->source); })()), "html", null, true);
                echo " ";
            }
            echo "\" ";
            if ( !(null === (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 2, $this->source); })()))) {
                echo " id=\"";
                echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 2, $this->source); })()), "html", null, true);
                echo "\"";
            }
            echo " href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 2, $this->source); })()), "html", null, true);
            echo "\" ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("button", ((array_key_exists("id", $context)) ? (_twig_default_filter((isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 2, $this->source); })()), (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 2, $this->source); })()))) : ((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 2, $this->source); })()))));
            echo ">
        ";
            // line 3
            if ( !twig_test_empty((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 3, $this->source); })()))) {
                // line 4
                echo "            <i class=\"icon ";
                echo twig_escape_filter($this->env, (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 4, $this->source); })()), "html", null, true);
                echo "\"></i>
        ";
            }
            // line 6
            echo "        ";
            if ( !twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 6, $this->source); })()))) {
                // line 7
                echo "            ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 7, $this->source); })())), "html", null, true);
                echo "
        ";
            }
            // line 9
            echo "    </a>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 12
    public function macro_show($__url__ = null, $__message__ = null, $__id__ = null, $__class__ = null, $__labeled__ = true, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "url" => $__url__,
            "message" => $__message__,
            "id" => $__id__,
            "class" => $__class__,
            "labeled" => $__labeled__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "show"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "show"));

            // line 13
            echo "    ";
            $macros["buttons"] = $this;
            // line 14
            echo "
    ";
            // line 15
            if ((twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 15, $this->source); })())) && (isset($context["labeled"]) || array_key_exists("labeled", $context) ? $context["labeled"] : (function () { throw new RuntimeError('Variable "labeled" does not exist.', 15, $this->source); })()))) {
                // line 16
                echo "        ";
                $context["message"] = "sylius.ui.show";
                // line 17
                echo "    ";
            }
            // line 18
            echo "
    ";
            // line 19
            echo twig_call_macro($macros["buttons"], "macro_default", [(isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 19, $this->source); })()), (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 19, $this->source); })()), (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 19, $this->source); })()), "search"], 19, $context, $this->getSourceContext());
            echo "
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 22
    public function macro_create($__url__ = null, $__message__ = null, $__id__ = null, $__labeled__ = true, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "url" => $__url__,
            "message" => $__message__,
            "id" => $__id__,
            "labeled" => $__labeled__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "create"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "create"));

            // line 23
            echo "    ";
            $macros["buttons"] = $this;
            // line 24
            echo "
    ";
            // line 25
            if ((twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 25, $this->source); })())) && (isset($context["labeled"]) || array_key_exists("labeled", $context) ? $context["labeled"] : (function () { throw new RuntimeError('Variable "labeled" does not exist.', 25, $this->source); })()))) {
                // line 26
                echo "        ";
                $context["message"] = "sylius.ui.create";
                // line 27
                echo "    ";
            }
            // line 28
            echo "
    ";
            // line 29
            echo twig_call_macro($macros["buttons"], "macro_default", [(isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 29, $this->source); })()), (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 29, $this->source); })()), (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 29, $this->source); })()), "plus", "primary"], 29, $context, $this->getSourceContext());
            echo "
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 32
    public function macro_edit($__url__ = null, $__message__ = null, $__id__ = null, $__labeled__ = true, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "url" => $__url__,
            "message" => $__message__,
            "id" => $__id__,
            "labeled" => $__labeled__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "edit"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "edit"));

            // line 33
            echo "    ";
            $macros["buttons"] = $this;
            // line 34
            echo "
    ";
            // line 35
            if ((twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 35, $this->source); })())) && (isset($context["labeled"]) || array_key_exists("labeled", $context) ? $context["labeled"] : (function () { throw new RuntimeError('Variable "labeled" does not exist.', 35, $this->source); })()))) {
                // line 36
                echo "        ";
                $context["message"] = "sylius.ui.edit";
                // line 37
                echo "    ";
            }
            // line 38
            echo "
    ";
            // line 39
            echo twig_call_macro($macros["buttons"], "macro_default", [(isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 39, $this->source); })()), (isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 39, $this->source); })()), (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 39, $this->source); })()), "pencil"], 39, $context, $this->getSourceContext());
            echo "
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 42
    public function macro_filter($__message__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "message" => $__message__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "filter"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "filter"));

            // line 43
            echo "    <button class=\"ui blue labeled icon button\" type=\"submit\">
        <i class=\"icon search\"></i> ";
            // line 44
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(((twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 44, $this->source); })()))) ? ("sylius.ui.filter") : ((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 44, $this->source); })())))), "html", null, true);
            echo "
    </button>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 48
    public function macro_resetFilters($__url__ = null, $__message__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "url" => $__url__,
            "message" => $__message__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "resetFilters"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "resetFilters"));

            // line 49
            echo "    <a class=\"ui labeled icon button\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 49, $this->source); })()), "html", null, true);
            echo "\">
        <i class=\"icon remove\"></i> ";
            // line 50
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(((twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 50, $this->source); })()))) ? ("sylius.ui.clear_filters") : ((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 50, $this->source); })())))), "html", null, true);
            echo "
    </a>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 54
    public function macro_delete($__url__ = null, $__message__ = null, $__labeled__ = true, $__resourceId__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "url" => $__url__,
            "message" => $__message__,
            "labeled" => $__labeled__,
            "resourceId" => $__resourceId__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "delete"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "delete"));

            // line 55
            echo "    <form action=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 55, $this->source); })()), "html", null, true);
            echo "\" method=\"post\">
        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
        <button class=\"ui red ";
            // line 57
            if ((isset($context["labeled"]) || array_key_exists("labeled", $context) ? $context["labeled"] : (function () { throw new RuntimeError('Variable "labeled" does not exist.', 57, $this->source); })())) {
                echo "labeled ";
            }
            echo "icon button\" type=\"submit\" data-requires-confirmation ";
            echo $this->env->getFunction('sylius_test_html_attribute')->getCallable()("delete-button");
            echo ">
            <i class=\"icon trash\"></i> ";
            // line 58
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((((twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 58, $this->source); })())) && (isset($context["labeled"]) || array_key_exists("labeled", $context) ? $context["labeled"] : (function () { throw new RuntimeError('Variable "labeled" does not exist.', 58, $this->source); })()))) ? ("sylius.ui.delete") : ((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 58, $this->source); })())))), "html", null, true);
            echo "
        </button>
        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken((isset($context["resourceId"]) || array_key_exists("resourceId", $context) ? $context["resourceId"] : (function () { throw new RuntimeError('Variable "resourceId" does not exist.', 60, $this->source); })())), "html", null, true);
            echo "\" />
    </form>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 64
    public function macro_bulkDelete($__url__ = null, $__message__ = null, $__labeled__ = true, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "url" => $__url__,
            "message" => $__message__,
            "labeled" => $__labeled__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "bulkDelete"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "bulkDelete"));

            // line 65
            echo "    <form action=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 65, $this->source); })()), "html", null, true);
            echo "\" method=\"post\">
        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
        <button class=\"ui red ";
            // line 67
            if ((isset($context["labeled"]) || array_key_exists("labeled", $context) ? $context["labeled"] : (function () { throw new RuntimeError('Variable "labeled" does not exist.', 67, $this->source); })())) {
                echo "labeled ";
            }
            echo "icon button\" type=\"submit\" data-bulk-action-requires-confirmation disabled>
            <i class=\"icon trash\"></i> ";
            // line 68
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((((twig_test_empty((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 68, $this->source); })())) && (isset($context["labeled"]) || array_key_exists("labeled", $context) ? $context["labeled"] : (function () { throw new RuntimeError('Variable "labeled" does not exist.', 68, $this->source); })()))) ? ("sylius.ui.delete") : ((isset($context["message"]) || array_key_exists("message", $context) ? $context["message"] : (function () { throw new RuntimeError('Variable "message" does not exist.', 68, $this->source); })())))), "html", null, true);
            echo "
        </button>
        <input type=\"hidden\" name=\"_csrf_token\" value=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("bulk_delete"), "html", null, true);
            echo "\" />
    </form>
";
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@SyliusUi/Macro/buttons.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  503 => 70,  498 => 68,  492 => 67,  486 => 65,  465 => 64,  447 => 60,  442 => 58,  434 => 57,  428 => 55,  406 => 54,  388 => 50,  383 => 49,  363 => 48,  345 => 44,  342 => 43,  323 => 42,  306 => 39,  303 => 38,  300 => 37,  297 => 36,  295 => 35,  292 => 34,  289 => 33,  267 => 32,  250 => 29,  247 => 28,  244 => 27,  241 => 26,  239 => 25,  236 => 24,  233 => 23,  211 => 22,  194 => 19,  191 => 18,  188 => 17,  185 => 16,  183 => 15,  180 => 14,  177 => 13,  154 => 12,  138 => 9,  132 => 7,  129 => 6,  123 => 4,  121 => 3,  95 => 2,  72 => 1,  61 => 63,  58 => 53,  55 => 47,  52 => 41,  49 => 31,  46 => 21,  43 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("{% macro default(url, message, id, icon, class) %}
    <a class=\"ui {% if message is not empty %}labeled {% endif %}{% if icon is not empty %}icon {% endif %}button {% if class is not empty %} {{ class }} {% endif %}\" {% if id is not null %} id=\"{{ id }}\"{% endif %} href=\"{{ url }}\" {{ sylius_test_html_attribute('button', id|default(message)) }}>
        {% if icon is not empty %}
            <i class=\"icon {{ icon }}\"></i>
        {% endif %}
        {% if message is not empty %}
            {{ message|trans }}
        {% endif %}
    </a>
{% endmacro %}

{% macro show(url, message, id, class, labeled = true) %}
    {% import _self as buttons %}

    {% if message is empty and labeled %}
        {% set message = 'sylius.ui.show' %}
    {% endif %}

    {{ buttons.default(url, message, id, 'search') }}
{% endmacro %}

{% macro create(url, message, id, labeled = true) %}
    {% import _self as buttons %}

    {% if message is empty and labeled %}
        {% set message = 'sylius.ui.create' %}
    {% endif %}

    {{ buttons.default(url, message, id, 'plus', 'primary') }}
{% endmacro %}

{% macro edit(url, message, id, labeled = true) %}
    {% import _self as buttons %}

    {% if message is empty and labeled %}
        {% set message = 'sylius.ui.edit' %}
    {% endif %}

    {{ buttons.default(url, message, id, 'pencil') }}
{% endmacro %}

{% macro filter(message) %}
    <button class=\"ui blue labeled icon button\" type=\"submit\">
        <i class=\"icon search\"></i> {{ (message is empty ? 'sylius.ui.filter' : message)|trans }}
    </button>
{% endmacro %}

{% macro resetFilters(url, message) %}
    <a class=\"ui labeled icon button\" href=\"{{ url }}\">
        <i class=\"icon remove\"></i> {{ (message is empty ? 'sylius.ui.clear_filters' : message)|trans }}
    </a>
{% endmacro %}

{% macro delete(url, message, labeled = true, resourceId = null) %}
    <form action=\"{{ url }}\" method=\"post\">
        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
        <button class=\"ui red {% if labeled %}labeled {% endif %}icon button\" type=\"submit\" data-requires-confirmation {{ sylius_test_html_attribute('delete-button') }}>
            <i class=\"icon trash\"></i> {{ ((message is empty and labeled) ? 'sylius.ui.delete' : message)|trans }}
        </button>
        <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token(resourceId) }}\" />
    </form>
{% endmacro %}

{% macro bulkDelete(url, message, labeled = true) %}
    <form action=\"{{ url }}\" method=\"post\">
        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
        <button class=\"ui red {% if labeled %}labeled {% endif %}icon button\" type=\"submit\" data-bulk-action-requires-confirmation disabled>
            <i class=\"icon trash\"></i> {{ ((message is empty and labeled) ? 'sylius.ui.delete' : message)|trans }}
        </button>
        <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('bulk_delete') }}\" />
    </form>
{% endmacro %}
", "@SyliusUi/Macro/buttons.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Macro/buttons.html.twig");
    }
}
