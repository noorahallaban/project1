<html>
<head>
	<title>ToDoo List Application PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "", "todoo");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
	}
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
        header('location: index.php');
    }
    
    
    ?>
</head>


<body class="back">
	<form action="signin.php">
<button type="submit" name="submit" id="add_btn1" class="add_btn1">Sign in</button></form>
<!-- <header>
    <h1 class="title">❝ Lucè <span class="title1">Perfumes</span></h1>

    <nav>
        <ul>
            <li> <a href="../HTML Project/Index.html" > Home</a></li>
            <li> <a href="../HTML Project/About.html" > About</a></li> 
            <li> <a href="../HTML Project/Registertion.html" > Registertion </a></li>
            <li> <a href="../HTML Project/Help.html" >Help </a></li>
            
        </ul>
    </nav>
</header> -->

	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDoo List Application </h2>
	</div>
    <?php
	date_default_timezone_set('Asia/Baghdad');
$date = date('d-m-y h:i:s');

?>
<h2 class="da">
   " <?php echo $date ; ?> "
</h2>
	<form method="post" action="index.php" class="input_form">
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>

    <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
<?php } ?>


</form>

<table>
	<thead>
		<tr>
			<th>Num</th>
			<th>Task</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>

</body>
</html>

