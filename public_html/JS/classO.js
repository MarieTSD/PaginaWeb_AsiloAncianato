class Clase{
    constructor(idC,desc,area,idE,action){
        this.idC=idC;
        this.desc=desc;
        this.area=area;
        this.idE=idE;
        this.action=action;
    }

    altaClase(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    idC: this.idC,
                    desc: this.desc,
                    area: this.area,
                    idE: this.idE
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajaClase(){

    }

    modificarClase(){

    }

    buscarClase(){
        
    }
}