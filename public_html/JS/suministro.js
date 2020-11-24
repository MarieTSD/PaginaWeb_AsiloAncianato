class Suministro{
    constructor(cod,nom,desc,action){
        this.cod=cod;
        this.nom=nom;
        this.desc=desc;
        this.action=action
    }

    altaSuministro(){
        $.ajax({
            type: "POST",
            url: this.action,
            data: {
                    cod: this.cod,
                    nom: this.nom,
                    desc: this.desc
                },
            success: function(response){
            if(response==1){
                    alert("Datos insertados");
            }
            }
        })
    }

    bajaSuministro(){

    }

    modificaSuministro(){

    }

    buscaSuministro(){
        
    }
}