<?php

namespace LoginApp\View;

use LoginApp\Model\LoginModel;

class LoggedInLoginView extends LoginView {

    private $getLogoutKey;

    public function __construct(LoginModel $model) {
        parent::__construct($model);

        $this->getLogoutKey = 'logout';
        $this->headHtml = new HeadHtml('1DV408 - Logged in');
    }

    public function wasLogoutLinkClicked() {
        return (isset($_GET[$this->getLogoutKey]));
    }

    public function renderPage() {
        echo $this->headHtml->getHtml() .
        '<body>
            <h1>Laborationskod hl222ih</h1>
            <h2>' . $this->model->getUsername() . ' är inloggad' . '</h2>
            ' . ($this->model->getNotification() ? '<p>' . $this->model->getNotification() . '</p>' : '') . '
            <p><a href="?logout" onclick="">Logga ut</a></p>
            <p></p>' .
            $this->footerHtml->getHtml();
    }

}