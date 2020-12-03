class Se_encarga {
  constructor(idE, idR, fecha, hora, action) {
    this.idE = idE;
    this.idR = idR;
    this.fecha = fecha;
    this.hora = hora;
    this.action = action;
  }

  altase_encarga() {
    $.ajax({
      type: "POST",
      url: this.action,
      data: {
        idE: this.idE,
        idR: this.idR,
        fecha: this.fecha,
        hora: this.hora,
      },
      success: function (response) {
        if (response == 1) {
          alert("Datos insertados");
        }
      },
    });
  }

  bajase_encarga() {}

  modificase_encarga() {}

  buscase_encarga() {}
}
