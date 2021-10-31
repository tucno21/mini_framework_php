<?php

namespace App\Library\Validation;

class Validation
{
    private static $rules = [];
    private static $inputs;
    private static $errors = [];
    private static $customMessages = [];


    public function validate(array $inputs, array $rules)
    {
        self::$rules = $rules;
        self::$inputs = $inputs;

        if (!empty($inputs)) {
            $this->callRules();

            if (count(self::$errors) === 0) {
                return true;
            } else {
                $error = json_decode(json_encode(self::$errors));
                return  $error;
            }
        }
        // return 'error';
    }

    private function callRules()
    {
        // $pattern = '[\p{L}]+';
        // $regex = '/^(' . $pattern . ')$/u';
        // $regex = '/^([\p{L}]+)$/u'; // only letters
        $regex = '/^[a-z_]+$/i'; // only letters
        // $regex = '/[^A-Za-zÀ-ÿ]+/u'; //busca solo letras

        //invoca al array de reglas
        foreach (self::splitRules() as $ruleKey => $rules) {
            //$rules / array de reglas

            foreach ($rules as $rule) {
                //$rule / solo regla

                $rule = trim($rule);
                $ruleMethod = 'validate' . ucfirst($rule);

                //preg_match($regex, $rule / si la regla solo tiene letras
                if (preg_match($regex, $rule)) {

                    if (method_exists(Validation::class, $ruleMethod)) {
                        self::$ruleMethod($ruleKey, $rule);
                    }

                    // } else {
                    //     throw new UndifedRuleException('Undifed Rule ' . $rule);
                    // }

                } else {
                    $ruleParam = explode(':', $rule);

                    $rule = trim($ruleParam[0]);
                    $params = explode(',', $ruleParam[1]);

                    $ruleMethod = 'validate' . $rule;

                    if (method_exists(Validation::class, $ruleMethod)) {
                        self::$ruleMethod($ruleKey, $rule, $params);
                    }
                    //         } else {
                    //             throw new UndifedRuleException('Undifed Rule ' . $rule);
                    //         }
                }
            }
        }
    }


    private static function splitRules()
    {
        //crear un array separando la reglas
        $rules = [];

        foreach (self::$rules as $ruleName => $rule) {
            $rules[$ruleName] = explode('|', $rule);
        }
        return $rules;
    }


