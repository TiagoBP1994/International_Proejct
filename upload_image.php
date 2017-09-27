<?php

//
// Author : Jesper Uth Krab
// Made On : Sep 26, 2017 10:59:10 AM  
//

error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Upload Image</title>
    </head>
    <body>
        <h1>Upload Image</h1>
        <h2>Keep image size below 16MB</h2>
        <form action="./Include/input_image.inc.php" 
              method="post" 
              enctype="multipart/form-data">
                <p>
                    <label for='caption'>Caption</label><br/>
                    <input type='text' id='caption' name='caption' required/>
                </p>
                <p>
                    <label for='credit'>Credit</label><br/>
                    <input type='text' id='credit' name='credit' required/>
                </p>
                <p>
                    <label for='story'>Story</label><br/>
                    <input type='text' id='story' name='story' required/>
                </p>
                <p>
                    <label for='tags'>Tags</label><br/>
                    <input type='text' id='tags' name='tags' required/>
                </p>
                <p>
                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215"/>
                    <label for='bild'>Select Image File</label><br/>
                    <input type='file' id='bild' name='img' required/>
                </p>
            <p>
               <input type='submit' name='butt' value='Submit'/>
            </p>
        </form>
    </body>
</html>
