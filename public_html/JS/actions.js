var getData = function(){
    var idA=document.getElementById("idA").value;
    var nomA=document.getElementById("nomA").value;
    var apA=document.getElementById("apA").value;
    var amA=document.getElementById("amA").value;
    var anoNA=document.getElementById("anoNA").value;
    var calleA=document.getElementById("calleA").value;
    var coloniaA=document.getElementById("coloniaA").value;
    var cpA=document.getElementById("cpA").value;
    var ciudadA=document.getElementById("ciudadA").value;
    var estadoA=document.getElementById("estadoA").value;
    var telA=document.getElementById("telA").value;
    var sueldoA=document.getElementById("sueldoA").value;
    var tipo=document.getElementById("altaC").value;
    var Emp=new Empleado(idA,nomA,apA,amA,anoNA,calleA,coloniaA,cpA,ciudadA,estadoA,telA,sueldoA,tipo,"altas_empleado_bd.php");
    Emp.AddEmp();
    
}