    public static function validateAlpha(string $ruleKey, string $rule)
    {
        //solo letras sin espacio
        $value = self::getValue($ruleKey);

        if (!ctype_alpha($value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateAlpha_space(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!preg_match('/\A[A-Z ]+\z/i', $value)) {
            self::addError($ruleKey, $rule);
        }
    }


    public static function validateAlpha_dash(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!preg_match('/\A[a-z0-9_-]+\z/i', $value)) {
            self::addError($ruleKey, $rule);
        }
    }


    public static function validateAlpha_numeric(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!ctype_alnum($value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateAlpha_numeric_space(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!preg_match('/\A[A-Z0-9 ]+\z/i', $value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateDecimal(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!preg_match('/\A[-+]?\d{0,}\.?\d+\z/', $value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateInteger(string $ruleKey, string $rule)
    {
        //acepta numeros y decimal
        $value = self::getValue($ruleKey);
        if (!preg_match('/\A[\-+]?\d+\z/', $value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateIs_natural(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!ctype_digit($value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateIs_natural_no_zero(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!ctype_digit($value) && $value !== 0) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateNumeric(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);
        if (!preg_match('/\A[\-+]?\d*\.?\d+\z/', $value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateRequired(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);
        if (empty($value) || is_null($value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateEmail(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateUrl(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateMin(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);
        $length = mb_strlen($value);
        if (count($params) === 1) {
            $min = (int)min($params);
            if (!is_null($min) && $length < $min) {
                self::addError($ruleKey, 'min', [$min]);
            }
        } else {
            throw new \Exception("La regla mínima toma solo un parámetro");
        }
    }

    public static function validateMax(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);
        $length = mb_strlen($value);
        if (count($params) === 1) {
            $max = (int)max($params);
            if (!is_null($max) && $length > $max) {
                self::addError($ruleKey, 'max', [$max]);
            }
        } else {
            throw new \Exception("The max rule take only one parameter");
        }
    }

    public static function validateString(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!is_string($value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateText(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (!preg_match('/(\w+)([\W+^\s])/i', $value)) {
            self::addError($ruleKey, $rule);
        }
    }


    public static function validateBetween(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);
        $length = mb_strlen($value);
        if (count($params) === 2) {
            $min = (int)min($params);
            $max = (int)max($params);
            if (!is_null($min) && !is_null($max) && ($length < $min || $length > $max)) {
                self::addError($ruleKey, 'between', [$min, $max]);
            }
        } else {
            throw new \Exception("The between rule must take two parameters");
        }
    }

    public static function validateDatetime(string $ruleKey, string $rule)
    {
        $format = 'Y-m-d H:i:s';

        $value = self::getValue($ruleKey);
        $date = \DateTime::createFromFormat($format, $value);
        $errors = \DateTime::getLastErrors();
        if ($errors['error_count'] > 0 || $errors['warning_count'] > 0 || $date === false) {
            self::addError($ruleKey, 'datetime', [$format]);
        }
    }

    public static function validateTime(string $ruleKey, string $rule)
    {
        $format = 'H:i:s';

        $value = self::getValue($ruleKey);
        $date = \DateTime::createFromFormat($format, $value);
        $errors = \DateTime::getLastErrors();
        if ($errors['error_count'] > 0 || $errors['warning_count'] > 0 || $date === false) {
            self::addError($ruleKey, $rule, [$format]);
        }
    }

    public static function validateDate(string $ruleKey, string $rule)
    {
        $format = 'Y-m-d';

        $value = self::getValue($ruleKey);
        $date = \DateTime::createFromFormat($format, $value);
        $errors = \DateTime::getLastErrors();
        if ($errors['error_count'] > 0 || $errors['warning_count'] > 0 || $date === false) {
            self::addError($ruleKey, $rule, [$format]);
        }
    }

    public static function validateConfirm(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);
        $valueConfirm = self::getValue($ruleKey . '_confirm');
        if ($valueConfirm !== $value) {
            self::addError($ruleKey, $rule);
        }
    }


    public static function validateMatches(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);

        if (count($params) === 1) {
            $value2 = self::getValue($params[0]);
            $name = $params[0];

            if ($value2 !== $value) {
                self::addError($ruleKey, 'matches', [$name]);
            }
        } else {
            throw new \Exception("The max rule take only one parameter");
        }
    }


    public static function validateSlug(string $ruleKey, string $rule)
    {
        $pattern = '/^(?!-)((?:[a-z0-9]+-?)+)(?<!-)$/m';

        $value =  self::getValue($ruleKey);
        if (!is_null($value) && !preg_match($pattern, $value)) {
            self::addError($ruleKey, $rule);
        }
    }

    public static function validateChoice(string $ruleKey, string $rule, $params)
    {
        //busca que el numero sea lo que se dice en el controlador
        $value = self::getValue($ruleKey);
        if (count($params) <= 3) {
            if (!in_array($value, $params)) {
                $params = implode(', ', $params);
                self::addError($ruleKey, 'choice', [$params]);
            }
        } else {
            throw new \Exception("The choice rule not be take except 3 paramaters");
        }
    }


    public static function validateUnique(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);

        if ($value !== '') {
            if (count($params) === 2) {
                $model = $params[0];
                $colum = $params[1];

                $class = "App\Model\\" . $model;
                $instance = new $class();
                $result = $instance->where($colum, $value)->findAll();
                if (!empty($result)) {
                    self::addError($ruleKey, $rule);
                }
            }
        }
    }


    public static function validateNot_unique(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);

        if ($value !== '') {
            if (count($params) === 2) {
                $model = $params[0];
                $colum = $params[1];

                $class = "App\Model\\" . $model;
                $instance = new $class();
                $result = $instance->where($colum, $value)->findAll();

                if (empty($result)) {
                    self::addError($ruleKey, $rule);
                }
            }
        }
    }

    public static function validatePassword_verify(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);

        if ($value !== '') {
            if (count($params) === 2) {
                $colum = $params[1];
                $model = $params[0];
                $email = self::getValue($params[1]);

                $class = "App\Model\\" . $model;
                $instance = new $class();
                $result = $instance->where($colum, $email)->findAll();
                if (!empty($result)) {
                    if (!password_verify($value, $result[0]->$ruleKey)) {
                        self::addError($ruleKey, $rule);
                    }
                }
            }
        }
    }


    public static function validateRequiredFile(string $ruleKey, string $rule)
    {
        $value = self::getValue($ruleKey);

        if (empty($value['name']) || is_null($value['name'])) {
            self::addError($ruleKey, $rule);
        }
    }


    public static function validateMaxSize(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);

        if (count($params) === 1) {
            $max = (int)max($params) * 1048576;

            if (!is_null($max) && $value["size"] > $max) {
                self::addError($ruleKey, 'maxSize', [(int)max($params)]);
            }
        } else {
            throw new \Exception("The max rule take only one parameter");
        }
    }


    public static function validateType(string $ruleKey, string $rule, $params)
    {
        $value = self::getValue($ruleKey);
        $fileType = $value["type"];

        if ($fileType !== '') {
            $type = explode('/', $fileType);

            if (array_search($type[1], $params) === false) {

                self::addError($ruleKey, 'type', [$value["name"]]);
            }
        }
    }


    public static function getValue(string $ruleKey)
    {
        if (array_key_exists($ruleKey, self::$inputs)) {
            return self::$inputs[$ruleKey];
        }
        return null;
    }

    public static function addError(string $ruleKey, string $rule, ?array $attributes = [])
    {
        if (!array_key_exists($ruleKey, self::$errors)) {
            if (array_key_exists($ruleKey . '.' . $rule, self::$customMessages)) {
                self::$errors[$ruleKey] = self::$customMessages[$ruleKey . '.' . $rule];
            } else {
                self::$errors[$ruleKey] = (string)(new ValidationError($ruleKey, $rule, $attributes));
            }
        }
    }
}
