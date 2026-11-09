<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</head>
<body>
    <div class='d-flex justify-content-center align-items-center min-vh-100' style="background: linear-gradient(135deg, #e0c3fc 0%, #8ec5fc 100%);">
        <form action="/login" method="POST" class="rounded-2 bg-secondary" style="width:600px">
            @csrf 

            <div class="mb-3 bg-accent text-white p-3 text-center" style="font-size:25px; font-family:Neo-Grotesque;">Sar Loh Kg</div>
            <div class="p-5">

                @if ($errors->has('credentials'))
                    <div class="alert alert-danger">
                        {{ $errors->first('credentials') }}
                    </div>
                @endif

                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                </div>

                <!-- Position Select Dropdown -->
                <div class="mb-3">
                    <label for="position" class="form-label">Select Position</label>
                    <select name="position" id="position" class="form-select @error('position') is-invalid @enderror" required>
                        <option value="" selected disabled>Choose your role...</option>
                        <option value="chef" {{ old('position') == 'chef' ? 'selected' : '' }}>Chef</option>
                        <option value="waiter" {{ old('position') == 'waiter' ? 'selected' : '' }}>Waiter</option>
                        <option value="accountant" {{ old('position') == 'accountant' ? 'selected' : '' }}>Accountant</option>
                    </select>
                </div>

                <!-- Password Field -->
                <div class="mb-5">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>