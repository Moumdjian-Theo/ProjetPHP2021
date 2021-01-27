<?php


$listStyles = ['adminpannel'];
$listJS = ['adminpannel'];

ob_start();

?>
<main>

        
    <div class="user"> 
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Drop</th>
                </tr>
            </thead>
            <tbody>

            
            <?php 
            if($usercount != 0)
            {

            
                foreach($userlist as $user)
                {
                    echo "<tr>";
                    echo "<form method=\"post\" action=\"/projetphp2021/edit.php?id=".$user->getId()."\">";
                    echo "<td>".$user->getId()."</td>";
                    echo "<td>".$user->getPseudo()."</td>";
                    echo "<td>".$user->getMail()."</td>";
                    echo "<td>".$user->getPassword()."</td>";
                    // echo "<td>".$user->getRole()."</td>";
                    echo "<td> <select name=\"role\" id=\"role\">
                                    <option value=".$user->getRole().">".$user->getRole()."</option>
                                    <option value=\"0\">0</option>
                                    <option value=\"1\">1</option>
                                    <option value=\"2\">2</option>
                                </select>";

                    echo "<td> <input type=\"submit\" value=\"Edit\"/> </td>";
                    echo "<td> <a href=\"/projetphp2021/deleteUser.php?id=".$user->getId()."\"> Delete </a> </td>";
                    echo "</form>";
                    echo "</tr>";
                }
            }
            else 
            {

            }

            ?>      
            </tbody>
        </table>
    </div>

     <div class ="post"> 
        <table class="content-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User_Id</th>     
                    <th>Title</th>
                    <th>Picture</th>
                    <th>Text</th>
                    <th>Date </th>
                    <th>Love</th>
                    <th>Cute</th>
                    <th>Trop Stylé</th>
                    <th>Swag</th>
                    <th>tag</th>
                    <th>Drop</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($postcount != 0)
                {
                    foreach($postlist as $post)
                    {
                        echo "<tr>";
                        echo" <td>".$post->getId()."</td>";
                        echo "<td>".$post->getUser_id()."</td>";
                        echo "<td>".$post->getTitle()."</td>";
                        echo "<td>".$post->getPicture()."</td>";
                        echo "<td>".$post->getBody()."</td>";
                        echo "<td>".$post->getDate()."</td>";
                        echo "<td>".$post->getLove()."</td>";
                        echo "<td>".$post->getCute()."</td>";
                        echo "<td>".$post->getTrop_Stylé()."</td>";
                        echo "<td>".$post->getSwag()."</td>";
                        echo "<td>".$post->getTag()."</td>";
                        echo "<td><a href=\"/projetphp2021/deletePost.php?id=".$post->getId()."\"> Delete </a> </td>";
                        echo "</tr>";
                    }
                }
                else 
                {

                }

                ?>
            </tbody>
        </table>
    </div>
    
</main>




<?php
    $content = ob_get_clean();
    require_once __DIR__.'/../templateadmin.php';
?>
