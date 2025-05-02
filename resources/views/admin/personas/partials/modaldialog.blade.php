 <!-- Modal Dialog Scrollable -->
 <a type="button" class="" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable{{$person->id}}">
    <i class="bi bi-eye fs-4"></i>
 </a>
  <div class="modal fade" id="modalDialogScrollable{{$person->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Información del votante</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <section class="section profile">
            <div class="row">

              <div class="col-xl-12">

                <div class="card">
                  <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <h2>  {{ $person->name }}</h2>
                    <h3>  {{ $person->last_name }}</h3>
                    <h3>C.I.: {{ $person->dni }}  </h3>

                    <div class="container-fluid">
                      <div class="row">
                        <hr>
                        <div class="col-md-12">
                          <h3>Más información</h3>
                        </div>

                        <div class="col-md-12 label"> 
                          <span class="text-primary">Teléfono:</span> {{ $person->phone }} 
                        </div>

                        <div class="col-md-12 label"> 
                          <span class="text-primary">Email:</span> {{ $person->email }} 
                        </div>

                        <div class="col-md-12 label"> 
                          <span class="text-primary">Estado:</span> {{ $person->state }} 
                        </div>
                        
                        <div class="col-md-12 label"> 
                          <span class="text-primary">Municipio:</span> {{ $person->city }} 
                        </div>

                        <div class="col-md-12 label"> 
                          <span class="text-primary">Parroquia:</span> {{ $person->parish }} 
                        </div>
                        
                        <div class="col-md-12 label"> 
                          <span class="text-primary">Dirección:</span> {{ $person->address }} 
                        </div>

                        <div class="col-md-12 label"> 
                          <span class="text-primary">Centro de votación:</span> {{ $person->voting_center }} 
                        </div>
                      
                 
                      </div>
                    </div>
                  </div>
                </div>
      
              </div>
            </div>
          </section>
          
          
            
          


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div><!-- End Modal Dialog Scrollable-->