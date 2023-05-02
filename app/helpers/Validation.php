<?php

/** 
 * @Desc: Helper que possui validações simples.
 * Uma validação para o nome, uma para email e outra para formatar data e horário. 
 */
class Validation
{

    public static function validateName($name)
    {
        if (!preg_match('/[a-zA-Z]+/m', $name)) {
            return true;
        }
        return false;
    }
    public static function validateEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function formatDate($date)
    {
        return date('d/m/Y H:i', strtotime($date));
    }
}