@csrf

<div class="form-group">
    <label>Paciente</label>
    <select class="form-control @error('paciente_id') is-invalid @enderror" name="paciente_id">
        @foreach ($pacientes as $p)
            <option value="{{ $p->id }}" @selected((string) old('paciente_id', optional($historial)->paciente_id) === (string) $p->id)>{{ $p->nombre }}</option>
        @endforeach
    </select>
    @error('paciente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Fecha</label>
    <input type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha"
        value="{{ old('fecha', isset($historial) && $historial->fecha ? $historial->fecha->format('Y-m-d') : '') }}" />
    @error('fecha') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Diagnóstico</label>
    <textarea class="form-control @error('diagnostico') is-invalid @enderror" name="diagnostico" rows="3">{{ old('diagnostico', optional($historial)->diagnostico) }}</textarea>
    @error('diagnostico') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Tratamiento</label>
    <textarea class="form-control @error('tratamiento') is-invalid @enderror" name="tratamiento" rows="3">{{ old('tratamiento', optional($historial)->tratamiento) }}</textarea>
    @error('tratamiento') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Observaciones</label>
    <textarea class="form-control @error('observaciones') is-invalid @enderror" name="observaciones" rows="3">{{ old('observaciones', optional($historial)->observaciones) }}</textarea>
    @error('observaciones') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

