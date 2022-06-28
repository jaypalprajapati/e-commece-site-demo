<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>hello</h2>
    
</body>
</html>


<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group form-control">
                <strong>Hobbies:</strong><br>
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Cricket" {{ in_array('Cricket', $admin->hobbies ) ? 'checked' : '' }}> Cricket
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Singing" {{ in_array('Singing', $admin->hobbies ) ? 'checked' : '' }}> Singing
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Swimming" {{ in_array('Swimming', $admin->hobbies ) ? 'checked' : '' }}> Swimming
                        <input class="form-check-input" type="checkbox" name="hobbies[]" value="Shopping" {{ in_array('Shopping', $admin->hobbies ) ? 'checked' : '' }}> Shopping
                @if ($errors->has('hobbies'))
                    <span class="text-danger">{{ $errors->first('hobbies') }}</span>
                @endif
                </div>
            </div>