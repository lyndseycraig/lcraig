<?php
    if(isset($_GET['addForm'])){
        //echo "Form was sumbitted";
        
    include '../../dbConnection.php';
    $conn= getDatabaseConnection();
        
         $sql = "INSERT INTO q_author
            (firstName, lastName, gender, dob, dod, profession, country, picture, biography)
            VALUES 
            (:fName, :lName, :gender, :dob, :dod, :profession, :country, :picture, :biography)"; 
        
        $np=array();
        $np[":fName"] = $_GET['firstName'];
        $np[":lName"] = $_GET['lastName'];
        $np[":gender"] = $_GET['gender'];
        $np[":dob"] = $_GET['dob'];
        $np[":dod"] = $_GET['dod'];
        $np[":profession"] = $_GET['profession'];
        $np[":country"] = $_GET['country'];
        $np[":picture"] = $_GET['picture'];
        $np[":biography"] = $_GET['biography'];
        
        $stmt=$conn->prepare($sql);
        $stmt->execute($np);
        echo "Author added!";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Adding New Author </title>
    </head>
    <body>
        
        <form>
            First Name: <input type="text" name="firstName"/> <br />
            Last Name: <input type="text" name="lastName"/> <br />
            Gender:
                <input type="radio" name="gender" value="male" checked> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
            Date of Birth:<input type="date" value="dob"><br>
            Date of Death:<input type="date" value="dod"><br>
            Profession:<input type="text" name="profession"><br>
            Country: 
                <select name="country">
                    <option value="USA">USA</option>
                    <option value="Germany">Germany</option>
                    <option value="China">China</option>
                    <option value="India">India</option>
                </select><br>
            Picture URL:<input type="text" name="picture"><br>
            Biography:<input type="textarea" name="biography"><br>
            
            <input type="submit" value="Add Author" name="addForm">
        </form>

    </body>
</html>