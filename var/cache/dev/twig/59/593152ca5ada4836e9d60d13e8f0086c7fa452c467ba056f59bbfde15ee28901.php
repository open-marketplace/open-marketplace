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

/* @SyliusUi/Menu/top.html.twig */
class __TwigTemplate_ccaf48cfde17f73704cce9b2a6ca33d783061190cfdcb24d32704cc2d4ab294b extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'root' => [$this, 'block_root'],
            'items' => [$this, 'block_items'],
            'item' => [$this, 'block_item'],
            'link' => [$this, 'block_link'],
            'links' => [$this, 'block_links'],
            'transition' => [$this, 'block_transition'],
            'icon' => [$this, 'block_icon'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Menu/top.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@SyliusUi/Menu/top.html.twig"));

        // line 3
        $macros["buttons"] = $this->macros["buttons"] = $this->loadTemplate("@SyliusUi/Macro/buttons.html.twig", "@SyliusUi/Menu/top.html.twig", 3)->unwrap();
        // line 1
        $this->parent = $this->loadTemplate("knp_menu.html.twig", "@SyliusUi/Menu/top.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_root($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "root"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "root"));

        // line 6
        echo "    ";
        $context["id"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 6, $this->source); })()), "extra", [0 => "column_id"], "method", false, false, false, 6);
        // line 7
        echo "
    <div class=\"six wide right aligned column\"";
        // line 8
        if ((isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 8, $this->source); })())) {
            echo " id=\"";
            echo twig_escape_filter($this->env, (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 8, $this->source); })()), "html", null, true);
            echo "\"";
        }
        echo ">
        ";
        // line 9
        $this->displayBlock("items", $context, $blocks);
        echo "
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 13
    public function block_items($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "items"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "items"));

        // line 14
        echo "    <div class=\"ui buttons\">
        ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, false, 15));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 16
            echo "            ";
            $this->displayBlock("item", $context, $blocks);
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 21
    public function block_item($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "item"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "item"));

        // line 22
        echo "    ";
        if (("edit" == twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 22, $this->source); })()), "attribute", [0 => "type"], "method", false, false, false, 22))) {
            // line 23
            echo "        ";
            echo twig_call_macro($macros["buttons"], "macro_edit", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 23, $this->source); })()), "uri", [], "any", false, false, false, 23), twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 23, $this->source); })()), "label", [], "any", false, false, false, 23)], 23, $context, $this->getSourceContext());
            echo "
    ";
        } elseif (("show" == twig_get_attribute($this->env, $this->source,         // line 24
(isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 24, $this->source); })()), "attribute", [0 => "type"], "method", false, false, false, 24))) {
            // line 25
            echo "        ";
            echo twig_call_macro($macros["buttons"], "macro_show", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 25, $this->source); })()), "uri", [], "any", false, false, false, 25), twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 25, $this->source); })()), "label", [], "any", false, false, false, 25)], 25, $context, $this->getSourceContext());
            echo "
    ";
        } elseif (("delete" == twig_get_attribute($this->env, $this->source,         // line 26
(isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 26, $this->source); })()), "attribute", [0 => "type"], "method", false, false, false, 26))) {
            // line 27
            echo "        ";
            echo twig_call_macro($macros["buttons"], "macro_delete", [twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 27, $this->source); })()), "uri", [], "any", false, false, false, 27), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 27, $this->source); })()), "label", [], "any", false, false, false, 27)), true, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 27, $this->source); })()), "attribute", [0 => "resource_id"], "method", false, false, false, 27)], 27, $context, $this->getSourceContext());
            echo "
    ";
        } elseif (("transition" == twig_get_attribute($this->env, $this->source,         // line 28
(isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 28, $this->source); })()), "attribute", [0 => "type"], "method", false, false, false, 28))) {
            // line 29
            echo "        ";
            $this->displayBlock("transition", $context, $blocks);
            echo "
    ";
        } elseif (("links" == twig_get_attribute($this->env, $this->source,         // line 30
(isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 30, $this->source); })()), "attribute", [0 => "type"], "method", false, false, false, 30))) {
            // line 31
            echo "        ";
            $this->displayBlock("links", $context, $blocks);
            echo "
    ";
        } else {
            // line 33
            echo "        ";
            $this->displayBlock("link", $context, $blocks);
            echo "
    ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 37
    public function block_link($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "link"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "link"));

        // line 38
        echo "    ";
        $context["color"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 38, $this->source); })()), "labelAttribute", [0 => "color"], "method", false, false, false, 38);
        // line 39
        echo "
    <a href=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 40, $this->source); })()), "uri", [], "any", false, false, false, 40), "html", null, true);
        echo "\" class=\"ui ";
        if ((isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 40, $this->source); })())) {
            echo twig_escape_filter($this->env, (isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 40, $this->source); })()), "html", null, true);
            echo " ";
        }
        echo "labeled icon button\">
        ";
        // line 41
        $this->displayBlock("icon", $context, $blocks);
        echo "
        ";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 42, $this->source); })()), "label", [], "any", false, false, false, 42)), "html", null, true);
        echo "
    </a>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 46
    public function block_links($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "links"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "links"));

        // line 47
        echo "    ";
        $context["color"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 47, $this->source); })()), "labelAttribute", [0 => "color"], "method", false, false, false, 47);
        // line 48
        echo "    ";
        $context["icon"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 48, $this->source); })()), "labelAttribute", [0 => "icon"], "method", false, false, false, 48);
        // line 49
        echo "
    <div class=\"ui";
        // line 50
        if ((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 50, $this->source); })())) {
            echo " labeled icon";
        }
        echo " floating dropdown ";
        if ((isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 50, $this->source); })())) {
            echo twig_escape_filter($this->env, (isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 50, $this->source); })()), "html", null, true);
            echo " ";
        }
        echo "link button\">
        ";
        // line 51
        if ((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 51, $this->source); })())) {
            echo "<i class=\"";
            echo twig_escape_filter($this->env, (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 51, $this->source); })()), "html", null, true);
            echo " icon\"></i>";
        }
        // line 52
        echo "        <span class=\"text\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 52, $this->source); })()), "label", [], "any", false, false, false, 52)), "html", null, true);
        echo "</span>
        <div class=\"menu\">
            ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 54, $this->source); })()), "children", [], "any", false, false, false, 54));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 55
            echo "                ";
            $context["icon"] = twig_get_attribute($this->env, $this->source, $context["child"], "labelAttribute", [0 => "icon"], "method", false, false, false, 55);
            // line 56
            echo "
                <a href=\"";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["child"], "uri", [], "any", false, false, false, 57), "html", null, true);
            echo "\" class=\"item\">
                    ";
            // line 58
            if ((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 58, $this->source); })())) {
                echo "<i class=\"icon ";
                echo twig_escape_filter($this->env, (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 58, $this->source); })()), "html", null, true);
                echo "\"></i> ";
            }
            // line 59
            echo "                    ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["child"], "label", [], "any", false, false, false, 59)), "html", null, true);
            echo "
                </a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 66
    public function block_transition($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "transition"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "transition"));

        // line 67
        echo "    ";
        $context["color"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 67, $this->source); })()), "labelAttribute", [0 => "color"], "method", false, false, false, 67);
        // line 68
        echo "
    <form action=\"";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 69, $this->source); })()), "uri", [], "any", false, false, false, 69), "html", null, true);
        echo "\" method=\"post\" style=\"float: right;\">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\">
        <button class=\"ui ";
        // line 71
        if ((isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 71, $this->source); })())) {
            echo twig_escape_filter($this->env, (isset($context["color"]) || array_key_exists("color", $context) ? $context["color"] : (function () { throw new RuntimeError('Variable "color" does not exist.', 71, $this->source); })()), "html", null, true);
            echo " ";
        }
        echo "labeled icon ";
        if ( !((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "attribute", [0 => "confirmation"], "method", true, true, false, 71)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "attribute", [0 => "confirmation"], "method", false, false, false, 71), false)) : (false))) {
            echo "loadable";
        }
        echo " button\" type=\"submit\" ";
        if (((twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "attribute", [0 => "confirmation"], "method", true, true, false, 71)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "attribute", [0 => "confirmation"], "method", false, false, false, 71), false)) : (false))) {
            echo "data-requires-confirmation";
        }
        echo ">
            ";
        // line 72
        $this->displayBlock("icon", $context, $blocks);
        echo "
            ";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 73, $this->source); })()), "label", [], "any", false, false, false, 73)), "html", null, true);
        echo "
        </button>
    </form>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 78
    public function block_icon($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "icon"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "icon"));

        // line 79
        echo "    ";
        $context["icon"] = twig_get_attribute($this->env, $this->source, (isset($context["item"]) || array_key_exists("item", $context) ? $context["item"] : (function () { throw new RuntimeError('Variable "item" does not exist.', 79, $this->source); })()), "labelAttribute", [0 => "icon"], "method", false, false, false, 79);
        // line 80
        echo "    ";
        if ((isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 80, $this->source); })())) {
            echo "<i class=\"icon ";
            echo twig_escape_filter($this->env, (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 80, $this->source); })()), "html", null, true);
            echo "\"></i> ";
        }
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@SyliusUi/Menu/top.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  416 => 80,  413 => 79,  403 => 78,  389 => 73,  385 => 72,  370 => 71,  365 => 69,  362 => 68,  359 => 67,  349 => 66,  337 => 62,  327 => 59,  321 => 58,  317 => 57,  314 => 56,  311 => 55,  307 => 54,  301 => 52,  295 => 51,  284 => 50,  281 => 49,  278 => 48,  275 => 47,  265 => 46,  252 => 42,  248 => 41,  239 => 40,  236 => 39,  233 => 38,  223 => 37,  209 => 33,  203 => 31,  201 => 30,  196 => 29,  194 => 28,  189 => 27,  187 => 26,  182 => 25,  180 => 24,  175 => 23,  172 => 22,  162 => 21,  151 => 18,  134 => 16,  117 => 15,  114 => 14,  104 => 13,  91 => 9,  83 => 8,  80 => 7,  77 => 6,  67 => 5,  56 => 1,  54 => 3,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'knp_menu.html.twig' %}

