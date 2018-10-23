<?php
$title = "Results";
require '../view/headerInclude.php';
?>

(this is just a large table from my 370 project pls ignore)

<table id ="testTable">
    <thead><tr><th> Join Date </th><th>Username</th></tr></thead><tbody>
    <tr><td>February 4, 2018</td><td>@AaronWYO</td></tr>
    <tr><td>February 11, 2018</td><td>@Abheri</td></tr>
    <tr><td>February 11, 2018</td><td>@abraxusx</td></tr>
    <tr><td>February 9, 2018</td><td>@Ace_13</td></tr>
    <tr><td>February 11, 2018</td><td>@adestef</td></tr>
    <tr><td>February 6, 2018</td><td>@Aesr</td></tr>
    <tr><td>February 11, 2018</td><td>@Aldertag59</td></tr>
    <tr><td>February 11, 2018</td><td>@AleeKazar</td></tr>
    <tr><td>February 13, 2018</td><td>@allangoes92</td></tr>
    <tr><td>February 10, 2018</td><td>@Allucanhandle</td></tr>
    <tr><td>February 7, 2018</td><td>@almea</td></tr>
    <tr><td>February 13, 2018</td><td>@AndronicusX</td></tr>
    <tr><td>February 10, 2018</td><td>@AnxietyRx</td></tr>
    <tr><td>February 9, 2018</td><td>@applemason</td></tr>
    <tr><td>February 9, 2018</td><td>@Ardan147</td></tr>
    <tr><td>February 6, 2018</td><td>@AReznick</td></tr>
    <tr><td>February 10, 2018</td><td>@Arigor</td></tr>
    <tr><td>February 8, 2018</td><td>@Armadien</td></tr>
    <tr><td>February 11, 2018</td><td>@ArpyArp</td></tr>
    <tr><td>February 11, 2018</td><td>@Arynn80</td></tr>
    <tr><td>February 6, 2018</td><td>@Atomsk103</td></tr>
    <tr><td>February 6, 2018</td><td>@AzazelGrigori</td></tr>
    <tr><td>February 7, 2018</td><td>@Azeros101</td></tr>
    <tr><td>February 10, 2018</td><td>@Azmodyus</td></tr>
    <tr><td>February 13, 2018</td><td>@BadgerTX</td></tr>
    <tr><td>February 10, 2018</td><td>@Balavard</td></tr>
    <tr><td>February 8, 2018</td><td>@baldassare37</td></tr>
    <tr><td>February 6, 2018</td><td>@Barbarrella</td></tr>
    <tr><td>February 6, 2018</td><td>@BaronBlake</td></tr>
    <tr><td>February 13, 2018</td><td>@Bearfro</td></tr>
    <tr><td>February 5, 2018</td><td>@bfbad</td></tr>
    <tr><td>February 8, 2018</td><td>@Biff_Gnarly</td></tr>
    <tr><td>February 7, 2018</td><td>@bitraer</td></tr>
    <tr><td>February 7, 2018</td><td>@BlackKnight027</td></tr>
    <tr><td>February 4, 2018</td><td>@Bladefyre</td></tr>
    <tr><td>February 13, 2018</td><td>@BladeProfessor</td></tr>
    <tr><td>February 10, 2018</td><td>@Blazar_3C454</td></tr>
    <tr><td>February 11, 2018</td><td>@Blissbelle</td></tr>
    <tr><td>February 12, 2018</td><td>@Bluehawkeye911</td></tr>
    <tr><td>February 6, 2018</td><td>@BlueTheNonThief</td></tr>
    <tr><td>February 14, 2018</td><td>@bobrezende</td></tr>
    <tr><td>February 11, 2018</td><td>@Botaurus</td></tr>
    <tr><td>February 6, 2018</td><td>@Bradleeb</td></tr>
    </tbody></table>



<p><button id="btnExport" onclick="javascript:xport.toXLS('testTable', 'outputdata');"> Export to XLS</button> <em>&nbsp;&nbsp;&nbsp;Export the table to XLS with custom filename</em>
</p>
<br />

<script type="text/javascript">
    var xport = {
        _fallbacktoCSV: true,
        toXLS: function(tableId, filename) {
            this._filename = (typeof filename == 'undefined') ? tableId : filename;

            //var ieVersion = this._getMsieVersion();
            //Fallback to CSV for IE & Edge
            if ((this._getMsieVersion() || this._isFirefox()) && this._fallbacktoCSV) {
                return this.toCSV(tableId);
            } else if (this._getMsieVersion() || this._isFirefox()) {
                alert("Not supported browser");
            }

            //Other Browser can download xls
            var htmltable = document.getElementById(tableId);
            var html = htmltable.outerHTML;

            this._downloadAnchor("data:application/vnd.ms-excel" + encodeURIComponent(html), 'xls');
        },
        toCSV: function(tableId, filename) {
            this._filename = (typeof filename === 'undefined') ? tableId : filename;
            // Generate our CSV string from out HTML Table
            var csv = this._tableToCSV(document.getElementById(tableId));
            // Create a CSV Blob
            var blob = new Blob([csv], { type: "text/csv" });

            // Determine which approach to take for the download
            if (navigator.msSaveOrOpenBlob) {
                // Works for Internet Explorer and Microsoft Edge
                navigator.msSaveOrOpenBlob(blob, this._filename + ".csv");
            } else {
                this._downloadAnchor(URL.createObjectURL(blob), 'csv');
            }
        },
        _getMsieVersion: function() {
            var ua = window.navigator.userAgent;

            var msie = ua.indexOf("MSIE ");
            if (msie > 0) {
                // IE 10 or older => return version number
                return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)), 10);
            }

            var trident = ua.indexOf("Trident/");
            if (trident > 0) {
                // IE 11 => return version number
                var rv = ua.indexOf("rv:");
                return parseInt(ua.substring(rv + 3, ua.indexOf(".", rv)), 10);
            }

            var edge = ua.indexOf("Edge/");
            if (edge > 0) {
                // Edge (IE 12+) => return version number
                return parseInt(ua.substring(edge + 5, ua.indexOf(".", edge)), 10);
            }

            // other browser
            return false;
        },
        _isFirefox: function(){
            if (navigator.userAgent.indexOf("Firefox") > 0) {
                return 1;
            }

            return 0;
        },
        _downloadAnchor: function(content, ext) {
            var anchor = document.createElement("a");
            anchor.style = "display:none !important";
            anchor.id = "downloadanchor";
            document.body.appendChild(anchor);

            // If the [download] attribute is supported, try to use it

            if ("download" in anchor) {
                anchor.download = this._filename + "." + ext;
            }
            anchor.href = content;
            anchor.click();
            anchor.remove();
        },
        _tableToCSV: function(table) {
            // We'll be co-opting `slice` to create arrays
            var slice = Array.prototype.slice;

            return slice
                .call(table.rows)
                .map(function(row) {
                    return slice
                        .call(row.cells)
                        .map(function(cell) {
                            return '"t"'.replace("t", cell.textContent);
                        })
                        .join(",");
                })
                .join("\r\n");
        }
    };
</script>