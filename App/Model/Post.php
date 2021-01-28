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
    private $nbrMax;
    
    

    function __construct($id,$user_id,$title,$picture, $body,$date,$cute,$trop_stylé,$love,$swag,$tag,$nbrMax){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->title = $title;
        $this->picture = $picture;
        $this->body = $body;
        $this->date = $date;
        $this->cute = $cute;
        $this->trop_stylé = $trop_stylé;
        $this->love = $love;
        $this->swag = $swag;
        $this->tag = $tag;
        $this->nbr = $nbrMax;
    
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

    public function getNbr()
    {
        return $this->nbr;
    }

    public function setNbr($nbr)
    {
        $this->nbr = $nbr;
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

    public static function insertSwagUser($id_user,$id_post)
    {
        $DB = static::DBConnect();

        $request_stylish = $DB ->prepare('INSERT INTO `reaction` (`typeR`,`id_user`,`id_post`) VALUES (?,?,?)');
        $request_stylish->execute(['swag',$id_user,$id_post]);

        return;

    }
    public static function insertTrop_StyléUser($id_user,$id_post)
    {
        $DB = static::DBConnect();

        $request_stylish = $DB ->prepare('INSERT INTO `reaction` (`typeR`,`id_user`,`id_post`) VALUES (?,?,?)');
        $request_stylish->execute(['trop_stylé',$id_user,$id_post]);

        return;

    }

    public static function insertCuteUser($id_user,$id_post)
    {
        $DB = static::DBConnect();

        $request_stylish = $DB ->prepare('INSERT INTO `reaction` (`typeR`,`id_user`,`id_post`) VALUES (?,?,?)');
        $request_stylish->execute(['cute',$id_user,$id_post]);

        return;

    }

    public static function insertLoveUser($id_user,$id_post)
    {
        $DB = static::DBConnect();

        $request_stylish = $DB ->prepare('INSERT INTO `reaction` (`typeR`,`id_user`,`id_post`) VALUES (?,?,?)');
        $request_stylish->execute(['love',$id_user,$id_post]);

        return;

    }

    public static function incrementLove($id_post)
    {
        $DB =static::DBConnect();

        $request_increment = $DB->prepare('UPDATE `post` SET `love` = love + 1 WHERE `id` = ?');
        $request_increment->execute([$id_post]);

        return;
    }
    public static function incrementCute($id_post)
    {
        $DB =static::DBConnect();

        $request_increment = $DB->prepare('UPDATE `post` SET `cute` = cute + 1 WHERE `id` = ?');
        $request_increment->execute([$id_post]);

        return;
    }
    public static function incrementTrop_Stylé($id_post)
    {
        $DB =static::DBConnect();

        $request_increment = $DB->prepare('UPDATE `post` SET `trop_stylé` = trop_stylé + 1 WHERE `id` = ?');
        $request_increment->execute([$id_post]);

        return;
    }
    public static function incrementSwag($id_post)
    {
        $DB =static::DBConnect();

        $request_increment = $DB->prepare('UPDATE `post` SET `swag` = swag + 1 WHERE `id` = ?');
        $request_increment->execute([$id_post]);

        return;
    }

    public static function isLoveLimit($id_post)
    {
        $DB = static::DBConnect();

        $request_limit = $DB->prepare('SELECT `love`,`nbr` FROM `post` WHERE `id` = ?');
        $request_limit->execute([$id_post]);
        $response = $request_limit->fetchAll();

        if(sizeof($response)==0)
        {
            return false;
        }
        if ($response[0]['love'] == $response[0]['nbr'])
        {
            return true;
        }
        else 
        {
            return false;
        }

        
    }

    public static function updateLoveLimit($id_post,$nbr)
    {
        $DB = static::DBConnect();
        $request_limit = $DB->prepare('UPDATE `post` SET`nbr` = ? WHERE `id` = ? ');
        $request_limit->execute([$nbr,$id_post]);

        return;
    }


    public static function insertNewPost($user_id, $title,$picture, $text, $date,$swag, $love, $cute, $stylish,$tag,$nbrMax)
    {
        $DB = static::DBConnect();

        $request_newpost = $DB->prepare('INSERT INTO `post` (
                                                             `user_id`,
                                                             `title`,
                                                             `picture`,
                                                             `body`,
                                                             `date`,
                                                             `cute`,
                                                             `trop_stylé`,
                                                             `love`,
                                                             `swag`, 
                                                             `tag`,`nbr`)
                                        VALUES (? , ?, ? , ? , ? ,?,?,?,?,?,?)');
        $request_newpost->execute ([$user_id,$title,$picture, $text, $date, $cute, $stylish, $love, $swag,$tag,$nbrMax]);
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
            $response[$i]['cute'],
            $response[$i]['trop_stylé'],
            $response[$i]['love'],
            $response[$i]['swag'],
            $response[$i]['tag'],
            $response[$i]['nbr']);

        
    }

    
    public static function getPosts()
    {
        $DB = static::DBConnect();

        $request_post = $DB->prepare('SELECT * FROM `post` ORDER BY `date` DESC');
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
                $response[$i]['cute'],
                $response[$i]['trop_stylé'],
                $response[$i]['love'],
                $response[$i]['swag'],
                $response[$i]['tag'],
                $response[$i]['nbr']));
        }
        return $listPost;
    }

    public static function searchPostByTag($tag)
    {
        $DB = static::DBConnect();

        $request_tag = $DB->prepare('SELECT * FROM `post` WHERE `tag` LIKE ? ');
        $request_tag->execute(["%".$tag."%"]);
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
                $response[$i]['cute'],
                $response[$i]['trop_stylé'],
                $response[$i]['love'],
                $response[$i]['swag'],
                $response[$i]['tag'],
                $response[$i]['nbr'])
                         
            );
        }

        return $listPost;
        
    }

    public static function searchPostByText($text)
    {
        $DB = static::DBConnect();

        $request_text = $DB->prepare("SELECT * FROM `post` WHERE `body` LIKE ?");
        $request_text->execute(["%".$text."%"]);

        $response = $request_text->fetchAll();

        

        if(sizeof($response) == 0)
        {
            return false;
        }

        $listPost = [];

        for($i = 0; $i < sizeof($response); ++$i)
        {
            array_push($listPost, new Post (
                $response[$i]['id'],
                $response[$i]['user_id'],
                $response[$i]['title'],
                $response[$i]['picture'],
                $response[$i]['body'],
                $response[$i]['date'],
                $response[$i]['cute'],
                $response[$i]['trop_stylé'],
                $response[$i]['love'],
                $response[$i]['swag'],
                $response[$i]['tag'],
                $response[$i]['nbr']
                )         
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

    public static function isInserted($id_user,$id_post)
    {
        $DB = static::DBConnect();
        $request_user = $DB->prepare("SELECT * FROM `reaction` WHERE `id_user` = ? and `id_post`= ?");
        $request_user->execute([$id_user,$id_post]);
        $response = $request_user->fetchAll();

        if(sizeof($response) == 0) return false;
        return true;
    }

    public static function isInsertedCute($id_user,$id_post)
    {
        $DB = static::DBConnect();

        $request_user = $DB->prepare('SELECT * FROM `reaction` WHERE `id_post` = ? AND `id_user` = ? AND `typeR` = ?');
        $request_user->execute([$id_user,$id_post,"cute"]);
        $response = $request_user->fetchAll();

        if(sizeof($response) == 0) return false;
        return true;
    }

    public static function isInsertedSwag($id_user,$id_post)
    {
        $DB = static::DBConnect();

        $request_user = $DB->prepare('SELECT * FROM `reaction` WHERE `id_post` = ? AND `id_user` = ? AND `typeR` = ?');
        $request_user->execute([$id_user,$id_post,"swag"]);
        $response = $request_user->fetchAll();

        if(sizeof($response) == 0) return false;
        return true;
    }

    public static function isInsertedStylish($id_user,$id_post)
    {
        $DB = static::DBConnect();

        $request_user = $DB->prepare('SELECT * FROM `reaction` WHERE `id_post` = ? AND `id_user` = ? AND `typeR` = ?');
        $request_user->execute([$id_user,$id_post,"cute"]);
        $response = $request_user->fetchAll();

        if(sizeof($response) == 0) return false;
        return true;
    }
    
    
    
}