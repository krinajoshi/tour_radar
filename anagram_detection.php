<html>
<head>
<title>Full Stack PHP Developer</title>
<style>
input[type=text]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

</style>
</head>
<body>
<center><h2>ANAGRAM DETECTION</h2></center>
<form method="post" action="anagram_output.php">
Enter First String:
<input type="text" name="string1" required>
<br>
Enter Second String:
<input type="text" name="string2" required>
<br>
<input type="submit">
</form>
</body>
</html>