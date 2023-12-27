<?php

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
        if (empty($this->_data['value'])) {
            $this->_errors[] = $this->_data['key'] . ' is required';
            
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

    public function isEmail()
    {
        if (filter_var($this->_data['value'], FILTER_VALIDATE_EMAIL) === false) {
            $this->_errors[] = $this->_data['key'] . " Not a valid Email";
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

    public function sanitize()
    {
        $this->_data['value'] = trim($this->_data['value']);
        $this->_data['value'] = stripslashes($this->_data['value']);
        $this->_data['value'] = htmlspecialchars($this->_data['value'], ENT_QUOTES, 'UTF-8');
        return $this;
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
