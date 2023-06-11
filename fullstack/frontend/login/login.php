<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Typografia -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- css -->
    <link rel="stylesheet" href="login.css">

</head>
<body>
    <div class="container-m">
        <div class="section1">
           
         <div class="d-flex justify-content-center align-items-center">
            <img src="../images/artemis.jpeg" alt="" class="logo"></div>
            <div class="d-flex justify-content-center align-items-center"><h1 style="font-weight: 800;"> ¡Bienvenidos!  </h1></div>
            <div class="d-flex justify-content-center align-items-center"><h1 style="font-weight: 800;"> AlquilaArtemis </h1></div>
            <div  class="d-flex justify-content-center align-items-center" >
                <form action="../../backend/controllers/login/login.php" method="POST">
                    <div class="mb-3 m-4">
                    <label for="email" class="form-label">Email</label>
                        <input 
                          type="text"
                          id="email"0
                          name="email"
                          class="form-control"  
                        />
                      
                    </div>
                    <div class="mb-3 m-4">
                    <label for="password" class="form-label"> Contraseña </label>
                        <input 
                          type="password"
                          id="password"
                          name="password"
                          class="form-control"  
                        />
                    </div>
                    <div class="mb-3 m-4">
                      <label for="ingles" class="form-label"> Tipo de Usuario </label>
                      <select class="form-select" aria-label="Default select example" id="usuario"
                          name="usuario" required>
                        <option selected>Selecione su tipo de Usuario </option>
                        <option value="Empleado" name="empleado"> Empleado </option>
                        <option value="Administrativo" name="admin"> Administrativo </option>
                      </select>
                    </div>
                 
                    <input type="submit" class="btn btn-primary m-4" value="Iniciar sesión" name="loguearse">
                  </form>
                  

            </div>
            <div class="perfil">
            <h3> By: Zachlesk </h3>
         <a href="https://github.com/Zachlesk" target="_blank"> <h6 style="font-size: 14px"> <i class="bi bi-github"> </i> GitHub </h6> </a>

            </div>

      
        </div>
        <div class="section2 text-white" id="section2">
             <div class="d-flex justify-content-star text-white" >
                <h1 style="font-weight: 800;font-size:larger;"> AlquilaArtemis </h1></div>
                <p style="font-style: italic;"> Somos una empresa de alquiler de material de construcción para nuestras constructoras clientes. Descubre nuestro modulo. </p>
          
                
             <div  class="d-flex justify-content-center align-items-center" >
                
                <form action="../../backend/controllers/registro/registro.php" method="POST">


                    <h1 class="m-4" style="font-weight: 800;">¡Registrate! </h1>
                    <div class="mb-3 m-4">
                      <label for="ingles" class="form-label"> Tipo de Usuario </label>
                      <select class="form-select" aria-label="Default select example" id="usuario"
                          name="usuario" required>
                        <option selected>Selecione su tipo de Usuario </option>
                        <option value="Empleado" name="empleado"> Empleado </option>
                        <option value="Administrativo" name="admin"> Administrativo </option>
                      </select>
                    </div>
                    <div class="mb-3 m-4">
                        <label for="email" class="form-label"> Email </label>
                        <input 
                          type="text"
                          id="email"
                          name="email"
                          class="form-control"  
                        />
                      </div>
                    <div class="mb-3 m-4">
                    <label for="username" class="form-label"> Username </label>
                        <input 
                          type="text"
                          id="username"
                          name="username"
                          class="form-control"  
                        />
                    </div>
                    <div class="mb-3 m-4">
                    <label for="password" class="form-label"> Contraseña </label>
                        <input 
                          type="password"
                          id="password"
                          name="password"
                          class="form-control"  
                        />
                    </div>
                    <div class="mb-3 m-4 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Registrarse" name="registrarse">
                  </form>

            </div>
            <div class="d-flex justify-content-center align-items-end m-5">  </div>
                  


                 
         
        </div>
      </div>

      <!-- Boostrap -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     
    
</body>
</html>