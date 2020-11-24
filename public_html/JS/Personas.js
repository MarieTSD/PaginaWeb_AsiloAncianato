//DATOS DE PERSONA
class Persona{
    constructor(idA,nomA,apA,amA,anoNA){
        
        this.idA=idA;
        this.nomA=nomA;
        this.apA=apA;
        this.amA=amA;
        this.anoNA=anoNA;
        
    }
}

//EMPLEADO ES UNA PERSONA
class Empleado extends Persona{
    

    constructor(idA,nomA,apA,amA,anoNA,calleA,coloniaA,cpA,ciudadA,estadoA,telA,sueldoA,altaC,action)
        {
        super(idA,nomA,apA,amA,anoNA);
        this.sueldoA=sueldoA;
        this.altaC=altaC;
        this.action=action;
        this.dir=new Domicilio_tel(calleA,coloniaA,cpA,ciudadA,estadoA,telA);
        
        }

        AddEmp(){
            console.log(this.sueldoA)
            $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idA: this.idA,
                    nomA: this.nomA,
                    apA: this.apA,
                    amA: this.amA,
                    anoNA: this.anoNA,
                    calleA: this.dir.calleA,
                    coloniaA: this.dir.coloniaA,
                    cpA: this.dir.cpA,
                    ciudadA: this.dir.ciudadA,
                    estadoA: this.dir.estadoA,
                    telA: this.dir.telA,
                    sueldoA: this.sueldoA,
                    tipo: this.altaC
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
        }

        bajaEmpleado(){

        }

        modificaEmpleado(){

        }

        buscaEmpleado(){

        }
}

//FAMILIAR ES UNA PERSONA
class Familiar extends Persona{
    constructor(idA,nomA,apA,amA,anoNA,Paren,idR,action){
        super(idA,nomA,apA,amA,anoNA);
        this.Paren=Paren;
        this.idR=idR;
        this.action=action;
        this.dir=new Domicilio_tel(calleA,coloniaA,cpA,ciudadA,estadoA,telA);
    }

    altaFamiliar(){
        
            $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idA: this.idA,
                    nomA: this.nomA,
                    apA: this.apA,
                    amA: this.amA,
                    anoNA: this.anoNA,
                    calleA: this.dir.calleAcalleA,
                    coloniaA: this.dir.coloniaA,
                    cpA: this.dir.cpA,
                    ciudadA: this.dir.ciudadA,
                    estadoA: this.dir.estadoA,
                    telA: this.dir.telA,
                    Par: this.Paren,
                    idR: this.idR
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajaFamiliar(){

    }

    modificaFamiliar(){

    }

    buscaFamiliar(){

    }

    Donate(){

    }
}

//RESIDENTE ES UNA PERSONA
class Residente extends Persona{
    constructor(idA,nomA,apA,amA,anoNA,gen,estC,action){
        super(idA,nomA,apA,amA,anoNA);
        this.gen=gen;
        this.estC=estC;
        this.action=action;

    }


    altaResidente(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idA: this.idA,
                    nomA: this.nomA,
                    apA: this.apA,
                    amA: this.amA,
                    anoNA: this.anoNA,
                    gen: this.gen,
                    estC: this.estC
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajaResidente(){

    }

    modificaResidente(){

    }

    buscaResidente(){

    }

    asignar(){
        
    }
}