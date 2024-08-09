<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div id="responseMessage" class="mt-3"></div>
        
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <h2 class="card-title">Product Form</h2>
                <form id="productform">
                    
                    <div class="form-group">
                        <label for="institution_name">prduct Name:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="details">Details:</label>
                        <input type="text" class="form-control" id="details" name="details" required>
                    </div>
                    <div class="form-group">
                        <label for="rate">Rate:</label>
                        <input type="text" class="form-control" id="rate" name="rate" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('#productform').on('submit',function(event){
                    event.preventDefault();
                    let formdata= {
                        'product_name':$('#product_name').val(),
                        'details':$('#details').val(),
                        'rate':$('#rate').val(),
                    };
                    $.ajax({
                        url:'{{route('product.store')}}',
                        method:'POST',
                        data:formdata,
                        headers:{
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(response){
                            $("#responseMessage").html('<div class="alert alert-success">'+response.success+'</div>');
                        }

                    })
                })
              
            })
        </script>
</body>
</html>