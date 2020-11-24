class Se_encarga{
    constructor(idR,idE,hora,fecha,action){
        this.idR=idR;
        this.idE=idE;
        this.hora=hora;
        this.fecha=fecha;
        this.action=action;
    }

    altase_encarga(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idR: this.idR,
                    idE: this.idE,
                    hora: this.hora,
                    fecha: this.fecha
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajase_encarga(){

    }

    modificase_encarga(){

    }

    buscase_encarga(){
        
    }
}