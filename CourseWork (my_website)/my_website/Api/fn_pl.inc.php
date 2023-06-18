<?php 
require_once("fn_dal.inc.php");
require_once("oo_pl.inc.php");
require_once("oo_bll.inc.php");



function renderCoachingTable(array $pcoachlist)
{
    $trowdata = "";
    foreach ($pcoachlist as $tc) {
        $tlink = "<a class=\"btn btn-info\" href=\"staff.php?type=coach&id={$tc->id}\">More...</a>";
        $trowdata .= "<tr><td>{$tc->Bname}</td><td> {$tc->Aname}</td><td>{$tc->Summary}</td><td>{$tlink}</td></tr>";
    }
    $ttable = <<<TABLE
<table class="table table-striped table-hover">
	<thead>
		<tr>
	       	<th>Book Name</th>
            <th>Author Name</th>
             <th>Summary</th>
			<th>Link</th>
			<th> </th>
		</tr>
	</thead>
	<tbody>
	   {$trowdata}
	</tbody>
</table>
TABLE;
	   return $ttable;
}



?>