class Asiste{
    constructor(Id_Clase,id_Residente,fecha,hora,action){
        this.id_Residente=id_Residente;
        this.id_Clase=Id_Clase;
        this.fecha=fecha;
        this.hora=hora;
        this.action=action;
    }

    altaAsiste(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idR: this.id_Residente,
                    idC: this.id_Clase,
                    fecha: this.fecha,
                    hora: this.hora
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }
    
    bajaAsiste(){

    }

    modificaAsiste(){

    }

    buscaAsiste(){
        
    }
}