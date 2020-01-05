<?php
/**
 * Copyright (c) 2020 - Leonardo Scapinello
 * • @leoscapinello at @ristocucina
 *
 *
 *
 */

class AccountSession
{

    private $id_account_session;
    private $id_account;
    private $session_token;
    private $insert_time;
    private $is_active;

    private $cookie_name = "RISTO_SESSION";


    public function __construct($autoload = true)
    {
        if ($autoload) $this->load();
    }


    private function load()
    {
        global $database;
        try {
            $cookie = $this->getCookieSession();
            if (not_empty($cookie)) {
                $database->query("SELECT id_account FROM accounts_session WHERE session_token = ?");
                $database->bind(1, $cookie);
                $result = $database->resultsetObject();
                $rowCount = $database->rowCount();
                if ($rowCount > 0) {
                    foreach ($result as $key => $value) {
                        $this->$key = $value;
                    }
                }
            }
        } catch (Exception $exception) {
        }
    }

    private function getCookieSession()
    {
        if (isset($_COOKIE[$this->cookie_name])) {
            $cookie = $_COOKIE[$this->cookie_name];
            if (not_empty($cookie)) {
                return $cookie;
            }
        }
        return null;
    }

    public function getIdAccountSession()
    {
        return $this->id_account_session;
    }

    public function getIdAccount()
    {
        return $this->id_account;
    }

    public function getSessionToken()
    {
        return $this->session_token;
    }

    public function getInsertTime()
    {
        return $this->insert_time;
    }

    public function getIsActive()
    {
        return $this->is_active;
    }

    public function isLogged()
    {
        if ($this->getIdAccount() !== 0) {
            if (not_empty($this->getIdAccount())) {
                return true;
            }
        }
        return false;
    }

}