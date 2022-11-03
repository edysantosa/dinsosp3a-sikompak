@csrf
<div class="card-body">
    <div class="form-group row">
        <label for="user-name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="user-name" name="name" placeholder="Nama" 
            value="{{ old('username') }}@isset($user){{ $user->name }}@endisset">

            @error('name')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="user-email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="user-email" name="email" placeholder="Email"
            value="{{ old('email') }}@isset($user){{ $user->email }}@endisset">

            @error('email')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @isset($create)
    <div class="form-group row">
        <label for="user-password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="user-password" name="password" placeholder="Password">

            @error('password')
            <span class="error invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
    </div>
    @endisset
    <div class="form-group row">
        <label for="user-password" class="col-sm-2 col-form-label">Roles</label>
        <div class="col-sm-10">
            <div class="form-group">
                @foreach($roles as $role)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox"
                            name="roles[]"
                            value="{{ $role->id }}"
                            id="{{ $role->name }}"
                            @isset($user)
                            	@if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif
                            @endisset
                        >
                        <label class="form-check-label">{{ $role->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-info float-right">Simpan</button>
</div>
<!-- /.card-footer -->