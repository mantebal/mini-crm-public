<div class="form-group">
    <label for="name">Company name:</label><br>
    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') ?? $company->name ?? '' }}"><br>
    @error('name') <p style="color:red"> {{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="email">Email:</label><br>
    <input class="form-control" type="text" id="email" name="email" value="{{ old('email') ?? $company->email ?? '' }}"><br>
    @error('email') <p style="color:red"> {{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="website">Website:</label><br>
    <input class="form-control" type="text" id="website" name="website" value="{{ old('website') ?? $company->website ?? '' }}"><br>
    @error('website') <p style="color:red"> {{ $message }}</p> @enderror
</div>

<div class="custom-file">
    <input type="file" class="custom-file-input" id="logo" name="logo">
    <label class="custom-file-label" for="logo">Choose file</label>
    @error('logo') <p style="color:red"> {{ $message }}</p> @enderror
</div>

@csrf
