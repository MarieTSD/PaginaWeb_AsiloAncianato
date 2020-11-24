class Aparecen_sd{
    constructor(idAp,cod,cant,action){
        this.idAp=idAp;
        this.cod=cod;
        this.cant=cant;
        this.action=action;
    }

    altaAparecen(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idAp: this.idAp,
                    cod: this.cod,
                    cant: this.cant,
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajaAparecen(){

    }

    modificaAparecen(){

    }

    buscaAparecen(){
        
    }
}