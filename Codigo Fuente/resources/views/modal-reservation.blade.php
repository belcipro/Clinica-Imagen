<!-- Classic Modal -->
<div class="modal fade" id="modal-reservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="now-ui-icons ui-1_simple-remove"></i>
				</button>
				<h4 class="title title-up">Reservar cita</h4>
			</div>
			<div class="modal-body">
				<form action="" class="form" id="form-reservation">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-xl-12">
							<div class="form-group">
								<label for="">Medico</label>
								<input type="text" id="nombre_medico" class="form-control" readonly="true">
								<input type="hidden" id="id_horario" class="form-control" name="id_horario">
							</div>
						</div>
						<div class="col-xl-12">
							<div class="form-group">
								<label for="">Fecha y Hora</label>
								<input type="text" id="start" class="form-control" readonly="true">
							</div>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-info btn-round">Confirmar</button>
						<button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Cerrar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->