<?php

class PgDao {
    private $host = "";
    private $port = "";
    private $dbName = "";
    private $user = "";
    private $password = "";

    // アクセサメソッド
    /**
     * @param host ホスト名
     */
    public function setHost(string $host): void {
        $this->host = $host;
    }
    /**
     * @return ホスト名
     */
    public function getHost(): string {
        return $this->host;
    }

    /**
     * @param ポート番号
     */
    public function setPort(string $port): void {
        $this->port = $port;
    }
    /**
     * @return ポート番号
     */
    public function getPort(): string {
        return $this->port;
    }

    /**
     * @param DB名
     */
    public function setDbName(string $dbName): void {
        $this->dbName = $dbName;
    }
    /**
     * @return DB名
     */
    public function getDbName(): string {
        return $this->dbName;
    }
    /**
     * @param ユーザー名
     */
    public function setUser(string $user): void {
        $this->user = $user;
    }
    /**
     * @return ユーザー名
     */
    public function getUser(): string {
        return $this->user;
    }
    /**
     * @param パスワード
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    /**
     * @return パスワード
     */
    public function getPassword(): string {
        return $this->password;
    }

}