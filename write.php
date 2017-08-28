<?php
	require("config/config.php");
	require("lib/db.php");
	$conn=db_init($config["host"], $config["dbuser"], $config["dbpwd"], $config["dbname"]);
	$result=mysqli_query($conn, "SELECT * FROM momo");
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags(Bootstrap) -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/bootstrap-4.0.0-beta/favicon.ico">

	<title>MOMO's Home</title>
	<link rel="stylesheet" type="text/css" href="/style.css?ver1">
	
	<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body id="target">
	<div class="container-fluid">
		<header class="jumbotron text-center">
				<img class="rounded-circle" src="https://scontent-lhr3-1.xx.fbcdn.net/v/t1.0-9/384319_3671281178497_1131814497_n.jpg?oh=df2884f280c89f485039fb2af5f37d65&oe=59EE6868" alt="dolphin">
				<h1 class="display-5"><a href="/momo.php">MOMO's Home</a></h1>
		</header>
			<div class="row">
				<nav class="col-md-3">
					<img class="img-fluid" src="https://scontent-lhr3-1.xx.fbcdn.net/v/t1.0-9/20882739_10212192807993269_8249505573646373980_n.jpg?oh=7ae7ea6cc82e89eeab9bb2bee7916210&oe=59EC5236" alt="profile">
					<ol class="nav flex-column">
					<?php
						while($row=mysqli_fetch_assoc($result)){
							echo '<li class="nav-item"><a class="nav-link active" href="/momo.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
						}
					?>
					</ol>
			<hr>
					<div id="control">
						<div class="btn-group" role="group" aria-label="Basic example">
							<input type="button" value="white" id="white_btn" class="btn btn-ligh"/>
							<input type="button" value="black" id="black_btn" class="btn btn-dark"/>
						</div>
						<br /><br />
						<a href="/write.php" class="btn btn-success">Add Your Topic</a>
					</div>
				</nav>

	<script src="/JavaScript/script.js"></script>

	<article>
		<form action="process.php" method="post">
			<div class="form-group">
				<label for="form-title">Title</label>
				<input type="text" class="form-control" name="title" id="form-title" aria-describedby="emailHelp" placeholder="Enter your title">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>

			<div class="form-group">
				<label for="form-author">Name</label>
				<input type="text" class="form-control" name="author" id="form-author" aria-describedby="emailHelp" placeholder="Enter your name"></input>
			</div>

			<div class="form-group">
				<label for="form-contents">Contents</label>
				<textarea type="text" rows="10" class="form-control" name="description" id="form-contents" aria-describedby="emailHelp" placeholder="Enter your contents"></textarea>
			</div>

			<input type="hidden" role="uploadcare-uploader" name="content"
       data-images-only="true" />
			<input type="submit" name="submit" class="btn btn-success">
		</form>
		<?php
			if(empty($_GET['id']) === false){
			 $sql="SELECT id,title FROM momo WHERE id=".$_GET['id'];
			 $result=mysqli_query($conn, $sql);
			 $row=mysqli_fetch_assoc($result);
			 echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
			 echo htmlspecialchars($row['description']);
			}


			if(empty($_GET['id']) == false ) {
			echo file_get_contents($_GET['id'].".txt");
			}
		?>

		<script>
  		UPLOADCARE_PUBLIC_KEY = "21c2baf2c1f73cbdd93b";
		</script>
		<script charset="utf-8" src="//ucarecdn.com/libs/widget/3.1.1/uploadcare.full.min.js"></script>

		<script>
			// role의 값이 uploadcare-uploader인 태그를 업로드 위젯으로 만들어라.
			// 그 위젯을 통해서 업로드가 끝났을 때
			// id 값이 description인 태그의 값 뒤에 업로드한 이미지 파일의 주소를 이미지 태그와 함께 첨부해라.
			var singleWidget = uploadcare.SingleWidget('[role=uploadcare-uploader]');
			singleWidget.onUploadComplete(function(info){
			document.getElementById('description').value = document.getElementById('description').value + '<img src="'+info.cdnUrl+'">';
			});
		</script>

		<script>
			// alert('Welcome beautiful people!');

			// chat //
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
				(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/598c63de1b1bed47ceb03f35/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
			})();
			// chat //
			</script>


		<div id="disqus_thread">
		<script>

			(function() { // DON'T EDIT BELOW THIS LINE
			var d = document, s = d.createElement('script');
			s.src = 'https://momos-home.disqus.com/embed.js';
			s.setAttribute('data-timestamp', +new Date());
			(d.head || d.body).appendChild(s);
			})();

		</script>
	</div>
 </article>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</div>
</body>
</html>
