<?php

/* HomeBundle:Default:Add.html.twig */
class __TwigTemplate_bcc26926b7de85feedc29083e7e63cada362f68d897e58d7c7f6b5743f5fb741 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
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
        <h2 class=\"text-center\">Insert Records</h2>

        <div class=\"col-md-offset-3 col-md-6\">
            <form action=\"\" method=\"post\">
                <input type=\"hidden\" name=\"userid\">
                <label class=\"label label-success\" for=\"\">nom</label>
                <input required style=\"margin: 5px 0px;\" type=\"text\" name=\"name\" placeholder=\"Enter Name\" class=\"form-control\">
                <label class=\"label label-success\" for=\"\">Email</label>
                <input required style=\"margin: 5px 0px;\" type=\"text\" name=\"email\" placeholder=\"Enter Name\" class=\"form-control\">
                <label class=\"label label-success\" for=\"\">prenom</label>
                <input required style=\"margin: 5px 0px;\" type=\"text\" name=\"phone\" placeholder=\"Enter Name\" class=\"form-control\">
                <label class=\"label label-success\" for=\"\">Address</label>
                <textarea required style=\"margin: 5px 0px;\" name=\"address\" class=\"form-control\" id=\"\" cols=\"30\" rows=\"10\"></textarea>
                <input type=\"submit\" value=\"Submit\" class=\"btn btn-success pull-right\" style=\"margin-top: 10px;\">
            </form>
        </div>

    </div>

";
    }

    public function getTemplateName()
    {
        return "HomeBundle:Default:Add.html.twig";
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
