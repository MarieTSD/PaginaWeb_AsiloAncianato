class Donacion{
    constructor(idD,aporte,fecha,hora,idC,action){
        this.idD=idD;
        this.aporte=aporte;
        this.fecha=fecha;
        this.hora=hora;
        //RECORDAR QUE DEPENDE DE SI DONA UN FAMILIAR O UN BENEFACTOR EL ID QUE LLEGARA Y QUE SQL SE ENVIARA
        this.idC=idC;
        this.action=action;
    }

    altaDonacion(){
        
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idD: this.idD,
                    aporte: this.aporte,
                    fecha: this.fecha,
                    hora: this.hora,
                    idC: this.idC,
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajaDonacion(){

    }

    modificarDonacion(){

    }

    buscarDonacion(){
        
    }
}