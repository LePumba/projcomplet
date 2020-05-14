<?php

class User
{
    // The user login.
    private $login;
    // The user password.
    private $password;


    /**
     * Set the user login.
     *
     * @param String $login
     */
    public function setLogin(String $login)
    {
        $this->login = $login;
        return $this;
    }


    /**
     * Return the user login.
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }


    /**
     * Return the password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * Set the password.
     *
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
        return $this;
    }


   /**
    * Check the password and return true if password match database encoded password.
    *
    * @param string $plainPassword
    * @param string $encodedPassword
    * @return bool
    */
    public function checkPassword(string $plainPassword, string $encodedPassword)
    {
       return password_verify($plainPassword, $encodedPassword);
    }

    /**
     * @param DB $db
     * @return bool
     */
    public function save()
    {
        $password = password_hash($this->getPassword(), PASSWORD_BCRYPT);
        // Check if user exists, then update, create with insert otherwise.
        // SELECT count(*) FROM user WHERE login = $this->>getLogin()
        // 0 = il n'existe pas ; > 0 = existe => update.
        $result = DB::getLink()->query("INSERT OR UPDATE");
        return $result;
    }


    /**
     * Hydrate User object.
     *
     * @param string $login
     * @param string $password
     */
    public function hydrate(string $login, string $password)
    {
        $this->setLogin($login)->setPassword($password);
    }
}