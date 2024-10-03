<?php

namespace PHPMVC\Lib;

trait Validate
{
    private $_regexPatterns = [
        'num'       => '/^[0-9]+(?:\.[0-9]+)?$/',
        'int'       => '/^[0-9]+$/',
        'float'     => '/^[0-9]+\.[0-9]+$/',
        'alpha'     => '/^[a-zA-Z\p{Arabic}\s ,-]+$/mui',
        'alphanum'  => '/^[a-zA-Z\p{Arabic}0-9\s ,-]+$/mui',
        'vdate'     => '/^(19|20|30)\d\d[- \/.](0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01|02])$/',
        'email'     => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'password'  => '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
        'password2' => '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z !#$%&()*+,-.\/:;=?@\[\\\]^_`{|}~]{8,}$/',
        'url'       => '/^(https?:\/\/)?(?:www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b(?:[-a-zA-Z0-9()@:%_\+.~?&\/=]*)$/',
    ];

    public function req($value)
    {
        return (bool) '' != $value || !empty($value);
    }
    public function num($value)
    {
        return (bool) preg_match($this->_regexPatterns['num'], $value);
    }
    public function int($value)
    {
        return (bool) preg_match($this->_regexPatterns['int'], $value);
    }
    public function float($value)
    {
        return (bool) preg_match($this->_regexPatterns['float'], $value);
    }
    public function alpha($value)
    {
        return (bool) preg_match($this->_regexPatterns['alpha'], $value);
    }
    public function alphanum($value)
    {
        return (bool) preg_match($this->_regexPatterns['alphanum'], $value);
    }
    public function eq($value, $matchAgainst)
    {
        return $value == $matchAgainst ? true : false;
    }
    public function eqField($value, $otherFieldValue)
    {
        return $value === $otherFieldValue ? true : false;
    }
    public function lt($value, $matchAgainst)
    {
        if ((is_numeric($value) && is_int($value)) || (is_numeric($value) && is_float($value))) {
            return $value < $matchAgainst;
        } elseif (is_string($value)) {
            return mb_strlen($value) < $matchAgainst;
        }
        return false;
    }
    public function gt($value, $matchAgainst)
    {
        if ((is_numeric($value) && is_int($value)) || (is_numeric($value) && is_float($value))) {
            return $value > $matchAgainst;
        } elseif (is_string($value)) {
            return mb_strlen($value) > $matchAgainst;
        }
        return false;
    }
    public function min($value, $min)
    {
        if ((is_numeric($value) && is_int($value)) || (is_numeric($value) && is_float($value))) {
            return $value >= $min;
        } elseif (is_string($value)) {
            return mb_strlen($value) >= $min;
        }
        return false;
    }
    public function max($value, $max)
    {
        if ((is_numeric($value) && is_int($value)) || (is_numeric($value) && is_float($value))) {
            return $value <= $max;
        } elseif (is_string($value)) {
            return mb_strlen($value) <= $max;
        }
        return false;
    }
    public function between($value, $min, $max)
    {
        if ((is_numeric($value) && is_int($value)) || (is_numeric($value) && is_float($value))) {
            return $value >= $min && $value <= $max;
        } elseif (is_string($value)) {
            return mb_strlen($value) >= $min && mb_strlen($value) <= $max;
        }
    }
    public function floatLike($value, $beforeDP, $afterDP)
    {
        if (!$this->float($value)) {
            return false;
        }
        $pattern = '/^[0-9]{' . $beforeDP . '}\.[0-9]{' . $afterDP . '}$/';
        return (bool) preg_match($pattern, $value);
    }
    public function vdate($value)
    {
        return (bool) preg_match($this->_regexPatterns['vdate'], $value);
    }
    public function email($value)
    {
        return (bool) preg_match($this->_regexPatterns['email'], $value);
    }
    public function url($value)
    {
        return (bool) preg_match($this->_regexPatterns['url'], $value);
    }
    public function password($value)
    {
        return (bool) preg_match($this->_regexPatterns['password'], $value);
    }
    public function password2($value)
    {
        return (bool) preg_match($this->_regexPatterns['password2'], $value);
    }
    public function isValid($roles, $inputType)
    {
        $errors = [];
        if (!empty($roles)) {
            foreach ($roles as $fieldName => $validationRoles) {
                $value = $inputType[$fieldName];
                $validationRoles = explode('|', $validationRoles);
                foreach ($validationRoles as $validationRole) {
                    if (array_key_exists($fieldName, $errors))
                        continue;
                    // in Case req
                    if (preg_match_all('/(req)/', $validationRole, $m)) {
                        if (($this->req($value) === false)) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName)]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(min)\((\d+)\)/', $validationRole, $m)) { // in Case Min
                        if (($this->min($value, $m[2][0]) === false)) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(max)\((\d+)\)/', $validationRole, $m)) { // in case Max
                        if (($this->max($value, $m[2][0]) === false)) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(eq)\((\w+)\)/', $validationRole, $m)) { // in Case eq
                        if (($this->eq($value, $m[2][0]) === false)) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(eqField)\((\w+)\)/', $validationRole, $m)) {
                        $otherFieldValue = $inputType[$m[2][0]];
                        if ($this->eqField($value, $otherFieldValue) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $this->language->get('text_label_' . $m[2][0])]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                        }
                    } elseif (preg_match_all('/(lt)\((\d+)\)/', $validationRole, $m)) { // in Case lt
                        if (($this->lt($value, $m[2][0]) === false)) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(gt)\((\d+)\)/', $validationRole, $m)) { // in case gt
                        if (($this->gt($value, $m[2][0]) === false)) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(between)\((\d+),(\d+)\)/', $validationRole, $m)) { // in case between
                        if (($this->between($value, $m[2][0], $m[3][0]) === false)) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0], $m[3][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } elseif (preg_match_all('/(floatLike)\((\d+),(\d+)\)/', $validationRole, $m)) { // in case floatLike
                        if ($this->floatLike($value, $m[2][0], $m[3][0]) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $m[1][0], [$this->language->get('text_label_' . $fieldName), $m[2][0], $m[3][0]]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    } else {
                        if ($this->$validationRole($value) === false) {
                            $this->messenger->add(
                                $this->language->feedKey('text_error_' . $validationRole, [$this->language->get('text_label_' . $fieldName)]),
                                Messenger::APP_MESSAGE_ERROR
                            );
                            $errors[$fieldName] = true;
                        }
                    }
                }
            }
        }
        return empty($errors) ? true : false;
    }
}
