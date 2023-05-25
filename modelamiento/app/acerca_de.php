<!DOCTYPE html>
<html>
<head>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;800&display=swap');

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .square {
      width: 480px;
      height: 480px;
      background-image: linear-gradient(
                150deg,
                #9500ff,
                #09f,
                #00DDFF
            );
    }

    .container {
      padding: 25px 5px;
      text-align: center;
      color: white;
      font-family: 'Nunito', sans-serif;
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .container p {
      text-align: justify;
      padding: 0px 80px ;
      margin-top: 0px;
    }
    .integrantes p {
      text-align: justify;
      margin:0;
    }

     h3{
        padding-left: 80px;
        text-align: left;
        margin: 0;
    }

    .version p {  
      text-align: justify;
      margin:0;
    }

    .version{
        margin-top: 10px;
    }
    
  </style>
</head>
<body>
  <div class="square">
    <div class="container">
        <h1>Formularios web</h1>
        <div class="parrafo">
            <p>Aplicación como herramienta de evaluación de conocimientos y competencias</p>
            
            <div class="integrantes">
                <h3>Autores</h3>
                <p>Luis Fernando Vivas</p>
                <p>luisfernandovivas@unicomfacauca.edu.co</p>
                <p>Miguel Enrique Tobar</p>
                <p>migueltobar@unicomfacauca.edu.co</p>
            </div>
            <div class="version">
                <h3>Version 1.0</h3>
                <p>Derechos Reservados</p>
                <p>Popayán</p>
                <p>2023</p>
            </div>

        </div>
    </div>
  </div>
</body>
</html>
