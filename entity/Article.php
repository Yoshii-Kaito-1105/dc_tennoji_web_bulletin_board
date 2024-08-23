<?php

class Article {
    // articlesテーブルのカラム
    private $userId;
    private $majorCategoryId;
    private $minorCategoryId;
    private $content;
    private $createdAt;
    private $updatedAt;


    // アクセサメソッド
    /**
     * @param userId ユーザーID
     */
    public function setUserId($userId): void {
        $this->userId = $userId;
    }
    /**
     * @return ユーザーID
     */
    public function getUserId(): string {
        return $this->userId;
    }


    /**
     * @param majorCategoryId 大分類カテゴリID
     */
    public function setMajorCategoryId($majorCategoryId): void {
        $this->majorCategoryId = $majorCategoryId;
    }
    /**
     * @return 大分類カテゴリID
     */
    public function getMajorCategoryId(): string {
        return $this->majorCategoryId;
    }


    /**
     * @param minorCategoryId 小分類カテゴリID
     */
    public function setMinorCategoryId($minorCategoryId): void {
        $this->minorCategoryId = $minorCategoryId;
    }
    /**
     * @return 大分類カテゴリID
     */
    public function getMinorCategoryId(): string {
        return $this->minorCategoryId;
    }


    /**
     * @param content 記事
     */
    public function setContent($content): void {
        $this->content = $content;
    }
    /**
     * @return 記事
     */
    public function getContent(): string {
        return $this->content;
    }


    /**
     * @param createAt 投稿日
     */
    public function setCreatedAt($createdAt): void {
        $this->createdAt = $createdAt;
    }
    /**
     * @return 投稿日
     */
    public function getcreatedAt(): string {
        return $this->createdAt;
    }

    
    /**
     * @param updatedAt 更新日
     */
    public function setUpdatedAt($updatedAt): void {
        $this->updatedAt = $updatedAt;
    }
    /**
     * @return 更新日
     */
    public function getUpdatedAt(): string {
        return $this->updatedAt;
    }


}