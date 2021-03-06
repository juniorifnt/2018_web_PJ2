<!-- PJ2 -->
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charest="UTF-8">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39+Extended|Megrim" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
         
        <title>Academic Conference Search</title>
    </head>
    
    <body>
        
    <?php
        // Start PHP Session
        session_start();
        // Set Session value  
        $_SESSION['index'] = true;
    ?>

        <div class="container">
            <header>
                <h1 align="center">Academic Conference Search</h1> 
                <h2 align="center">Academic Conference Search</h2>               
            </header>
            
            <div class="form-row">
                <div class="form-group col-md-3">
                    <!--option of search-->
                    <select id="options" class="form-control">
                        <option selected> Choose... </option>
                        <option type="customSearch">Custom Search</option>
                        <option type="video">Video</option>
                        <option type="commentnReview">Comment & Review</option>
                    </select>
                </div>
                <div class="form-group col-md-8">
                     <!--input keyword-->
                     <input aria-label="Default" type="keyword" id="keyword" class="form-control">  
                </div>
                <div class="form-group col-md-1">
                    <!--submit button-->
                    <button type="submit" id="submit" class="btn btn-light">Search</button>
                </div>
            </div>
        </div>

        <!-- display the result -->
        <div class="container">
            <div id="showSearch" align="center"></div>
            <div id="showVideo" align="center"></div>
            <div id="showComment" align="center"></div>
        </div>  
        
        <!-- using AJAX to call twitter search result from PHP -->
        <script type="text/javascript">
            $("#submit").on("click",function(){
                let keyword = $("#keyword").val();
                //let type=$("#options").val();
                let type = $("#options option:selected").val();
                //let type = $('#options').find(":selected").val();
                console.log(type);
                //create XMLHttpRequest object 
                var xhttp = new XMLHttpRequest();
                if(type == "Comment & Review") {
                    //AJAX part
                    xhttp.onreadystatechange = function() {
                        $("#showVideo").empty();
                        $("#showSearch").empty();
                        $("#showComment").empty();
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("showComment").innerHTML = this.responseText;
                        }
                    };
                    //specified the request
                    xhttp.open("GET", "twitter.php?key=" + keyword, true);
                    //send the request to PHP
                    xhttp.send();
                } else {
                    console.log("type error")
                }
            });
        </script>
        <script type="text/javascript" src="youtube.js"></script>
        <script type="text/javascript" src="search.js" ></script> 
    </body>
</html>