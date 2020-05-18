<?php


namespace connected;


class Help
{
    public $id;
    public $user;
    public $phone;
    public $question;
    public function __construct($id,$user,$phone,$question)
    {
        $this->id = $id;
        $this->user = $user;
        $this->phone = $phone;
        $this->question =$question;
    }
}