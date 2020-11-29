//DOMICILIO CLASE PADRE
class Domicilio_tel{
    constructor(calleA,coloniaA,cpA,ciudadA,estadoA,telA){
        this.calleA=calleA;
        this.coloniaA=coloniaA;
        this.cpA=cpA;
        this.ciudadA=ciudadA;
        this.estadoA=estadoA;
        this.telA=telA;

    }
}

class Atencion_medica extends Domicilio_tel{
    constructor(nombre,calleA,coloniaA,cpA,ciudadA,estadoA,rfc,telA,action){
        super(calleA,coloniaA,cpA,ciudadA,estadoA,telA);
        this.nombre=nombre;
        this.rfc=rfc;
        this.action=action;
    }

    altaAtencion_Medica(){
        
            $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    nombre: this.nombre,
                    rfc: this.rfc,
                    calleA: this.calleA,
                    coloniaA: this.coloniaA,
                    cpA: this.cpA,
                    ciudadA: this.ciudadA,
                    estadoA: this.estadoA,
                    telA: this.telA,
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }
}

class Benefactor extends Domicilio_tel{
    constructor(nombre,calleA,coloniaA,cpA,ciudadA,estadoA,telA,action){
        super(calleA,coloniaA,cpA,ciudadA,estadoA,telA);
        this.nombre=nombre;
        this.action=action;
    }

    altaBenefactor(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    nombre: this.nombre,
                    calleA: this.calleA,
                    coloniaA: this.coloniaA,
                    cpA: this.cpA,
                    ciudadA: this.ciudadA,
                    estadoA: this.estadoA,
                    telA: this.telA,
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }
}