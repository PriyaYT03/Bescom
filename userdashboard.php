<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Tracking System Dashboard</title>
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="profile.css">
    <script src="profile.js"></script>

</head>
<body>
<?php  
            session_start();
            include 'b-d.php';
            ?>

    <aside class="sidebar">
        <h2>File Tracking System</h2>
        <nav>
            <a href="home.php">Home</a>
            <a href="create.html">Create File</a>
            <a href="browse.html">Browse Files</a>
            <a href="workflow.html">Departmental Workflow</a>
            <a href="reports.php">Reports</a>
            <a href="logout.php">Logout</a>
        </nav>
    </aside>

    
    <main class="main-content">
        <!-- Header -->
        <header>
            <div class="title">Dashboard</div>
            <div class="user-profile">
                <span class="username">Hello, User</span>
    		<div class="profile-container">
        	<img src="profilepic.jpg" alt="Profile" class="profile-icon" onclick="openModal()">
	
		
    <div id="profileModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Profile</h2>
            
            
            <form id="profileForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" placeholder="Enter your phone number" required>
                </div>
                
        
                <div class="form-group">
                    <label for="profilePicture">Change Profile Picture</label>
                    <input type="file" id="profilePicture" accept="image/*" onchange="previewImage(event)">
                    <img id="preview" class="preview-image" alt="Profile Preview">
                </div>
                
                <button type="submit" onclick="saveProfile()">Save Changes</button>
            </form>
        </div>
    </div>

    		</div>
            </div>
        </header>

        <section class="summary-cards">
            <div class="card">
                <h3>Files in Progress</h3>
                <p id="filesInProgress">
            <?php
            try {
            $query = "select COUNT(*) as count from files a, file_movements b where a.file_id=b.file_id and b.user_id in (select user_id from users where username=:user_name) and a.status='In Progress'";
            $username=$_SESSION['username'];
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_name', $username);
            $stmt->execute();
            $countoffilesinprogress = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo($countoffilesinprogress[0]['count']);
        } catch (PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
        ?>
                </p>
            </div>
            <div class="card">
                <h3>Pending Files</h3>
                <p id="pendingAcknowledgments">
                <?php
            try {
            $query = "select COUNT(*) as count from files a, file_movements b where a.file_id=b.file_id and b.user_id in (select user_id from users where username=:user_name) and a.status='Pending'";
            $username=$_SESSION['username'];
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_name', $username);
            $stmt->execute();
            $countoffilesinpending = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo($countoffilesinpending[0]['count']);
        } catch (PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
        ?>
                </p>
            </div>
            <div class="card">
                <h3>Approved Files</h3>
                <p id="departmentalStats">
                <?php
            try {
            $query = "select COUNT(*) as count from files a, file_movements b where a.file_id=b.file_id and b.user_id in (select user_id from users where username=:user_name) and a.status='Approved'";
            $username=$_SESSION['username'];
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_name', $username);
            $stmt->execute();
            $countoffilesinpending = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo($countoffilesinpending[0]['count']);
        } catch (PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
        ?>

                </p>
            </div>
            <div class="card">
                <h3>Recent Activity</h3>
                <p>Last update: 10 mins ago</p>
            </div>
        </section>


        <section class="activity-log">
            <h2>Recent File Activity</h2>
            <?php  
            
            try {
            $query = "SELECT a.file_id, a.file_name, a.department_id, a.status, a.updated_at, b.user_id
          FROM files a
          JOIN file_movements b ON a.file_id = b.file_id
          WHERE b.user_id IN (SELECT user_id FROM users WHERE username = :user_name)";

            $username=$_SESSION['username'];
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':user_name', $username);
            $stmt->execute();
            // Fetch the results as an associative array
            $fileActivities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $error_message = "Database error: " . $e->getMessage();
        }
    ?>
            <table>
                <thead>
                    <tr>
                        <th>File Number</th>            
                        <th>File Name</th>
                        <th>Status</th>
                        <th>User ID</th>
                    </tr>           
                </thead>
                <tbody id="activityTable">
                    <?php
                if (count($fileActivities) > 0) {
                // Loop through each activity record and create a table row for each
                foreach ($fileActivities as $activity) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($activity['file_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($activity['file_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($activity['status']) . "</td>";
                    echo "<td>" . htmlspecialchars($activity['user_id']) . "</td>";
                    
                    echo "</tr>";
                }
            }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

  




    
</body>
</html>
