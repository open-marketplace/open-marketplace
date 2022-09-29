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

/* @SyliusUi/Form/imagesTheme.html.twig */
class __TwigTemplate_fcb6cf6d53d18d03e39df6cd55d501625ca428bcc0758acfd9a81d4660d0b799 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'collection_widget' => [$this, 'block_collection_widget'],
            'sylius_product_image_widget' => [$this, 'block_sylius_product_image_widget'],
            'sylius_taxon_image_widget' => [$this, 'block_sylius_taxon_image_widget'],
            'sylius_avatar_image_widget' => [$this, 'block_sylius_avatar_image_widget'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@SyliusUi/Form/theme.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Form/imagesTheme.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Form/imagesTheme.html.twig"));

        $this->parent = $this->loadTemplate("@SyliusUi/Form/theme.html.twig", "@SyliusUi/Form/imagesTheme.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_collection_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "collection_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "collection_widget"));

        // line 4
        $macros["__internal_parse_1"] = $this->loadTemplate("@SyliusResource/Macros/notification.html.twig", "@SyliusUi/Form/imagesTheme.html.twig", 4)->unwrap();
        // line 5
        echo "    ";
        $macros["self"] = $this;
        // line 6
        echo "    ";
        $context["attr"] = twig_array_merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 6, $this->source); })()), ["class" => (((twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 6)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", false, false, false, 6))) : ("")) . " controls collection-widget")]);
        // line 7
        echo "
    ";
        // line 8
        ob_start();
        // line 9
        echo "        <div data-form-type=\"collection\" ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo "
            ";
        // line 10
        if ((array_key_exists("prototype", $context) && (isset($context["allow_add"]) || array_key_exists("allow_add", $context) ? $context["allow_add"] : (function () { throw new RuntimeError('Variable "allow_add" does not exist.', 10, $this->source); })()))) {
            // line 11
            echo "                data-prototype='";
            echo twig_escape_filter($this->env, twig_call_macro($macros["self"], "macro_collection_item", [(isset($context["prototype"]) || array_key_exists("prototype", $context) ? $context["prototype"] : (function () { throw new RuntimeError('Variable "prototype" does not exist.', 11, $this->source); })()), (isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 11, $this->source); })()), (isset($context["button_delete_label"]) || array_key_exists("button_delete_label", $context) ? $context["button_delete_label"] : (function () { throw new RuntimeError('Variable "button_delete_label" does not exist.', 11, $this->source); })()), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["prototype"]) || array_key_exists("prototype", $context) ? $context["prototype"] : (function () { throw new RuntimeError('Variable "prototype" does not exist.', 11, $this->source); })()), "vars", [], "any", false, false, false, 11), "name", [], "any", false, false, false, 11)], 11, $context, $this->getSourceContext()));
            echo "'
                data-prototype-name='";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["prototype"]) || array_key_exists("prototype", $context) ? $context["prototype"] : (function () { throw new RuntimeError('Variable "prototype" does not exist.', 12, $this->source); })()), "vars", [], "any", false, false, false, 12), "name", [], "any", false, false, false, 12), "html", null, true);
            echo "'";
        }
        // line 14
        echo ">
            ";
        // line 15
        echo twig_call_macro($macros["__internal_parse_1"], "macro_error", [twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 15, $this->source); })()), "vars", [], "any", false, false, false, 15), "errors", [], "any", false, false, false, 15)], 15, $context, $this->getSourceContext());
        echo "

            ";
        // line 17
        if (twig_test_iterable(((array_key_exists("prototypes", $context)) ? (_twig_default_filter((isset($context["prototypes"]) || array_key_exists("prototypes", $context) ? $context["prototypes"] : (function () { throw new RuntimeError('Variable "prototypes" does not exist.', 17, $this->source); })()))) : ("")))) {
            // line 18
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["prototypes"]) || array_key_exists("prototypes", $context) ? $context["prototypes"] : (function () { throw new RuntimeError('Variable "prototypes" does not exist.', 18, $this->source); })()));
            foreach ($context['_seq'] as $context["key"] => $context["subPrototype"]) {
                // line 19
                echo "                    <input type=\"hidden\" data-form-prototype=\"";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\"
                           value=\"";
                // line 20
                echo twig_escape_filter($this->env, twig_call_macro($macros["self"], "macro_collection_item", [$context["subPrototype"], (isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 20, $this->source); })()), (isset($context["button_delete_label"]) || array_key_exists("button_delete_label", $context) ? $context["button_delete_label"] : (function () { throw new RuntimeError('Variable "button_delete_label" does not exist.', 20, $this->source); })()), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["subPrototype"], "vars", [], "any", false, false, false, 20), "name", [], "any", false, false, false, 20)], 20, $context, $this->getSourceContext()));
                echo "\"
                           data-subprototype-name=\"";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["subPrototype"], "vars", [], "any", false, false, false, 21), "name", [], "any", false, false, false, 21), "html", null, true);
                echo "\"
                    />
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['subPrototype'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "            ";
        }
        // line 25
        echo "
            <div data-form-collection=\"list\" class=\"ui three column stackable grid\">
                ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 27, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 28
            echo "                    ";
            echo twig_call_macro($macros["self"], "macro_collection_item", [$context["child"], (isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 28, $this->source); })()), (isset($context["button_delete_label"]) || array_key_exists("button_delete_label", $context) ? $context["button_delete_label"] : (function () { throw new RuntimeError('Variable "button_delete_label" does not exist.', 28, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 28)], 28, $context, $this->getSourceContext());
            echo "
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "            </div>

            ";
        // line 32
        if ((array_key_exists("prototype", $context) && (isset($context["allow_add"]) || array_key_exists("allow_add", $context) ? $context["allow_add"] : (function () { throw new RuntimeError('Variable "allow_add" does not exist.', 32, $this->source); })()))) {
            // line 33
            echo "                <a href=\"#\" class=\"ui labeled icon button\" data-form-collection=\"add\">
                    <i class=\"plus square outline icon\"></i>
                    ";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["button_add_label"]) || array_key_exists("button_add_label", $context) ? $context["button_add_label"] : (function () { throw new RuntimeError('Variable "button_add_label" does not exist.', 35, $this->source); })())), "html", null, true);
            echo "
                </a>
            ";
        }
        // line 38
        echo "        </div>
    ";
        $___internal_parse_2_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 8
        echo twig_spaceless($___internal_parse_2_);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 58
    public function block_sylius_product_image_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sylius_product_image_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sylius_product_image_widget"));

        // line 59
        echo "    ";
        ob_start();
        // line 60
        echo "        ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 60, $this->source); })()), "type", [], "any", false, false, false, 60), 'row');
        echo "
        <label for=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 61, $this->source); })()), "file", [], "any", false, false, false, 61), "vars", [], "any", false, false, false, 61), "id", [], "any", false, false, false, 61), "html", null, true);
        echo "\" class=\"ui icon labeled button\"><i class=\"cloud upload icon\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.choose_file"), "html", null, true);
        echo "</label>
        ";
        // line 62
        if ( !(null === ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 62), "value", [], "any", false, true, false, 62), "path", [], "any", true, true, false, 62)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 62), "value", [], "any", false, true, false, 62), "path", [], "any", false, false, false, 62), null)) : (null)))) {
            // line 63
            echo "            <img class=\"ui small bordered image\" src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "vars", [], "any", false, false, false, 63), "value", [], "any", false, false, false, 63), "path", [], "any", false, false, false, 63), "sylius_small"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "vars", [], "any", false, false, false, 63), "value", [], "any", false, false, false, 63), "type", [], "any", false, false, false, 63), "html", null, true);
            echo "\" />
        ";
        }
        // line 65
        echo "        <div class=\"ui hidden element\">
            ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "file", [], "any", false, false, false, 66), 'widget');
        echo "
        </div>
        <div class=\"ui element\">";
        // line 69
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "file", [], "any", false, false, false, 69), 'errors');
        // line 70
        echo "</div>
        ";
        // line 71
        if ((( !(null === twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 71, $this->source); })()), "id", [], "any", false, false, false, 71)) && (0 != twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 71, $this->source); })()), "variants", [], "any", false, false, false, 71)))) &&  !twig_get_attribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 71, $this->source); })()), "simple", [], "any", false, false, false, 71))) {
            // line 72
            echo "            ";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "productVariants", [], "any", false, false, false, 72), 'row');
            echo "
        ";
        }
        // line 74
        echo "    ";
        $___internal_parse_4_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 59
        echo twig_spaceless($___internal_parse_4_);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 77
    public function block_sylius_taxon_image_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sylius_taxon_image_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sylius_taxon_image_widget"));

        // line 78
        echo "    ";
        ob_start();
        // line 79
        echo "        ";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "type", [], "any", false, false, false, 79), 'row');
        echo "
        ";
        // line 80
        if ((null === ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 80), "value", [], "any", false, true, false, 80), "path", [], "any", true, true, false, 80)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 80), "value", [], "any", false, true, false, 80), "path", [], "any", false, false, false, 80), null)) : (null)))) {
            // line 81
            echo "            <label for=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "file", [], "any", false, false, false, 81), "vars", [], "any", false, false, false, 81), "id", [], "any", false, false, false, 81), "html", null, true);
            echo "\" class=\"ui icon labeled button\"><i class=\"cloud upload icon\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.choose_file"), "html", null, true);
            echo "</label>
        ";
        } else {
            // line 83
            echo "            <img class=\"ui small bordered image\" src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "vars", [], "any", false, false, false, 83), "value", [], "any", false, false, false, 83), "path", [], "any", false, false, false, 83), "sylius_small"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "vars", [], "any", false, false, false, 83), "value", [], "any", false, false, false, 83), "type", [], "any", false, false, false, 83), "html", null, true);
            echo "\" />
            <label for=\"";
            // line 84
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "file", [], "any", false, false, false, 84), "vars", [], "any", false, false, false, 84), "id", [], "any", false, false, false, 84), "html", null, true);
            echo "\" class=\"ui icon labeled button\"><i class=\"cloud upload icon\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.change_file"), "html", null, true);
            echo "</label>
        ";
        }
        // line 86
        echo "        <div class=\"ui hidden element\">
            ";
        // line 87
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 87, $this->source); })()), "file", [], "any", false, false, false, 87), 'widget');
        echo "
        </div>
        <div class=\"ui element\">";
        // line 90
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 90, $this->source); })()), "file", [], "any", false, false, false, 90), 'errors');
        // line 91
        echo "</div>
    ";
        $___internal_parse_5_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 78
        echo twig_spaceless($___internal_parse_5_);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 95
    public function block_sylius_avatar_image_widget($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sylius_avatar_image_widget"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sylius_avatar_image_widget"));

        // line 96
        echo "    ";
        ob_start();
        // line 97
        echo "        ";
        if ( !(null === ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 97), "value", [], "any", false, true, false, 97), "path", [], "any", true, true, false, 97)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 97), "value", [], "any", false, true, false, 97), "path", [], "any", false, false, false, 97), null)) : (null)))) {
            // line 98
            echo "            <img class=\"ui small bordered image\" src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Sylius\Bundle\CoreBundle\Twig\FilterExtension']->filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 98, $this->source); })()), "vars", [], "any", false, false, false, 98), "value", [], "any", false, false, false, 98), "path", [], "any", false, false, false, 98), "sylius_small"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 98, $this->source); })()), "vars", [], "any", false, false, false, 98), "value", [], "any", false, false, false, 98), "type", [], "any", false, false, false, 98), "html", null, true);
            echo "\" />
        ";
        }
        // line 100
        echo "        <div class=\"ui hidden element\">
            ";
        // line 101
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 101, $this->source); })()), "file", [], "any", false, false, false, 101), 'widget');
        echo "
        </div>
        <div style=\"margin-top: 10px\" >
            <label for=\"";
        // line 104
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 104, $this->source); })()), "file", [], "any", false, false, false, 104), "vars", [], "any", false, false, false, 104), "id", [], "any", false, false, false, 104), "html", null, true);
        echo "\" class=\"ui icon labeled button\"><i class=\"cloud upload icon\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("sylius.ui.choose_file"), "html", null, true);
        echo "</label>
        </div>
        <div class=\"ui element\">";
        // line 107
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 107, $this->source); })()), "file", [], "any", false, false, false, 107), 'errors');
        // line 108
        echo "</div>
    ";
        $___internal_parse_6_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 96
        echo twig_spaceless($___internal_parse_6_);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 42
    public function macro_collection_item($__form__ = null, $__allow_delete__ = null, $__button_delete_label__ = null, $__index__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "form" => $__form__,
            "allow_delete" => $__allow_delete__,
            "button_delete_label" => $__button_delete_label__,
            "index" => $__index__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "collection_item"));

            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "collection_item"));

            // line 43
            echo "    ";
            ob_start();
            // line 44
            echo "        <div data-form-collection=\"item\" data-form-collection-index=\"";
            echo twig_escape_filter($this->env, (isset($context["index"]) || array_key_exists("index", $context) ? $context["index"] : (function () { throw new RuntimeError('Variable "index" does not exist.', 44, $this->source); })()), "html", null, true);
            echo "\" class=\"column\">
            <div class=\"ui box segment\">
                ";
            // line 46
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), 'widget');
            echo "
            </div>
            ";
            // line 48
            if ((isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 48, $this->source); })())) {
                // line 49
                echo "                <a href=\"#\" data-form-collection=\"delete\" class=\"ui red labeled icon button\" style=\"margin-bottom: 1em;\">
                    <i class=\"trash icon\"></i>
                    ";
                // line 51
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["button_delete_label"]) || array_key_exists("button_delete_label", $context) ? $context["button_delete_label"] : (function () { throw new RuntimeError('Variable "button_delete_label" does not exist.', 51, $this->source); })())), "html", null, true);
                echo "
                </a>
            ";
            }
            // line 54
            echo "        </div>
    ";
            $___internal_parse_3_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 43
            echo twig_spaceless($___internal_parse_3_);
            
            $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

            
            $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);


            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@SyliusUi/Form/imagesTheme.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  446 => 43,  442 => 54,  436 => 51,  432 => 49,  430 => 48,  425 => 46,  419 => 44,  416 => 43,  394 => 42,  384 => 96,  380 => 108,  378 => 107,  371 => 104,  365 => 101,  362 => 100,  354 => 98,  351 => 97,  348 => 96,  338 => 95,  328 => 78,  324 => 91,  322 => 90,  317 => 87,  314 => 86,  307 => 84,  300 => 83,  292 => 81,  290 => 80,  285 => 79,  282 => 78,  272 => 77,  262 => 59,  259 => 74,  253 => 72,  251 => 71,  248 => 70,  246 => 69,  241 => 66,  238 => 65,  230 => 63,  228 => 62,  222 => 61,  217 => 60,  214 => 59,  204 => 58,  194 => 8,  190 => 38,  184 => 35,  180 => 33,  178 => 32,  174 => 30,  157 => 28,  140 => 27,  136 => 25,  133 => 24,  124 => 21,  120 => 20,  115 => 19,  110 => 18,  108 => 17,  103 => 15,  100 => 14,  96 => 12,  91 => 11,  89 => 10,  84 => 9,  82 => 8,  79 => 7,  76 => 6,  73 => 5,  71 => 4,  61 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@SyliusUi/Form/theme.html.twig' %}

