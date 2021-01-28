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

    private $id;
    private $user_id;
    private $title;
    private $picture;
    private $body;
    private $date;
    private $love;
    private $cute;
    private $trop_stylé;
    private $swag;
    private $tag;
    
    

    function __construct($id,$user_id,$title,$picture, $body,$date,$love,$cute,$trop_stylé,$swag,$tag){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->picture = $picture;
        $this->body = $body;
        $this->date = $date;
        $this->love = $love;
        $this->cute = $cute;
        $this->trop_stylé = $trop_stylé;
        $this->swag = $swag;
        $this->tag = $tag;
    }
    public function getId(){
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    
    public function getUser_id(){
        return $this->user_id;
    }
    
    public function setUser_id($user_id){
        $this->user_id = $user_id;
    }
    
    public function getBody(){
        return $this->body;
    }
    
    public function setBody($body){
        $this->body = $body;
    }

    
    public function setDATE($date){
        $this->date = $date;
    }
    
    public function getLove(){
        return $this->love;
    }
    
    public function setLove($love){
        $this->love = $love;
    }
    
    public function getCute(){
        return $this->cute;
    }
    
    public function setCute($cute){
        $this->cute = $cute;
    }
    
    public function getTrop_stylé(){
        return $this->trop_stylé;
    }
    
    public function setTrop_stylé($trop_stylé){
        $this->trop_stylé = $trop_stylé;
    }
    
    public function getSwag(){
        return $this->swag;
    }
    
    public function setSwag($swag){
        $this->swag = $swag;
    }

    public function getTag(){
        return $this->tag;
    }
    
    public function setTag($tag){
        $this->tag = $tag;
    }

    public function insertStylishUser($id_post)
    {
        $DB = static::DBConnect();

        $request_stylish = $DB ->prepare('INSERT INTO `reaction` (`id_user`,`id_post`,`typeR`) VALUES (?,?,stylish)');
        $request_stylish->execute([$_SESSION['id_user']],$id_post);

        return;

    }

    public function insertCuteUser($id_post)
    {
        $DB = static::DBConnect();

        $request_stylish = $DB ->prepare('INSERT INTO `reaction` (`id_user`,`id_post`,`typeR`) VALUES (?,?,cute)');
        $request_stylish->execute([$_SESSION['id_user']],$id_post);

        return;

    }

    public function insertSwagUser($id_post)
    {
        $DB = static::DBConnect();

        $request_stylish = $DB ->prepare('INSERT INTO `reaction` (`id_user`,`id_post`,`typeR`) VALUES (?,?,swag)');
        $request_stylish->execute([$_SESSION['id_user']],$id_post);

        return;

    }

    public function insertLoveUser($id_post)
    {
        $DB = static::DBConnect();

        $request_stylish = $DB ->prepare('INSERT INTO `reaction` (`id_user`,`id_post`,`typeR`) VALUES (?,?,Love)');
        $request_stylish->execute([$_SESSION['id_user']],$id_post);

        return;

    }


    public static function insertNewPost($user_id, $title,$picture, $text, $date,$swag, $love, $cute, $stylish,$tag)
    {
        $DB = static::DBConnect();

        $request_newpost = $DB->prepare('INSERT INTO `post` (
                                                             `user_id`,
                                                             `title`,
                                                             `picture`,
                                                             `body`,
                                                             `date`,
                                                             `swag`, 
                                                             `love`,
                                                             `cute`,
                                                             `trop_stylé`,`tag`)
                                        VALUES (? , ?, ? , ? , ? ,?,?,?,?,?)');
        $request_newpost->execute ([$user_id,$title,$picture, $text, $date, $swag, $love, $cute, $stylish,$tag]);
        return $DB->lastInsertId();

    }

    public static function getPost($id_post)
    {
        $DB = static::DBConnect();

        $request_post = $DB->prepare('SELECT * FROM `post` WHERE `id` = ?');
        $request_post->execute([$id_post]);

        $response = $request_post->fetchAll();

        if(sizeof($response) == 0)
        {
            return false;
        }

        return new Post(
            $response[$i]['id'],
            $response[$i]['user_id'],
            $response[$i]['title'],
            $response[$i]['picture'],
            $response[$i]['body'],
            $response[$i]['date'],
            $response[$i]['swag'],
            $response[$i]['love'],
            $response[$i]['cute'],
            $response[$i]['trop_stylé'],
            $response[$i]['tag']);

        
    }

    
    public static function getPosts()
    {
        $DB = static::DBConnect();

        $request_post = $DB->prepare('SELECT * FROM `post`');
        $request_post->execute();

        $response = $request_post->fetchAll();

        if(sizeof($response) == 0)
        {
            return false;
        }

        $listPost = [];

        for($i = 0; $i < sizeof($response); ++$i)
        {
            array_push($listPost,new Post(
                $response[$i]['id'],
                $response[$i]['user_id'],
                $response[$i]['title'],
                $response[$i]['picture'],
                $response[$i]['body'],
                $response[$i]['date'],
                $response[$i]['swag'],
                $response[$i]['love'],
                $response[$i]['cute'],
                $response[$i]['trop_stylé'],
                $response[$i]['tag']));
        }
        return $listPost;
    }

    public static function searchPostByTag($tag)
    {
        $DB = static::DBConnect();

        $request_tag = $DB->prepare('SELECT * FROM `post` WHERE `tag` = ? ');
        $request_tag->execute([$tag]);
        $response = $request_tag->fetchaAll();

        if(sizeof($response) == 0)
        {
            return false;
        }

        $listPost = [];

        for($i = 0; $i < sizeof($result); ++$i)
        {
            array_push($listPost, new Post (
                $response[$i]['id'],
                $response[$i]['user_id'],
                $response[$i]['title'],
                $response[$i]['picture'],
                $response[$i]['body'],
                $response[$i]['date'],
                $response[$i]['swag'],
                $response[$i]['love'],
                $response[$i]['cute'],
                $response[$i]['trop_stylé'],
                $response[$i]['tag'])
                         
            );
        }

        return $listPost;
        
    }

    public static function addNewTag($tag)
    {
        $DB = static::DBConnect();

        $request_addtag = $DB->prepare('INSERT INTO `post` (`tag`) VALUES (?)');
        $request_addtag->execute([$tag]);
        return;
    }

    public static function searchPostByText($text)
    {
        $DB = static::DBConnect();

        $request_text = $DB->prepare('SELECT * FROM `post` WHERE `text` LIKE `%?%`');
        $request_text->execute([$text]);

        $response = $request_text->fetchAll();

        

        if(sizeof($response) == 0)
        {
            return false;
        }

        $listPost = [];

        for($i = 0; $i < sizeof($result); ++$i)
        {
            array_push($listPost, new Post (
                $response[$i]['id'],
                $response[$i]['user_id'],
                $response[$i]['title'],
                $response[$i]['picture'],
                $response[$i]['body'],
                $response[$i]['date'],
                $response[$i]['swag'],
                $response[$i]['love'],
                $response[$i]['cute'],
                $response[$i]['trop_stylé'],
                $response[$i]['tag']
                )         
            );
        }
    }

    public static function deletePost($id_post)
    {
        $DB = static::DBConnect();

        $request_post = $DB->prepare('DELETE FROM `post` WHERE `id`=?');
        $request_post->execute([$id_post]);

        return;
    }

    public static function getPostCount()
    {
        $DB = static::DBConnect();

        $request_post = $DB->query("SELECT COUNT(*) FROM `post`");
        $count = $request_post->fetchColumn();
        return $count;
    }
    
}