



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.btn{
  border: none;
}
 .btn:hover {
    background:#FFC947 ;}
</style>

  </head>
<body>
    
  
    <section class="vh-100" style="background-color:rgba(99, 194, 110, 0.1);">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 8px 8 8 8px;">
                <div class="row g-0" >
                  <div class="col-md-6 col-lg-5 d-none d-md-block "  style="background-color:#fff; ">
                    <img 
                      src="img/3-01.jpg"
                      alt="login form"
                      class="img-fluid"
                    />
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 ">
      
                      <form method="post" action="create.php">
      
                        <div class="d-flex align-items-center mb-3 pb-1">
                          <span class="h1 fw-bold mb-0" style=" color: #3b3663; ">Register !</span>
                        </div>
      
      
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example17" style=" color: #3b3663;">User Name</label>

                          <input type="text" id="form2Example17" name="name" class="form-control form-control-lg" />
                        </div>
      
                       
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27" style=" color: #3b3663;">Password</label>

                          <input type="password" id="form2Example27" name="password"class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form2Example27" style=" color: #3b3663;">Confirm Password</label>

                          <input type="password" id="form2Example27" name="confirm-password" class="form-control form-control-lg" />
                        </div>
                        <div class="row ">

                       
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="boss" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1" style=" color: #3b3663;">
                              Boss
                            </label>
                          </div>
                          <div class="form-check col">
                            <input class="form-check-input" type="radio" name="labor" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1" style=" color: #3b3663;">
                              Labour Official
                            </label>
                          </div>   
                          <div class="form-check col">
                            <input class="form-check-input" type="radio" name="pump" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1" style=" color: #3b3663;">
                              Pump
                            </label>
                          </div>
                        </div>
                      
                        <div class="d-grid gap-4 pt-4 mb-2">
                            <button class="btn btn-primary" type="submit" name="submit">Register</button>
                          </div>
                        
                      </form>
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>