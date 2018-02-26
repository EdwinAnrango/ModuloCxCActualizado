@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
		<h3>Nuevo Usuario</h3>
		@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@<?php foreach ($errors->all() as $error): ?>
					<li>
						{{$error}}
					</li>
				<?php endforeach ?>
				</ul>
			</div>
		@endif
	</div>
</div>
	{!!Form::open(array('url'=>'cuentasCobrar/usuario','method'=>'POST','autocomplete'=>'off' ))!!}
	{{Form::token()}}

		<div class="form-group">
			<label for="rol">Rol</label>
			<select name="idrol" class="form-control">
				<?php foreach ($roles as $ro): ?>
					><option  value="{{$ro->idrol}}">{{$ro->nombrerol}}</option>
				<?php endforeach ?>
			</select>
		</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">Nombre</label>

                            <div >
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('Nombre') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


		 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" >E-Mail</label>

                            <div >
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" >Password</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" >Confirm Password</label>

                            <div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>



		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
		</div>
		
	{!!Form::close()!!}
	<a href="/cuentasCobrar/usuario"><button class="btn btn-danger" type="">Cancelar</button></a>
@endsection