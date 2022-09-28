<?php
	require_once 'conn.php';
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
			$conn->query("INSERT INTO `task` (`task_id`, `task`, `status`) VALUES (NULL, '$task', 'Pending')");
			header('location:index.php');


            echo"<script type='text/javascript'>
                    window.onload = function () { alert('Welcome at c-sharpcorner.com.'); }
                </script>"; 
		}
	}
?>