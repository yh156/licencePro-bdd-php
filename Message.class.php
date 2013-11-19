<?php
class Message extends CelluleHTML
{
    private $id;
    private $data_message;
    
    public function __construct($message) {
        parent::__construct(null);
        $this->data_message = $message;
    }
    
    protected function construireCorps() {
       echo $this->data_message;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getData_message() {
        return $this->data_message;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setData_message($data_message) {
        $this->data_message = $data_message;
    }


}

?>

