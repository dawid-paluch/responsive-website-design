<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Web Dev Coursework</title>
  <link rel="icon" type="image/x-icon" href="images/icon.png">

  <script src="js/previewPost.js" defer></script>
</head>

<body>
    <header>
        <div id="logo">
        <p>Dawid</p>
        </div>

        <div id="nav">
            <nav>
                <a href="mainpage.html">Homepage</a>
                <a href="blog.php">Blog</a>
            </nav>
        </div>
    </header>

    <div id="displacementDiv">
    </div>

    <div id="blogArea">
        <h1>Blog Preview</h1>
        <p>
            This is a preview of my blog, note that this is not actually my real blog and this area purely serves the purpose of displaying a preview
            that can be used to check how a post that has not been posted yet might finally look like when it has been posted.
        </p>

        <form method="post" action="blog.php" id="monthForm">
            <label>No month in preview:</label>
            <select id="monthDropdown" name="monthDropdown" disabled>
                <option value="none">Preview mode</option>
            </select>
            <button type="submit" id="submitButton" disabled>IN PREVIEW</button>
        </form>

        <div class="blogEntry">
            <?php
                session_start();

                $_SESSION["postTitle"] = $_POST["title"];
                $_SESSION["postContent"] = $_POST["content"];

                echo "<div class=\"blogEntryTop\">";
                    echo "<h2 id=\"titleOfPost\">".$_POST["title"]."</h2>";
                    echo "<p>".date("y-m-d")." - ".date("H:i:s")."</p>";
                echo "</div>";
                echo "<p id=\"contentOfPost\">".$_POST["content"]."</p>";
            ?>
        </div>

        <div class="blogEntry" id="previewReply">
            <h2>Select what you would like to do from here</h2>
            <p>
                <a href=""id="returnEditLink">Return to Edit Post</a>
                <a href="addPost.php" id="submitPostLink">Submit Post</a>
            </p>
        </div>

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
                <a id="returnLink" href="mailto:dawid1paluch@gmail.com">Email</a>
                |
                <a id="submitLink" href="https://www.linkedin.com/in/dawidpaluch/">LinkedIn</a>
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