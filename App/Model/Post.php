<?php


class Post extends Model{

    
private $id;
private $title;
private $body;
private $date;
private $image;
private $tag;



function __construct($title,$body,$date,$image,$tag){
    
    $this->title = $title;
    $this->body = $body;
    $this->date = $date;
    $this->image = $image;
    $this->tag = $tag;
}

public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}


public function getBody(){
    return $this->body;
}

public function setBody($body){
    $this->body = $body;
}

public function getDate(){
    return $this->date;
}

public function setDATE($date){
    $this->date = $date;
}

public function getImage(){
    return $this->image;
}

public function setImage($image){
    $this->image = $image;
}

public function getTag(){
    return $this->tag;
}

public function setTag($tag){
    $this->tag = $tag;
}


static function getPost(){

    $DB = static::DBConnect();
    $stmt = $DB->prepare('SELECT * FROM `posts`');
    $stmt->execute();
    
    $result = $stmt->fetchAll();

        if(sizeof($result) == 0)
        {
            return false;
        }

        $listPost = [];

        for($i = 0; $i < sizeof($result); ++$i)
        {
            array_push($listPost, new Post(
                $result[$i]['id'],
                $result[$i]['title'],
                $result[$i]['body'],
                $result[$i]['image'],
                $result[$i]['tag']
            ));
        }
      
        return $listPost;

    }

    

   static function insertNewPost($title,$body,$image,$tag)
    {
        $DB = static::DBConnect();

        $request_newpost = $DB->prepare('INSERT INTO `posts` (
                                                             `title`,
                                                             `body`,                                                 
                                                             `image`,
                                                             `tag`)
                                        VALUES (  ? , ? , ? , ?)');
        $request_newpost->execute ([$title,$body,$image,$tag]);

        return $DB->lastInsertId();

    }

}
?>