class Expediente_clinico{
    constructor(idAM,idR,codM,dosis,motivo,fecha,action){
        this.idAM=idAM;
        this.idR=idR;
        this.codM=codM;
        this.dosis=dosis;
        this.motivo=motivo;
        this.fecha=fecha;
        this.action=action;
    }

    altaExpediente(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idAM: this.idAM,
                    idR: this.idR,
                    codM: this.codM,
                    dosis: this.dosis,
                    motivo: this.motivo,
                    fecha: this.fecha
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajaExpediente(){

    }

    modificaExpediente(){

    }

    buscaExpediente(){
        
    }
}