var getData = function(){
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
    var Emp=new Empleado(nomA,apA,amA,anoNA,calleA,coloniaA,cpA,ciudadA,estadoA,telA,sueldoA,tipo,"altas_empleado_bd.php");
    Emp.AddEmp();
    
};

var getDataBen = function(){
    var nomA=document.getElementById("nomA").value;
    var calleA=document.getElementById("calleA").value;
    var coloniaA=document.getElementById("coloniaA").value;
    var cpA=document.getElementById("cpA").value;
    var ciudadA=document.getElementById("ciudadA").value;
    var estadoA=document.getElementById("estadoA").value;
    var telA=document.getElementById("telA").value;
    var Ben = new Benefactor(nomA,calleA,coloniaA,cpA,ciudadA,estadoA,telA,"altas_benefactor_bd.php")
    Ben.altaBenefactor();
};

var getDatafam = function(){
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
    var fam= new Familiar(nomA,apA,amA,anoNA,paren,calleA,coloniaA,cpA,ciudadA,estadoA,telA,idR,"altas_familiar_bd.php");
    fam.altaFamiliar();
};

var getDataMed=function(){
    var nomA=document.getElementById("nomA").value;
    var des=document.getElementById("des").value;
    var via=document.getElementById("via").value;
    var med=new Medicina(nomA,des,via,"altas_medicina_bd.php");
    med.altaMedicina();
}

var getDataCla=function(){
    var nomA=document.getElementById("nomA").value;
    var apA=document.getElementById("apA").value;
    var amA=document.getElementById("amA").value;
    var clase=new Clase(nomA,apA,amA,"altas_clase_bd.php");
    clase.altaClase();
}

var getDataSE=function(){
    var idE=document.getElementById("idE").value;
    var idR=document.getElementById("idR").value;
    var fecha=document.getElementById("fechaA").value;
    var hora=document.getElementById("horaA").value;
    var sen=new Se_encarga(idE,idR,fecha,hora,"altas_se_encarga_bd.php");
    sen.altase_encarga();
}

var getDataAs=function(){
    var idC=document.getElementById("idC").value;
    var idR=document.getElementById("idR").value;
    var fecha=document.getElementById("fechaA").value;
    var hora=document.getElementById("horaA").value;
    var asi=new Asiste(idC,idR,fecha,hora,"altas_asiste_bd.php");
    asi.altaAsiste();

}

var getDataSu=function(){
    var idC=document.getElementById("nomA").value;
    var idR=document.getElementById("desA").value;
    var sum=new Suministro(idC,idR,"altas_suministro_bd.php");
    sum.altaSuministro();
}

var getDataEx=function(){
    var idC=document.getElementById("nomA").value;
    var idR=document.getElementById("desA").value;
    var idC=document.getElementById("nomA").value;
    
}

var getDataATM=function(){
    var nom=document.getElementById("nomA").value;
    var calle=document.getElementById("calleA").value;
    var colonia=document.getElementById("coloniaA").value;
    var cp=document.getElementById("cp").value;
    var ciudad=document.getElementById("ciudadA").value;
    var estado=document.getElementById("estadoA").value;
    var rfc=document.getElementById("rfc").value;
    var tel=document.getElementById("tel").value;
    var atm=new Atencion_medica(nom,calle,colonia,cp,ciudad,estado,rfc,tel,"al_amedicabd.php");
    atm.altaAtencion_Medica();
}

var getDataRes=function(){
    var nom=document.getElementById("nomA").value;
    var aP=document.getElementById("apA").value;
    var aM=document.getElementById("amA").value;
    var aNa=document.getElementById("anoNA").value;
    var gen=document.getElementById("calleA").value;
    var eC=document.getElementById("altaC").value;
    var res=new Residente(nom,aP,aM,aNa,gen,eC,"alResidente_base.php");
    res.altaResidente();

}