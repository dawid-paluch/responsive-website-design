<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="css/reset.css" />
  <link rel="stylesheet" href="css/main.css" />
  <title>Web Dev Coursework</title>
  <link rel="icon" type="image/x-icon" href="images/icon.png">
  <?php
    session_start();
  ?>
</head>

<body>
    <header>
        <div id="logo">
        <p>Dawid</p>
        </div>

        <div id="nav">
            <nav>
                <a href="mainpage.html">Homepage</a>
                <a href="experience.html">Experience</a>
                <a href="skills.html">Skills</a>
                <a href="education.html">Education</a>
                <a href="portfolio.html">Portfolio</a>
                <?php
                    if(isset($_SESSION["UserID"])){
                        echo "<a href=\"addPost.html\">Add Post</a>";
                        echo "<a href=\"logout.php\">Log Out</a>";
                    }
                    else {
                        echo "<a href=\"login.html\">Login</a>";
                    }
                ?>
            </nav>
        </div>
    </header>

    <div id="displacementDiv">
    </div>

    <div id="blogArea">
        <h1>Welcome to My Blog</h1>
        <p>
            This is my blog where you will find various entries and information on all of my progress that I have made throughout my journey
            studying and improving my abilities in computer science. Here you will also be capable of finding information on any sort of
            projects that I may be doing as well as how far into each of these I am and what I have left to do throughout each step and with
            all my improvements.
        </p>

        <form method="post" action="blog.php" id="monthForm">
            <label>Select month to view:</label>
            <select id="monthDropdown" name="monthDropdown">
                <option value="none">No month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <button type="submit" id="submitButton">Send</button>
        </form>

        <?php
        
        $servername = "127.0.0.1";;
        $username = "root";
        $dbpassword = "";
        $dbname = "dawidportfolio"; 

        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT title, body, postDate, postTime FROM posts";

        $result = $conn->query($sql);

        $blogArray = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $blogArray[] = $row;
            }
        }

        for ($outerRow = 0; $outerRow < count($blogArray) - 1; $outerRow++) {
            for ($innerRow = 0; $innerRow < count($blogArray) - 1; $innerRow++) {
                if ($blogArray[$innerRow]['postDate'] < $blogArray[$innerRow + 1]['postDate']) {
                    $temp = $blogArray[$innerRow];
                    $blogArray[$innerRow] = $blogArray[$innerRow + 1];
                    $blogArray[$innerRow + 1] = $temp;
                }
                elseif ($blogArray[$innerRow]['postDate'] == $blogArray[$innerRow + 1]['postDate']) {
                    if ($blogArray[$innerRow]['postTime'] < $blogArray[$innerRow + 1]['postTime']) {
                        $temp = $blogArray[$innerRow];
                        $blogArray[$innerRow] = $blogArray[$innerRow + 1];
                        $blogArray[$innerRow + 1] = $temp;
                    }
                }
            }
        }


        if (isset($_POST["monthDropdown"])){
            $monthSelected = $_POST["monthDropdown"];
        }
        else {
            $monthSelected = "none";
        }

        foreach ($blogArray as $row) {
            if ($monthSelected == "none"){
                echo "<div class=\"blogEntry\">";
                echo "<div class=\"blogEntryTop\">";
                echo "<h2>".htmlspecialchars($row["title"])."</h2>";
                echo "<p>".htmlspecialchars($row["postDate"])." - ".htmlspecialchars($row["postTime"])."</p>";
                echo "</div>";
                echo "<p>".nl2br(htmlspecialchars($row["body"])) . "</p>";
                echo "</div>";
            }
            else{
                if(substr($row["postDate"], 5, 2) == $monthSelected) {
                    echo "<div class=\"blogEntry\">";
                    echo "<div class=\"blogEntryTop\">";
                    echo "<h2>".htmlspecialchars($row["title"])."</h2>";
                    echo "<p>".htmlspecialchars($row["postDate"])." - ".htmlspecialchars($row["postTime"])."</p>";
                    echo "</div>";
                    echo "<p>".nl2br(htmlspecialchars($row["body"])) . "</p>";
                    echo "</div>";
                }
            }
        }

        $conn->close();
        ?>
        <div class="blogEntry" id="endOfBlog">
            <h2>
                This is the end of the blog.
            </h2>
            <p>
                You have reached the end of the blog. Please return here another time when there have been some updates to the blog.
            </p>
        </div>
    </div>

    <footer>
        <div id="footerLinks">
            <p>
                <a href="mailto:dawid1paluch@gmail.com">Email</a>
                |
                <a href="https://www.linkedin.com/in/dawidpaluch/">LinkedIn</a>
            </p>
        </div>
        <div id="footerText">
            <p>
                &copy; 2024 Dawid. All rights reserved.
            </p>
        </div>
    </footer>
</body>
</html>