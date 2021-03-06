<?php
/*
* Remove one of your servers
*
*/
?>

<br/>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <p>&nbsp;<br/></p></div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <ul class="breadcrumb">
                <li>
                    <a href="/index.php">Home</a> <span class="divider">/</span>
                </li>
                <li>
                    <a href="#">MyGrid</a> <span class="divider">/</span>
                </li>
                <li class="active">
                    Remove Server
                </li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12 centerinfo">
            <img src="/web/img/logo_300px_gray.png" alt="ServerGrid" />
        </div>
    </div>
    <div class="row-fluid">
        <div class="span4">

            <h2>
                Remove Server
            </h2>
            <p>
                Before you remove a server, remember to delete your crontab entry in your system and remove your serverGrid.php file
                from your system.
            </p>
        </div>

        <div class="span8">
            <?php
             if($responseMsg !=""){
                 echo"<div class=\"updatediv\">
                        <h3>System update:</h3>
                        ".$responseMsg."
                        </div>";
             }
            ?>

                <h2>Select Server</h2>

                <?php
                foreach($serverList as $server){
                    echo "<div class=\"graphbox\"><h3>".$server['serverName']."</h3><p>".$server['serverIdent']."<br/>".$server['serverOS']."</p>";

                    ?>
                    <form name="removeserver" action="/index.php" method="post">
                        <input type="submit" value="Remove <?php echo $server['serverName']; ?>" class="btn btn-danger" />

                        <input type="hidden" name="x" value="servergrid" />
                        <input type="hidden" name="y" value="myservers" />
                        <input type="hidden" name="z" value="remove" />
                        <input type="hidden" name="action" value="remove" />
                        <input type="hidden" name="serverid" value="<?php echo $server['serverid'];?>" />
                    </form>
                    </div><br/>
                <?php
                }
                ?>


        </div>

    </div>

</div>
</div>