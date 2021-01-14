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
    protected $picture;
    protected $swagCounter;
    protected $loveCounter;
    protected $cuteCounter;
    protected $stylishCounter;

    function __construct($id_post, $picture, $swagCounter, $loveCounter, $cuteCounter, $stylishCounter)
    {
        $this->id_post = $id_post;
        $this->picture = $picture;
        $this->swagCounter = $swagCounter;
        $this->loveCounter = $loveCounter;
        $this->cuteCounter = $cuteCounter;
    }

    public function getIdPost()
    {
        
    }




}