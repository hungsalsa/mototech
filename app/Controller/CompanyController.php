<?php
/**
 * Created by PhpStorm.
 * User: Vuhai
 * Date: 1/26/14
 * Time: 9:08 AM
 */

class CompanyController extends AppController{

    public function admin_index()
    {
        if (!empty($this->request->data)) {
            $this->Company->set($this->request->data);
            if ($this->Company->save()) {
                $this->Session->setFlash(__('Update successful!'));
            }
        }
        $information = $this->Company->find('first');
        $this->request->data = $information;
    }
} 