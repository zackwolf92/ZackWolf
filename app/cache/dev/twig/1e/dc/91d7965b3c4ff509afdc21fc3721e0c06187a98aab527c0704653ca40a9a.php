<?php

/* HomeBundle:Default:index.html.twig */
class __TwigTemplate_1edc91d7965b3c4ff509afdc21fc3721e0c06187a98aab527c0704653ca40a9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::acc.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::acc.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "
    <div class=\"container\">
        <h2 class=\"text-center\">Register Here</h2>

        <div class=\"col-md-offset-3 col-md-6\">
            <form action=\"\" method=\"post\">
                <label class=\"label label-success\" for=\"\">First Name</label>
                <input required style=\"margin: 5px 0px;\" type=\"text\" name=\"fname\" placeholder=\"Enter Name\" class=\"form-control\">
                <label class=\"label label-success\" for=\"\">Last Name</label>
                <input required style=\"margin: 5px 0px;\" type=\"text\" name=\"lname\" placeholder=\"Enter Name\" class=\"form-control\">
                <label class=\"label label-success\" for=\"\">Email</label>
                <input required style=\"margin: 5px 0px;\" type=\"text\" name=\"email\" placeholder=\"Enter Name\" class=\"form-control\">
                <label class=\"label label-success\" for=\"\">Password</label>
                <input required style=\"margin: 5px 0px;\" type=\"password\" name=\"password\" placeholder=\"Enter Name\" class=\"form-control\">
                <input type=\"submit\" value=\"Register\" class=\"btn btn-success pull-right\" style=\"margin-top: 10px;\">
            </form>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "HomeBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,);
    }
}
