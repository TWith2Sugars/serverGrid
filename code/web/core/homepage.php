<?php

/*
 * Default Homepage
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
                    <a href="/index.php" class="active">Home</a> <span class="divider">/</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12 centerinfo">
            <img src="/web/img/logo_300px_gray.png" alt="ServerGrid" />
        </div>
    </div>
    <?php
    // Response Messages
    if($responseMsg !=""){
        echo"<div class=\"row-fluid\">
            <div class=\"span12 updatediv\">
            <h3>System update:</h3>
            ".$responseMsg."
            </div>
        </div>";

    }
    ?>
    <div class="row-fluid">
        <div class="span4">

            <h2>
                ServerGrid
            </h2>
            <p>
                Welcome online to ServerGrid monitoring system, <?php echo $_SESSION['username']; ?>.
            </p>
            <p class="alert alert-info">
                This system is currently in beta release format.
            </p>
            <p>
                Add your servers to your grid, then copy the generated file to your system. Using the cron job ServerGrid creates for you
                to add monitoring to your systems. It's as simple as that - no mess, no fuss, no additional user accounts, no worries!
            </p>
        </div>

        <div class="span4">
            <h2>My Servers</h2>
            <div class="accordion" id="accordion-262915">

                <?php
                $firstone = 1;
                foreach($serverList as $server){

                    echo "
                        <div class=\"accordion-group\">
                            <div class=\"accordion-heading\">
                                 <a class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#accordion-262915\" href=\"#accordion-element-".$server['serverid']."\">".$server['serverName']."<br/></a>
                            </div>";
                    if($firstone == 1){
                        echo "<div id=\"accordion-element-".$server['serverid']."\" class=\"accordion-body collapse in\">";
                        $firstone = 0;
                    }
                    else{
                        echo "<div id=\"accordion-element-".$server['serverid']."\" class=\"accordion-body collapse\">";
                    }
                    echo " <div class=\"accordion-inner\">
                                    <h3>Server Settings</h3>
                                    <p>
                                        IDENT: ".$server['serverIdent']."<br/>
                                        OS: ".$server['serverOS']."<br/>
                                        DateCreated: ".$server['dateCreated']."<br/>
                                        Free Memory: ".$ObjSG->getFreeMem($server['serverid'])."<br/>
                                        Load Average: ".$ObjSG->getLoadAverage($server['serverid'])."
                                    </p>
                                    <p>
                                    <a href=\"/index.php/servergrid/dashboard/display/".$server['serverid']."\" class=\"btn btn-primary\">View</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        ";
                }
                ?>

            </div>
        </div>

        <div class="span4">
            <h2>
                Alerts
            </h2>
            <p>
                Latest system alerts
            </p>
            <?php
                foreach($serverList as $server){
                    echo $ObjSG->checkServerState($server['serverid']);
                }
            ?>
        </div>

    </div>
</div>

