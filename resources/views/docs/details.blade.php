@extends('layouts.app')
@section('title', __('Documents'))
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-folder text-semujer"></i>
							Descripción del documento capturado </h4>
						</div>
						<!--<div class="btn btn-sm btn-danger" data-toggle="modal" data-target="#createDataModal">
							<i class="fas fa-file-word"></i> Redactar respuesta
						</div>-->
					</div>
				</div>
				<div class="card-body row">
							<div class="col-md-6">
									<h5><i class="fas fa-info text-semujer"></i>  Datos del documento</h5>
									<table class="table table-striped" border="0">
                            			<tbody>
											<tr>
												<td>Expediente:</td><td>{{ mb_strtoupper($promociones->noexp ?? '') }}</td>												
			                                </tr>
										  	<tr>
												<td>Promovente:</td><td>{{ mb_strtoupper($promociones->promovente ?? '') }}</td>												
			                                </tr>
											<tr>
												<td>Asunto:</td><td>{{ mb_strtoupper($promociones->asunto ?? '') }}</td>												
			                                </tr>
			                                <tr>
			                                    <td>Fecha/hora recibido:</td><td>{{date_format($promociones->created_at,'Y-m-d H:m:s') ?? ''}}</td>
                               				</tr>
                               				 <tr>
			                                    <td>Fecha de captura:</td><td>{{date_format($promociones->created_at,'Y-m-d') ?? ''}}</td>
                               				</tr>
                               			</tbody>
										<tfoot>
											<tr>
			                                    <td colspan="2" align="right">
													<a class="btn btn-sm btn-primary" href="{{asset($promociones->archivos->file_path)}}" target="_blank">
													<i class="fas fa-eye"></i>  Ver Documento</a>
												</td>
			                                </tr>                      
										</tfoot>
                               		</table>                        			
							</div>

							<div class="col-md-6">
								<h5><i class="fas fa-file-pdf text-semujer"></i>  Documento digitalizado</h5>
								<div class="table-responsive" width="100%">
									<tr>
										<td>											
											<iframe style="border:none;"src ="{{asset($promociones->archivos->file_path)}}" width="100%" height="900px"></iframe>
										</td>
									</tr>
							</div>
							</div>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection