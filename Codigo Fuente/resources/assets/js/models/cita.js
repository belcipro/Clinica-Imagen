'use strict'
export default class Cita{
    constructor(id=0,create=false, idEspecialidad=0, idEspecialista=0, idPaciente=0, fechaInicio="", fechaFin="", color="", titulo="", tipo_consulta="", estado="", regressive_date="", payment_time="", created_at="", updated_at="", deleted_at=""){
        this.id=id;
        this.create=create;
        this.idEspecialidad=idEspecialidad;
        this.idEspecialista=idEspecialista;
        this.idPaciente=idPaciente;
        this.fechaInicio=fechaInicio;
        this.fechaFin=fechaFin;
        this.color=color;
        this.titulo=titulo;
        this.tipo_consulta=tipo_consulta;
        this.estado=estado;
        this.regressive_date=regressive_date;
        this.payment_time=payment_time;
        this.created_at=created_at;
        this.updated_at=updated_at;
        this.deleted_at=deleted_at;
    }
}