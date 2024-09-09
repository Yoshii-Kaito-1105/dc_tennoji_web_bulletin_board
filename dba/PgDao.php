<?php

class PgDao {
    private $host = "localhost";
    private $port = "5432";
    private $dbName = "postgres";
    private $userName = "postgres";
    private $password = "x9JVqhNf";

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
    public function setUserName(string $userName): void {
        $this->userName = $userName;
    }
    /**
     * @return ユーザー名
     */
    public function getUserName(): string {
        return $this->userName;
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