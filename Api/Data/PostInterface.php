<?php
namespace TCK\Blog\Api\Data;


interface PostInterface
{
    /**
     * Constantes.
     */
    const POST_ID           = 'post_id';
    const URL_KEY           = 'url_key';
    const SEO_KEYWORDS      = 'seo_keywords';
    const SEO_DESCRIPTION   = 'seo_description';
    const TITLE             = 'title';
    const CONTENT           = 'content';
    const CREATION_TIME     = 'creation_time';
    const UPDATE_TIME       = 'update_time';
    const IS_ACTIVE         = 'is_active';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get URL Key
     *
     * @return string
     */
    public function getUrlKey();

    /**
     * Get SEO Keywords
     *
     * @return string
     */
    public function getSeoKeywords();


    /**
     * Get SEO Description
     *
     * @return string
     */
    public function getSeoDescription();

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Set ID
     *
     * @param int $id
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setId($id);

    /**
     * Set URL Key
     *
     * @param string $url_key
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setUrlKey($url_key);

    /**
     * Set SEO Keywords
     *
     * @param string $seo_keywords
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setSeoKeywords($seo_keywords);

    /**
     * Set SEO Description
     *
     * @param string $seo_description
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setSeoDescription($seo_description);

    /**
     * Return full URL including base url.
     *
     * @return mixed
     */
    public function getUrl();

    /**
     * Set title
     *
     * @param string $title
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setTitle($title);

    /**
     * Set content
     *
     * @param string $content
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setContent($content);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return \TCK\Blog\Api\Data\PostInterface
     */
    public function setIsActive($isActive);
}
