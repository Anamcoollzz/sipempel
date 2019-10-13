<div class="form-group row">
    <label for="{{$id}}" class="col-md-4 col-form-label text-md-right">{{ $label }} <font color="red">*</font></label>

    <div class="col-md-6">
        <input data-toggle="datemask" id="{{$id}}" type="text" class="form-control @error($id) is-invalid @enderror" name="{{$id}}" value="{{ old($id) ? old($id) : (isset($value) ? $value : '') }}" required autocomplete="{{$id}}" autofocus>

        @error($id)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>