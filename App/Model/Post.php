<?php


class Post extends Model{

    
private $id;
private $title;
private $body;
private $date;
private $image;




function __construct($title,$body,$date,$image){
    
    $this->title = $title;
    $this->body = $body;
    $this->date = $date;
    $this->image = $image;
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
                $result[$i]['image']
            ));
        }
      
        return $listPost;

    }

    

   static function insertNewPost($title,$body,$image)
    {
        $DB = static::DBConnect();

        $request_newpost = $DB->prepare('INSERT INTO `posts` (
                                                             `title`,
                                                             `body`,                                                 
                                                             `image`)
                                        VALUES (  ? , ? , ?)');
        $request_newpost->execute ([$title,$body,$image]);

        return $DB->lastInsertId();

    }

}
?>