{% block collection_widget -%}
    {% from '@SyliusResource/Macros/notification.html.twig' import error %}
    {% import _self as self %}
    {% set attr = attr|merge({'class': attr.class|default ~ ' controls collection-widget'}) %}

    {% apply spaceless %}
        <div data-form-type=\"collection\" {{ block('widget_container_attributes') }}
            {% if prototype is defined and allow_add %}
                data-prototype='{{ self.collection_item(prototype, allow_delete, button_delete_label, prototype.vars.name)|e }}'
                data-prototype-name='{{ prototype.vars.name }}'
            {%- endif -%}
        >
            {{ error(form.vars.errors) }}

            {% if prototypes|default is iterable %}
                {% for key, subPrototype in prototypes %}
                    <input type=\"hidden\" data-form-prototype=\"{{ key }}\"
                           value=\"{{ self.collection_item(subPrototype, allow_delete, button_delete_label, subPrototype.vars.name)|e }}\"
                           data-subprototype-name=\"{{ subPrototype.vars.name }}\"
                    />
                {% endfor %}
            {% endif %}

            <div data-form-collection=\"list\" class=\"ui three column stackable grid\">
                {% for child in form %}
                    {{ self.collection_item(child, allow_delete, button_delete_label, loop.index0) }}
                {% endfor %}
            </div>

            {% if prototype is defined and allow_add %}
                <a href=\"#\" class=\"ui labeled icon button\" data-form-collection=\"add\">
                    <i class=\"plus square outline icon\"></i>
                    {{ button_add_label|trans }}
                </a>
            {% endif %}
        </div>
    {% endapply %}
{%- endblock collection_widget %}

