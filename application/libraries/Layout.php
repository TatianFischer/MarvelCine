<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layout
{
    private $CI;
    private $var = array();
    private $theme = 'default';


    public function __construct()
    {
        $this->CI =& get_instance();
        $this->var['output'] = '';

        //	Le titre est composé du nom de la méthode et du nom du contrôleur
        //	La fonction ucfirst permet d'ajouter une majuscule
        $this->var['titre'] = ucfirst($this->CI->router->fetch_method()) . ' - ' . ucfirst($this->CI->router->fetch_class());

        $this->var['contentDescription'] = "";

        $this->var['css'] = array();
        $this->var['js'] = array();
    }

    public function view($name, $data = array())
    {
        $this->var['output'] .= $this->CI->load->view($name, $data, true);

        $this->CI->load->view('themes/'.$this->theme, $this->var);
    }

    public function views($name, $data = array())
    {
        $this->var['output'] = $this->CI->load->view($name, $data, true);
        return $this;
    }

    public function setTitre($titre)
    {
        if(is_string($titre) && !empty($titre)){
            $this->var['titre'] = $titre;
            return true;
        }

        return false;
    }

    public function setContentDescription($contentDescription)
    {
        if(is_string($contentDescription) && !empty($contentDescription)){
            $this->var['contentDescription'] = $contentDescription;
            return true;
        }

        return false;
    }

    public function addCss($nom)
    {
        if(is_string($nom) && !empty($nom) && file_exists('./assets/css/'.$nom.'.css')){
            $this->var['css'][] = css_url($nom);
            return true;
        }

        return false;
    }

    public function addJs($nom)
    {
        if(is_string($nom) && !empty($nom) && file_exists('./assets/js/'.$nom.'.js')){
            $this->var['js'][] = js_url($nom);
            return true;
        }

        return false;
    }

    public function setTheme($theme)
    {
        if(is_string($theme) && !empty($theme) && file_exists('../views/themes/'.$theme.'.php')){
            $this->theme = $theme;
            return true;
        }

        return false;
    }
}
