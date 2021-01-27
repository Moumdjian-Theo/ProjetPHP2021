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

                $listUser = $_SESSION['user']->getUsers();
                foreach($listUser as $user)
                {
                    echo "<tr>";
                    echo "<td>".$user->getId()."</td>";
                    echo "<td>".$user->getPseudo()."</td>";
                    echo "<td>".$user->getMail()."</td>";
                    echo "<td>".$user->getPassword()."</td>";
                    echo "<td>".$user->getRole()."</td>";
                    echo "<td> <a href=\"/projetphp2021/edit.php?id=".$user->getId()."\">Edit </a> </td>";
                    echo "<td> <a href=\"/projetphp2021/delete.php?id=".$user->getId()."\"> Delete </a> </td>";
                    echo "</tr>";
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
                    <th>Text</th>
                    <th>Image</th>
                    <th>Love</th>
                    <th>Swag</th>
                    <th>Cute</th>
                    <th>Stylé<th>
                    <th>Edit</th>
                    <th>Drop</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                    $listUser = $_SESSION['user']->getUsers();
                    foreach($listUser as $user)
                    {
                        echo "<tr>";
                        echo "<td>".$user->getId()."</td>";
                        echo "<td>".$user->getPseudo()."</td>";
                        echo "<td>".$user->getMail()."</td>";
                        echo "<td>".$user->getPassword()."</td>";
                        echo "<td> 1 </td>";
                        echo "<td> 1 </td>";
                        echo "<td> 1 </td>";
                        echo "</tr>";
                    }

                ?>
            </form>
            </tbody>
        </table>
    </div>
    
</main>




<?php
    $content = ob_get_clean();
    require_once __DIR__.'/../templateadmin.php';
?>
