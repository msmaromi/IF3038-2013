<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Halaman Profil</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"></link>
        <script LANGUAGE="Javascript" src="js/script.js"></script>
    </head>
    
    <body>
    	<div id="header">
	    
	    <img id="logo" src="res/logo1.png" alt="to-do list"></img>
            <a id="dashboardLink" href="dashboard.php">dashboard</a>
            <input id="searchForm" type="text" name="keyword" onkeyup="showHint(this.value)"></input>
            <select id="filter" name="filter">
                <option selected>Select Filter ...</option>
                <option>All</option>
                <option>Username</option>
                <option>Judul Kategori</option>
                <option>Task</option>
            </select>
            <input id="submitForm" type="submit" name="search" value="search">
			<a href="#"><img id="profile" src="res/profileLogo.png" onclick="keProfil()";/></a>
            <a id="logout" href="#">Log Out</a>
	    <div class="suggest">Suggestion : <span id="textHint"></span></div>
        </div>
        
        <div id="spasi">
        </div>
        
        <div id="photoSpace">
        	<div id="userPhoto">
            	<img id="user" src="server/user.png" alt="userPhoto"/>
            </div>
        </div>
        
	<?php
	    //create connection
	    $con = mysqli_connect("127.0.0.1","root","root","distributedAgenda");
	    
	    //check the connection
	    if (mysqli_connect_errno($con)) {
		echo "Gagal melakukan koneksi ke MySQL : " . mysqli_connect_error();
	    }
	    
	    $result = mysqli_query($con,"SELECT * FROM user");
	    while($row = mysqli_fetch_array($result)){
		//echo $row1['username'] . "<br/>";
		echo "<div id='userData'>";
		    echo "<h2 id='biodataTitle'>BIODATA</h2>" . "<hr/>";
		    echo "<div id='biodataContent'>";
			echo "<div class='bioLeft'>";
			    echo "<p>Nama Lengkap :</p>";
			echo "</div>";
			echo "<div id='userFullName' class='bioRight'>";
			    echo "<p>" . $row['fullname'] . "</p>";
			echo "</div>";
			echo "<div class='bioLeft'>";
			    echo "<p>Username :</p>";
			echo "</div>";
			echo "<div class='bioRight'>";
			    echo "<p><em>" . $row['username'] . "</em></p>";
			echo "</div>";
			echo "<div class='bioLeft'>";
			    echo "<p>Tanggal Lahir :</p>";
			echo "</div>";
			echo "<div class='bioRight'>";
			    echo "<p>" . $row['tanggalLahir'] . "</p>";
			echo "</div>";
			echo "<div class='bioLeft'>";
			    echo "<p>Email :</p>";
			echo "</div>";
			echo "<div class='bioRight'>";
			    echo "<p>" . $row['email'] . "</p>";
			echo "</div>";
			echo "<div class='bioLeft'>";
			    echo "<p></p>";
			echo "</div>";
			echo "<div class='bioRight'>";
			    echo "<button id='editProfileBtn' onclick='showEditForm();'>Edit</button>";
			echo "</div>";
		    echo "</div>";
		echo "</div>";
	    }
	?>
	
        <!--<div id="userData">
            <h2 id="biodataTitle">BIODATA</h2>
            <hr/>
            <div id="biodataContent">
		<div class="bioLeft">
		    <p>Nama Lengkap :</p>
		</div>
		<div id="userFullName" class="bioRight">
		    <p>Anonymous User</p>
		</div>
		<div class="bioLeft">
		    <p>Username :</p>
		</div>
		<div class="bioRight">
		    <p><em>usernamedummy</em></p>
		</div>
		<div class="bioLeft">
		    <p>Tanggal Lahir :</p>
		</div>
		<div class="bioRight">
		    <p>January, 16 1980</p>
		</div>
		<div class="bioLeft">
		    <p>Email :</p>
		</div>
		<div class="bioRight">
		    <p>anon@sesuatu.co.id</p>
		</div>
		<div class="bioLeft">
		    <p></p>
		</div>
		<div class="bioRight">
		    <button id="editProfileBtn" onclick="showEditForm();">Edit</button>
		</div>
            </div>-->
	    
	    <div id=editForm>
		<form action="#" method="POST" enctype="multipart/form-data" name="uploadImage">
		    <div class="bioLeft">
			<p>new Full Name :</p>
		    </div>
		    <div class="bioRight">
			<input type=text></input>
		    </div>
		    <div class="bioLeft">
			<p>new Birthdate :</p>
		    </div>
		    <div class="bioRight">
			<input type=date></input>
		    </div>
		    <div class="bioLeft">
			<p>new Password :</p>
		    </div>
		    <div class="bioRight">
			<input type=text></input>
		    </div>
		    <div class="bioLeft">
			<p>Confirm new Password :</p>
		    </div>
		    <div class="bioRight">
			<input type=text></input>
		    </div>
		    
		    <div class="bioLeft">
			<p>Upload new avatar :</p>
		    </div>
		    <div class="bioRight">
			<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>"/>
			<input type="file" name="image"/>
		    </div>
		    <div class="bioLeft">
			<p></p>
		    </div>
		    <div class="bioRight">
			<input class="submitBtn" type="submit" value="Submit Form" name='upload' onclick="hideEditForm(); changeFullName();"></input>
		    </div>
		</form>
	    </div>
	    
            <h2 id="taskTitle">TASKS</h2>
            <hr/>
            <div id="taskContent">
		<div class="bioLeft">
		    <p>Nama</p>
		</div>
		<div class="bioRight">
		    <p>Deadline</p>
		</div>
		
		<div class="tableElmtLeft">
		    <p>Tugas Besar II Pemrograman Internet</p>
		</div>
		<div class="tableElmtRight">
		    <p>March, 23 2013</p>
		</div>
		<div class="tableElmtLeft">
		    <p>Tugas Besar I Sistem Terdistribusi</p>
		</div>
		<div class="tableElmtRight">
		    <p>March, 24 2013</p>
		</div>
            </div>
            
            <h2 id="doneTaskTitle">DONE TASKS</h2>
            <hr/>
            <div id="doneTask">
		<div class="bioLeft">
		    <p>Nama</p>
		</div>
		<div class="bioRight">
		    <p>Tag</p>
		</div>
		
		<div class="tableElmtLeft">
		    <p>Tugas Besar I Intelegensia Buatan</p>
		</div>
		<div class="tableElmtRight">
		    <p>Algoritma | Constraints</p>
		</div>
		<div class="tableElmtLeft">
		    <p>Tugas Besar I Sistem Informasi</p>
		</div>
		<div class="tableElmtRight">
		    <p>Data Flow Diagram (DFD) | Value Chain | Enterprise Information System</p>
		</div>
            </div>
        </div>
    </body>
</html>