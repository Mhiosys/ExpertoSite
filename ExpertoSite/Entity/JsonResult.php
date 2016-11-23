<?php
namespace Entity;

class JsonResult
{   
    var $success;
    var $warning;
    var $message;
    var $data;

    public function getSuccess()
    {
        return $this->success;
    }


    public function getWarning()
    {
        return $this->warning;
    }


    public function getMessage()
    {
        return $this->message;
    }


    public function getData()
    {
        return $this->data;
    }


    public function setSuccess($success)
    {
        $this->success = $success;
    }


    public function setWarning($warning)
    {
        $this->warning = $warning;
    }


    public function setMessage($message)
    {
        $this->message = $message;
    }

 /**
     * @param field_type $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}

?>