{% macro collection_item(form, allow_delete, button_delete_label, index) %}
    {% apply spaceless %}
        <div data-form-collection=\"item\" data-form-collection-index=\"{{ index }}\" class=\"column\">
            <div class=\"ui box segment\">
                {{ form_widget(form) }}
            </div>
            {% if allow_delete %}
                <a href=\"#\" data-form-collection=\"delete\" class=\"ui red labeled icon button\" style=\"margin-bottom: 1em;\">
                    <i class=\"trash icon\"></i>
                    {{ button_delete_label|trans }}
                </a>
            {% endif %}
        </div>
    {% endapply %}
{% endmacro %}

{% block sylius_product_image_widget %}
    {% apply spaceless %}
        {{ form_row(form.type) }}
        <label for=\"{{ form.file.vars.id }}\" class=\"ui icon labeled button\"><i class=\"cloud upload icon\"></i> {{ 'sylius.ui.choose_file'|trans }}</label>
        {% if form.vars.value.path|default(null) is not null %}
            <img class=\"ui small bordered image\" src=\"{{ form.vars.value.path|imagine_filter('sylius_small') }}\" alt=\"{{ form.vars.value.type }}\" />
        {% endif %}
        <div class=\"ui hidden element\">
            {{ form_widget(form.file) }}
        </div>
        <div class=\"ui element\">
            {{- form_errors(form.file) -}}
        </div>
        {% if product.id is not null and 0 != product.variants|length and not product.simple %}
            {{ form_row(form.productVariants) }}
        {% endif %}
    {% endapply %}
{% endblock %}

