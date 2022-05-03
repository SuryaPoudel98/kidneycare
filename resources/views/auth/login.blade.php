<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container formcontainer">
        <div class="row">
            <div class="col-md-4 col-md-offset-4"style="margin: top 20px;" >
                <h4>login </h4>
                <hr>
                <form action="/login" method="POST">
                    @csrf
                   
                    <div class="form-group" style="margin-top:3%">
                        <label for="email" >Email </label>
                        <input type="text" class="form-control" placeholder="Enter email address" name="email" value=""style="margin-top:1%">
                    </div> 
                    <div class="form-group" style="margin-top:3%">
                        <label for="password" >Password </label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="" style="margin-top:1%">
                    </div> 
                    <div class="form-group" style="margin-top:3%">
                        <button class="btn  btn-primary" type="submit"> Submit </button>

                    </div>
           

                    

                </form>



            </div>


        </div>


    </div>

    <style>
        .formcontainer
        {  margin-top: 10%;
            margin-left:35%;
        }
    </style>   

 








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>