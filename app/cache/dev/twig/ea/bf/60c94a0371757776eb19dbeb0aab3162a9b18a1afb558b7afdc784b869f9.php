<?php

/* ::base.html.twig */
class __TwigTemplate_eabf60c94a0371757776eb19dbeb0aab3162a9b18a1afb558b7afdc784b869f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/content/css/bootstrap.css"), "html", null, true);
        echo "\">
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
    <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/content/js/jquery-3.3.1.min.js"), "html", null, true);
        echo "\"></script>

    <nav class=\"navbar navbar-default\">
        <div class=\"container-fluid\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                    <span class=\"icon-bar\"></span>
                </button>
                <a class=\"navbar-brand\" href=\"#\">Contact List Manager</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                <ul class=\"nav navbar-nav navbar-right\">
                    <li><a href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("france_csv_export");
        echo "\" target=\"_blank\"><b>Export CSV</b></a></li>
                    <li><a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("france_add");
        echo "\" target=\"_blank\"><b>+ Add Contact</b></a></li>
                    <li><a href=\"";
        // line 31
        echo $this->env->getExtension('routing')->getPath("france_logout");
        echo "\">Logout</a></li>
                </ul>
                <form class=\"navbar-form navbar-right\" method=\"post\" enctype=\"multipart/form-data\" action=\"";
        // line 33
        echo $this->env->getExtension('routing')->getPath("france_csv_import");
        echo "\" id=\"csvform\">
                    <label for=\"\">Import CSV</label>
                    <input type=\"file\" name=\"csv\" accept=\"text/csv\" class=\"form-control\" onchange=\"\$('#csvform').submit()\">
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    ";
        // line 40
        $this->displayBlock('body', $context, $blocks);
        // line 41
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 42
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
    }

    // line 41
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 41,  112 => 40,  107 => 6,  101 => 5,  95 => 42,  92 => 41,  90 => 40,  80 => 33,  75 => 31,  71 => 30,  67 => 29,  46 => 11,  40 => 8,  35 => 7,  33 => 6,  29 => 5,  23 => 1,  99 => 36,  93 => 35,  91 => 34,  86 => 32,  82 => 31,  78 => 30,  74 => 29,  70 => 28,  66 => 27,  62 => 26,  59 => 25,  54 => 24,  52 => 23,  31 => 4,  28 => 3,);
    }
}
