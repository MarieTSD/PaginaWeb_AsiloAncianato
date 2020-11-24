function Employee(
  idA,
  nomA,
  apA,
  amA,
  anoNA,
  calleA,
  coloniaA,
  cpA,
  ciudadA,
  estadoA,
  telA,
  sueldoA,
  altaC,
  action
) {
  this.idA = idA;
  this.nomA = nomA;
  this.apA = apA;
  this.amA = amA;
  this.anoNA = anoNA;
  this.calleA = calleA;
  this.coloniaA = coloniaA;
  this.cpA = cpA;
  this.ciudadA = ciudadA;
  this.estadoA = estadoA;
  this.telA = telA;
  this.sueldoA = sueldoA;
  this.altaC = altaC;
  this.action = action;
}

Employee.prototype.AddEmp = function () {
  console.log(this.idA + " " + this.nomA);
  $.ajax({
    type: "POST",
    url: this.action,
    data: {
      idA: this.idA,
      nomA: this.nomA,
      apA: this.apA,
      amA: this.amA,
      anoNA: this.anoNA,
      calleA: this.calleA,
      coloniaA: this.coloniaA,
      cpA: this.cpA,
      ciudadA: this.ciudadA,
      estadoA: this.estadoA,
      telA: this.telA,
      sueldoA: this.sueldoA,
      tipo: this.altaC,
    },
    success: function (response) {
      if (response == 1) {
        swal("Alta Exitosa", "Continua dando de alta", "success");
        alert("Datos insertados");
      }
    },
  });
};