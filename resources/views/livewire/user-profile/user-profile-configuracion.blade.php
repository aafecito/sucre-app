<div class="card">
  <div class="card-header pb-0 px-3">
    <h6 class="mb-0">{{ __('Cambiar Contraseña') }}</h6>
  </div>
  <div class="card-body pt-4 p-3">
    <form wire:submit.prevent="cambiarContrasena">
      <div class="mb-3">
        <label for="password_actual" class="form-label">{{ __('Contraseña Actual') }}</label>
        <div class="input-group">
          <input type="{{ $mostrar_contraseña ? 'text' : 'password' }}"
            class="form-control @error('password_actual') is-invalid @enderror" id="password_actual"
            wire:model="password_actual" placeholder="{{ __('Ingresa tu contraseña actual') }}">
          <button class="btn btn-outline-secondary" type="button" wire:click="toggleMostrarContrasena">
            @if ($mostrar_contraseña)
              <i class="fas fa-eye-slash"></i>
            @else
              <i class="fas fa-eye"></i>
            @endif
          </button>
        </div>
        @error('password_actual')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password_nueva" class="form-label">{{ __('Nueva Contraseña') }}</label>
        <div class="input-group">
          <input type="{{ $mostrar_contraseña ? 'text' : 'password' }}"
            class="form-control @error('password_nueva') is-invalid @enderror" id="password_nueva"
            wire:model="password_nueva" placeholder="{{ __('Ingresa tu nueva contraseña (mín. 8 caracteres)') }}">
          <button class="btn btn-outline-secondary" type="button" wire:click="toggleMostrarContrasena">
            @if ($mostrar_contraseña)
              <i class="fas fa-eye-slash"></i>
            @else
              <i class="fas fa-eye"></i>
            @endif
          </button>
        </div>
        @error('password_nueva')
          <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password_confirmacion" class="form-label">{{ __('Confirmar Contraseña') }}</label>
        <div class="input-group">
          <input type="{{ $mostrar_contraseña ? 'text' : 'password' }}"
            class="form-control @error('password_confirmacion') is-invalid @enderror" id="password_confirmacion"
            wire:model="password_confirmacion" placeholder="{{ __('Confirma tu nueva contraseña') }}">
          <button class="btn btn-outline-secondary" type="button" wire:click="toggleMostrarContrasena">
            @if ($mostrar_contraseña)
              <i class="fas fa-eye-slash"></i>
            @else
              <i class="fas fa-eye"></i>
            @endif
          </button>
        </div>
        @error('password_confirmacion')
          <div class="invalid-feedback d-block">{{ $message }}</div>
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
