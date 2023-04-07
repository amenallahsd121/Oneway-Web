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

/* colis/ajoutercolis.html.twig */
class __TwigTemplate_2e3416a81ec56a7deb31ce3346582ef5 extends Template
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
            'form' => [$this, 'block_form'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "colis/ajoutercolis.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "colis/ajoutercolis.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "colis/ajoutercolis.html.twig", 1);
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

        echo " Ajouter Colis ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "
<style>

body {
  background-color: #000c20;
}
 .form-container {
        margin-top: -120px;
          
    }



form {

  
  padding: 200px;
  background-color: #000c20;
  margin-left: 400px; /* add margin to move form to the right */
     
 
}

input[type=\"text\"], select {
  width: 500px; /* set width of text inputs and select */
  font-size: 19px; /* set font size for text inputs and select */
  padding: 18px; /* set padding for text inputs and select */
  border: none; /* remove border */
  background-color: white; /* set background color for text inputs and select */
  border-radius: 5px; /* round the corners of text inputs and select */
  margin-bottom: 10px; /* add some space between form fields */
}


label {

  display: inline-block;   
  width: 100px; /* adjust as needed */
  margin-right: 7px; /* adjust as needed */
  font-size: 16px; /* set font size for labels */
  font-weight: bold; /* make labels bold */
       color: white;
}









</style>

<div class=\"form-container\">


 ";
        // line 65
        $this->displayBlock('form', $context, $blocks);
        // line 136
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 65
    public function block_form($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form"));

        // line 66
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        echo "
<table>
<h1 style=\"color: white; font-size: 26px;\"> Ajouter un colis</h1>
<tr>

<td> ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "poids", [], "any", false, false, false, 71), 'label', ["label" => "Poids"]);
        echo " 
 </td>
<td>  ";
        // line 73
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 73, $this->source); })()), "poids", [], "any", false, false, false, 73), 'widget');
        echo " 
</td>  
<td> ";
        // line 75
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 75, $this->source); })()), "poids", [], "any", false, false, false, 75), 'errors');
        echo " 
</td>
</tr>
<br>

<tr>



<tr>
<td>  ";
        // line 85
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 85, $this->source); })()), "typeColis", [], "any", false, false, false, 85), 'label', ["label" => "Type"]);
        echo " 
</td> 
<td> ";
        // line 87
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 87, $this->source); })()), "typeColis", [], "any", false, false, false, 87), 'widget');
        echo " 
 </td> 
<td>  ";
        // line 89
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 89, $this->source); })()), "typeColis", [], "any", false, false, false, 89), 'errors');
        echo " 
</td> 
</tr>
<br>


<tr>
<td>  ";
        // line 96
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 96, $this->source); })()), "lieuDepart", [], "any", false, false, false, 96), 'label', ["label" => "Lieu Départ"]);
        echo " 
</td> 
<td> ";
        // line 98
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 98, $this->source); })()), "lieuDepart", [], "any", false, false, false, 98), 'widget');
        echo " 
 </td> 
<td>  ";
        // line 100
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "lieuDepart", [], "any", false, false, false, 100), 'errors');
        echo " 
</td> 
</tr>
<br>



<tr>
<td>  ";
        // line 108
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 108, $this->source); })()), "lieuArrive", [], "any", false, false, false, 108), 'label', ["label" => "Lieu Arrivé"]);
        echo " 
</td> 
<td> ";
        // line 110
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 110, $this->source); })()), "lieuArrive", [], "any", false, false, false, 110), 'widget');
        echo " 
 </td> 
<td>  ";
        // line 112
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 112, $this->source); })()), "lieuArrive", [], "any", false, false, false, 112), 'errors');
        echo " 
</td> 
</tr>
<br>

<td>  ";
        // line 117
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 117, $this->source); })()), "prix", [], "any", false, false, false, 117), 'label', ["label" => "Prix"]);
        echo " 
</td> 
<td> ";
        // line 119
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 119, $this->source); })()), "prix", [], "any", false, false, false, 119), 'widget');
        echo " 
 </td> 
