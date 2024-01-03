<?php
require_once "ValidationException.php";
class Validation
{

    protected $_data     = array();
    protected $_errors   = array();


    public function key($key)
    {
        $this->_data['key'] = $key;
        return $this;
    }

    public function value($value)
    {
        $this->_data['value'] = $value;
        return $this;
    }

    public function required()
    {
        if ($this->_data['value'] === null) {
            throw new InvalidInput($this->_data['key'] . " is required");
        }
        return $this;
    }

    public function min($length, $inclusive = false)
    {
        $this->_data['min'] = $length;
        $verify = ($inclusive === true ? strlen($this->_data['value']) >= $length : strlen($this->_data['value']) > $length);

        if (!$verify) {
            $this->_errors[] = $this->_data['key'] . " should be more than $length characters";
        }

        return $this;
    }

    public function max($length, $inclusive = false)
    {
        $checkMaxAndMin = $this->_data['min'] < $length ? true : false;

        $verify = ($inclusive === true ? strlen($this->_data['value']) <= $length : strlen($this->_data['value']) < $length);

        if (!$checkMaxAndMin) {
            $this->_errors[] = $this->_data['key'] . " min should be less tha max";
        } else {
            if (!$verify) {
                echo "it should be less than $length \n";
                $this->_errors[] = $this->_data['key'] . " should be less than $length characters";
            }
        }

        return $this;
    }

    public function between($minValue, $maxValue, $inclusive = false)
    {
        $this->_data['min'] = $minValue;
        $this->_data['max'] = $maxValue;

        $verify = ($inclusive === true ?
            ($this->_data['value'] >= $minValue && $this->_data['value'] <= $maxValue) : ($this->_data['value'] > $minValue && $this->_data['value'] < $maxValue)
        );

        if (!$verify) {
            throw new InvalidInput($this->_data['key'] . " should be between $minValue and $maxValue");
        }

        return $this;
    }

    public function lengthBetween($minLength, $maxLength, $inclusive = false)
    {
        $this->_data['min_length'] = $minLength;
        $this->_data['max_length'] = $maxLength;

        $length = strlen($this->_data['value']);
        $verify = ($inclusive === true ?
            ($length >= $minLength && $length <= $maxLength) : ($length > $minLength && $length < $maxLength)
        );

        if (!$verify) {
            throw new InvalidInput($this->_data['key'] . " length should be between $minLength and $maxLength characters");
        }

        return $this;
    }

    public function isEmail()
    {
        if (filter_var($this->_data['value'], FILTER_VALIDATE_EMAIL) === false) {
            $this->_errors[] = $this->_data['key'] . " Not a valid Email";
        }
        return $this;
    }

    public function isNumber()
    {
        if (!is_numeric($this->_data['value'])) {
            throw new InvalidInput($this->_data['key'] . " is not a valid number");
        }
        return $this;
    }

    public function isUrl()
    {
        if (filter_var($this->_data['value'], FILTER_VALIDATE_URL) === false) {
            $this->_errors[] = $this->_data['key'] . " Not a valid URL";
        }
        return $this;
    }

    public function sanitize($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

        return $data;
    }

    public function isValid()
    {
        if (empty($this->_errors)) return true;
    }

    public function getErrors()
    {
        return $this->_errors;
    }
}
