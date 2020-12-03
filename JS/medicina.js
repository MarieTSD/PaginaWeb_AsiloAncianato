class Medicina{
    constructor(nom,desc,via,exis,action){
        this.nom=nom;
        this.desc=desc;
        this.via=via;
        this.exis=exis;
        this.action=action;
    }

    altaMedicina(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    nom: this.nom,
                    desc: this.desc,
                    via: this.via,
                    exis: this.exis
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajaMedicina(){

    }

    modificaMedicina(){

    }

    buscaMedicina(){
        
    }
}