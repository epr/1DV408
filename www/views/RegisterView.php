<?php
namespace LoginApp\View;

use LoginApp\Model\LoginModel;

class RegisterView extends LoginView {
    public function __construct(LoginModel $model) {
        parent::__construct($model);
        $this->headHtml = new HeadHtml('1DV408 - Login');
        $this->newname = (isset($_POST["newname"]) ? $_POST["newname"] : "");
        $this->newpass = (isset($_POST["newpass"]) ? $_POST["newpass"] : "");
        $this->passagain = (isset($_POST["passagain"]) ? $_POST["passagain"] : "");
    }
    public function renderPage() {
        echo $this->headHtml->getHtml() .
            '<body>
                <h1>Laborationskod hl222ih</h1>
                <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                <input type="submit" value="Tillbaka" name="back">
            </form>
            <h2>Ej Inloggad, Registrerar användare</h2>

            <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                <fieldset>
                    <legend>Registrera ny användare - Skriv in användarnamn och lösenord</legend>' .
            ($this->model->getNotification() ? '<p>' . $this->model->getNotification() . '</p>' : '')
            . ' <label for="newname">Namn:</label>
                    <input type="text" name="newname" id="newname" autofocus />
                    <label for="newpass">Lösenord:</label>
                    <input type="password" name="newpass" id="newpass" />
                    <label for="passagain">Repetera Lösenord:</label>
                    <input type="password" name="passagain" id="passagain" />
                    <input type="submit" name="registersend" value="Registrera" />
                </fieldset>
            </form>
            <p></p>' .
            $this->footerHtml->getHtml();
    }
    public function getNewName() {
        return $this->newname;
    }
    public function getNewPass() {
        return $this->newpass;
    }
    public function getPassAgain() {
        return $this->passagain;
    }
}