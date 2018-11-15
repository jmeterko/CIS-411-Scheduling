<?php
	$title = "Control Panel - Manage Roles";
	require '../security/headerInclude.php';
?>
	<br /><h4>Manage Roles</h4><br />

    <?php
        if (userIsAuthorized("SecurityRoleAdd")) {
            echo "<a href=\"../security/index.php?action=SecurityRoleAdd\">Add Role</a><p/><br />";
        }
    ?>
    <form action="../security/index.php?action=SecurityRoleDelete" method="post">
        <table border>
            <tr>
                    <td><b>Name</b></td> <td><b>Description</b></td> <td></td> <td></td>
            </tr>
            <?php
                $j = 0;
                foreach ($results as $record) {
                    $name = $record["Name"];
                    $desc = $record["Description"];
                    $role_ID = $record["RoleID"];

                    echo "<tr>";
                    echo "<td>$name</td><td>$desc</td>";
                    if (userIsAuthorized("SecurityRoleEdit")) {
                        echo "<td><a href=\"../security/index.php?action=SecurityRoleEdit&id=$role_ID\">Edit</a></td>";
                    } else {
                        echo "<td></td>";
                    }
                    if (userIsAuthorized("SecurityRoleDelete")) {
                        echo "<td><input type=\"checkbox\" name=\"record$j\" value=\"$role_ID\"/></td>";
                    } else {
                        echo "<td></td>";
                    }
                    echo "</tr>\n";
                    ++$j;
                }

            ?>
        </table>
        <br/>
        <input type="hidden" name="numListed" value="<?php echo count($results); ?>"/>
        <?php
            if (userIsAuthorized("SecurityRoleDelete")) {
                echo "<input type=\"submit\" class=\"color-black submit_button\" value=\"Delete Selected\"/>";
            }
        ?>
        </form>