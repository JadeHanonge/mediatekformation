<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* macros.twig */
class __TwigTemplate_e10b5082e3077e44e28361a8fec36e53 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "
";
        // line 7
        yield "
";
        // line 11
        yield "
";
        // line 21
        yield "
";
        // line 27
        yield "
";
        // line 33
        yield "
";
        // line 49
        yield "
";
        // line 55
        yield "
";
        // line 69
        yield "
";
        // line 81
        yield "
";
        // line 93
        yield "
";
        // line 115
        yield "
";
        // line 127
        yield "
";
        // line 131
        yield "
";
        // line 147
        yield "
";
        // line 161
        yield "
";
        // line 167
        yield "
";
        yield from [];
    }

    // line 2
    public function macro_class_category_name($categoryId = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "categoryId" => $categoryId,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 3
            if (((isset($context["categoryId"]) || array_key_exists("categoryId", $context) ? $context["categoryId"] : (function () { throw new RuntimeError('Variable "categoryId" does not exist.', 3, $this->source); })()) == 1)) {
yield \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("class");
            }
            // line 4
            if (((isset($context["categoryId"]) || array_key_exists("categoryId", $context) ? $context["categoryId"] : (function () { throw new RuntimeError('Variable "categoryId" does not exist.', 4, $this->source); })()) == 2)) {
yield \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("interface");
            }
            // line 5
            if (((isset($context["categoryId"]) || array_key_exists("categoryId", $context) ? $context["categoryId"] : (function () { throw new RuntimeError('Variable "categoryId" does not exist.', 5, $this->source); })()) == 3)) {
yield \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("trait");
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 8
    public function macro_namespace_link($namespace = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "namespace" => $namespace,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 9
            yield "<a href=\"";
            yield $this->extensions['Doctum\Renderer\TwigExtension']->pathForNamespace($context, (isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 9, $this->source); })()));
            yield "\">";
            yield ((((isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 9, $this->source); })()) == "")) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Doctum\Tree::getGlobalNamespaceName(), "html", null, true)) : ((isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 9, $this->source); })())));
            yield "</a>";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 12
    public function macro_class_link($class = null, $absolute = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "class" => $class,
            "absolute" => $absolute,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 13
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 13, $this->source); })()), "isProjectClass", [], "method", false, false, false, 13)) {
                // line 14
                yield "<a href=\"";
                yield $this->extensions['Doctum\Renderer\TwigExtension']->pathForClass($context, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 14, $this->source); })()));
                yield "\">";
            } elseif (CoreExtension::getAttribute($this->env, $this->source,             // line 15
(isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 15, $this->source); })()), "isPhpClass", [], "method", false, false, false, 15)) {
                // line 16
                yield "<a target=\"_blank\" rel=\"noopener\" href=\"https://www.php.net/";
                yield (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 16, $this->source); })());
                yield "\">";
            }
            // line 18
            yield $this->env->getFunction('abbr_class')->getCallable()((isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 18, $this->source); })()), ((array_key_exists("absolute", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["absolute"]) || array_key_exists("absolute", $context) ? $context["absolute"] : (function () { throw new RuntimeError('Variable "absolute" does not exist.', 18, $this->source); })()), false)) : (false)));
            // line 19
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 19, $this->source); })()), "isProjectClass", [], "method", false, false, false, 19) || CoreExtension::getAttribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 19, $this->source); })()), "isPhpClass", [], "method", false, false, false, 19))) {
                yield "</a>";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 22
    public function macro_method_link($method = null, $absolute = null, $classonly = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "method" => $method,
            "absolute" => $absolute,
            "classonly" => $classonly,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 23
            yield "<a href=\"";
            yield $this->extensions['Doctum\Renderer\TwigExtension']->pathForMethod($context, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 23, $this->source); })()));
            yield "\">
