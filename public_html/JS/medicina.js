class Medicina{
    constructor(nom,desc,via,action){
        this.nom=nom;
        this.desc=desc;
        this.via=via;
        this.action=action;
    }

    altaMedicina(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    nom: this.nom,
                    desc: this.desc,
                    via: this.via
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