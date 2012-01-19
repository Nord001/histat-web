<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Controller <b>Project</b>  has methods for project URI
 */
class Controller_Project extends Controller_Data {

    private $id;
    private $token;

    public function before() {
        $this->auto_render = FALSE;
        parent::before();
        $this->id = $this->request->post('id');
        $this->token = $this->request->post('xsrf');
    }

    public function action_details() {
        if ($this->id == NULL || $this->token !== $this->xsrf || !$this->request->is_ajax())
            throw new HTTP_Exception_404(); //If ID not given throw Exception

        $project = ORM::factory('project', $this->id);
        if ($project->loaded()) {
            $view = View::factory(I18n::$lang . '/project/details');
            $view->project = $project;
            $content = $view->render();
        } else {
            $content = __('Project not found');
        }
        $this->response->body($content);
    }
      public function action_timeline() {
        if ($this->id == NULL || $this->token !== $this->xsrf || !$this->request->is_ajax())
            throw new HTTP_Exception_404(); //If ID not given throw Exception

        $project = ORM::factory('project', $this->id);
        if ($project->loaded()) {
            $view = View::factory(I18n::$lang . '/project/timeline');
            $view->names = $project->keymasks->find_all();
            $content = $view->render();
        } else {
            $content = __('Project not found');
        }
        $this->response->body($content);
    }
    public function action_list(){
         if ($this->id == NULL || $this->token !== $this->xsrf || !$this->request->is_ajax())
            throw new HTTP_Exception_404(); //If ID not given throw Exception
         
         $projects = ORM::factory('project')->where('ID_Thema','!=',$this->config->get('example_theme_id'))->where('Projektautor','LIKE','%'.$this->id.'%');
         $view = View::factory(I18n::$lang.'/project/list');
         $view->projects = $projects;
         $this->response->body($view->render());
         
    }
    public function action_download() {
        $this->id = $this->request->param('id');
        if (!$this->id)
            throw new HTTP_Exception_404(); //If ID not given throw Exception

        $project = ORM::factory('project', $this->id);
        if ($project->loaded() && !empty($project->datei_name) ) {
            $this->response->body($project->datei_inhalt)->send_file(TRUE,$project->datei_name);
        }
    }

}

