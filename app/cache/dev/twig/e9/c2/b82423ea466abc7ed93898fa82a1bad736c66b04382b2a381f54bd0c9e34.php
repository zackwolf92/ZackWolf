<?php

/* HomeBundle:Default:Login.html.twig */
class __TwigTemplate_e9c2b82423ea466abc7ed93898fa82a1bad736c66b04382b2a381f54bd0c9e34 extends Twig_Template
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
        <h2 class=\"text-center\">Login Here</h2>

        <div class=\"col-md-offset-3 col-md-6\">
            <form action=\"\" method=\"post\">
                <label class=\"label label-success\" for=\"\">Email</label>
                <input required style=\"margin: 5px 0px;\" type=\"text\" name=\"email\" placeholder=\"Enter Name\" class=\"form-control\">
                <label class=\"label label-success\" for=\"\">Password</label>
                <input required style=\"margin: 5px 0px;\" type=\"password\" name=\"password\" placeholder=\"Enter Name\" class=\"form-control\">
                <input type=\"submit\" value=\"Login\" class=\"btn btn-success pull-right\" style=\"margin-top: 10px;\">
            </form>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "HomeBundle:Default:Login.html.twig";
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
