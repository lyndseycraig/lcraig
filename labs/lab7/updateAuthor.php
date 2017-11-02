<?php



function getAuthorInfo(){
    include '../../dbConnection.php';
    $conn= getDatabaseConnection();
    
    $sql="SELECT *
    FROM q_author
    WHERE authorId = " .$_GET['authorId'];
    
    $stmt=$conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record=$stmt->fetch(PDO::FETCH_ASSOC);
    
}    


if(isset($_GET['authorId'])){
    $authorInfo= getAuthorInfo();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Author's Info </title>
    </head>
    <body>
        <legend> Updating Author's Info</legend>
        
          <form>
            First Name: <input type="text" name="<?=$authorInfo['firstName']?>" /> <br />
            Last Name: <input type="text" name="<?=$authorInfo['lastName']?>"/> <br />
            Gender:
                <input type="radio" name="gender" value="f"
                 id="genderF"  
                            
                            <?php
                                if ($authorInfo['gender']=="F") {
                                    echo "checked";
                                }
                            ?>
                            
                            />
                            
                            <label for="genderF"></label>Female
                         <input type="radio" name="gender" value="M"
                         
                            <?= ($authorInfo['gender']=="M")?"checked":"" ?>
                         
                            id="genderM"   /><label for="genderF"></label>Male <br />  
                
                
                <input type="radio" name="gender" value="female"> Female<br>
            Date of Birth:<input type="date" value="dob<?=$authorInfo['dob']?>"><br>
            Date of Death:<input type="date" value="<?=$authorInfo['dod']?>"><br>
            Profession:<input type="text" name="<?=$authorInfo['profession']?>"><br>
            Country: 
                <select name="country">
                    <option value="USA">USA</option>
                    <option value="Germany">Germany</option>
                    <option value="China">China</option>
                    <option value="India">India</option>
                </select><br>
            Picture URL:<input type="text" name="<?=$authorInfo['picture']?>"><br>
            Biography:<input type="textarea" name="<?=$authorInfo['biography']?>"><br>
            
            <input type="submit" value="Add Author" name="addForm">
        </form>
    </body>
</html>