{% import '@SyliusUi/Macro/buttons.html.twig' as buttons %}

{% block root %}
    {% set id = item.extra('column_id') %}

    <div class=\"six wide right aligned column\"{% if id %} id=\"{{ id }}\"{% endif %}>
        {{ block('items') }}
    </div>
{% endblock %}

{% block items %}
    <div class=\"ui buttons\">
        {% for item in item.children %}
            {{ block('item') }}
        {% endfor %}
    </div>
{% endblock %}

{% block item %}
    {% if 'edit' == item.attribute('type') %}
        {{ buttons.edit(item.uri, item.label) }}
    {% elseif 'show' == item.attribute('type') %}
        {{ buttons.show(item.uri, item.label) }}
    {% elseif 'delete' == item.attribute('type') %}
        {{ buttons.delete(item.uri, item.label|trans, true, item.attribute('resource_id')) }}
    {% elseif 'transition' == item.attribute('type') %}
        {{ block('transition') }}
    {% elseif 'links' == item.attribute('type') %}
        {{ block('links') }}
    {% else %}
        {{ block('link') }}
    {% endif %}
{% endblock %}

{% block link %}
    {% set color = item.labelAttribute('color') %}

    <a href=\"{{ item.uri }}\" class=\"ui {% if color %}{{ color }} {% endif %}labeled icon button\">
        {{ block('icon') }}
        {{ item.label|trans }}
    </a>
{% endblock %}

