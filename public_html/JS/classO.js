class Clase{
    constructor(desc,area,idE,action){
        
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