export default class TratamientoUser{
    constructor(modal=false,id=0, id_tratamiento=0, id_usuario=0, precio=0,adelanto=0,restante=0,estado='', fechaInicio='', fechaFin=''){
        this.modal=modal
        this.id=id
        this.id_tratamiento=id_tratamiento
        this.id_usuario=id_usuario
        this.precio=precio
        this.restante=restante
        this.adelanto=adelanto
        this.estado=estado
        this.fechaInicio=fechaInicio
        this.fechaFin=fechaFin
    }
}