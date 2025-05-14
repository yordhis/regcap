       {{-- Boton de agregar estudiante --}}
       <a type="button" class="text-warning" data-bs-toggle="modal"
           data-bs-target="#modalformularioEditarperson{{ $person->id }}">
           <i class="bi bi-pencil fs-4"></i>
       </a>

       <!-- Modal formulario crear estudiante -->
       <div class="modal fade text-start" id="modalformularioEditarperson{{ $person->id }}" data-bs-backdrop="static"
           data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
           <div class="modal-dialog  modal-xl">
               <div class="modal-content">
                   <div class="modal-header bg-primary text-white">
                       <h5 class="modal-title" id="staticBackdropLabel">Actualizar datos </h5>
                       <button type="button" class="btn-danger" data-bs-dismiss="modal" aria-label="Cerrra"></button>
                   </div>
                   <div class="modal-body">
                       <form action="{{ route('admin.person.update', $person->id) }}" method="post"
                           enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                           @csrf
                           @method('PUT')
                           {{-- Nombres --}}
                           <div class="col-12">
                               <label for="name" class="form-label">Nombres</label>
                               <div class="input-group has-validation">

                                   <input type="text" name="name" class="form-control" id="name"
                                       placeholder="Ingrese sus nombres" value="{{ $person->name }}" required>
                                   <div class="invalid-feedback">Por favor ingrese sus nombre! </div>
                               </div>
                               @error('name')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{-- Apellidos --}}
                           <div class="col-12">
                               <label for="last_name" class="form-label">Apellidos</label>
                               <div class="input-group has-validation">

                                   <input type="text" name="last_name" class="form-control" id="last_name"
                                       placeholder="Ingrese sus nombres" value="{{ $person->last_name }}" required>
                                   <div class="invalid-feedback">Por favor ingrese sus apellidos! </div>
                               </div>
                               @error('last_name')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{-- DNI --}}
                           <div class="col-12">
                               <label for="dni" class="form-label">DNI</label>
                               <div class="input-group has-validation">

                                   <input type="text" name="dni" class="form-control" id="dni"
                                       placeholder="Ingrese su DNI" value="{{ $person->dni }}" required>
                                   <div class="invalid-feedback">Por favor ingrese su DNI! </div>
                               </div>
                               @error('dni')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{-- Correo --}}
                           <div class="col-12">
                               <label for="email" class="form-label">Correo</label>
                               <div class="input-group has-validation">

                                   <input type="email" name="email" class="form-control" id="email"
                                       placeholder="Ingrese su correo" value="{{ $person->email ?? '' }}">
                                   <div class="invalid-feedback">Por favor ingrese un correo valido! </div>
                               </div>
                               @error('email')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{-- Telefono --}}
                           <div class="col-12">
                               <label for="phone" class="form-label">Telefono</label>
                               <div class="input-group has-validation">

                                   <input type="text" name="phone" class="form-control" id="phone"
                                       placeholder="Ingrese su telefono" value="{{ $person->phone }}" required>
                                   <div class="invalid-feedback">Por favor ingrese su telefono! </div>
                               </div>
                               @error('phone')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{-- Estado --}}
                           <div class="col-12">
                               <label for="state" class="form-label">Estado</label>
                               <div class="input-group has-validation">

                                   <select name="state" id="state" class="form-select" required>
                                       <option value="" selected disabled>Seleccione un estado</option>
                                       @foreach ($states as $state)
                                           @if ($state == $person->state)
                                               <option value="{{ $state }}" selected>{{ $state }}
                                               </option>
                                           @endif
                                           <option value="{{ $state }}">{{ $state }}</option>
                                       @endforeach
                                   </select>
                                   <div class="invalid-feedback">Por favor seleccione un estado! </div>
                               </div>
                               @error('state')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{-- city / Municipio --}}
                           <div class="col-12">
                               <label for="city" class="form-label">Municipio</label>
                               <div class="input-group has-validation">

                                   <select name="city" id="city" class="form-select" required>
                                       <option value="" selected disabled>Seleccione municipio</option>
                                       @foreach ($cities as $city)
                                           @if ($city == $person->city)
                                               <option value="{{ $city }}" selected>{{ $city }}
                                               </option>
                                           @endif
                                           <option value="{{ $city }}">{{ $city }}</option>
                                       @endforeach
                                   </select>
                                   <div class="invalid-feedback">Por favor seleccione municipio! </div>
                               </div>
                               @error('city')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{--  parish --}}
                           <div class="col-12">
                               <label for="parish" class="form-label">Parroquia</label>
                               <div class="input-group has-validation">

                                   <select name="parish" id="parish" class="form-select" required>
                                       <option value="" selected disabled>Seleccione su parroquia</option>
                                       @foreach ($parishes as $parish)
                                           @if ($parish == $person->parish)
                                               <option value="{{ $parish }}" selected>{{ $parish }}
                                               </option>
                                           @endif

                                           <option value="{{ $parish }}">{{ $parish }}</option>
                                       @endforeach
                                   </select>
                                   <div class="invalid-feedback">Por favor seleccione su parroquia! </div>
                               </div>
                               @error('parish')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{-- Direccion --}}
                           <div class="col-12">
                               <label for="address" class="form-label">Direccion</label>
                               <div class="input-group has-validation">

                                   <input type="text" name="address" class="form-control" id="address"
                                       placeholder="Ingrese su direccion" value="{{ $person->address }}"
                                       required>
                                   <div class="invalid-feedback">Por favor ingrese su direccion! </div>
                               </div>
                               @error('address')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>



                           {{-- voting_center --}}
                           <div class="col-12">
                               <label for="voting_center" class="form-label">Centro de votación</label>
                               <div class="input-group has-validation">

                                   <input type="text" name="voting_center" class="form-control"
                                       id="voting_center" placeholder="Ingrese sus nombres"
                                       value="{{ $person->voting_center }}" required>
                                   <div class="invalid-feedback">Por favor ingrese su centro de votacón! </div>
                               </div>
                               @error('voting_center')
                                   <div class="text-danger"> {{ $message }} </div>
                               @enderror
                           </div>

                           {{-- voting_center --}}


                           <div class="d-flex justify-content-between">
                               <button class="btn btn-outline-primary" type="submit">Guardar datos</button>
                           </div>

                       </form>

                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                       {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                   </div>
               </div>
           </div>
       </div>
       <!-- Cierre Modal formulario crear comensal -->
