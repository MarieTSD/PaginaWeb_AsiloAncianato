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
    
};

var getDataBen = function(){
    var idA=document.getElementById("idA").value;
    var nomA=document.getElementById("nomA").value;
    var calleA=document.getElementById("calleA").value;
    var coloniaA=document.getElementById("coloniaA").value;
    var cpA=document.getElementById("cpA").value;
    var ciudadA=document.getElementById("ciudadA").value;
    var estadoA=document.getElementById("estadoA").value;
    var telA=document.getElementById("telA").value;
    var Ben = new Benefactor(idA,nomA,calleA,coloniaA,cpA,ciudadA,estadoA,telA,"altas_benefactor_bd.php")
    Ben.altaBenefactor();
};

var getDatafam = function(){
    var idA=document.getElementById("idA").value;
    var nomA=document.getElementById("nomA").value;
    var apA=document.getElementById("apA").value;
    var amA=document.getElementById("amA").value;
    var anoNA=document.getElementById("anoNA").value;
    var paren=document.getElementById("paren").value;
    var calleA=document.getElementById("calleA").value;
    var coloniaA=document.getElementById("coloniaA").value;
    var cpA=document.getElementById("cpA").value;
    var ciudadA=document.getElementById("ciudadA").value;
    var estadoA=document.getElementById("estadoA").value;
    var telA=document.getElementById("telA").value;
    var idR=document.getElementById("idR").value;
    var fam= new Familiar(idA,nomA,apA,amA,anoNA,paren,calleA,coloniaA,cpA,ciudadA,estadoA,telA,idR,"altas_familiar_bd.php");
    fam.altaFamiliar();
};

var getDataMed=function(){
    var idA=document.getElementById("idA").value;
    var nomA=document.getElementById("nomA").value;
    var des=document.getElementById("des").value;
    var via=document.getElementById("via").value;
    var med=new Medicina(idA,nomA,des,via,"altas_medicina_bd.php");
    med.altaMedicina();
}

var getDataCla=function(){
    var idA=document.getElementById("idA").value;
    var nomA=document.getElementById("nomA").value;
    var apA=document.getElementById("apA").value;
    var amA=document.getElementById("amA").value;
    var clase=new Clase(idA,nomA,apA,amA,"altas_clase_bd.php");
    clase.altaClase();
}

