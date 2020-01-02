<?php

class Accounts
{

    private $id_account;
    private $username;
    private $email;
    private $password;
    private $first_name;
    private $last_name;
    private $document;
    private $phone_number;
    private $insert_time;
    private $is_active;

    public function getIdAccount()
    {
        return $this->id_account;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function getInsertTime()
    {
        return $this->insert_time;
    }

    public function getIsActive()
    {
        return $this->is_active;
    }



}