@csrf

<div class="form-group">
    <label>Paciente</label>
    <select class="form-control @error('paciente_id') is-invalid @enderror" name="paciente_id">
        @foreach ($pacientes as $p)
            <option value="{{ $p->id }}" @selected((string) old('paciente_id', optional($cita)->paciente_id) === (string) $p->id)>{{ $p->nombre }}</option>
        @endforeach
    </select>
    @error('paciente_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Dentista</label>
    <select class="form-control @error('dentista_id') is-invalid @enderror" name="dentista_id">
        @foreach ($dentistas as $d)
            <option value="{{ $d->id }}" @selected((string) old('dentista_id', optional($cita)->dentista_id) === (string) $d->id)>{{ $d->nombres }} {{ $d->apellidos }}</option>
        @endforeach
    </select>
    @error('dentista_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Fecha y hora</label>
    <input type="datetime-local" class="form-control @error('fecha_hora') is-invalid @enderror" name="fecha_hora"
        value="{{ old('fecha_hora', isset($cita) && $cita->fecha_hora ? $cita->fecha_hora->format('Y-m-d\\TH:i') : '') }}" />
    @error('fecha_hora') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Estatus</label>
    <select class="form-control @error('estatus') is-invalid @enderror" name="estatus">
        @foreach (['pendiente','confirmada','cancelada','completada'] as $e)
            <option value="{{ $e }}" @selected(old('estatus', $cita->estatus ?? 'pendiente') === $e)>{{ ucfirst($e) }}</option>
        @endforeach
    </select>
    @error('estatus') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Motivo</label>
    <input class="form-control @error('motivo') is-invalid @enderror" name="motivo"
        value="{{ old('motivo', $cita->motivo ?? '') }}" />
    @error('motivo') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Notas</label>
    <textarea class="form-control @error('notas') is-invalid @enderror" name="notas" rows="4">{{ old('notas', $cita->notas ?? '') }}</textarea>
    @error('notas') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