";
            // line 24
            yield $this->env->getFunction('abbr_class')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 24, $this->source); })()), "class", [], "any", false, false, false, 24));
            if ( !((array_key_exists("classonly", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["classonly"]) || array_key_exists("classonly", $context) ? $context["classonly"] : (function () { throw new RuntimeError('Variable "classonly" does not exist.', 24, $this->source); })()), false)) : (false))) {
                yield "::";
                yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 24, $this->source); })()), "name", [], "any", false, false, false, 24);
            }
            // line 25
            yield "</a>";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 28
    public function macro_property_link($property = null, $absolute = null, $classonly = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "property" => $property,
            "absolute" => $absolute,
            "classonly" => $classonly,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 29
            yield "<a href=\"";
            yield $this->extensions['Doctum\Renderer\TwigExtension']->pathForProperty($context, (isset($context["property"]) || array_key_exists("property", $context) ? $context["property"] : (function () { throw new RuntimeError('Variable "property" does not exist.', 29, $this->source); })()));
            yield "\">
";
            // line 30
            yield $this->env->getFunction('abbr_class')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, (isset($context["property"]) || array_key_exists("property", $context) ? $context["property"] : (function () { throw new RuntimeError('Variable "property" does not exist.', 30, $this->source); })()), "class", [], "any", false, false, false, 30));
            if ( !((array_key_exists("classonly", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["classonly"]) || array_key_exists("classonly", $context) ? $context["classonly"] : (function () { throw new RuntimeError('Variable "classonly" does not exist.', 30, $this->source); })()), false)) : (false))) {
                yield "#";
                yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["property"]) || array_key_exists("property", $context) ? $context["property"] : (function () { throw new RuntimeError('Variable "property" does not exist.', 30, $this->source); })()), "name", [], "any", false, false, false, 30);
            }
            // line 31
            yield "</a>";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 34
    public function macro_hint_link($hints = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "hints" => $hints,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 35
            $macros["_v0"] = $this;
            // line 37
            if ((isset($context["hints"]) || array_key_exists("hints", $context) ? $context["hints"] : (function () { throw new RuntimeError('Variable "hints" does not exist.', 37, $this->source); })())) {
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["hints"]) || array_key_exists("hints", $context) ? $context["hints"] : (function () { throw new RuntimeError('Variable "hints" does not exist.', 38, $this->source); })()));
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
                foreach ($context['_seq'] as $context["_key"] => $context["hint"]) {
                    // line 39
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["hint"], "class", [], "any", false, false, false, 39)) {
                        // line 40
                        yield $macros["_v0"]->getTemplateForMacro("macro_class_link", $context, 40, $this->getSourceContext())->macro_class_link(...[CoreExtension::getAttribute($this->env, $this->source, $context["hint"], "name", [], "any", false, false, false, 40)]);
                    } elseif (CoreExtension::getAttribute($this->env, $this->source,                     // line 41
$context["hint"], "name", [], "any", false, false, false, 41)) {
                        // line 42
                        yield $this->env->getFunction('abbr_class')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["hint"], "name", [], "any", false, false, false, 42));
                    }
                    // line 44
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["hint"], "array", [], "any", false, false, false, 44)) {
                        yield "[]";
                    }
                    // line 45
                    if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 45)) {
                        yield "|";
                    }
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['hint'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 50
    public function macro_source_link($project = null, $class = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "project" => $project,
            "class" => $class,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 51
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 51, $this->source); })()), "sourcepath", [], "any", false, false, false, 51)) {
                // line 52
                yield "        (<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["class"]) || array_key_exists("class", $context) ? $context["class"] : (function () { throw new RuntimeError('Variable "class" does not exist.', 52, $this->source); })()), "sourcepath", [], "any", false, false, false, 52), "html", null, true);
                yield "\">";
yield \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("View source");
                yield "</a>)";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 56
    public function macro_method_source_link($method = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "method" => $method,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 57
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 57, $this->source); })()), "sourcepath", [], "any", false, false, false, 57)) {
                // line 59
                yield "<a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 59, $this->source); })()), "sourcepath", [], "any", false, false, false, 59), "html", null, true);
                yield "\">";
                yield Twig\Extension\CoreExtension::sprintf(\Wdes\phpI18nL10n\Launcher::gettext("at line %s"), CoreExtension::getAttribute($this->env, $this->source,                 // line 60
(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 60, $this->source); })()), "line", [], "any", false, false, false, 60));
                // line 61
                yield "</a>";
            } else {
                // line 64
                yield Twig\Extension\CoreExtension::sprintf(\Wdes\phpI18nL10n\Launcher::gettext("at line %s"), CoreExtension::getAttribute($this->env, $this->source,                 // line 65
(isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 65, $this->source); })()), "line", [], "any", false, false, false, 65));
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 70
    public function macro_method_parameters_signature($method = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "method" => $method,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 71
            $macros["_v1"] = $this->loadTemplate("macros.twig", "macros.twig", 71)->unwrap();
            // line 72
            yield "(";
            // line 73
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 73, $this->source); })()), "parameters", [], "any", false, false, false, 73));
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
            foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
                // line 74
                if (CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "hashint", [], "any", false, false, false, 74)) {
                    yield $macros["_v1"]->getTemplateForMacro("macro_hint_link", $context, 74, $this->getSourceContext())->macro_hint_link(...[CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "hint", [], "any", false, false, false, 74)]);
                    yield " ";
                }
                // line 75
                if (CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "variadic", [], "any", false, false, false, 75)) {
                    yield "...";
                }
                yield "\$";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "name", [], "any", false, false, false, 75);
                // line 76
                if ( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "default", [], "any", false, false, false, 76))) {
                    yield " = ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "default", [], "any", false, false, false, 76), "html", null, true);
                }
                // line 77
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 77)) {
                    yield ", ";
                }
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            yield ")";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 82
    public function macro_function_parameters_signature($method = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "method" => $method,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 83
            $macros["_v2"] = $this->loadTemplate("macros.twig", "macros.twig", 83)->unwrap();
            // line 84
            yield "(";
            // line 85
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["method"]) || array_key_exists("method", $context) ? $context["method"] : (function () { throw new RuntimeError('Variable "method" does not exist.', 85, $this->source); })()), "parameters", [], "any", false, false, false, 85));
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
            foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
                // line 86
                if (CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "hashint", [], "any", false, false, false, 86)) {
                    yield $macros["_v2"]->getTemplateForMacro("macro_hint_link", $context, 86, $this->getSourceContext())->macro_hint_link(...[CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "hint", [], "any", false, false, false, 86)]);
                    yield " ";
                }
                // line 87
                if (CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "variadic", [], "any", false, false, false, 87)) {
                    yield "...";
                }
                yield "\$";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "name", [], "any", false, false, false, 87);
                // line 88
                if ( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "default", [], "any", false, false, false, 88))) {
                    yield " = ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["parameter"], "default", [], "any", false, false, false, 88), "html", null, true);
                }
                // line 89
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 89)) {
                    yield ", ";
                }
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            yield ")";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 94
    public function macro_render_classes($classes = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "classes" => $classes,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 95
            $macros["_v3"] = $this;
            // line 96
            yield "
    <div class=\"container-fluid underlined\">
        ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["classes"]) || array_key_exists("classes", $context) ? $context["classes"] : (function () { throw new RuntimeError('Variable "classes" does not exist.', 98, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
                // line 99
                yield "            <div class=\"row\">
                <div class=\"col-md-6\">
                    ";
                // line 101
                if (CoreExtension::getAttribute($this->env, $this->source, $context["class"], "isInterface", [], "any", false, false, false, 101)) {
                    // line 102
                    yield "                        <em>";
                    yield $macros["_v3"]->getTemplateForMacro("macro_class_link", $context, 102, $this->getSourceContext())->macro_class_link(...[$context["class"], true]);
                    yield "</em>
                    ";
                } else {
                    // line 104
                    yield $macros["_v3"]->getTemplateForMacro("macro_class_link", $context, 104, $this->getSourceContext())->macro_class_link(...[$context["class"], true]);
                }
                // line 106
                yield $macros["_v3"]->getTemplateForMacro("macro_deprecated", $context, 106, $this->getSourceContext())->macro_deprecated(...[$context["class"]]);
                // line 107
                yield "</div>
                <div class=\"col-md-6\">";
                // line 109
                yield $this->extensions['Doctum\Renderer\TwigExtension']->markdownToHtml($this->extensions['Doctum\Renderer\TwigExtension']->parseDesc(CoreExtension::getAttribute($this->env, $this->source, $context["class"], "shortdesc", [], "any", false, false, false, 109), $context["class"]));
                // line 110
                yield "</div>
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['class'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            yield "    </div>";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 116
    public function macro_breadcrumbs($namespace = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "namespace" => $namespace,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 117
            yield "    ";
            $context["current_ns"] = "";
            // line 118
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::split($this->env->getCharset(), (isset($context["namespace"]) || array_key_exists("namespace", $context) ? $context["namespace"] : (function () { throw new RuntimeError('Variable "namespace" does not exist.', 118, $this->source); })()), "\\"));
            foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
                // line 119
                if ((isset($context["current_ns"]) || array_key_exists("current_ns", $context) ? $context["current_ns"] : (function () { throw new RuntimeError('Variable "current_ns" does not exist.', 119, $this->source); })())) {
                    // line 120
                    $context["current_ns"] = (((isset($context["current_ns"]) || array_key_exists("current_ns", $context) ? $context["current_ns"] : (function () { throw new RuntimeError('Variable "current_ns" does not exist.', 120, $this->source); })()) . "\\") . $context["ns"]);
                } else {
                    // line 122
                    $context["current_ns"] = $context["ns"];
                }
                // line 124
                yield "<li><a href=\"";
                yield $this->extensions['Doctum\Renderer\TwigExtension']->pathForNamespace($context, (isset($context["current_ns"]) || array_key_exists("current_ns", $context) ? $context["current_ns"] : (function () { throw new RuntimeError('Variable "current_ns" does not exist.', 124, $this->source); })()));
                yield "\">";
                yield $context["ns"];
                yield "</a></li><li class=\"backslash\">\\</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['ns'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 128
    public function macro_deprecated($reflection = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "reflection" => $reflection,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 129
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 129, $this->source); })()), "deprecated", [], "any", false, false, false, 129)) {
                yield "<small><span class=\"label label-danger\">";
yield \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("deprecated");
                yield "</span></small>";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 132
    public function macro_deprecations($reflection = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "reflection" => $reflection,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 133
            yield "    ";
            $macros["_v4"] = $this;
            // line 134
            yield "
    ";
            // line 135
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 135, $this->source); })()), "deprecated", [], "any", false, false, false, 135)) {
                // line 136
                yield "        <p>
            ";
                // line 137
                yield $macros["_v4"]->getTemplateForMacro("macro_deprecated", $context, 137, $this->getSourceContext())->macro_deprecated(...[(isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 137, $this->source); })())]);
                yield "
            ";
                // line 138
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 138, $this->source); })()), "deprecated", [], "any", false, false, false, 138));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 139
                    yield "                <tr>
                    <td>";
                    // line 140
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["tag"], 0, [], "array", false, false, false, 140);
                    yield "</td>
                    <td>";
                    // line 141
                    yield Twig\Extension\CoreExtension::join(Twig\Extension\CoreExtension::slice($this->env->getCharset(), $context["tag"], 1, null), " ");
                    yield "</td>
                </tr>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 144
                yield "        </p>
    ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 148
    public function macro_internals($reflection = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "reflection" => $reflection,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 149
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 149, $this->source); })()), "isInternal", [], "method", false, false, false, 149)) {
                // line 150
                yield "        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 150, $this->source); })()), "getInternal", [], "method", false, false, false, 150));
                foreach ($context['_seq'] as $context["_key"] => $context["internalTag"]) {
                    // line 151
                    yield "        <table>
            <tr>
                <td><span class=\"label label-warning\">";
yield \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("internal");
                    // line 153
                    yield "</span></td>
                <td>&nbsp;";
                    // line 154
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["internalTag"], 0, [], "array", false, false, false, 154);
                    yield " ";
                    yield Twig\Extension\CoreExtension::join(Twig\Extension\CoreExtension::slice($this->env->getCharset(), $context["internalTag"], 1, null), " ");
                    yield "</td>
            </tr>
        </table>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['internalTag'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 158
                yield "        &nbsp;
    ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 162
    public function macro_todo($reflection = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "reflection" => $reflection,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 163
            yield "        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["project"]) || array_key_exists("project", $context) ? $context["project"] : (function () { throw new RuntimeError('Variable "project" does not exist.', 163, $this->source); })()), "config", ["insert_todos"], "method", false, false, false, 163) == true)) {
                // line 164
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 164, $this->source); })()), "todo", [], "any", false, false, false, 164)) {
                    yield "<small><span class=\"label label-info\">";
yield \Wdes\phpI18nL10n\Launcher::getPlugin()->gettext("todo");
                    yield "</span></small>";
                }
                // line 165
                yield "        ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 168
    public function macro_todos($reflection = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "reflection" => $reflection,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 169
            yield "        ";
            $macros["_v5"] = $this;
            // line 170
            yield "
        ";
            // line 171
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 171, $this->source); })()), "todo", [], "any", false, false, false, 171)) {
                // line 172
                yield "            <p>
                ";
                // line 173
                yield $macros["_v5"]->getTemplateForMacro("macro_todo", $context, 173, $this->getSourceContext())->macro_todo(...[(isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 173, $this->source); })())]);
                yield "
                ";
                // line 174
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reflection"]) || array_key_exists("reflection", $context) ? $context["reflection"] : (function () { throw new RuntimeError('Variable "reflection" does not exist.', 174, $this->source); })()), "todo", [], "any", false, false, false, 174));
                foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                    // line 175
                    yield "                    <tr>
                        <td>";
                    // line 176
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["tag"], 0, [], "array", false, false, false, 176);
                    yield "</td>
                        <td>";
                    // line 177
                    yield Twig\Extension\CoreExtension::join(Twig\Extension\CoreExtension::slice($this->env->getCharset(), $context["tag"], 1, null), " ");
                    yield "</td>
                        </tr>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['tag'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 180
                yield "            </p>
        ";
            }
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "macros.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  812 => 180,  803 => 177,  799 => 176,  796 => 175,  792 => 174,  788 => 173,  785 => 172,  783 => 171,  780 => 170,  777 => 169,  765 => 168,  758 => 165,  751 => 164,  748 => 163,  736 => 162,  728 => 158,  716 => 154,  713 => 153,  708 => 151,  703 => 150,  700 => 149,  688 => 148,  680 => 144,  671 => 141,  667 => 140,  664 => 139,  660 => 138,  656 => 137,  653 => 136,  651 => 135,  648 => 134,  645 => 133,  633 => 132,  622 => 129,  610 => 128,  596 => 124,  593 => 122,  590 => 120,  588 => 119,  583 => 118,  580 => 117,  568 => 116,  562 => 113,  554 => 110,  552 => 109,  549 => 107,  547 => 106,  544 => 104,  538 => 102,  536 => 101,  532 => 99,  528 => 98,  524 => 96,  522 => 95,  510 => 94,  504 => 91,  488 => 89,  483 => 88,  477 => 87,  472 => 86,  455 => 85,  453 => 84,  451 => 83,  439 => 82,  433 => 79,  417 => 77,  412 => 76,  406 => 75,  401 => 74,  384 => 73,  382 => 72,  380 => 71,  368 => 70,  361 => 65,  360 => 64,  357 => 61,  355 => 60,  351 => 59,  349 => 57,  337 => 56,  326 => 52,  324 => 51,  311 => 50,  290 => 45,  286 => 44,  283 => 42,  281 => 41,  279 => 40,  277 => 39,  260 => 38,  258 => 37,  256 => 35,  244 => 34,  238 => 31,  232 => 30,  227 => 29,  213 => 28,  207 => 25,  201 => 24,  196 => 23,  182 => 22,  174 => 19,  172 => 18,  167 => 16,  165 => 15,  161 => 14,  159 => 13,  146 => 12,  136 => 9,  124 => 8,  116 => 5,  112 => 4,  108 => 3,  96 => 2,  90 => 167,  87 => 161,  84 => 147,  81 => 131,  78 => 127,  75 => 115,  72 => 93,  69 => 81,  66 => 69,  63 => 55,  60 => 49,  57 => 33,  54 => 27,  51 => 21,  48 => 11,  45 => 7,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("
{% macro class_category_name(categoryId) -%}
{% if categoryId == 1 %}{% trans 'class' %}{% endif %}
{% if categoryId == 2 %}{% trans 'interface' %}{% endif %}
{% if categoryId == 3 %}{% trans 'trait' %}{% endif %}
{%- endmacro %}

