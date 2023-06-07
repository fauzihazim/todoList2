<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update To Do List</title>
</head>
<body>
    @foreach ($listToDos as $listToDo)
        <div class="flex">
            
            <form  method="post" action="{{ route('update', $listToDo->id) }}" accept-chartset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label for="listToDo">New Todo Item</label></br>
                <input type="text" name="name" id="" value="{{ $listToDo-> name }}"><br>
                <label for="listToDo">Choose a car:</label>
                <select id="" name="is_complete">
                    <option value="">--Pilih--</option>     <!-- If user not selected option, will return NULL -->
                    <option value="1">Completed</option>    <!-- Will return value 1 -> Completed -->
                    <option value="0">Not yet</option>      <!-- Will return value 0 -> Not Completed -->
                </select> <br>
                <label for="listToDo">Upload Foto :</label>
                <input id="my_img_field" type="file" name="image" accept="image/png, image/jpeg, image/jpg" max-size="2048" id="imgInp" onchange="loadFile(event)"><br><br>
                <img id="output"/>
                <script>
                var loadFile = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                    var output = document.getElementById('output');
                    output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };
                </script>
                <button type="submit">Save Item</button>    <!-- Only accept png, jpeg, and jpg type file -->
            </form>
        </div>
    @endforeach
</body>
</html>