{% block sylius_taxon_image_widget %}
    {% apply spaceless %}
        {{ form_row(form.type) }}
        {% if form.vars.value.path|default(null) is null %}
            <label for=\"{{ form.file.vars.id }}\" class=\"ui icon labeled button\"><i class=\"cloud upload icon\"></i> {{ 'sylius.ui.choose_file'|trans }}</label>
        {% else %}
            <img class=\"ui small bordered image\" src=\"{{ form.vars.value.path|imagine_filter('sylius_small') }}\" alt=\"{{ form.vars.value.type }}\" />
            <label for=\"{{ form.file.vars.id }}\" class=\"ui icon labeled button\"><i class=\"cloud upload icon\"></i> {{ 'sylius.ui.change_file'|trans }}</label>
        {% endif %}
        <div class=\"ui hidden element\">
            {{ form_widget(form.file) }}
        </div>
        <div class=\"ui element\">
            {{- form_errors(form.file) -}}
        </div>
    {% endapply %}
{% endblock %}

{% block sylius_avatar_image_widget %}
    {% apply spaceless %}
        {% if form.vars.value.path|default(null) is not null %}
            <img class=\"ui small bordered image\" src=\"{{ form.vars.value.path|imagine_filter('sylius_small') }}\" alt=\"{{ form.vars.value.type }}\" />
        {% endif %}
        <div class=\"ui hidden element\">
            {{ form_widget(form.file) }}
        </div>
        <div style=\"margin-top: 10px\" >
            <label for=\"{{ form.file.vars.id }}\" class=\"ui icon labeled button\"><i class=\"cloud upload icon\"></i> {{ 'sylius.ui.choose_file'|trans }}</label>
        </div>
        <div class=\"ui element\">
            {{- form_errors(form.file) -}}
        </div>
    {% endapply %}
{% endblock %}
", "@SyliusUi/Form/imagesTheme.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Form/imagesTheme.html.twig");
    }
}
