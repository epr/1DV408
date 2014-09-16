<?php
namespace LoginApp\Controller;
use LoginApp\View as View;
use LoginApp\Model as Model;

require_once("models/login-model.php");
require_once("views/login-view.php");
require_once("views/login-login-view.php");
require_once("views/logged-in-login-view.php");

class LoginController {
    private $view;
    private $model;

    public function __construct() {
        $this->model = new Model\LoginModel();
    }

    public function start() {
        if ($this->model->isLoggedIn()) {
            $this->view = new View\LoggedInLoginView($this->model);
            if ($this->view->wasLogoutLinkClicked()) {
                session_unset();
                $this->view = new View\LoginLoginView($this->model);
                $this->view->renderPage($this->model->getLogoutMessage());
            } else {
                $this->view->renderPage();
            }
        } else {
            $this->view = new View\LoginLoginView($this->model);
            if ($this->view->wasLoginButtonClicked()) {
                if ($this->model->tryLogin($this->view->getUsername(), $this->view->getPassword(), $this->view->getAutoLoginChecked())) {
                    $this->view = new View\LoggedInLoginView($this->model);
                    $this->view->renderPage($this->model->getLoginSuccessMessage());
                } else {
                    $this->view->renderPage($this->model->getLoginFailedMessage());
                }
            } else {
                $this->view->renderPage();
            }
        }
    }
}