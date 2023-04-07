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

/* colis/index.html.twig */
class __TwigTemplate_3fa51783b07a6e3e3c0c82ed9fb7aa08 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "colis/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "colis/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "colis/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        // line 5
        echo "\tMes Colis
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 9
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 10
        echo "

\t<style>

\t\tbody {
\t\t\tbackground-color: #000c20;

\t\t}
\t</style>

\t<div class=\"categories-area section-padding30\">
\t\t<div class=\"container\">

\t\t\t<div class=\"row\">
\t\t\t\t<div
\t\t\t\t\tclass=\"col-lg-12\">
\t\t\t\t\t<!-- Section Title -->
\t\t\t\t\t<div class=\"section-title text-center mb-80\">
\t\t\t\t\t\t<h2 style=\"font-size: 32px; color: white; margin-top: -70px; margin-right: 1050px;\">Mes Colis</h>


\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"row\">

\t\t\t\t";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) || array_key_exists("list", $context) ? $context["list"] : (function () { throw new RuntimeError('Variable "list" does not exist.', 37, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["data"]) {
            // line 38
            echo "
\t\t\t\t\t<div class=\"col-lg-4 col-md-6 col-sm-6\">
\t\t\t\t\t\t<div class=\"single-cat text-center mb-50\">
\t\t\t\t\t\t\t<div class=\"cat-icon\">
\t\t\t\t\t\t\t\t<span class=\"flaticon-shipped\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"cat-cap\">
\t\t\t\t\t\t\t\t<h5>
\t\t\t\t\t\t\t\t\t<a style=\"font-size: 32px; color: white;\">Détails de colis :
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tPoids :
\t\t\t\t\t\t\t\t\t";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "poids", [], "any", false, false, false, 51), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\tKg</p>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tType :
\t\t\t\t\t\t\t\t\t";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "typeColis", [], "any", false, false, false, 55), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tPrix :
\t\t\t\t\t\t\t\t\t";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "prix", [], "any", false, false, false, 58), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\tDT</p>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tLieu Départ :
\t\t\t\t\t\t\t\t\t";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "lieuDepart", [], "any", false, false, false, 62), "html", null, true);
            echo "</p>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tLieu Arrivé :
\t\t\t\t\t\t\t\t\t";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["data"], "lieuArrive", [], "any", false, false, false, 65), "html", null, true);
            echo "</p>

\t\t\t\t\t\t\t\t<a href=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_colis", ["id" => twig_get_attribute($this->env, $this->source, $context["data"], "idColis", [], "any", false, false, false, 67)]), "html", null, true);
            echo "\" class=\"btn btn-light\" style=\"padding: 0.75rem 1rem;\">
\t\t\t\t\t\t\t\t\t<i class=\"bi bi-trash\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<a href=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("update_colis", ["id" => twig_get_attribute($this->env, $this->source, $context["data"], "idColis", [], "any", false, false, false, 70)]), "html", null, true);
            echo "\" class=\"btn btn-light\" style=\"padding: 0.75rem 1rem; margin-left: 10px;\">
\t\t\t\t\t\t\t\t\t<i class=\"bi bi-arrow-clockwise\"></i>
\t\t\t\t\t\t\t\t</a>


\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "
\t\t\t</div>
\t\t</div>
\t</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "colis/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 79,  175 => 70,  169 => 67,  164 => 65,  158 => 62,  151 => 58,  145 => 55,  138 => 51,  123 => 38,  119 => 37,  90 => 10,  80 => 9,  69 => 5,  59 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}


{% block title %}
\tMes Colis
{% endblock %}


{% block body %}


\t<style>

\t\tbody {
\t\t\tbackground-color: #000c20;

\t\t}
\t</style>

\t<div class=\"categories-area section-padding30\">
\t\t<div class=\"container\">

\t\t\t<div class=\"row\">
\t\t\t\t<div
\t\t\t\t\tclass=\"col-lg-12\">
\t\t\t\t\t<!-- Section Title -->
\t\t\t\t\t<div class=\"section-title text-center mb-80\">
\t\t\t\t\t\t<h2 style=\"font-size: 32px; color: white; margin-top: -70px; margin-right: 1050px;\">Mes Colis</h>


\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"row\">

\t\t\t\t{% for data in list %}

\t\t\t\t\t<div class=\"col-lg-4 col-md-6 col-sm-6\">
\t\t\t\t\t\t<div class=\"single-cat text-center mb-50\">
\t\t\t\t\t\t\t<div class=\"cat-icon\">
\t\t\t\t\t\t\t\t<span class=\"flaticon-shipped\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"cat-cap\">
\t\t\t\t\t\t\t\t<h5>
\t\t\t\t\t\t\t\t\t<a style=\"font-size: 32px; color: white;\">Détails de colis :
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tPoids :
\t\t\t\t\t\t\t\t\t{{ data.poids }}
\t\t\t\t\t\t\t\t\tKg</p>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tType :
\t\t\t\t\t\t\t\t\t{{ data.typeColis }}</p>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tPrix :
\t\t\t\t\t\t\t\t\t{{ data.prix }}
\t\t\t\t\t\t\t\t\tDT</p>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tLieu Départ :
\t\t\t\t\t\t\t\t\t{{ data.lieuDepart }}</p>
\t\t\t\t\t\t\t\t<p style=\"font-size: 22px; color: white;\">
\t\t\t\t\t\t\t\t\tLieu Arrivé :
\t\t\t\t\t\t\t\t\t{{ data.lieuArrive }}</p>

\t\t\t\t\t\t\t\t<a href=\"{{ path('delete_colis', {'id': data.idColis}) }}\" class=\"btn btn-light\" style=\"padding: 0.75rem 1rem;\">
\t\t\t\t\t\t\t\t\t<i class=\"bi bi-trash\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<a href=\"{{ path('update_colis', {'id': data.idColis}) }}\" class=\"btn btn-light\" style=\"padding: 0.75rem 1rem; margin-left: 10px;\">
\t\t\t\t\t\t\t\t\t<i class=\"bi bi-arrow-clockwise\"></i>
\t\t\t\t\t\t\t\t</a>


\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t{% endfor %}

\t\t\t</div>
\t\t</div>
\t</div>

{% endblock %}


{# <div class=\"slider-area \">
\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\tclass=\"slider-active\">
\t\t\t\t\t\t\t\t<!-- Single Slider -->
\t\t\t\t\t\t\t\t<div class=\"single-slider slider-height d-flex align-items-center\">
\t\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\t\tclass=\"container\">
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"categories-area section-padding30\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"col-lg-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!-- Section Tittle -->
\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"section-tittle text-center mb-80\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>Mes Colis</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t{% for data in list %}
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-lg-15 col-md-15 col-sm-15\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"single-cat text-center mb-50 card-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cat-icon\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"flaticon-shipped\"></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"cat-cap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h5>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"{{ path('update_colis', {'id': data.idColis}) }}\">Modifier</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h5>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"{{ path('delete_colis', {'id': data.idColis}) }}\">Supprimer</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</h5>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>{{ data.poids }}</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>{{ data.typeColis }}</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>{{ data.prix }}</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>{{ data.lieuDepart }}</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>{{ data.lieuArrive }}</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div></div></div></div></div> #}
", "colis/index.html.twig", "C:\\Users\\utilisateur\\MeryemGIT\\OneWay-symfony-\\templates\\colis\\index.html.twig");
    }
}
