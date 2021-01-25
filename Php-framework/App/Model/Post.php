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
    protected $swagList = [];
    protected $loveList = [];
    protected $cuteList = [];
    protected $stylishList = [];
    protected $myTags = [];
    

    function __construct($id_post, $text, $picture, $swagList, $loveList, $cuteList, $stylishList)
    {
        $this->id_post = $id_post;
        $this->text = $text;
        $this->picture = $picture;
        $this->swagList = $swagList;
        $this->loveList = $loveList;
        $this->cuteList = $cuteList;
        $this->stylishList = $stylishList;
    }

    public function getIdPost()
    {
        return $this->id_post;
    }

    public function getSwagCounter()
    {
        return $this->sizeof($swagList);
    }

    public function getCuteCounter()
    {
        return $this->sizeof($cuteList);
    }

    public function getstylishCounter()
    {
        return $this->sizeof($stylishList);
    }

    public function getloveCounter()
    {
        return $this->sizeof($loveList);
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getSwagUsers($id_post)
    {
        $DB = static::DBConnect();

        $request_swag = $DB->prepare('SELECT * FROM `user` WHERE `id_user` = (
                                                                                SELECT `id_user`
                                                                                FROM `reaction`
                                                                                WHERE `id_post` = ? AND typeR = `swag`)');
        $request_swag->execute([$id_post]);
        $response = $request_swag->fetchAll();

        if(sizeof($response) == 0)
        {
            return;
        }

        $listUser = [];

        for ($i = 0; i < sizeof($response); ++$i)
        {
            array_push($listTravel, new User (
                    $response[$i]['email'],
                    $response[$i]['id'],
                    $response[$i]['username'],
                    $response[$i]['profilePicture'],
                    $response[$i]['role']
            )
            );
        }

        return $listUser;
    }

    public function getLoveUsers()
    {
        $DB = static::DBConnect();

        $request_swag = $DB->prepare('SELECT * FROM `user` WHERE `id_user` = (
                                                                                SELECT `id_user`
                                                                                FROM `reaction`
                                                                                WHERE `id_post` = ? AND typeR = `love`)');
        $request_swag->execute([$id_post]);
        $response = $request_swag->fetchAll();

        if(sizeof($response) == 0)
        {
            return;
        }

        $listUser = [];

        for ($i = 0; i < sizeof($response); ++$i)
        {
            array_push($listTravel, new User (
                    $response[$i]['email'],
                    $response[$i]['id'],
                    $response[$i]['username'],
                    $response[$i]['profilePicture'],
                    $response[$i]['role']
            )
            );
        }

        return $listUser;
    }

    public function getCuteUsers()
    {
        $DB = static::DBConnect();

        $request_swag = $DB->prepare('SELECT * FROM `user` WHERE `id_user` = (
                                                                                SELECT `id_user`
                                                                                FROM `reaction`
                                                                                WHERE `id_post` = ? AND typeR = `cute`)');
        $request_cute->execute([$id_post]);
        $response = $request_cute->fetchAll();

        if(sizeof($response) == 0)
        {
            return;
        }

        $listUser = [];

        for ($i = 0; i < sizeof($response); ++$i)
        {
            array_push($listTravel, new User (
                    $response[$i]['email'],
                    $response[$i]['id'],
                    $response[$i]['username'],
                    $response[$i]['profilePicture'],
                    $response[$i]['role']
            )
            );
        }

        return $listUser;
    }

    public function getStylishUsers($id_post)
    {
        $DB = static::DBConnect();

        $request_swag = $DB->prepare('SELECT * FROM `user` WHERE `id_user` = (
                                                                                SELECT `id_user`
                                                                                FROM `reaction`
                                                                                WHERE `id_post` = ? AND typeR = `stylish`)');
        $request_stylish->execute([$id_post]);
        $response = $request_stylish->fetchAll();

        if(sizeof($response) == 0)
        {
            return;
        }

        $listUser = [];

        for ($i = 0; i < sizeof($response); ++$i)
        {
            array_push($listTravel, new User (
                    $response[$i]['email'],
                    $response[$i]['id'],
                    $response[$i]['username'],
                    $response[$i]['profilePicture'],
                    $response[$i]['role']
            )
            );
        }

        return $listUser;
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


    public function getText()
    {
        return $this->text;
    }

    public function setTag($listTag)
    {
        $this->myTags = $listTags;
    }

    public function getTag()
    {
        return $this->myTags;
    }

    public static function insertNewPost($id_post, $text, $picture, $swagList, $loveList, $cuteList, $stylishList)
    {
        $DB = static::DBConnect();

        $request_newpost = $DB->prepare('INSERT INTO `post` (
                                                             `id_post`,
                                                             `text`,
                                                             `picture`,
                                                             `swagList`, 
                                                             `loveList`,
                                                             `cuteList`,
                                                             `stylishList`)
                                        VALUES ( ? , ?, ? , ? , ? ,?)');
        $request_newpost->execute ([$id_post, $text, $picture, $swagList, $loveList, $cuteList, $stylishList]);

        return $DB->lastInsertId();

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
               $response[0]['id_post'],
               $response[0]['text'],
               $response[0]['picture'],
               $response[0]['swagList'],
               $response[0]['loveList'],
               $response[0]['cuteList'],
               $response[0]['stylishList'],

        );
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
                $response[$i]['id_post'],
                $response[$i]['text'],
                $response[$i]['picture'],
                $response[$i]['swagList'],
                $response[$i]['loveList'],
                $response[$i]['cuteList'],
                $response[$i]['stylishList'],
                )         
            )
        }
        
    }

    public static function addNewTag($tag)
    {
        $DB = static::DBConnect();

        $request_addtag = $DB->('INSERT INTO `post` (`tag`) VALUES (?)');
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
                $response[$i]['id_post'];
                $response[$i]['text'];
                $response[$i]['picture'];
                $response[$i]['swagList'];
                $response[$i]['loveList'];
                $response[$i]['cuteList'];
                $response[$i]['stylishList'];
                )         
            )
        }
    }
    
}