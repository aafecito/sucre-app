<div class="card">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">{{ __('Cambiar Contraseña') }}</h6>
  </div>
  <div class="card-body pt-4 p-3">
    @if ($mensaje_exito)
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $mensaje_exito }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if ($mensaje_error)
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $mensaje_error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form wire:submit.prevent="cambiarContrasena">
      <div class="mb-3">
        <label for="password_actual" class="form-label">{{ __('Contraseña Actual') }}</label>
        <input type="password" class="form-control @error('password_actual') is-invalid @enderror" id="password_actual"
          wire:model="password_actual" placeholder="{{ __('Ingresa tu contraseña actual') }}">
        @error('password_actual')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password_nueva" class="form-label">{{ __('Nueva Contraseña') }}</label>
        <input type="password" class="form-control @error('password_nueva') is-invalid @enderror" id="password_nueva"
          wire:model="password_nueva" placeholder="{{ __('Ingresa tu nueva contraseña (mín. 8 caracteres)') }}">
        @error('password_nueva')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password_confirmacion" class="form-label">{{ __('Confirmar Contraseña') }}</label>
        <input type="password" class="form-control @error('password_confirmacion') is-invalid @enderror"
          id="password_confirmacion" wire:model="password_confirmacion"
          placeholder="{{ __('Confirma tu nueva contraseña') }}">
        @error('password_confirmacion')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">
        {{ __('Cambiar Contraseña') }}
      </button>
    </form>

    <div class="text-muted mt-4">
      <small>
        <strong>{{ __('Requisitos de seguridad:') }}</strong>
        <ul class="mt-2">
          <li>{{ __('Mínimo 8 caracteres') }}</li>
          <li>{{ __('Debe ser diferente a la contraseña actual') }}</li>
          <li>{{ __('Las contraseñas deben coincidir') }}</li>
        </ul>
      </small>
    </div>
  </div>
</div>