<td>  ";
        // line 121
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 121, $this->source); })()), "prix", [], "any", false, false, false, 121), 'errors');
        echo " 
</td> 
</tr>
<br>



<tr>
  <td colspan=\"2\">";
        // line 129
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 129, $this->source); })()), "Payer", [], "any", false, false, false, 129), 'widget', ["attr" => ["style" => "font-size: 15px; padding: 15px 20px; margin-left: 110px; margin-top: 10px;"]]);
        echo "</td>
</tr>
</table>


";
        // line 134
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 134, $this->source); })()), 'form_end');
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "colis/ajoutercolis.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  290 => 134,  282 => 129,  271 => 121,  266 => 119,  261 => 117,  253 => 112,  248 => 110,  243 => 108,  232 => 100,  227 => 98,  222 => 96,  212 => 89,  207 => 87,  202 => 85,  189 => 75,  184 => 73,  179 => 71,  171 => 66,  161 => 65,  150 => 136,  148 => 65,  89 => 8,  79 => 7,  60 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}


{% block title %} Ajouter Colis {% endblock %} 


{% block body %}

<style>

body {
  background-color: #000c20;
}
 .form-container {
        margin-top: -120px;
          
    }



form {

  
  padding: 200px;
  background-color: #000c20;
  margin-left: 400px; /* add margin to move form to the right */
     
 
}

input[type=\"text\"], select {
  width: 500px; /* set width of text inputs and select */
  font-size: 19px; /* set font size for text inputs and select */
  padding: 18px; /* set padding for text inputs and select */
  border: none; /* remove border */
  background-color: white; /* set background color for text inputs and select */
  border-radius: 5px; /* round the corners of text inputs and select */
  margin-bottom: 10px; /* add some space between form fields */
}


label {

  display: inline-block;   
  width: 100px; /* adjust as needed */
  margin-right: 7px; /* adjust as needed */
  font-size: 16px; /* set font size for labels */
  font-weight: bold; /* make labels bold */
       color: white;
}









</style>

<div class=\"form-container\">


 {% block form %}
{{form_start(form,{'attr': {'novalidate': 'novalidate'}} )}}
<table>
<h1 style=\"color: white; font-size: 26px;\"> Ajouter un colis</h1>
<tr>

<td> {{ form_label(form.poids,\"Poids\")  }} 
 </td>
<td>  {{ form_widget(form.poids) }} 
</td>  
<td> {{ form_errors(form.poids) }} 
</td>
</tr>
<br>

<tr>



<tr>
<td>  {{ form_label(form.typeColis,\"Type\") }} 
</td> 
<td> {{ form_widget(form.typeColis)}} 
 </td> 
<td>  {{ form_errors(form.typeColis) }} 
</td> 
</tr>
<br>


<tr>
<td>  {{ form_label(form.lieuDepart,\"Lieu Départ\") }} 
</td> 
<td> {{ form_widget(form.lieuDepart)}} 
 </td> 
<td>  {{ form_errors(form.lieuDepart) }} 
</td> 
</tr>
<br>



<tr>
<td>  {{ form_label(form.lieuArrive,\"Lieu Arrivé\") }} 
</td> 
<td> {{ form_widget(form.lieuArrive)}} 
 </td> 
<td>  {{ form_errors(form.lieuArrive) }} 
</td> 
</tr>
<br>

<td>  {{ form_label(form.prix,\"Prix\") }} 
</td> 
<td> {{ form_widget(form.prix)}} 
 </td> 
<td>  {{ form_errors(form.prix) }} 
</td> 
</tr>
<br>



<tr>
  <td colspan=\"2\">{{ form_widget(form.Payer, {'attr': {'style': 'font-size: 15px; padding: 15px 20px; margin-left: 110px; margin-top: 10px;'}} ) }}</td>
</tr>
</table>


{{form_end(form)}}
{% endblock %}

{% endblock %}", "colis/ajoutercolis.html.twig", "C:\\Users\\utilisateur\\MeryemGIT\\OneWay-symfony-\\templates\\colis\\ajoutercolis.html.twig");
    }
}
