<?php 

/**
 * 
 * @author : Théo MOUMDJIAN 
 * @author : Guillaume RISCH 
 * @author : Ousama LOURGUI
 * @author : Haitam FERTOUT
 * 
 * @brief : User model
 */


 class Tag extends Model {


    protected $tag;
    protected $id_post;

    function __construct($tag)
    {
        $this->tag = $tag;
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function getId

    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    public static function insertNewTag($tag)
    {
        $DB = static::DBConnect();

        $request_addtag = $DB->prepare('INSERT INTO `tag` VALUES (?)');
        $request_addtag->execute([$tag]);

        return $DB->lastInsertId();
    }


}
