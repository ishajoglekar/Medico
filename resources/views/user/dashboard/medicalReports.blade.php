@extends('user.dashboard.layout')
@section('title','Medico | User Dashboard')
@section('dashboard-title','My Medical Records')
@section('main-content')
<div>
    <div class="" style="display: flex; flex-direction: row-reverse;">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Upload Test Report
</button>

    </div>
    <!--begin: Datatable -->
    <div class="adv-table" style="margin-top: 10px; margin-left:20px ; margin-right: 20px">
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Test Name</th>
                    <th>Report</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                @foreach ($tests as $test)
                <tr>
                    <td><?= $i++ ?></td>
                    <td>{{$test->filename}}</td>
                    <td class="d-flex">
                  <embed src="{{URL::asset('storage/test_reports/'.$test->filename)}}" style="width: 1000px ;height:300px ">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!--end: Datatable -->
</div>

{{-- upload document modal --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Test Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('medicalTestReport.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group col-md-12">
                            <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
                            <label for="name">Test Name</label>
                            <input type="text" class="form-control" name="testname" id="edit-name" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Upload Test Report</label>
                            <input type="file" class="form-control" name="test_report" id="edit-img">
                        </div>
                        <button class="my-btn col-md-2" type="submit">save</button>
         
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            </form>
            </div>
        </div>
    </div>
</div>
<div id="edit-card" class="d-none">
    <div class="wrapper">
        <div class="card-head">
            Upload Document
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('document.updateData')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group col-md-12">
                            <input type="hidden" id="edit-document-id" name="document_id">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="edit-name" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name">Uplaod</label>
                            <input type="file" class="form-control" name="img" id="edit-img">
                        </div>
                        <button class="my-btn col-md-2" type="submit">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-level-styles')
<style>
    .d-flex {
        display: flex;
    }

    .d-none {
        display: none !important;
    }

    .d-inline-block {
        display: inline-block !important;
    }
</style>
@endsection
@section('page-level-scripts')
<script src="{{ asset('assets/doctors/js/plugin/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script>
    var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        "aaSorting": [
            [0, 'asc']
        ]
    });

    $('#upload-img-btn').click(function() {
        $('#card').toggleClass('d-inline-block').toggleClass('d-block');
    });

    $('#card').click(function() {
        $('#card').toggleClass('d-inline-block').toggleClass('d-block');
    });
    $('#card .wrapper').click(function(e) {
        e.stopPropagation();
    });
    $('#edit-card').click(function() {
        $('#edit-card').toggleClass('d-inline-block').toggleClass('d-block');
    });
    $('#edit-card .wrapper').click(function(e) {
        e.stopPropagation();
    });

    $('.edit-data').click(function() {
        var documentID = $(this).data('id');
        var name = $('#name-' + documentID).html();
        $('#edit-name').val(name);
        $('#edit-document-id').val(documentID);
        $('#edit-card').toggleClass('d-inline-block').toggleClass('d-block');
    });
</script>
@endsection