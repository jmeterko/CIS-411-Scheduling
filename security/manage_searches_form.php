<?php
$title = "Control Panel - Manage Searches";
require '../security/headerInclude.php';
?>
<br /><h4>Manage Searches</h4><br />
<form action="../security/index.php?action=SecuritySearchDelete" method="post">

    <table border>
        <tr>
            <td><b>&nbsp;Search ID&nbsp;</b></td> <td><b>&nbsp;Search Name&nbsp;</b></td> <td>&nbsp;Rename&nbsp;</td> <td>&nbsp;Delete&nbsp;</td>
        </tr>
        <?php
        $j = 0;
        foreach ($results as $record) {
            $id = $record["id"];
            $name = $record["name"];

            echo "<tr>";
            echo "<td>&nbsp;$id</td><td>&nbsp;$name</td>";
            echo "<td>&nbsp;<a href=\"../security/index.php?action=SecuritySearchEdit&id=$id\">Edit</a></td>";
            echo "<td>&nbsp;<input type=\"checkbox\" name=\"record$j\" value=\"$id\"/></td>";
            echo "</tr>\n";
            ++$j;
        }

        ?>
    </table>
    <br/>
    <input type="hidden" name="numListed" value="<?php echo count($results); ?>"/>
    <?php
    if (userIsAuthorized("SecuritySearchDelete")) {
        echo "<input type=\"submit\" class=\"color-black submit_button\" value=\"Delete Selected\"/>";
    }
    ?>
</form>