<?php 
session_start();
require_once "config/config.php";
if($_SESSION['password']===PASSWORD){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Contact Management</title>
		<link rel="stylesheet" href="../css/pager.css">
		<link rel="stylesheet" href="../css/style.css">
		<link href="../img/favicon.ico" rel="icon" type="image/gif"/>

		<script src="../js/js.js"></script>

		<script src="../js/sort.js"></script>
		<script src="../js/pager.js"></script>
	</head>
	<body>
	<div id="view" style="display:none"></div>
		<div class="wrapper">	
			<?php include "header.tmp.php"; ?>
			<ul id="nav">
				<a href="view/about.tmp.php"><li>About</li></a>
				<a href="model/add_member.php"><li>Add Contact</li></a>
				<a href="logout.php"><li>Logout</li></a>
				<li>Welcome <?php echo ucfirst($_SESSION['username']); ?></li>
			</ul>
			<div class="content">
				<table border="1" align="center" id="tablepaging" class="yui"">
					<caption style="color:white; font-variant:small-caps; font-weight:bolder;">List of Contact</caption>
					<thead>
					<tr>
						<th>Sl/No</th>
						<th onclick="sort_table(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" style="cursor:pointer;">Name</th>
						<th onclick="sort_table(people, 1, asc2); asc2 *= -1; asc3 = 1; asc1 = 1;" style="cursor:pointer;">Contact&nbsp;Choice</th>
						<th onclick="sort_table(people, 2, asc3); asc3 *= -1; asc1 = 1; asc2 = 1;" style="cursor:pointer;">Contact</th>
						<th onclick="sort_table(people, 3, asc4); asc4 *= -1; asc2 = 1; asc4 = 1;" style="cursor:pointer;">City</th>
						<th>Contact&nbsp;Date</th>
						<th>Comments</th>
						<th colspan="3">Action</th>
					</tr>
					</thead>
					<tbody id="people">
					<?php
					//*****************************************************
					//Read Contact Information From File Into HTML table
					//*****************************************************
					$display = "";
					$line_ctr = -1;
					$slno =1;
					$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'].'/';
					$filename = $DOCUMENT_ROOT.'data/'.'guestbook.txt';
					if (file_exists($filename))
					{
						$fp = fopen($filename, 'r');   //opens the file for reading

						while(true)
						{
							$line = fgets($fp);

							if (feof($fp))
							{
								break;
							}
							$line_ctr++;

						
				list($lastname, $firstname, $contactchoice, $phoneormemail, $city, $contact_date, $comments) = explode('|', $line);
							$display .= "<tr>";
								$display .= "<td align=center>".$slno++.".</td>";
								$display .= "<td>".$firstname."&nbsp;".$lastname."</td>";
								$display .= "<td>".$contactchoice."</td>";
								$display .= "<td align=center>".$phoneormemail."</td>";
								$display .= "<td>".$city."</td>";
								$display .= "<td>".date('d-M-Y',strtotime($contact_date))."</td>";

								if (empty($comments))
								{
									$comments = '&nbsp;';
								}

								$display .= "<td>".$comments."</td>";
								$display .= '<td align="center">
								<a href="javascript:void(0);" onclick="showDiv('.$line_ctr.');"><img src="../img/info.png" width="22" align="center"></a></td>';
								$display .= '<td align="center"><a href="../model/edit.php?line='.$line_ctr.'&name='.$firstname.'"><img src="../img/edit.png" width="22" align="center"></a></td>';
								$display .= '<td align="center"><a href="javascript:void(0);" onclick="deleteContact('.$line_ctr.');"><img src="../img/trash.png" width="22" align="center"></a></td>';

							$display .= "</tr>\n";  //added newline
						}


						fclose($fp );
						print $display;

					}
					else
					{
						print "<p>There are no names in the Contact Book</p>";
					}

					?>
					</tbody>
				</table>
				<div id="pageNavPosition" style="padding-top: 20px" align="center"></div>
				<script>
					var pager = new Pager('tablepaging', 10);
					pager.init();
					pager.showPageNav('pager', 'pageNavPosition');
					pager.showPage(1);
				</script>
				

			</div>
		<p></p>
		<?php include "footer.tmp.php"; ?>
		</div>

	</body>
</html>
<?php }else{
	header("location: login.php");
}
?>