{% macro namespace_link(namespace) -%}
    <a href=\"{{ namespace_path(namespace) }}\">{{ namespace == '' ? global_namespace_name() : namespace|raw }}</a>
{%- endmacro %}

{% macro class_link(class, absolute) -%}
    {%- if class.isProjectClass() -%}
        <a href=\"{{ class_path(class) }}\">
    {%- elseif class.isPhpClass() -%}
        <a target=\"_blank\" rel=\"noopener\" href=\"https://www.php.net/{{ class|raw }}\">
    {%- endif %}
    {{- abbr_class(class, absolute|default(false)) }}
    {%- if class.isProjectClass() or class.isPhpClass() %}</a>{% endif %}
{%- endmacro %}

{% macro method_link(method, absolute, classonly) -%}
{#  #}<a href=\"{{ method_path(method) }}\">
{#    #}{{- abbr_class(method.class) }}{% if not classonly|default(false) %}::{{ method.name|raw }}{% endif -%}
{#  #}</a>
{%- endmacro %}

{% macro property_link(property, absolute, classonly) -%}
{#  #}<a href=\"{{ property_path(property) }}\">
{#    #}{{- abbr_class(property.class) }}{% if not classonly|default(false) %}#{{ property.name|raw }}{% endif -%}
{#  #}</a>
{%- endmacro %}

{% macro hint_link(hints) -%}
    {%- from _self import class_link %}

    {%- if hints %}
        {%- for hint in hints %}
            {%- if hint.class %}
                {{- class_link(hint.name) }}
            {%- elseif hint.name %}
                {{- abbr_class(hint.name) }}
            {%- endif %}
            {%- if hint.array %}[]{% endif %}
            {%- if not loop.last %}|{% endif %}
        {%- endfor %}
    {%- endif %}
{%- endmacro %}

{% macro source_link(project, class) -%}
    {% if class.sourcepath %}
        (<a href=\"{{ class.sourcepath }}\">{% trans 'View source'%}</a>)
    {%- endif %}
{%- endmacro %}

{% macro method_source_link(method) -%}
    {% if method.sourcepath %}
        {#- l10n: Method at line %s -#}
        <a href=\"{{ method.sourcepath }}\">{{'at line %s'|trans|format(
            method.line
        )|raw }}</a>
    {%- else %}
        {#- l10n: Method at line %s -#}
        {{- 'at line %s'|trans|format(
            method.line
        )|raw -}}
    {%- endif %}
{%- endmacro %}

{% macro method_parameters_signature(method) -%}
    {%- from \"macros.twig\" import hint_link -%}
    (
        {%- for parameter in method.parameters %}
            {%- if parameter.hashint %}{{ hint_link(parameter.hint) }} {% endif -%}
            {%- if parameter.variadic %}...{% endif %}\${{ parameter.name|raw }}
            {%- if parameter.default is not null %} = {{ parameter.default }}{% endif %}
            {%- if not loop.last %}, {% endif %}
        {%- endfor -%}
    )
{%- endmacro %}

{% macro function_parameters_signature(method) -%}
    {%- from \"macros.twig\" import hint_link -%}
    (
        {%- for parameter in method.parameters %}
            {%- if parameter.hashint %}{{ hint_link(parameter.hint) }} {% endif -%}
            {%- if parameter.variadic %}...{% endif %}\${{ parameter.name|raw }}
            {%- if parameter.default is not null %} = {{ parameter.default }}{% endif %}
            {%- if not loop.last %}, {% endif %}
        {%- endfor -%}
    )
{%- endmacro %}

{% macro render_classes(classes) -%}
    {% from _self import class_link, deprecated %}

    <div class=\"container-fluid underlined\">
        {% for class in classes %}
            <div class=\"row\">
                <div class=\"col-md-6\">
                    {% if class.isInterface %}
                        <em>{{- class_link(class, true) -}}</em>
                    {% else %}
                        {{- class_link(class, true) -}}
                    {% endif %}
                    {{- deprecated(class) -}}
                </div>
                <div class=\"col-md-6\">
                    {{- class.shortdesc|desc(class)|md_to_html -}}
                </div>
            </div>
        {% endfor %}
    </div>
{%- endmacro %}

{% macro breadcrumbs(namespace) %}
    {% set current_ns = '' %}
    {% for ns in namespace|split('\\\\') %}
        {%- if current_ns -%}
            {% set current_ns = current_ns ~ '\\\\' ~ ns %}
        {%- else -%}
            {% set current_ns = ns %}
        {%- endif -%}
        <li><a href=\"{{ namespace_path(current_ns) }}\">{{ ns|raw }}</a></li><li class=\"backslash\">\\</li>
    {%- endfor %}
{% endmacro %}

{% macro deprecated(reflection) %}
    {% if reflection.deprecated %}<small><span class=\"label label-danger\">{% trans 'deprecated' %}</span></small>{% endif %}
{% endmacro %}

{% macro deprecations(reflection) %}
    {% from _self import deprecated %}

    {% if reflection.deprecated %}
        <p>
            {{ deprecated(reflection )}}
            {% for tag in reflection.deprecated %}
                <tr>
                    <td>{{ tag[0]|raw }}</td>
                    <td>{{ tag[1:]|join(' ')|raw }}</td>
                </tr>
            {% endfor %}
        </p>
    {% endif %}
{% endmacro %}

{% macro internals(reflection) %}
    {% if reflection.isInternal() %}
        {% for internalTag in reflection.getInternal() %}
        <table>
            <tr>
                <td><span class=\"label label-warning\">{% trans 'internal' %}</span></td>
                <td>&nbsp;{{ internalTag[0]|raw }} {{ internalTag[1:]|join(' ')|raw }}</td>
            </tr>
        </table>
        {% endfor %}
        &nbsp;
    {% endif %}
{% endmacro %}

{% macro todo(reflection) %}
        {% if project.config('insert_todos') == true %}
            {% if reflection.todo %}<small><span class=\"label label-info\">{% trans 'todo' %}</span></small>{% endif %}
        {% endif %}
{% endmacro %}

{% macro todos(reflection) %}
        {% from _self import todo %}

        {% if reflection.todo %}
            <p>
                {{ todo(reflection )}}
                {% for tag in reflection.todo %}
                    <tr>
                        <td>{{ tag[0]|raw }}</td>
                        <td>{{ tag[1:]|join(' ')|raw }}</td>
                        </tr>
                {% endfor %}
            </p>
        {% endif %}
{% endmacro %}
", "macros.twig", "/mnt/c/wamp64/www/mediatekformation/vendor/code-lts/doctum/src/Resources/themes/default/macros.twig");
    }
}