{% block links %}
    {% set color = item.labelAttribute('color') %}
    {% set icon = item.labelAttribute('icon') %}

    <div class=\"ui{% if icon %} labeled icon{% endif %} floating dropdown {% if color %}{{ color }} {% endif %}link button\">
        {% if icon %}<i class=\"{{ icon }} icon\"></i>{% endif %}
        <span class=\"text\">{{ item.label|trans }}</span>
        <div class=\"menu\">
            {% for child in item.children %}
                {% set icon = child.labelAttribute('icon') %}

                <a href=\"{{ child.uri }}\" class=\"item\">
                    {% if icon %}<i class=\"icon {{ icon }}\"></i> {% endif %}
                    {{ child.label|trans }}
                </a>
            {% endfor %}
        </div>
    </div>
{% endblock %}

{% block transition %}
    {% set color = item.labelAttribute('color') %}

    <form action=\"{{ item.uri }}\" method=\"post\" style=\"float: right;\">
        <input type=\"hidden\" name=\"_method\" value=\"PUT\">
        <button class=\"ui {% if color %}{{ color }} {% endif %}labeled icon {% if not item.attribute('confirmation')|default(false) %}loadable{% endif %} button\" type=\"submit\" {% if item.attribute('confirmation')|default(false) %}data-requires-confirmation{% endif %}>
            {{ block('icon') }}
            {{ item.label|trans }}
        </button>
    </form>
{% endblock %}

{% block icon %}
    {% set icon = item.labelAttribute('icon') %}
    {% if icon %}<i class=\"icon {{ icon }}\"></i> {% endif %}
{% endblock %}
", "@SyliusUi/Menu/top.html.twig", "/home/raf/Pulpit/Praca/SyliusMultiVendorMarketplacePlugin/vendor/sylius/sylius/src/Sylius/Bundle/UiBundle/Resources/views/Menu/top.html.twig");
    }
}
