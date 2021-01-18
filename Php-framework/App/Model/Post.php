<?php 

/**
 * 
 * @author : Théo MOUMDJIAN 
 * @author : Guillaume RISCH 
 * 
 * @brief : User model
 */

require_once(__DIR__.'/Post.php');

class Post extends Model {

    protected $id_post;
    protected $text;
    protected $picture;
    protected $swagCounter;
    protected $loveCounter;
    protected $cuteCounter;
    protected $stylishCounter;
    protected $myTags;
    

    function __construct($id_post, $text, $picture, $swagCounter, $loveCounter, $cuteCounter, $stylishCounter,$tags)
    {
        $this->id_post = $id_post;
        $this->text = $text;
        $this->picture = $picture;
        $this->swagCounter = $swagCounter;
        $this->loveCounter = $loveCounter;
        $this->cuteCounter = $cuteCounter;
        $this->stylishCounter = $stylishCounter;
        $this->myTags = $tags;
    }

    public function getIdPost()
    {
        return $this->id_post;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getSwagCounter()
    {
        return $this->swagCounter;
    }

    public function getLoveCounter()
    {
        return $this->loveCounter;
    }

    public function getcuteCounter()
    {
        return $this->stylishCounter;
    }

    public function getStylishCounter()
    {
        return $this->stylishCounter;
    }

    public function getText()
    {
        return $this->text;
    }

    public static function insertNewPost($id_post, $text, $picture, $swagCounter, $loveCounter, $cuteCounter, $stylishCounter)
    {
        $DB = static::DBConnect();

        $request_newpost = $DB->prepare('INSERT INTO `post` (
                                                             `id_post`,
                                                             `text`,
                                                             `picture`,
                                                             `swagCounter`, 
                                                             `loveCounter`,
                                                             `cuteCounter`,
                                                             `stylishCounter`)
                                        VALUES ( ? , ?, ? , ? , ? ,?)');
        $request_newpost->execute ()                
    }

    public static function getPost($id_post)
    {
        $DB = static::DBConnect();

        $request_post = $DB->prepare('SELECT * FROM `post` WHERE `id_post` = ?');
        $request_post->execute([$id_post]);

        $response = $request_post->fetchAll();

        if(sizeof($response) == 0)
        {
            return false;
        }

        return new Post(
               $response[0]['id_post'];
               $response[0]['text'];
               $response[0]['picture'];
               $response[0]['swagCounter'];
               $response[0]['loveCounter'];
               $response[0]['cuteCounter'];
               $response[0]['stylishCounter'];

        );
    }

    public static function searchPost($tag)
    {
        $DB = static::DBConnect();

        $request_tag = $DB->prepare('SELECT * FROM `post` WHERE `tag` = ? ');
        $request_tag->execute([$tag]);
        $response = $DB->fetchaAll();

        if(sizeof($response) == 0)
        {
            return false;
        }

        return new Post (
            $response[0]['id_post'];
            $response[0]['text'];
            $response[0]['picture'];
            $response[0]['swagCounter'];
            $response[0]['loveCounter'];
            $response[0]['cuteCounter'];
            $response[0]['stylishCounter'];
        );
        
    }



}