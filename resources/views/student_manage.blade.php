@extends('welcome')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success mt-1">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="form-group row m-2">
    <input class="form-control col-2 mr-1" id="myInput" type="text" placeholder="Search...    ">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Thêm Sinh Viên
    </button>
    </div>
    <table class="table table-bordered table-striped mt-1">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
            <th scope="col">Handle</th>
            <th scope="col">Handle</th>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody id="myTable">
        @foreach($students as $student)
        <tr>
            <td class="id">{{$student->id}}</td>
            <td class="msv">{{$student->username}}</td>
            <td class="fullname">{{$student->fullname}}</td>
            <td class="dob">{{$student->dob}}</td>
            <td class="pob">{{$student->pob}}</td>
            <td class="gender">{{$student->gender}}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-warning edit" data-toggle="modal" data-target="#editModalCenter">Sửa</button>
                    <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#deleteModalCenter">Xóa</button>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addStudent" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Mã Sinh Viên">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="date" name="dob" value="1998-08-01" id="example-date-input">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="pob" placeholder="Nơi sinh">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="gender">
                                <option>nam</option>
                                <option>nữ</option>
                                <option>khác</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/deleteStudent" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" id="deletestudent" name="username" value="" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                            <button type="submit" class="btn btn-primary">Xóa</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/editStudent" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" id="editid" name="id" placeholder="ID" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="editusername" name="username" placeholder="Mã Sinh Viên">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="editfullname" name="fullname" placeholder="Họ và tên">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="date" id="editdob" name="dob" value="1998-08-01" id="example-date-input">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="editpob" name="pob" placeholder="Nơi sinh">
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="editgender" name="gender">
                                <option>nam</option>
                                <option>nữ</option>
                                <option>khác</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(".delete").click(function() {
            var $row = $(this).closest("tr");    // Find the row
            var $text = $row.find(".msv").text(); // Find the text

            // Let's test it out
            // alert($text);
            $('#deletestudent').val($text)
        });

        $(".edit").click(function() {
            var $row = $(this).closest("tr");    // Find the row
            var $id = $row.find(".id").text(); // Find the text
            var $username = $row.find(".msv").text(); // Find the text
            var $fullname = $row.find(".fullname").text();
            var $dob = $row.find(".dob").text();
            var $pob = $row.find(".pob").text();
            var $gender = $row.find(".gender").text();
            // Let's test it out
            // alert($text);
            $('#editid').val($id)
            $('#editusername').val($username)
            $('#editfullname').val($fullname)
            $('#editdob').val($dob)
            $('#editpob').val($pob)
            $('#editgender').val($gender)
        });
    </script>

@stop