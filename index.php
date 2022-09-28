<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./icon64.png">
        
        <title>TO DO</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-black">
        <div class="flex rounded-md bg-gray-200 w-auto">
            <img src="iconV50.png" class="px-3" alt="ICON" srcset=""/>
            <h1 class="text-2xl px-4 py-1 text-black">the Creator V</h1>
        </div> 
        <div class="sm:mx-36 py-10  my-28 bg-slate-200 rounded-md font-bold flex-col will-change-auto">
            <h1 class="m-6 text-cyan-900 text-3xl mx-16">Work To Done</h1>
            <hr class="border-dotted bg-blue-900"/>
            <center>     
                <form action="addTask.php" class="my-5 space-x-3 justify-center" method="POST">
                    <input type="text" name="task" class= "bg-white py-1  outline-blue-400 rounded-sm px-2 " placeholder="Enter Task Here" required/>
                    <button type="submit" name="add" class="rounded-lg text-white py-1 bg-purple-900 px-2 border-green-100 cursor-pointer hover:bg-purple-400 hover:text-black active:bg-transparent active:text-black">Add Task</button>
                </form>
            </center>
            </br></br>
            <table class="sm:container mx-20 text-left">
                <tr class="flex-row space-x-3 px-4 justify-around mx-20">
                    <th>#</th>
                    <th>Task</th>
                    <th >Status</th>
                    <th colspan=2 class="text-center">Action</th>
                    
                    <hr class='border-dotted bg-blue-900'>
                </tr>
                <?php
                            require 'conn.php';
                            $query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
                            $count = 1;
                            while($fetch = $query->fetch_array()){
                ?>
                <tr class=" m-4 flex-row space-x-3 px-4 justify-around mx-20">
                    <td><?php echo $count++?></td>
                    <td><?php echo $fetch['task']?></td>
                    <td><?php echo $fetch['status']?></td>
                    <td colspan=2 class="space-x-3 py-2">
                        <center>

                            <?php
                                if($fetch['status'] != "Done")
                                {
                                    echo '<a href="update.php?task_id='.$fetch['task_id'].'" ><span class="bg-green-600 hover:bg-green-500 hover:text-teal-50 py-1 px-2 rounded-xl text-center font-mono">Done</span> |';
                                }
                            ?>

                            <a href="delete.php?task_id=<?php echo $fetch['task_id']?>" <span class="bg-red-600 py-1 px-2 rounded-xl text-center font-mono hover:bg-red-500 hover:text-teal-50">Delete</span></a>     
                        </center>
                    </td>
                <tr>
                <?php
					}
				?>
            </table>      
        </div>
    </body>
</html>