<div class="form-group">
    <label for="first_name">First name:</label><br>
    <input class="form-control" type="text" id="first_name" name="first_name" value="{{ old('first_name') ?? $employee->first_name ?? '' }}"><br>
    @error('first_name') <p style="color:red"> {{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="last_name">Last Name:</label><br>
    <input class="form-control" type="text" id="last_name" name="last_name" value="{{ old('last_name') ?? $employee->last_name ?? '' }}"><br>
    @error('last_name') <p style="color:red"> {{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="email">Email:</label><br>
    <input class="form-control" type="text" id="email" name="email" value="{{ old('email') ?? $employee->email ?? '' }}"><br>
    @error('email') <p style="color:red"> {{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="phone">Phone Number:</label><br>
    <input class="form-control" type="text" id="phone" name="phone" value="{{ old('phone') ?? $employee->phone ?? '' }}"><br>
    @error('phone') <p style="color:red"> {{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="company_id">Company</label><br>
    <select class="form-control" type="text" id="company_id" name="company_id"><br>
        @foreach($companies as $company)
            <option value="{{ $company->id }}"> {{ $company->name }}</option>
        @endforeach
    </select>
</div>

@csrf
