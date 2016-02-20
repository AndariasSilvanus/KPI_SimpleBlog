<?php
	$con=mysql_connect("localhost", "root","") or die (mysql_error());
    mysql_select_db("simple_blog", $con);

	$id = $_GET['id'];
	$nama = $_GET['nama'];
	$komentar = $_GET['komentar'];
	$email = $_GET['email'];

	$query = "INSERT INTO `komentar` (id, nama, email, komentar) VALUES ('{$id}', '{$nama}', '{$email}', '{$komentar}')";
	$result = mysql_query($query) or die(mysql_error());

	if (!$result)
		echo "<h1>Insert query 1 salah</h1>";

	$query2 = "SELECT * FROM `komentar` WHERE id=$id";
	$result2 = mysql_query($query2) or die(mysql_error());
	//$hasil = mysql_fetch_array($result2);

	if (!$result2)
		echo "<h1>Insert query 2 salah</h1>";

	//$nums = mysql_fetch_assoc($result2);
	//$i = 0;

	while ($hasil=mysql_fetch_assoc($result2))
	{
		echo "
		<li class='art-list-item'>
			<div class='art-list-item-title-and-time'>
				<h2 class='art-list-title'><a href='post.html'>".$hasil['nama']."</a></h2>
				<div class='art-list-time'>2 menit lalu</div>
			</div>
			<p>".$hasil['komentar']."</p>
		</li> ";
		//$i++;
	}


	//$nums = mysql_fetch_assoc($result2);
	//$i = 0;
	//echo "<h1>Masuk Insert!</h1>".$nums;
	/*
	while (mysql_fetch_assoc($result2))
	{
		echo "
		<li class='art-list-item'>
			<div class='art-list-item-title-and-time'>
				<h2 class='art-list-title'><a href='post.html'>".$hasil['nama']."</a></h2>
				<div class='art-list-time'>2 menit lalu</div>
			</div>
			<p>".$hasil['komentar']."</p>
		</li> ";
		//$i++;
	}
	*/

	mysql_close();
?>