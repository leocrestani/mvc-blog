<?php

/** 
 * @Desc: Helper que auxilia em 2 tarefas.
 * A primeira é a criação de mensagens na view para o usuário
 * A segunda é verificar se um usuário está logado na aplicação
 */
class Session
{
    public static function message($name, $text = null, $class = null)
    {
        if (!empty($name)) {
            if (!empty($text) && empty($_SESSION[$name])) {
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
                $_SESSION[$name] = $text;
                $_SESSION[$name . 'class'] = $class;
            } elseif (!empty($_SESSION[$name]) && empty($text)) {
                $class = !empty($_SESSION[$name . 'class']) ? $_SESSION[$name . 'class'] : 'alert alert-success';
                echo '<div class="' . $class . '">' . $_SESSION[$name] . '</div>';

                unset($_SESSION[$name]);
                unset($_SESSION[$name . 'class']);
            }
        }
    }

    public static function isLogged()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }
}