<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Base extends Controller_Template {

    public $template = 'index';

    public function before()
    {
        parent::before();



    }

    public function action_index()
    {
        Site::Instance()->init();
    }

    public function after()
    {

        if ($this->request->is_ajax())
        {
            $this->request->headers('content-type', 'application/json');
            $this->response->body(Site::Instance()->getCurrentPage()->getModule()->render());
        }
        else
        {
            $this->template
                    ->set('title', Manager_Content::Instance()->getTitle())
                    ->set('styles', Manager_Content::Instance()->getStyles())
                    ->set('scripts', Manager_Content::Instance()->getScripts());
            parent::after();
        }
    }

}
