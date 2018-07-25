<?php
App::uses('ExceptionRenderer', 'Error');
 
class AppExceptionRenderer extends ExceptionRenderer {
    public function missingController($error) {
		$this->controller->header('HTTP/1.1 404 Not Found');
		$this->controller->beforeFilter();
		$this->controller->set('title_for_layout', 'Not Found');
		$this->controller->render('/Errors/error404', 'default');
		$this->controller->response->send();
    }
 
    public function missingAction($error) {
		$this->missingController($error);
    }
}